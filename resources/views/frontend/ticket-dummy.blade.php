@extends('layouts.default')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('frontend/css/components/datepicker.min.css') !!}" />
@endsection

@section('content')

    <header class="ja-header-ticket uk-vertical-align">
        <div class="uk-vertical-align-middle uk-width-1-1">
            <div class="uk-container uk-container-center">
                <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">Book Tickets</h1>
            </div>
        </div>
        @include('includes.sidebanner')
    </header>

    <main class="ja-ticket">
        <div class="uk-container uk-container-center">

            <div class="ja-ticket__content uk-margin-bottom">
                <div class="">

                    {{--<h3 class="">ADMISSION PACKAGE</h3>--}}
                    <div class="">
                        <p>{!! $post->content !!}</p>
                        <div class="uk-panel uk-panel-box cyan darken-1 white-text noborder uk-margin-bottom">
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-3">
                                    <h4 class="white-text">{!! trans('messages.weekday', [], '', $lang) !!}</h4>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <span class="ja-bold">IDR 195.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="uk-panel uk-panel-box light-blue darken-4 white-text noborder uk-margin-bottom">
                            <div class="uk-grid">
                                <div class="uk-width-medium-2-3">
                                    <h4 class="white-text">{!! trans('messages.weekend', [], '', $lang) !!}</h4>
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <span class="ja-bold">IDR 250.000</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            @if (count($packages) > 0)
                @foreach($packages as $package)
                    <div class="ja-ticket__content uk-margin-bottom">
                        <h3 class="light-blue-text text-darken-4">{!! $package->title !!}</h3>
                        {!! $package->content !!}
                    </div>
                @endforeach
            @endif

            <div class="ja-ticket__content uk-margin-large-bottom">
                <h3 class="light-blue-text text-darken-4">{!! trans('messages.opening-hours', [], '', $lang) !!}</h3>
                {!! $openingHours->meta_value !!}
            </div>
        </div>
    </main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/components/datepicker.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/jquery.validate.min.js') !!}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
@endsection
