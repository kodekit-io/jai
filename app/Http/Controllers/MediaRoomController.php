<?php

namespace App\Http\Controllers;

use App\Service\Category;
use App\Service\Language;
use App\Service\Post;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class MediaRoomController extends Controller
{
    use DataMessage;

    protected $baseUrl = 'media-room';
    protected $postType = 4;
    /**
     * @var Post
     */
    private $postService;
    /**
     * @var Category
     */
    private $categoryService;
    /**
     * @var Language
     */
    private $languageService;

    /**
     * MediaRoomController constructor.
     * @param Post $postService
     * @param Category $categoryService
     * @param Language $languageService
     */
    public function __construct(Post $postService, Category $categoryService, Language $languageService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->languageService = $languageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.media-rooms.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->postService->datatableData($this->postType, 'attraction');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categoryCheckboxes'] = $this->categoryService->categoryCheckbox('categories[]', $this->postType);
        $data['currentDateTime'] = Carbon::now()->format('d-F-Y - H:i');
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['baseUrl'] = $this->baseUrl;

        return view('backend.media-rooms.add', $data);
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
        $selectedCategories = $post->categories->pluck('id')->all();
        $data['categoryCheckboxes'] = $this->categoryService->categoryCheckbox('categories[]', $this->postType, $selectedCategories);
        $data['publishDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('d-F-Y - H:i');
        $data['featuredImage'] = $post->medias()->where('media_type', 'featured')->first();
        $data['whatsOn'] = $post->metas()->where('meta_key', 'whats_on')->where('meta_value', 1)->count();
        $data['baseUrl'] = $this->baseUrl;

        return view('backend.media-rooms.edit', $data);
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
        $this->postService->update($id, $request->except(['_token']));

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
