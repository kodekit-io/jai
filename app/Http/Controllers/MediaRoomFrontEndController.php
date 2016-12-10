<?php

namespace App\Http\Controllers;

use App\Service\Category;
use App\Service\Post;
use Illuminate\Http\Request;

class MediaRoomFrontEndController extends Controller
{
    /**
     * @var Post
     */
    private $postService;
    /**
     * @var Category
     */
    private $categoryService;

    /**
     * MediaRoomFrontEndController constructor.
     * @param Post $postService
     * @param Category $categoryService
     */
    public function __construct(Post $postService, Category $categoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    public function mediaRoom($lang)
    {
        $params = [
            'lang' => $lang,
            'post_type_id' => 4,
            'status' => 'PUBLISH'
        ];
        $mediaRooms = $this->postService->getPostsWithDetail($params)->get();
        $categoryParams = [
            'post_type_id' => 4
        ];
        $categories = $this->categoryService->getCategories($categoryParams);
        $data['mediaRooms'] = $mediaRooms;
        $data['categories'] = $categories;

        return view('frontend.media-room', $data);
    }

    public function mediaRoomDetails($lang, $slug)
    {
        $post = $this->postService->getPostsWithDetail(['lang' => $lang, 'slug' => $slug]);
        if (! $post->count() > 0) {
            abort(404);
        }
        $data['mediaRoom'] = $post->first();

        return view('frontend.media-room-details', $data);
    }
}
