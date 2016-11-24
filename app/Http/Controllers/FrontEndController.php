<?php

namespace App\Http\Controllers;

use App\Service\Attraction;
use App\Service\Career;
use App\Service\Package;
use App\Service\Payment;
use App\Service\Post;
use App\Service\ShowTime;
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
     * @var ShowTime
     */
    private $showTimeService;
    /**
     * @var Attraction
     */
    private $attractionService;
    /**
     * @var Career
     */
    private $careerService;
    /**
     * @var Payment
     */
    private $paymentService;

    /**
     * FrontEndController constructor.
     * @param Post $postService
     * @param Slider $sliderService
     * @param Package $packageService
     * @param ShowTime $showTimeService
     * @param Attraction $attractionService
     * @param Career $careerService
     * @param Payment $paymentService
     */
    public function __construct(
        Post $postService,
        Slider $sliderService,
        Package $packageService,
        ShowTime $showTimeService,
        Attraction $attractionService,
        Career $careerService,
        Payment $paymentService
    )
    {
        $this->postService = $postService;
        $this->sliderService = $sliderService;
        $this->packageService = $packageService;
        $this->showTimeService = $showTimeService;
        $this->attractionService = $attractionService;
        $this->careerService = $careerService;
        $this->paymentService = $paymentService;
    }

    public function homePage($lang)
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

        $data['whatsOnContents'] = $post->get();
        $data['sliders'] = $sliders;

        return view('frontend.home', $data);
    }

    public function aboutUs($lang)
    {
        $params = [
            'lang' => $lang,
            'id' => config('misc.statics.about-us')
        ];
        $postWithDetail = $this->postService->getPostsWithDetail($params);
        $post = $this->postService->getPost(['id' => config('misc.statics.about-us')]);
        $ourStory = $post->metas()->where('meta_key', 'story-' . $lang)->first();
        $ourPhilosophy = $post->metas()->where('meta_key', 'philosophy-' . $lang)->first();

        $data['post'] = $postWithDetail->first();
        $data['ourStory'] = $ourStory;
        $data['ourPhilosophy'] = $ourPhilosophy;
        $data['metaDesc'] = get_meta_description($post->id, $lang);

        return view('frontend.about-us', $data);
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

    public function bookTicket($lang)
    {
        $dokuParams = $this->paymentService->getDokuParameters();
        $dokuUrl = config('doku.doku.api_url');
        $data['dokuUrl'] = $dokuUrl;
        $data['dokuParams'] = $dokuParams;
        return view('frontend.book-detail', $data);
    }

    public function specialPackages($lang)
    {
        $params = [
            'package_type_id' => 2,
            'lang' => $lang
        ];
        $packages = $this->packageService->getPackages($params);
        $data['packages'] = $packages;

        return view('frontend.special-packages', $data);
    }

    public function showTime($lang)
    {
        $params = [
            'lang' => $lang
        ];
        $shows = $this->showTimeService->getShowsWithDetails($params)->get();
        $data['shows'] = $shows;
        $data['lang'] = $lang;

        return view('frontend.showtime', $data);
    }

    public function location($lang)
    {
        return view('frontend.location');
    }

    public function locationMap($lang)
    {
        return view('frontend.location-map');
    }

    public function news($lang, $page = 1)
    {
        $featuredParams = $this->postService->getFeaturedPostParams($lang);
        $featuredPosts = $this->postService->getPostsWithDetail($featuredParams);

        $featuredIds = $featuredPosts->pluck('id');

        $newsParams = $this->postService->getNewsParams($lang, $featuredIds);
        $news = $this->postService->getPostsWithDetail($newsParams);


        $newsPaginated = $news->paginate(5);
        $newsPaginated->setPath('news');
        $data['featuredPosts'] = $featuredPosts->get();
        $data['news'] =$newsPaginated;

        return view('frontend.news', $data);
    }

    public function newsDetail($lang, $slug)
    {
        $post = $this->postService->getPostsWithDetail(['lang' => $lang, 'slug' => $slug]);
        if (! $post->count() > 0) {
            abort(404);
        }
        $post = $post->first();

        $relatedPosts = $this->postService->getRelatedPosts($lang, $post->id);
        $data['post'] = $post;
        $data['relatedPosts'] = $relatedPosts;
        $data['metaDesc'] = get_meta_description($post->id, $lang);

        return view('frontend.news-details', $data);
    }

    public function attractions($lang)
    {
        $experienceParams = [
            'status' => 'publish',
            'post_type_id' => 3,
            'lang' => $lang,
            'category_id' => 17
        ];
        $experiences = $this->postService->getPostsWithDetail($experienceParams);
        $data['experiences'] = $experiences->get();

        $showParams = [
            'status' => 'publish',
            'post_type_id' => 3,
            'lang' => $lang,
            'category_id' => 18
        ];
        $shows = $this->postService->getPostsWithDetail($showParams);
        $data['shows'] = $shows->get();

        $diningParams = [
            'status' => 'publish',
            'post_type_id' => 3,
            'lang' => $lang,
            'category_id' => 19
        ];
        $dinings = $this->postService->getPostsWithDetail($diningParams);
        $data['dinings'] = $dinings->get();

        return view('frontend.attractions-experience', $data);
    }

    public function education($lang)
    {
        return view('frontend.education');
    }

    public function conservation($lang)
    {
        return view('frontend.conservation');
    }

    public function career($lang)
    {
        $params = [
            'lang' => $lang,
            'id' => config('misc.statics.career')
        ];
        $post = $this->postService->getPostsWithDetail($params);

        $data['page'] = $post->first();
        $careers = $this->careerService->getCareerWithDetails($params)->get();
        $data['careers'] = $careers;
        $data['posts'] = $careers;

        return view('frontend.career', $data);
    }

    public function privacy($lang)
    {
        $params = [
            'lang' => $lang,
            'id' => config('misc.statics.privacy-policy')
        ];
        $post = $this->postService->getPostsWithDetail($params);
        $data['page'] = $post->first();

        return view('frontend.privacy-policy', $data);
    }

    public function term($lang)
    {
        $params = [
            'lang' => $lang,
            'id' => config('misc.statics.term-of-use')
        ];
        $post = $this->postService->getPostsWithDetail($params);
        $data['page'] = $post->first();

        return view('frontend.term-use', $data);
    }

    public function search($lang)
    {
        return view('frontend.search-result');
    }

}
