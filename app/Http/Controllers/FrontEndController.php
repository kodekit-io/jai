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

        $afterMap = $post->metas()->where('meta_key', 'afterMap-' . $lang)->first();
        // parking
        $parkingTitle = $post->metas()->where('meta_key', 'parkingTitle-' . $lang)->first();
        $parkingDesc = $post->metas()->where('meta_key', 'parkingDesc-' . $lang)->first();
        // vip
        $vipTitle = $post->metas()->where('meta_key', 'vipTitle-' . $lang)->first();
        $vipDesc = $post->metas()->where('meta_key', 'vipDesc-' . $lang)->first();
        // wheelchair
        $wheelchairTitle = $post->metas()->where('meta_key', 'wheelchairTitle-' . $lang)->first();
        $wheelchairDesc = $post->metas()->where('meta_key', 'wheelchairDesc-' . $lang)->first();
        // bikeRack
        $bikeRackTitle = $post->metas()->where('meta_key', 'bikeRackTitle-' . $lang)->first();
        $bikeRackDesc = $post->metas()->where('meta_key', 'bikeRackDesc-' . $lang)->first();
        // shuttleBus
        $shuttleBusTitle = $post->metas()->where('meta_key', 'shuttleBusTitle-' . $lang)->first();
        $shuttleBusDesc = $post->metas()->where('meta_key', 'shuttleBusDesc-' . $lang)->first();
        // blueBird
        $blueBirdTitle = $post->metas()->where('meta_key', 'blueBirdTitle-' . $lang)->first();
        $blueBirdDesc = $post->metas()->where('meta_key', 'blueBirdDesc-' . $lang)->first();
        // publicBus
        $publicBusTitle = $post->metas()->where('meta_key', 'publicBusTitle-' . $lang)->first();
        $publicBusDesc = $post->metas()->where('meta_key', 'publicBusDesc-' . $lang)->first();

        $data['parkingTitle'] = $parkingTitle->meta_value;
        $data['parkingDesc'] = $parkingDesc->meta_value;
        $data['vipTitle'] = $vipTitle->meta_value;
        $data['vipDesc'] = $vipDesc->meta_value;
        $data['wheelchairTitle'] = $wheelchairTitle->meta_value;
        $data['wheelchairDesc'] = $wheelchairDesc->meta_value;
        $data['bikeRackTitle'] = $bikeRackTitle->meta_value;
        $data['bikeRackDesc'] = $bikeRackDesc->meta_value;
        $data['shuttleBusTitle'] = $shuttleBusTitle->meta_value;
        $data['shuttleBusDesc'] = $shuttleBusDesc->meta_value;
        $data['blueBirdTitle'] = $blueBirdTitle->meta_value;
        $data['blueBirdDesc'] = $blueBirdDesc->meta_value;
        $data['publicBusTitle'] = $publicBusTitle->meta_value;
        $data['publicBusDesc'] = $publicBusDesc->meta_value;

        $data['pageTitle'] = $postWithDetail->title;
        $data['post'] = $postWithDetail;
        $data['afterMap'] = $afterMap;

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
        return view('emails.order-completed');
    }
}
