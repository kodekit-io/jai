<?php

namespace App\Service;


use App\Models\Post as PostModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function pageDatatableData($postType = 6, $baseUrl = 'page')
    {
        $this->baseUrl = $baseUrl;
        $params = [
            'post_type_id' => $postType
        ];
        $posts = $this->getPosts($params);
        $actions = $this->actionParameters(['edit']);

        return (new DatatableGenerator($posts))
            ->addActions($actions)
            ->addColumn('categories', function($post) {
                return $this->getCategories($post);
            })
            ->addColumn('title', function($post) {
                return $post->details()->where('lang', 'en')->first()->title;
            })
            ->addColumn('content', function($post) {
                $content = $post->details()->where('lang', 'en')->first()->content;
                return Str::words(strip_tags($content), 40);
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
        $featured = isset($inputs['featured']) ? true : false ;

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

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $post->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }

        if ($whatsOn) {
            $post->metas()->create([
                'meta_key' => 'whats_on',
                'meta_value' => 1
            ]);
        }

        if ($featured) {
            $post->metas()->create([
                'meta_key' => 'featured',
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

    public function update($id, Request $request)
    {
        $inputs = $request->except(['_token']);
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

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $post->metas()->where('meta_key', 'meta_description-' . $lang)->delete();
                $post->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }

        $categories = isset($inputs['categories']) ? $inputs['categories'] : [];
        if (count($categories) > 0) {
            $post->categories()->sync($categories);
        }

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $post->medias()->sync([$mediaId]);
        }

        $post->metas()->where('meta_key', 'whats_on')->where('meta_value', 1)->delete();
        $whatsOn = isset($inputs['whats_on']) ? $inputs['whats_on'] : '0' ;
        if ($whatsOn == 1) {
            $post->metas()->create([
                'meta_key' => 'whats_on',
                'meta_value' => 1
            ]);
        }

        $post->metas()->where('meta_key', 'featured')->where('meta_value', 1)->delete();
        $featured = isset($inputs['featured']) ? $inputs['featured'] : '0' ;
        if ($featured == 1) {
            $post->metas()->create([
                'meta_key' => 'featured',
                'meta_value' => 1
            ]);
        }

        if ($post->id == config('misc.statics.about-us')) {
            $this->postService->updateAboutUs($post, $request->only(['philosophies', 'stories']));
        }

        if ($post->id == config('misc.statics.sightseeing')) {
            $this->postService->updateSightSeeing($post, $request->only(['firstBox', 'secondBox', 'thirdBox', 'fourthBox']));
        }

        if ($post->id == config('misc.statics.ticket-hours')) {
            $this->postService->updateTicket($post, $request->only(['openingHours']));
        }

        return $post;
    }

    public function updateAboutUs($post, $inputs)
    {
        foreach ($inputs['philosophies'] as $lang => $philosophy) {
            $post->metas()->where('meta_key', 'philosophy-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'philosophy-' . $lang,
                'meta_value' => $philosophy
            ]);
        }

        foreach ($inputs['stories'] as $lang => $story) {
            $post->metas()->where('meta_key', 'story-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'story-' . $lang,
                'meta_value' => $story
            ]);
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
        $query = $this->getBaseQuery();

        // search by id
        if (isset($params['id'])) {
            $query = $query->where('posts.id', $params['id']);
        }

        // search by meta
        if (isset($params['meta'])) {
            $meta = $params['meta'];
            $metaKey = $meta['key'];
            $metaOperator = $meta['operator'];
            $metaValue = $meta['value'];

            $query = $query->join('post_metas', 'posts.id', '=', 'post_metas.post_id')
                ->where('meta_key', '=', $metaKey)
                ->where('meta_value', $metaOperator, $metaValue)
                ->addSelect('post_metas.meta_value');
        }

        // search by category
        if (isset($params['category_id'])) {
            $categoryId = $params['category_id'];
            $query = $query->leftJoin('post_has_categories', 'posts.id', '=', 'post_has_categories.post_id')
                ->where('post_has_categories.category_id', $categoryId);
        }

        if(isset($params['categories'])) {
            $categories = array_pluck($params['categories']);
            $query = $query->leftJoin('post_has_categories', 'posts.id', '=', 'post_has_categories.post_id')
                ->whereIn('post_has_categories.category_id', $categories);
        }

        // search by lang
        if (isset($params['lang'])) {
            $lang = $params['lang'];
            $query = $query->where('post_details.lang', $lang);
        }

        // search by post_type
        if (isset($params['post_type_id'])) {
            $query = $query->where('posts.post_type_id', $params['post_type_id']);
        }

        // search by status
        if (isset($params['status'])) {
            $query = $query->where('posts.status', $params['status']);
        }

        // exclude some ids
        if (isset($params['exclude'])) {
            $query = $query->whereNotIn('posts.id', $params['exclude']);
        }

        // by slug
        if (isset($params['slug'])) {
            $query = $query->where('post_details.slug', $params['slug']);
        }

        // var_dump($query->toSql()); exit;

        // $query->select('posts.*');

        return $query;
    }

    public function findById($id)
    {
        return PostModel::find($id);
    }

    public function getRelatedPosts($lang, $postId)
    {
        $query = $this->getBaseQuery();
        $query = $query->where('post_type_id', 2)->where('post_details.lang', $lang)->where('status', 'PUBLISH')->where('posts.id', '<', $postId);
        if ($query->count() < 1) {
            $query = $this->getBaseQuery();
            $query = $query->where('post_type_id', 2)->where('post_details.lang', $lang)->where('status', 'PUBLISH')->where('posts.id', '>', $postId);
        }
        $query = $query->inRandomOrder();
//        $query = $query->where('posts.id', '<', $postId)->orderBy('posts.id', 'desc');

        return $query->take(3)->get();
    }

    public function getFeaturedPostParams($lang)
    {
        $params = [
            'status' => 'publish',
            'post_type_id' => 2,
            'lang' => $lang,
            'meta' => [
                'key' => 'featured',
                'operator' => '=',
                'value' => '1'
            ]
        ];

        return $params;
    }

    public function getNewsParams($lang, $excludeIds)
    {
        $params = [
            'status' => 'publish',
            'post_type_id' => 2,
            'lang' => $lang,
            'exclude' => $excludeIds
        ];

        return $params;
    }

    private function getBaseQuery()
    {
        return DB::table('posts')
            ->join('post_details', 'posts.id', '=', 'post_details.post_id')
            ->leftJoin('post_has_medias', 'posts.id', '=', 'post_has_medias.post_id')
            ->leftJoin('media', 'post_has_medias.media_id', '=', 'media.id')
            ->select('posts.*', 'post_details.title', 'post_details.slug', 'post_details.content', 'media.file_name');
    }

    public function updateSightSeeing($post, $inputs)
    {
        foreach ($inputs['firstBox'] as $lang => $philosophy) {
            $post->metas()->where('meta_key', 'firstBox-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'firstBox-' . $lang,
                'meta_value' => $philosophy
            ]);
        }

        foreach ($inputs['secondBox'] as $lang => $story) {
            $post->metas()->where('meta_key', 'secondBox-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'secondBox-' . $lang,
                'meta_value' => $story
            ]);
        }

        foreach ($inputs['thirdBox'] as $lang => $philosophy) {
            $post->metas()->where('meta_key', 'thirdBox-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'thirdBox-' . $lang,
                'meta_value' => $philosophy
            ]);
        }

        foreach ($inputs['fourthBox'] as $lang => $story) {
            $post->metas()->where('meta_key', 'fourthBox-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'fourthBox-' . $lang,
                'meta_value' => $story
            ]);
        }
    }

    public function updateTicket($post, array $inputs)
    {
        foreach ($inputs['openingHours'] as $lang => $openingHour) {
            $post->metas()->where('meta_key', 'openingHours-' . $lang)->delete();
            $post->metas()->create([
                'meta_key' => 'openingHours-' . $lang,
                'meta_value' => $openingHour
            ]);
        }
    }

}