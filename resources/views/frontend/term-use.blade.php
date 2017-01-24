@extends('layouts.default')
@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__curly light-blue-text text-darken-4 uk-float-left"><p>{!! $page->title !!}</p></h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
<main class="ja-page">
    <div class="uk-container uk-container-center">

        <div class="ja-page__content uk-margin-large-bottom">
            {{--<h4 class="cyan-text text-darken-1">Using our Services</h4>--}}

            <p>{!! $page->content !!}</p>
        </div>
    </div>
</main>

@endsection
