@extends('layouts.default')
@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">CAREER WITH US</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
<main class="ja-page">
    <div class="uk-container uk-container-center">
        <p>{!! $page->content !!}</p>

        @if(count($careers) > 0)
        <div class="ja-career uk-margin-bottom">
            <div class="cyan darken-1 ja-career-title">
                <h4 class="uk-grid uk-grid-collapse white-text">
                    <div class="uk-width-1-2">JOB POSITIONS</div>
                    <div class="uk-width-1-2">DEPARTMENT</div>
                </h4>
            </div>
            <div class="uk-accordion" data-uk-accordion>
                @foreach($careers as $career)
                <h5 class="uk-accordion-title uk-grid">
                    <div class="uk-width-1-2">{!! $career->position !!}</div>
                    <div class="uk-width-1-2">{!! $career->department !!}</div>
                </h5>
                <div class="uk-accordion-content">
                    <p>{!! $career->description !!}</p>
                </div>
                @endforeach
            </div>
        </div>
        <a href="mailto:hrm@jakarta-aquarium.com" target="_blank" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4 uk-margin-large-bottom" title="Apply Now">Apply Now</a>
        @else
            <h4 class="text-darken-4  uk-margin-large-bottom ">{!! trans('messages.no-job', [], '', $lang) !!}</h4>
        @endif

    </div>
    {{--<div class="ja-career-footer uk-cover-background" style="background-image: url({!! asset('frontend/img/img-career.jpg') !!})"></div>--}}
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
@endsection
