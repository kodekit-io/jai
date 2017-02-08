<?php

namespace App\Http\Middleware;

use App\Service\Language as LanguageService;
use Closure;
use Illuminate\Support\Facades\View;

class Language
{
    /**
     * @var LanguageService
     */
    private $languageService;

    /**
     * Language constructor.
     */
    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = $request->segment(1);
        $defaultLanguage = $this->languageService->getDefaultLanguage();
        $redirectUrl = '';

        // lang is blank ??
        if ($lang == '') {
            $redirectUrl = redirect('/' . $defaultLanguage);
        }

        $segments = $request->segments();
        if (! $this->languageService->isLanguageExists($lang)) {
            if (session('lang')) {
                $lang = session('lang');
            } else {
                $lang = $defaultLanguage;
            }

            $newSegments[] = $lang;
            $redirectUrl = url('');

            foreach ($segments as $segment) {
                $newSegments[] = $segment;
            }

            foreach ($newSegments as $newSegment) {
                $redirectUrl .= '/' . $newSegment;
            }
        }

        // set lang session
        session(['lang' => $lang]);

        $langSwitcher = $this->languageService->generateLangSwitcher($lang, $segments);

        View::share('gLangSwitcher', $langSwitcher);

        // send alternative language to the view
        // as google recommendation
        // https://support.google.com/webmasters/answer/182192?hl=en&ref_topic=2370587

        if ($redirectUrl != '') {
            return redirect($redirectUrl);
        }

        return $next($request);
    }
}