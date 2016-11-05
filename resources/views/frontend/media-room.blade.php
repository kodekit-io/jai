@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-text-uppercase">Media Room</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-page">
    <div class="uk-container uk-container-center">

        <ul id="filtermedia" class="uk-subnav">
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase uk-active" href="" data-uk-filter="">ALL</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="" data-uk-filter="ja-media__animals">Animals</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="" data-uk-filter="ja-media__conversation">Conservation</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="" data-uk-filter="ja-media__events">Events</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="" data-uk-filter="ja-media__research">Research</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="" data-uk-filter="ja-media__leadership">Leadership</a></li>
        </ul>
        <div class="ja-page__content uk-margin-large-bottom">
            <ul class="uk-list uk-list-line ja-media" data-uk-grid="{controls: '#filtermedia'}">
                <li data-uk-filter="ja-media__animals">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__conversation">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Conservation sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__events">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Events Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                </li>
                <li data-uk-filter="ja-media__research">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Research Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__leadership">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Leadership sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__animals">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__conversation">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Conservation sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__events">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Events Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
                </li>
                <li data-uk-filter="ja-media__research">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Research Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
                <li data-uk-filter="ja-media__leadership">
                    <span class="grey-text text-darken-1">01/11/2016</span>
                    <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room-details') !!}" class="cyan-text text-darken-1">Leadership sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                </li>
            </ul>
            <ul class="uk-pagination uk-pagination-left uk-margin-large-top uk-margin-bottom-remove">
                <li class="uk-disabled"><span><i class="uk-icon-arrow-left"></i></span></li>
                <li class="uk-active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><span>...</span></li>
                <li><a href="#">20</a></li>
                <li><a href="#"><i class="uk-icon-arrow-right"></i></a></li>
            </ul>
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/grid.min.js') !!}"></script>
@endsection
