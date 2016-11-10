<?php

namespace App\Http\Controllers;

use App\Service\Language;
use App\Service\ShowTime;
use App\Service\Traits\DataMessage;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShowTimeController extends Controller
{
    use DataMessage;

    protected $baseUrl = 'showtime';
    /**
     * @var ShowTime
     */
    private $showTimeService;
    /**
     * @var Language
     */
    private $languageService;

    /**
     * ShowTimeController constructor.
     * @param ShowTime $showTimeService
     * @param Language $languageService
     */
    public function __construct(ShowTime $showTimeService, Language $languageService)
    {
        $this->showTimeService = $showTimeService;
        $this->languageService = $languageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.showtimes.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->showTimeService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['showTimeTypeSelect'] = $this->showTimeService->showTimeSelect('show_type');
        $data['daySelect'] = $this->showTimeService->daySelect('day');
        $data['baseUrl'] = $this->baseUrl;

        return view('backend.showtimes.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->showTimeService->store($request->except(['_token']));

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
        $show = $this->showTimeService->getShowById($id);
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['showTimeTypeSelect'] = $this->showTimeService->showTimeSelect('show_type', $show->show_type);
        $data['daySelect'] = $this->showTimeService->daySelect('day', $show->day);
        $data['featuredImage'] = $show->medias()->first();
        $data['baseUrl'] = $this->baseUrl;
        $data['post'] = $show;
        $data['show'] = $show;

        return view('backend.showtimes.edit', $data);
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
        $this->showTimeService->update($id, $request->except(['_token']));

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
        $this->showTimeService->destroy($id);

        return backendRedirect($this->baseUrl)->with($this->getMessage('delete'));
    }
}
