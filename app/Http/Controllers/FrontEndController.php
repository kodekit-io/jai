<?php

namespace App\Http\Controllers;

use App\Service\Package;
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
     * @var Package
     */
    private $packageService;

    /**
     * FrontEndController constructor.
     * @param Post $postService
     * @param Slider $sliderService
     * @param Package $packageService
     */
    public function __construct(Post $postService, Slider $sliderService, Package $packageService)
    {
        $this->postService = $postService;
        $this->sliderService = $sliderService;
        $this->packageService = $packageService;
    }

    public function homepage($lang)
    {
        $params = [
            'status' => 'publish',
            'post_type_id' => 2,
            'lang' => $lang,
            'meta' => [
                'key' => 'whats_on',
                'operator' => '=',
                'value' => '1'
            ]
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

    public function ticket($lang)
    {
        $generalAdmissionParams = [
            'lang' => $lang,
            'is_general_admission' => true
        ];
        $generalPackages = $this->packageService->getPackages($generalAdmissionParams);

        $otherPackageParams = [
            'lang' => $lang,
            'is_general_admission' => true
        ];
        $otherPackages = $this->packageService->getPackages($otherPackageParams);

        $data['generalPackages'] = $generalPackages;
        $data['otherPackages'] = $otherPackages;

        return view('frontend.ticket-hours', $data);
    }

    public function bookticket($lang)
    {
        return view('frontend.book-detail');
    }
}
