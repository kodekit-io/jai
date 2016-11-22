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
        <img  class="uk-responsive-width" src="{!! asset('images/newsSlider/' . $post->file_name) !!}" />
        <div class="ja-news__content ja-news__content-details uk-margin-bottom">

            <h1 class="light-blue-text text-darken-4 uk-text-uppercase">{!! $post->title !!}</h1>
            <ul class="uk-subnav uk-subnav-line">
                <li>{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('F j, Y') !!}</li>
                <li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>
            </ul>
            <ul class="uk-list ja-share">
                <li><a href="#!" class="uk-icon-button uk-icon-facebook light-blue darken-4"></a></li>
                <li><a href="#!" class="uk-icon-button uk-icon-twitter  light-blue accent-2"></a></li>
                <li><a href="#!" class="uk-icon-button uk-icon-google-plus red"></a></li>
                <li><a href="#!" class="uk-icon-button uk-icon-envelope amber darken-1"></a></li>
            </ul>

            <p>{!! $post->content !!}</p>
        </div>
        @if(count($relatedPosts) > 0)
        <div class="ja-news__content uk-margin-large-bottom">
            <h3 class="cyan-text text-darken-1">YOU MIGHT ALSO LIKE TO READ</h3>
            <ul class="uk-grid uk-grid-medium uk-grid-width-medium-1-3" data-uk-grid-margin data-uk-grid-match>
                @foreach($relatedPosts as $relatedPost)
                <li>
                    <a href="{!! lang_url('news/' . $relatedPost->slug) !!}"><img  class="uk-responsive-width" src="{!! asset('images/newsThumbnail/' . $relatedPost->file_name) !!}" /></a>
                    <p class="uk-margin-bottom-remove">{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('F j, Y') !!}</p>
                    <h5 class="uk-margin-remove"><a href="{!! lang_url('news/' . $relatedPost->slug) !!}" class="grey-text text-darken-3">{!! $relatedPost->title !!}</a></h5>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/slideshow.min.js') !!}"></script>
@endsection
