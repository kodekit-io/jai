<?php

namespace App\Http\Controllers;

use App\Service\Career;
use App\Service\Language;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class CareerController extends Controller
{
    use DataMessage;

    protected $baseUrl = 'career';
    /**
     * @var Career
     */
    private $careerService;
    /**
     * @var Language
     */
    private $languageService;

    /**
     * CareerController constructor.
     * @param Career $careerService
     * @param Language $languageService
     */
    public function __construct(Career $careerService, Language $languageService)
    {
        $this->careerService = $careerService;
        $this->languageService = $languageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.careers.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->careerService->datatableData();
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

        return view('backend.careers.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->careerService->store($request->except(['_token']));

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
        $career = $this->careerService->findById($id);
        $data['career'] = $career;
        $data['post'] = $career;
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['baseUrl'] = $this->baseUrl;

        return view('backend.careers.edit', $data);
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
        $this->careerService->update($id, $request->except(['_token']));

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
        $this->careerService->destroy($id);

        return backendRedirect($this->baseUrl)->with($this->getMessage('delete'));
    }
}
