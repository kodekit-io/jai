<?php

namespace App\Http\Middleware;

use App\Service\Language as LanguageService;
use Closure;

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

        // lang is blank ??
        if ($lang == '') {
            return redirect('/' . $defaultLanguage);
        }

        // lang is exists ??
        if (! $this->languageService->isLanguageExists($lang)) {
            $segments = $request->segments();
            $segments[0] = $defaultLanguage;
            $redirectUrl = url('');
            foreach ($segments as $segment) {
                $redirectUrl .= '/' . $segment;
            }
            return redirect($redirectUrl);
        }

        // send alternative language to the view
        // as google recommendation
        // https://support.google.com/webmasters/answer/182192?hl=en&ref_topic=2370587

        return $next($request);
    }
}
