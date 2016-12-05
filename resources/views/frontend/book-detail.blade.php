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
            <h3 class="light-blue-text text-darken-4">BOOKING DETAILS</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor crasher malarki requiem predantia incididunt ut labore et dolore magna aliqua. Ut eni ad minim veniam, quisiom nostrud at autumn irure dor in reprehenderit exercitation.</p>

            <form class="uk-form uk-margin-top uk-margin-bottom" action="{!! $dokuUrl !!}" method="post">
                @foreach($dokuParams as $key => $value)
                    <input type="hidden" name="{!! $key !!}" value="{!! $value !!}">
                @endforeach

                <div class="uk-form-row uk-margin-remove">
                    <label for="">Date of Visit</label>
                    <input id="" type="text" value="Tuesday, 01-11-2016" disabled="true">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Admission</label>
                    <div class="ja-sub">
                        <div class="uk-grid uk-grid-collapse uk-grid-match" data-uk-grid-match data-uk-grid-margin>
                            @foreach($details as $detail)
                            <div class="uk-width-medium-1-3">
                                {!! $detail->product_name !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Visitor(s)</label>
                    <div class="ja-sub">
                        <div class="uk-grid uk-grid-collapse uk-grid-match" data-uk-grid-match data-uk-grid-margin>
                            @foreach($details as $detail)
                                <div class="uk-width-medium-1-3">
                                    {!! $detail->qty !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Price</label>
                    <div class="ja-sub">
                        <div class="uk-grid uk-grid-collapse uk-grid-match" data-uk-grid-match data-uk-grid-margin>
                            @foreach($details as $detail)
                            <div class="uk-width-medium-1-3">
                                IDR {!! number_format($detail->price,0) !!}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label for="">Total</label>
                    <input id="" type="text" value="IDR {!! number_format($subTotal, 0) !!}" disabled="true">
                </div>

                {{--<div class="uk-form-row">--}}
                    {{--<label for="">Promo Discount</label>--}}
                    {{--<input id="" type="text" value="-" disabled="true">--}}
                {{--</div>--}}

                <div class="uk-form-row">
                    <label for="">Service + 10% PB1 Tax</label>
                    <input id="" type="text" value="IDR {!! number_format($tax) !!}" disabled="true">
                </div>

                <div class="uk-form-row">
                    <label for="">Grand Total</label>
                    <input id="" type="text" value="IDR {!! number_format($grandTotal) !!}" disabled="true">
                </div>



                <div class="uk-form-row">
                    <button type="submit" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4">Proccess to Payment</button>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/components/datepicker.min.js') !!}"></script>
@endsection
