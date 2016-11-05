@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-text-uppercase">Search Result</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-page">
    <div class="uk-container uk-container-center">
        <p class="ja-bold">33 Result Found</p>
        <div class="ja-page__content uk-margin-large-bottom ja-border-top">
            <ul class="uk-list uk-list-line ja-media">
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - Attraction</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - Blog</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - Media</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - News</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - Attraction</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - News</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - Attraction</span>
                </li>
                <li>
                    <h4 class="uk-margin-remove"><a href="#!" class="cyan-text text-darken-1">Animals Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h4>
                    <span class="grey-text text-darken-1">01/11/2016 - Attraction</span>
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
