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

    public function getAvailableLanguages()
    {
        return config('languages.languages');
    }

    public function generateLangSwitcher($currentLang, $routeSegments)
    {
        $availableLangs = $this->getAvailableLanguages();
        $switcher = '';
        foreach ($availableLangs as $langKey => $availableLang) {
            $url = url('');
            if ($currentLang == $langKey) {
                $switcher .= '<li class="uk-active"><a href="javascript:;">' . $availableLang['title'] .'</a></li>';
            } else {
                $routeSegments[0] = $langKey;
                foreach ($routeSegments as $segment) {
                    $url .= '/' . $segment;
                }
                $switcher .= '<li><a href="' . $url . '">' . $availableLang['title'] .'</a></li>';
            }
        }

        return $switcher;
    }
}