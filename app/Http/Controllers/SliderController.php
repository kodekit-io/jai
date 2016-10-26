<?php

namespace App\Http\Controllers;

use App\Service\Language;
use App\Service\Slider;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SliderController extends Controller
{
    use DataMessage;

    /**
     * @var Slider
     */
    private $sliderService;
    /**
     * @var Language
     */
    private $languageService;

    /**
     * SliderController constructor.
     * @param Language $laguageService
     * @param Slider $sliderService
     */
    public function __construct(Language $languageService, Slider $sliderService)
    {
        $this->sliderService = $sliderService;
        $this->languageService = $languageService;
    }

    public function index()
    {
        return view('backend.sliders.list');
    }

    public function anyData()
    {
        return $this->sliderService->datatableData();
    }

    public function create()
    {
        $data['currentDateTime'] = Carbon::now()->format('d-F-Y - H:i');
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        
        return view('backend.sliders.add', $data);
    }

    public function store(Request $request)
    {
        // var_dump($request->except(['_token'])); exit;
        $this->sliderService->store($request->except(['_token']));

        return backendRedirect('slider')->with($this->getMessage('store'));
    }

    public function edit($id)
    {
        $slider = $this->sliderService->findSliderById($id);
        $data['slider'] = $slider;
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['currentDateTime'] = Carbon::createFromFormat('Y-m-d H:i:s', $slider->publish_date)->format('d-F-Y - H:i');

        return view('backend.sliders.edit', $data);
    }

    public function update($id, Request $request)
    {
//        var_dump($request->except(['_token'])); exit;
        $this->sliderService->update($id, $request->except(['_token']));

        return backendRedirect('slider')->with($this->getMessage('update'));
    }

    public function destroy($id)
    {
        $this->sliderService->destroy($id);

        return backendRedirect('slider')->with($this->getMessage('delete'));
    }
}
