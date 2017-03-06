@extends('layouts.default')

@section('page-level-styles')
@endsection
@section('content')

    <header class="ja-header-ticket uk-vertical-align">
        <div class="uk-vertical-align-middle uk-width-1-1">
            <div class="uk-container uk-container-center">
                <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">
                    YOUR TRANSACTION IS FAILED
                </h1>
            </div>
        </div>
        @include('includes.sidebanner')
    </header>

    <main class="ja-ticket">
        <div class="uk-container uk-container-center">
            <div class="ja-ticket__content uk-margin-bottom">
                <h3 class="ja-error-payment red-text">
                    <span><i class="uk-icon-close white-text"></i></span>
                    {!! trans('payment.failed_title', [], '', $lang) !!}
                </h3>
                <h5>{!! $errorMessage !!}</h5>
                <p>
                    {!! trans('payment.failed_content', [], '', $lang) !!}<a href="mailto:info@jakartaaquarium.com">info@jakartaaquarium.com</a>
                </p>
                <a href="{!! lang_url('') !!}" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4">Back to Homepage</a>
            </div>
        </div>
    </main>

@endsection

@section('page-level-scripts')
@endsection
