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
        <div class="ja-ticket__content uk-margin-large-bottom">
            <h3 class="light-blue-text text-darken-4">BOOKING DETAILS</h3>
            <p>{!! trans('payment.booking-detail', [], '', $lang) !!}</p>

            <form class="uk-form uk-margin-top" action="{!! $dokuUrl !!}" id="doku" method="post">
                @foreach($dokuParams as $key => $value)
                    <input type="hidden" name="{!! $key !!}" value="{!! $value !!}">
                @endforeach
            </form>

            <form class="uk-form uk-margin-top" action="{!! $cimbUrl !!}" id="cimb" method="post">
                @foreach($cimbParams as $key => $value)
                    <input type="hidden" name="{!! $key !!}" value="{!! $value !!}">
                @endforeach
            </form>

            <form class="uk-form uk-margin-top" action="{!! $cimbCreditUrl !!}" id="cimb_credit" method="post">
                @foreach($cimbCreditParams as $key => $value)
                    <input type="hidden" name="{!! $key !!}" value="{!! $value !!}">
                @endforeach
            </form>

            <form class="uk-form uk-margin-top" action="{!! $cimbRekPonselUrl !!}" id="cimb_rekponsel" method="post">
                @foreach($cimbRekPonselParams as $key => $value)
                    <input type="hidden" name="{!! $key !!}" value="{!! $value !!}">
                @endforeach
            </form>

            <form class="uk-form uk-margin-top">
            <div class="uk-form-row uk-margin-remove">
                <label for="">Date of Visit</label>
                <input id="" type="text" value="{!! $visitDate !!}" disabled="true">
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

            {{--<div class="uk-form-row">--}}
                {{--<label for="">Service + 10% PB1 Tax</label>--}}
                {{--<input id="" type="text" value="IDR {!! number_format($tax) !!}" disabled="true">--}}
            {{--</div>--}}

            <div class="uk-form-row">
                <label for="">Grand Total</label>
                <input id="" type="text" value="IDR {!! number_format($grandTotal) !!}" disabled="true">
            </div>

            <h3 class="light-blue-text text-darken-4 uk-text-uppercase uk-margin-large-top">Choose Your Payment</h3>
            <div class="uk-grid uk-grid-medium uk-margin-large-bottom uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}" data-uk-grid-margin>
                <div class="uk-width-medium-1-3">
                    <div class="uk-panel uk-panel-box white">
                        <input name="payments" type="radio" id="pay1" value="doku" />
                        <label for="pay1" class="no-style"><img src="{!! asset('frontend/img/logo-doku.png') !!}" /></label>
                        <hr>
                        <ul class="uk-list uk-list-space">
                            <li class="uk-margin-bottom">ATM<br><img src="{!! asset('frontend/img/doku-atm.png') !!}" /></li>
                            <li class="uk-margin-bottom">Credit Card<br><img src="{!! asset('frontend/img/doku-cc.png') !!}" /></li>
                            <li>DOKU Wallet<br><img src="{!! asset('frontend/img/doku-wallet.png') !!}" /></li>
                        </ul>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="uk-panel uk-panel-box white">
                        <input name="payments" type="radio" id="pay2" value="cimb" />
                        <label for="pay2" class="no-style"><img src="{!! asset('frontend/img/logo-cimb-click.png') !!}" /></label>
                        <hr>
                        <p>
                            {!! trans('payment-box_cimb', [], '', $lang) !!}
                        </p>
                        {{--
                        <h3 class="uk-margin-bottom-remove">CIMB Clicks</h3>
                        <ul class="uk-list uk-list-line">
                            <li>Lorem ipsum dolor sit amet,</li>
                            <li>consectetur adipisicing elit,</li>
                            <li>sed do eiusmod tempor incididunt</li>
                            <li>ut labore et dolore magna aliqua.</li>
                        </ul>
                        --}}
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="uk-panel uk-panel-box white">
                        <input name="payments" type="radio" id="pay3" value="cimb_credit" />
                        <label for="pay3" class="no-style"><img src="{!! asset('frontend/img/logo-cimb-click.png') !!}" /></label>
                        <hr>
                        <h3 class="uk-margin-bottom-remove">CIMB Credit Card</h3>
                        {{--
                        <h3 class="uk-margin-bottom-remove">CIMB Clicks</h3>
                        <ul class="uk-list uk-list-line">
                            <li>Lorem ipsum dolor sit amet,</li>
                            <li>consectetur adipisicing elit,</li>
                            <li>sed do eiusmod tempor incididunt</li>
                            <li>ut labore et dolore magna aliqua.</li>
                        </ul>
                        --}}
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="uk-panel uk-panel-box white">
                        <input name="payments" type="radio" id="pay4" value="cimb_rekponsel" />
                        <label for="pay4" class="no-style"><img src="{!! asset('frontend/img/logo-cimb-click.png') !!}" /></label>
                        <hr>
                        <h3 class="uk-margin-bottom-remove">CIMB Rek Ponsel</h3>
                        {{--
                        <h3 class="uk-margin-bottom-remove">CIMB Clicks</h3>
                        <ul class="uk-list uk-list-line">
                            <li>Lorem ipsum dolor sit amet,</li>
                            <li>consectetur adipisicing elit,</li>
                            <li>sed do eiusmod tempor incididunt</li>
                            <li>ut labore et dolore magna aliqua.</li>
                        </ul>
                        --}}
                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <button type="button" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4" id="proceed-button">
                    {!! trans('payment.booking-detail_button', [], '', $lang) !!}
                </button>
            </div>
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/components/datepicker.min.js') !!}"></script>
    <script type="text/javascript">
        jQuery('#proceed-button').click(function () {
            var paymentType = jQuery("input[name='payments']:checked");
            jQuery('#' + paymentType.val()).submit();
        });
    </script>
@endsection
