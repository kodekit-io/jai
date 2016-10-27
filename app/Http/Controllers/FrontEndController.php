<?php

namespace App\Http\Controllers;

use App\Service\Post;
use App\Service\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontEndController extends Controller
{
    /**
     * @var Post
     */
    private $postService;
    /**
     * @var Slider
     */
    private $sliderService;

    /**
     * FrontEndController constructor.
     * @param Post $postService
     * @param Slider $sliderService
     */
    public function __construct(Post $postService, Slider $sliderService)
    {
        $this->postService = $postService;
        $this->sliderService = $sliderService;
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

        $sliderParams = [
            'title' => 'Homeslider',
            'lang' => $lang,
        ];
        $sliders = $this->sliderService->getSliderWithItems($sliderParams);

        $data['whatsOnContents'] = $post;
        $data['sliders'] = $sliders;

        return view('frontend.home', $data);
    }

    public function aboutUs($lang)
    {
        return view('frontend.about-us');
    }

    public function ticket($lang) {
        return view('frontend.ticket-hours');
    }
}
