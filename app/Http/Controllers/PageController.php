<?php

namespace App\Http\Controllers;

use App\Service\Language;
use App\Service\Post;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use DataMessage;

    /**
     * @var Post
     */
    private $postService;
    protected $postType = 6;
    protected $baseUrl = 'page';
    /**
     * @var Language
     */
    private $languageService;

    /**
     * PageController constructor.
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
        return view('backend.pages.list');
    }

    public function anyData()
    {
        return $this->postService->pageDatatableData($this->postType, $this->baseUrl);
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
        $langs = $this->languageService->getAvailableLanguages();
        $data['langs'] = $langs;
        $pageDetail = $post->details()->where('lang', 'en')->first();
        $data['pageSlug'] = $pageDetail->slug;
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['publishDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('d-F-Y - H:i');
        $data['featuredImage'] = $post->medias()->where('media_type', 'featured')->first();
        $data['baseUrl'] = $this->baseUrl;
        $data['philosophy'] = '';
        $data['story'] = '';

        return view('backend.pages.edit', $data);
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
        $post = $this->postService->update($id, $request->except(['_token']));
        $pageDetail = $post->details()->where('lang', 'en')->first();
        if ($pageDetail->slug == 'about-us') {
            $this->postService->updateAboutUs($post, $request->only(['philosophies', 'stories']));
        }

        if ($pageDetail->slug == 'sightseeing') {
            $this->postService->updateSightSeeing($post, $request->only(['firstBox', 'secondBox', 'thirdBox', 'fourthBox']));
        }

        return backendRedirect('page')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
