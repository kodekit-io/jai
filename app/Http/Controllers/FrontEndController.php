<?php

namespace App\Http\Controllers;

use App\Service\Attraction;
use App\Service\Career;
use App\Service\Order;
use App\Service\Package;
use App\Service\Payment;
use App\Service\Post;
use App\Service\ShowTime;
use App\Service\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;
use DNS1D;

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
     * @var Order
     */
    private $orderService;

    /**
     * FrontEndController constructor.
     * @param Post $postService
     * @param Slider $sliderService
     * @param Package $packageService
     * @param ShowTime $showTimeService
     * @param Attraction $attractionService
     * @param Career $careerService
     * @param Payment $paymentService
     * @param Order $orderService
     */
    public function __construct(
        Post $postService,
        Slider $sliderService,
        Package $packageService,
        ShowTime $showTimeService,
        Attraction $attractionService,
        Career $careerService,
        Payment $paymentService,
        Order $orderService
    )
    {
        $this->postService = $postService;
        $this->sliderService = $sliderService;
        $this->packageService = $packageService;
        $this->showTimeService = $showTimeService;
        $this->attractionService = $attractionService;
        $this->careerService = $careerService;
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
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

        $sightSeeing = $this->postService->getPost(['id' => config('misc.statics.sightseeing')]);

        $data['firstBox'] = $sightSeeing->metas()->where('meta_key', 'firstBox-' . $lang)->first();
        $data['secondBox'] = $sightSeeing->metas()->where('meta_key', 'secondBox-' . $lang)->first();
        $data['thirdBox'] = $sightSeeing->metas()->where('meta_key', 'thirdBox-' . $lang)->first();
        $data['fourthBox'] = $sightSeeing->metas()->where('meta_key', 'fourthBox-' . $lang)->first();
        $data['whatsOnContents'] = $post->get();
        $data['sliders'] = $sliders;
        $data['pageTitle'] = 'Homepage';

        return view('frontend.home', $data);
    }

    public function aboutUs($lang)
    {
        $params = [
            'lang' => $lang,
            'id' => config('misc.statics.about-us')
        ];
        $postWithDetail = $this->postService->getPostsWithDetail($params)->first();
        $post = $this->postService->getPost(['id' => config('misc.statics.about-us')]);
        $ourStory = $post->metas()->where('meta_key', 'story-' . $lang)->first();
        $ourPhilosophy = $post->metas()->where('meta_key', 'philosophy-' . $lang)->first();

        $data['post'] = $postWithDetail;
        $data['ourStory'] = $ourStory;
        $data['ourPhilosophy'] = $ourPhilosophy;
        $data['metaDesc'] = get_meta_description($post->id, $lang);

        $data['pageTitle'] = $postWithDetail->title;

        return view('frontend.about-us', $data);
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

        $data['pageTitle'] = 'Show Time';

        return view('frontend.showtime', $data);
    }

    public function location($lang)
    {
        $pageId = config('misc.statics.location');
        $params = [
            'lang' => $lang,
            'id' => $pageId
        ];
        $postWithDetail = $this->postService->getPostsWithDetail($params)->first();
        $post = $this->postService->getPost(['id' => $pageId]);

        $metaFields = [
            'afterMap',
            'parkingTitle',
            'parkingDesc',
            'vipTitle',
            'vipDesc',
            'wheelchairTitle',
            'wheelchairDesc',
            'bikeRackTitle',
            'bikeRackDesc',
            'shuttleBusTitle',
            'shuttleBusDesc',
            'blueBirdTitle',
            'blueBirdDesc',
            'publicBusTitle',
            'publicBusDesc'
        ];

        foreach ($metaFields as $metaField) {
            $meta = $post->metas()->where('meta_key', $metaField . '-' . $lang)->first();
            $data[$metaField] = ( isset($meta->meta_value) ? $meta->meta_value : '' );
        }

        $data['pageTitle'] = $postWithDetail->title;
        $data['post'] = $postWithDetail;


        return view('frontend.location', $data);
    }

    public function locationMap($lang)
    {
        $data['pageTitle'] = 'Aquarium Map';

        return view('frontend.location-map', $data);
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

        $data['pageTitle'] = 'News';

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

        $data['pageTitle'] = $post->title;

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

        $data['pageTitle'] = 'Attractions and Experience';

        return view('frontend.attractions-experience', $data);
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

        $data['pageTitle'] = 'Career with Us';

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

        $data['pageTitle'] = 'Privacy Policy';

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

        $data['pageTitle'] = 'Term of Use';

        return view('frontend.term-use', $data);
    }

    public function search($lang)
    {
        $data['pageTitle'] = 'Search Result';

        return view('frontend.search-result', $data);
    }

    public function thankYou($lang)
    {
        $data['paymentType'] = 'creditCard';
        return view('frontend.thank-you', $data);
    }

    public function testPrint($lang)
    {
        $data['barcode'] = DNS1D::getBarcodePNGPath("1612190000211", "EAN13", 2.5, 40);
        return view('emails.order-completed', $data);
    }

    public function promo($lang)
    {
        $data['pageTitle'] = 'Promotions';

        return view('frontend.promo', $data);
    }
}
