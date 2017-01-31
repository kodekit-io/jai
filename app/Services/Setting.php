<?php

namespace App\Service;


use App\Models\Setting as SettingModel;

class Setting
{

    /**
     * Setting constructor.
     */
    public function __construct()
    {
    }

    public function storeMass(array $inputs)
    {
        foreach ($inputs as $key => $val) {
            $this->store($key, $val);
        }
    }

    public function store($key, $val)
    {
        if ($key != '' && $val != '') {
            SettingModel::create([
                'key' => $key,
                'value' => $val
            ]);
        }
    }

    public function getSettings($params)
    {
        $settings = SettingModel::where('id', '>', 0);
        if (isset($params['keys'])) {
            $settings->whereIn('key', $params['keys']);
        }
        if (!isset($params['keys']) && isset($params['key'])) {
            $settings->where('key', $params['key']);
        }

        return $settings;
    }

    public function updateMass($inputs)
    {
        foreach ($inputs as $key => $val) {
            $this->update($key, $val);
        }
    }

    public function update($key, $value)
    {
        $setting = SettingModel::where('key', $key);
        if ($setting->exists()) {
            $setting = $setting->first();
            $setting->value = $value;
            $setting->save();
        } else {
            $this->store($key, $value);
        }
    }
}