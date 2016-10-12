<?php
if (! function_exists('backendUrl')) {
    function backendUrl($destination)
    {
        $urlConfig = config('misc.backend.url');
        $url = $urlConfig . '/' . $destination;
        return url($url);
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