@extends('layouts.default')
@section('page-level-styles')
    <style>footer {display: none;}</style>
@endsection
@section('content')

<header class="ja-header uk-cover-background" style="background-image: url({!! asset('frontend/img/conservation-header.jpg') !!})">
    <div class="uk-container uk-container-center">
        <div class="ja-overlay"></div>
        <div class="ja-header-intro" style="margin-top:200px;">
            <h1 class="ja-title ja-title__orange uk-margin-large-bottom white-text uk-text-center">EDUCATION</h1>
            <h2 class="white-text" style="font-size:2em;">COMING SOON</h2>
            <p style="font-size:.5em;">To Redefine the Fun <span class="amber-text text-darken-1">'Edutainment'</span>.</p>
            <p style="font-size:.5em;line-height:1.5em;">Lorem ipsum dolore sit amet sedia ut perspiciatis unde omni istenor eiusmodi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem ut quantumn enim ad minima veniam maximus.</p>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
@endsection
