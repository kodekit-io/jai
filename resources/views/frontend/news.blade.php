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
            @if (count($featuredPosts) > 0)
            <ul class="uk-dotnav uk-dotnav-contrast uk-position-top-right uk-flex-right">
                @foreach($featuredPosts as $featuredPost)
                    <li data-uk-slideshow-item="{!! $loop->index !!}"><a href=""></a></li>
                @endforeach
            </ul>
            @endif
            <hr class="ja-hr">
            @if (count($featuredPosts) > 0)
            <ul class="uk-slideshow">
                @foreach($featuredPosts as $featuredPost)
                    <li>
                        @if(isset($featuredPost->file_name))
                            <img  class="uk-responsive-width" src="{!! url('images/newsSlider/' . $featuredPost->file_name) !!}" />
                        @endif
                        <div class="uk-overlay-panel ja-featured-overlay">
                            <h2 class="uk-text-uppercase"><a href="{!! lang_url('news/' . $featuredPost->slug) !!}">{!! $featuredPost->title !!}</a></h2>
                            <a href="{!! lang_url('news/' . $featuredPost->slug) !!}" class="uk-button ja-button-outline" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
                            <p>{!! excerpt($featuredPost->content, 40) !!}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
            @endif
            <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
        </div>

        @if (count($news) > 0)
            <div class="ja-news__content uk-padding-bottom-remove">
                <h3 class="light-blue-text text-darken-4 uk-margin-remove">LATEST</h3>
                <hr class="ja-hr uk-margin-bottom-remove">
            </div>
            @foreach($news as $newsContent)
                <div class="ja-news__content uk-margin-bottom">
                    <h2 class="uk-text-uppercase"><a href="{!! lang_url('news/' . $newsContent->slug) !!}" class="grey-text text-darken-3">{!! $newsContent->title !!}</a></h2>
                    <ul class="uk-subnav uk-subnav-line">
                        <li>{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $newsContent->publish_date)->format('F j, Y') !!}</li>
                        {{--<li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>--}}
                    </ul>
                    @if(isset($newsContent->file_name))
                        <a class="ja-news__img" href="{!! lang_url('news/' . $newsContent->slug) !!}" title="Learn More"><img  class="uk-responsive-width" src="{!! url('images/newsSlider/' . $newsContent->file_name) !!}" /></a>
                    @endif
                    <p>{!! $newsContent->content !!}</p>
                    <a href="{!! lang_url('news/' . $newsContent->slug) !!}" class="uk-button ja-button amber darken-1 light-blue-text text-darken-4" title="Learn More">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
                </div>
            @endforeach

            {{ $news->links('includes.news-paginator') }}

        @endif

    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/slideshow.min.js') !!}"></script>
@endsection
