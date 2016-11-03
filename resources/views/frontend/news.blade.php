@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__bluesmall light-blue-text text-darken-4">News</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-news">
    <div class="uk-container uk-container-center">
        <div class="ja-news__content uk-margin-bottom uk-slidenav-position ja-featured" data-uk-slideshow="{animation: 'scroll'}">
            <h3 class="light-blue-text text-darken-4">FEATURED</h3>
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-top-right uk-flex-right">
                <li data-uk-slideshow-item="0"><a href=""></a></li>
                <li data-uk-slideshow-item="1"><a href=""></a></li>
            </ul>
            <hr class="ja-hr">
            <ul class="uk-slideshow">
                <li>
                    <img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-01.jpg') !!}" />
                    <div class="uk-overlay-panel ja-featured-overlay">
                        <h2><a href="#!">LOREM IPSUM DOLORES ADISCE CONSECTATUR DELOREM</a></h2>
                        <a href="{!! lang_url('news-details') !!}" class="uk-button ja-button-outline" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </li>
                <li>
                    <img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-02.jpg') !!}" />
                    <div class="uk-overlay-panel ja-featured-overlay">
                        <h2><a href="#!">LOREM IPSUM DOLORES ADISCE CONSECTATUR DELOREM</a></h2>
                        <a href="{!! lang_url('news-details') !!}" class="uk-button ja-button-outline" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    </div>
                </li>
            </ul>
            <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
        </div>

        <div class="ja-news__content uk-padding-bottom-remove">
            <h3 class="light-blue-text text-darken-4 uk-margin-remove">LATEST</h3>
            <hr class="ja-hr uk-margin-bottom-remove">
        </div>
        <div class="ja-news__content uk-margin-bottom">
            <h2><a href="#!" class="grey-text text-darken-3">LOREM IPSUM DOLORES ADISCE CONSECTATUR DELOREM</a></h2>
            <ul class="uk-subnav uk-subnav-line">
                <li>NOVEMBER 22, 2016</li>
                <li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>
            </ul>
            <img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-02.jpg') !!}" />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est sed quia consequuntur magni dolores eos qui ratione laborum.</p>
            <a href="{!! lang_url('news-details') !!}" class="uk-button ja-button amber darken-1 light-blue-text text-darken-4" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
        </div>
        <div class="ja-news__content uk-margin-bottom">
            <h2><a href="#!" class="grey-text text-darken-3">LOREM IPSUM DOLORES ADISCE CONSECTATUR DELOREM</a></h2>
            <ul class="uk-subnav uk-subnav-line">
                <li>NOVEMBER 22, 2016</li>
                <li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>
            </ul>
            <img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-03.jpg') !!}" />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est sed quia consequuntur magni dolores eos qui ratione laborum.</p>
            <a href="{!! lang_url('news-details') !!}" class="uk-button ja-button amber darken-1 light-blue-text text-darken-4" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
        </div>
        <div class="ja-news__content uk-margin-bottom">
            <h2><a href="#!" class="grey-text text-darken-3">LOREM IPSUM DOLORES ADISCE CONSECTATUR DELOREM</a></h2>
            <ul class="uk-subnav uk-subnav-line">
                <li>NOVEMBER 22, 2016</li>
                <li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>
            </ul>
            <img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-04.jpg') !!}" />
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est sed quia consequuntur magni dolores eos qui ratione laborum.</p>
            <a href="{!! lang_url('news-details') !!}" class="uk-button ja-button amber darken-1 light-blue-text text-darken-4" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
        </div>
        <ul class="uk-pagination uk-pagination-left uk-margin-large-bottom">
            <li class="uk-disabled"><span><i class="uk-icon-arrow-left"></i></span></li>
            <li class="uk-active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><span>...</span></li>
            <li><a href="#">20</a></li>
            <li><a href="#"><i class="uk-icon-arrow-right"></i></a></li>
        </ul>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/slideshow.min.js') !!}"></script>
@endsection
