<?php
use App\Models;

if (! function_exists('str_cleaner')) {
    function str_cleaner($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-.]/', '', $string); // Removes special chars.
    }
}

if (! function_exists('backendUrl')) {
    function backendUrl($destination)
    {
        $urlConfig = config('misc.backend.url');
        $url = $urlConfig . '/' . $destination;
        return url($url);
    }
}

if (! function_exists('getSlugOnModelByTitle')) {
    /**
     * @param $title
     * @param $model
     * @param int $iterator
     * @return string
     */
    function getSlugOnModelByTitle($title, $model, $iterator = 1)
    {
        $title = ($title != '') ? $title : 'content';
        $tempTitle = $title;

        if ($iterator > 1) {
            $tempTitle = $title . ' ' . $iterator;
        }

        $slug = str_slug($tempTitle, '-');
        $tempModel = 'App\\Models\\' . $model;
        if ((new $tempModel())->findBySlug($slug)) {
            $slug = getSlugOnModelByTitle($title, $model, ++$iterator);
        }

        return $slug;
    }
}

if (! function_exists('backendRedirect')) {
    /**
     * Get an instance of the redirector.
     *
     * @param  string|null  $to
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function backendRedirect($to = null, $status = 302, $headers = [], $secure = null)
    {
        $backendUrl = config('misc.backend.url');
        if (is_null($to)) {
            return app('redirect');
        }

        $to = $backendUrl . '/' . $to;
        return app('redirect')->to($to, $status, $headers, $secure);
    }
}

if (! function_exists('getMediaByPostId')) {

    function getMediaByPostId($postId, $mediaType = 'featured')
    {
        $postService = new \App\Service\Post();
        return $postService->findById($postId)->medias()->where('media_type', $mediaType)->first();
    }
};

if (! function_exists('lang_url')) {

    function lang_url($url) {
        $currentLang = session('lang');
        return url($currentLang . '/' . $url);
    }

}

if (! function_exists('secure_lang_url')) {

    function secure_lang_url($url) {
        $currentLang = session('lang');
        return url($currentLang . '/' . $url, [], true);
    }

}

if (! function_exists('get_day_from_number')) {

    function get_day_from_number($number, $lang) {
        $arrDay = config('languages.languages.' . $lang . '.days');
        return $arrDay[$number];
    }

}

if (! function_exists('get_post_categories')) {

    function get_post_categories($postId) {
        $postService = new \App\Service\Post();
        $post = $postService->getPost(['id' => $postId]);
        return $post->categories;
    }

}

if (! function_exists('get_meta_description')) {
    function get_meta_description($id, $lang, $type = 'post') {
        if ($type == 'post') {
            $postService = new \App\Service\Post();
            $post = $postService->getPost([ 'id' => $id]);
        } elseif ($type == 'package') {
            $packageService = new \App\Service\Package();
            $post = $packageService->getPackage([ 'id' => $id]);
        } elseif ($type == 'show') {
            $showService = new \App\Service\ShowTime();
            $post = $showService->getShowById($id);
        }

        if ($post->count() > 0) {
            $meta = $post->metas()->where('meta_key', 'meta_description-' . $lang);
            if ($meta->count() > 0) {
                return $meta->first()->meta_value;
            }
        }

        return '';

    }

    if (! function_exists('excerpt')) {
        function excerpt($words, $line = 40) {
            return \Illuminate\Support\Str::words(strip_tags($words), $line);
        }
    }

    if (! function_exists('get_jai_setting')) {
        function get_jai_setting($key) {
            $setting = new Models\Setting();
            $query = $setting->where('key', $key);
            if ($query->exists()) {
                $result = $query->first();
                return $result->value;
            }

            return '';
        }
    }

    if (! function_exists('amount_formatting')) {
        function amount_formatting($amount, $digit = 0, $decimalSeparator = ',', $separator = '.') {
            return number_format($amount, $digit, $decimalSeparator, $separator);
        }
    }
}