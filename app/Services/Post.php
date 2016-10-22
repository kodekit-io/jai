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
        $posts = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($posts))
            ->addActions($actions)
            ->addColumn('categories', function($post) {
                return $this->getCategories($post);
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
        return PostModel::all();
    }

    public function store(array $inputs)
    {
        $title = $inputs['title'];
        $categories = $inputs['categories'];
        $mediaId = $inputs['featured_image_id'];

        $post = PostModel::create([
            'title' => $title,
            'slug' => getSlugOnModelByTitle($title, 'Post'),
            'content' => $inputs['content'],
            'post_type_id' => 1,
            'status' => strtoupper($inputs['status']),
            'publish_date' => Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i')
        ]);

        if (count($categories) > 0) {
            $post->categories()->attach($categories);
        }

        if ($mediaId != '') {
            $post->medias()->attach($mediaId);
        }
    }

    private function getCategories($post)
    {
        $categories = $post->categories;
        $plucked = array_pluck($categories, 'name');
        return implode(", ", $plucked);
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

    public function findById($id)
    {
        return PostModel::find($id);
    }
}