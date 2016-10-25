<?php

namespace App\Http\Controllers;

use App\Service\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontEndController extends Controller
{
    /**
     * @var Post
     */
    private $postService;

    /**
     * FrontEndController constructor.
     */
    public function __construct(Post $postService)
    {
        $this->postService = $postService;
    }

    public function homepage($lang)
    {
        $params = [
            'category_id' => 2,
            'status' => 'publish',
            'post_type_id' => 1,
            'lang' => $lang
        ];
        $post = $this->postService->getPostsWithDetail($params);
        $data['whatsOnContents'] = $post;

        return view('frontend.home', $data);
    }
}
