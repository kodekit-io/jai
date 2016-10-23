<?php

namespace App\Service;


use App\Models\Post as PostModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;

class Post
{
    use DatatableParameters;

    protected $baseUrl = 'post';

    public function datatableData()
    {
        $params = [
            'post_type_id' => 1
        ];
        $posts = $this->getPosts($params);
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($posts))
            ->addActions($actions)
            ->addColumn('categories', function($post) {
                return $this->getCategories($post);
            })
            ->addColumn('title', function($post) {
                return $post->details()->where('lang', 'en')->first()->title;
            })
            ->addColumn('post_date', function($post) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('j-M-y H:i:s');
            })
            ->addColumn('post_status', function($post) {
                return strtoupper($post->status);
            })
            ->generate();
    }

    public function all()
    {
        return PostModel::with('details')->get();
    }

    public function store(array $inputs)
    {
        $title = $inputs['title'];
        $categories = $inputs['categories'];
        $mediaId = $inputs['featured_image_id'];

        $post = PostModel::create([
            'post_type_id' => 1,
            'status' => strtoupper($inputs['status']),
            'publish_date' => Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i')
        ]);

        $post->details()->create([
            'title' => $title,
            'slug' => getSlugOnModelByTitle($title, 'PostDetail'),
            'content' => $inputs['content'],
            'lang' => 'en'
        ]);

        if (count($categories) > 0) {
            $post->categories()->attach($categories);
        }

        if ($mediaId != '') {
            $post->medias()->attach($mediaId, ['media_type' => 'featured']);
        }
    }

    private function getCategories($post)
    {
        $categories = $post->categories;
        $plucked = array_pluck($categories, 'name');
        return implode(", ", $plucked);
    }

    public function getPost(array $params)
    {
        $posts = PostModel::where('id', '>', 0);

        // search by id
        if (isset($params['id'])) {
            $posts = $posts->where('id', $params['id']);
        }

        // search by slug
        if (isset($params['slug'])) {
            $slug = $params['slug'];
            $posts = $posts->whereHas('details', function($query) use ($slug) {
                $query->where('slug', $slug);
            });
        }

        return $posts->first();
    }

    public function getPosts(array $params)
    {
        $posts = PostModel::where('id', '>', 0);

        // search by post_type
        if (isset($params['post_type_id'])) {
            $posts = $posts->where('post_type_id', $params['post_type_id']);
        }

        // search by category
        if (isset($params['category_id'])) {
            $categoryId = $params['category_id'];
            $posts = $posts->whereHas('categories', function($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        // search by status
        if (isset($params['status'])) {
            $posts = $posts->where('status', $params['status']);
        }

        return $posts->get();
    }

    public function getPostsWithDetail(array $params)
    {
        $posts = PostModel::with('details');

        // search by post_type
        if (isset($params['post_type_id'])) {
            $posts = $posts->where('post_type_id', $params['post_type_id']);
        }

        // search by category
        if (isset($params['category_id'])) {
            $categoryId = $params['category_id'];
            $posts = $posts->whereHas('categories', function($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        // search by status
        if (isset($params['status'])) {
            $posts = $posts->where('status', $params['status']);
        }

        return $posts->get();
    }

    public function findById($id)
    {
        return PostModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $post = PostModel::find($id);
        $post->title = $inputs['title'];
        $post->content = $inputs['content'];
        $post->publish_date = Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i');
        $post->status = strtoupper($inputs['status']);
        $post->save();

        $categories = $inputs['categories'];
        if (count($categories) > 0) {
            $post->categories()->sync($categories);
        }

        $mediaId = $inputs['featured_image_id'];
        if ($mediaId != '') {
            $post->medias()->sync([$mediaId]);
        }
    }
}