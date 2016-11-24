<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageStoreRequest;
use App\Service\Language;
use App\Service\Package;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class PackageController extends Controller
{
    use DataMessage;
    /**
     * @var Package
     */
    private $packageService;
    /**
     * @var Language
     */
    private $languageService;

    /**
     * PackageController constructor.
     * @param Package $packageService
     * @param Language $languageService
     */
    public function __construct(Package $packageService, Language $languageService)
    {
        $this->packageService = $packageService;
        $this->languageService = $languageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.packages.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->packageService->datatableData();
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
        $data['currentDateTime'] = Carbon::now()->format('d-F-Y - H:i');
        $data['packageSelect'] = $this->packageService->packageTypeSelect('package_type_id');
        $data['baseUrl'] = 'package';

        return view('backend.packages.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageStoreRequest $request)
    {
        $this->packageService->store($request->except(['_token']));

        return backendRedirect('package')->with($this->getMessage('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = $this->packageService->getServiceById($id);
        $data['package'] = $package;
        $data['post'] = $package;
        $data['langs'] = $this->languageService->getAvailableLanguages();
        $data['defaultLang'] = $this->languageService->getDefaultLanguage();
        $data['publishDate'] = Carbon::createFromFormat('Y-m-d H:i:s', $package->created_at)->format('d-F-Y - H:i');
        $data['packageSelect'] = $this->packageService->packageTypeSelect('package_type_id', $package->package_type_id);
        $data['featuredImage'] = $package->medias()->first();
        $data['baseUrl'] = 'package';

        return view('backend.packages.edit', $data);
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
        $this->packageService->update($id, $request->except(['_token']));

        return backendRedirect('package')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->packageService->destroy($id);

        return backendRedirect('package')->with($this->getMessage('delete'));
    }

    public function getPackage(Request $request)
    {
        $visitDate = $request->input('visit_date');
        $visitDate = Carbon::createFromFormat('J, d-m-Y', $visitDate);
        if (in_array($visitDate->day, [6,7]) ) {
            $array = [
                [1 => 'test package'],
                [2 => 'package test']
            ];
        } else {
            $array = [
                [1 => 'test package'],
                [2 => 'package test'],
                [3 => 'regular']
            ];
        }

        return json_encode($array);
    }
}
