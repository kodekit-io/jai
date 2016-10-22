<?php

namespace App\Service;


class Language
{
    public function getDefaultLanguage()
    {
        return config('languages.default');
    }

    public function isLanguageExists($lang)
    {
        $langs = config('languages.languages');
        foreach ($langs as $key => $config) {
            if ($lang == $key) {
                return true;
            }
        }

        return false;

    }
}