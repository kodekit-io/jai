<?php

namespace App\Http\Controllers;

use App\Service\Setting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * @var Setting
     */
    private $settingService;

    /**
     * GeneralSettingController constructor.
     * @param Setting $settingService
     */
    public function __construct(Setting $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $fields = [
            'facebook_link' => ['Facebook Link', 'text'],
            'twitter_link' => ['Twitter Link', 'text'],
            'tripadvisor_link' => ['Tripadvisor Link', 'text'],
            'instagram_link' => ['Instagram Link', 'text'],
            'googleplus_link' => ['Google+ Link', 'text'],
            'linkedin_link' => ['LinkedIn Link', 'text'],
            'homepage_meta' => ['Homepage Meta Desc', 'textarea'],
        ];

        $generalSettings = $this->settingService->getSettings([])->get();
        $settings = [];
        foreach ($generalSettings as $generalSetting) {
            $settings[$generalSetting->key] = $generalSetting->value;
        }

        $data['fields'] = $fields;
        $data['settings'] = $settings;
        $data['generalSettings'] = $generalSettings;

        return view('backend.settings.general-setting', $data);
    }

    public function save(Request $request)
    {
        $this->settingService->updateMass($request->except(['_token']));

        return backendRedirect('general-setting');
    }
}
