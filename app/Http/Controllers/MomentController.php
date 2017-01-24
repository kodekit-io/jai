<?php

namespace App\Http\Controllers;

use App\Service\Language;
use App\Service\Post;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MomentController extends Controller
{
    use DataMessage;

    protected $postType = 8;
    protected $baseUrl = 'moment';
    /**
     * @var Post
     */
    private $postService;
    /**
     * @var Language
     */
    private $languageService;

    /**
     * MomentController constructor.
     * @param Post $postService
     * @param Language $languageService
     */
    public function __construct(Post $postService, Language $languageService)
    {
        $this->postService = $postService;
        $this->languageService = $languageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.moment.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->postService->datatableData($this->postType, 'moment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['currentDateTime'] = Carbon::now()->format('d-F-Y - H:i');
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['baseUrl'] = $this->baseUrl;

        return view('backend.moment.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->postService->store($this->postType, $request->except(['_token']));

        return backendRedirect($this->baseUrl)->with($this->getMessage('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postService->findById($id);
        $data['post'] = $post;
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['publishDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('d-F-Y - H:i');
        $data['featuredImage'] = $post->medias()->where('media_type', 'featured')->first();
        $data['baseUrl'] = $this->baseUrl;

        return view('backend.moment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->postService->update($id, $request);

        return backendRedirect($this->baseUrl)->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postService->destroy($id);

        return backendRedirect($this->baseUrl)->with($this->getMessage('delete'));
    }


}
