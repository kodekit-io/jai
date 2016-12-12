@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h2 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-text-uppercase">Media Room</h2>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-page">
    <div class="uk-container uk-container-center">
        <div class="ja-page__content uk-margin-bottom ja-border-top">
            <h1 class="cyan-text text-darken-1 uk-text-uppercase">{!! $mediaRoom->title !!}</h1>
            <div class="uk-margin-bottom">{!! isset($mediaRoom->publish_date) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $mediaRoom->publish_date)->format('j F Y') : '' !!}</div>

            <p>{!! $mediaRoom->content !!}</p>
        </div>
        <a href="{!! lang_url('media-room') !!}" class="uk-button amber darken-1 light-blue-text text-darken-4 uk-margin-large-bottom" title="Back to Media Room">Back to Media Room</a>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/grid.min.js') !!}"></script>
@endsection
