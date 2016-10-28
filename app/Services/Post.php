<?php

namespace App\Service;


use App\Models\Post as PostModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post
{
    use DatatableParameters;

    protected $baseUrl = '';

    public function datatableData($postType = 1, $baseUrl = 'post')
    {
        $this->baseUrl = $baseUrl;
        $params = [
            'post_type_id' => $postType
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
            ->addColumn('author', function($post) {
                return $post->author->name;
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

    public function store($postTypeId = 1, array $inputs)
    {
        // var_dump($inputs); exit;
        $categories = isset($inputs['categories']) ? $inputs['categories'] : [];
        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        $whatsOn = isset($inputs['whats_on']) ? true : false ;

        $post = PostModel::create([
            'post_type_id' => $postTypeId,
            'status' => strtoupper($inputs['status']),
            'created_by' => Auth::user()->id,
            'publish_date' => Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i')
        ]);

        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $post->details()->create([
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PostDetail'),
                'content' => $content,
                'lang' => $lang
            ]);
        }

        if ($whatsOn) {
            $post->metas()->create([
                'meta_key' => 'whats_on',
                'meta_value' => 1
            ]);
        }

        if ($categories && count($categories) > 0) {
            $post->categories()->attach($categories);
        }

        if ($mediaId != '') {
            $post->medias()->attach($mediaId, ['media_type' => 'featured']);
        }
    }

    public function update($id, array $inputs)
    {
        $post = PostModel::find($id);
        $post->publish_date = Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i');
        $post->status = strtoupper($inputs['status']);
        $post->save();

        $post->details()->delete();
        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $post->details()->create([
                'lang' => $lang,
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PostDetail'),
                'content' => $content,
            ]);
        }

        $categories = isset($inputs['categories']) ? $inputs['categories'] : [];
        if (count($categories) > 0) {
            $post->categories()->sync($categories);
        }

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $post->medias()->sync([$mediaId]);
        }

        $whatsOn = isset($inputs['whats_on']) ? $inputs['whats_on'] : '0' ;
        if ($whatsOn == 1) {
            $post->metas()->create([
                'meta_key' => 'whats_on',
                'meta_value' => 1
            ]);
        } else {
            $post->metas()->where('meta_key', 'whats_on')->where('meta_value', 1)->delete();
        }
    }

    public function destroy($id)
    {
        PostModel::destroy($id);
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
        $query = DB::table('posts')
                    ->join('post_details', 'posts.id', '=', 'post_details.post_id')
                    ->join('post_has_categories', 'posts.id', '=', 'post_has_categories.post_id');

        // search by lang
        if (isset($params['lang'])) {
            $lang = $params['lang'];
            $query = $query->where('post_details.lang', $lang);
        }

        // search by post_type
        if (isset($params['post_type_id'])) {
            $query = $query->where('posts.post_type_id', $params['post_type_id']);
        }

        // search by category
        if (isset($params['category_id'])) {
            $categoryId = $params['category_id'];
            $query = $query->where('post_has_categories.category_id', $categoryId);
        }

        // search by status
        if (isset($params['status'])) {
            $query = $query->where('posts.status', $params['status']);
        }

        return $query->get();

    }

    public function findById($id)
    {
        return PostModel::find($id);
    }

}