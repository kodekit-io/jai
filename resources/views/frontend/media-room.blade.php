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

<main class="ja-news">
    <div class="uk-container uk-container-center">
        <ul class="uk-subnav">
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="{!! lang_url('media-room') !!}">ALL</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" data-uk-toggle="{target:'.ja-media__animals'}">Animals</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" data-uk-toggle="{target:'.ja-media__conversation'}">Conservation</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" data-uk-toggle="{target:'.ja-media__events'}">Events</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" data-uk-toggle="{target:'.ja-media__research'}">Research</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" data-uk-toggle="{target:'.ja-media__leadership'}">Leadership</a></li>
        </ul>
        <ul id="attractions" class="uk-switcher uk-margin-large-bottom">
            <?php //tab1 ?>
            <li class="ja-page__content">
                ALL
            </li>
        </ul>

    </div>
</main>

@endsection

@section('page-level-scripts')
@endsection
