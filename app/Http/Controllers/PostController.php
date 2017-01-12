<?php

namespace App\Http\Controllers;

use App\Service\Category;
use App\Service\Language;
use App\Service\Post;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    use DataMessage;

    protected $baseUrl = 'post';
    protected $postType = 1;

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
     * PostController constructor.
     * @param Post $postService
     * @param Category $categoryService
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
        return view('backend.posts.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->postService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categoryCheckboxes'] = $this->categoryService->categoryCheckbox('categories[]', 1);
        $data['currentDateTime'] = Carbon::now()->format('d-F-Y - H:i');
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['baseUrl'] = $this->baseUrl;
        return view('backend.posts.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($request->except(['_token'])); exit;
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
        $data['categoryCheckboxes'] = $this->categoryService->categoryCheckbox('categories[]', 1, $selectedCategories);
        $data['publishDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('d-F-Y - H:i');
        $data['featuredImage'] = $post->medias()->where('media_type', 'featured')->first();
        $data['baseUrl'] = $this->baseUrl;
        return view('backend.posts.edit', $data);
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
