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

            <form class="uk-form uk-margin-top uk-margin-bottom" action="">
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Admission</label>
                    <input id="" type="text" value="General Admission" disabled="true">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Visit Date</label>
                    <input id="" type="text" value="Tuesday, 01-11-2016" disabled="true">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Visitor (2)</label>
                    <input id="" type="text" value="IDR 600.000" disabled="true">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Babies (2)</label>
                    <input id="" type="text" value="FREE" disabled="true">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Promo</label>
                    <input id="" type="text" value="-" disabled="true">
                </div>

                <div class="uk-form-row">
                    <label for="">Service + 10% PB1 Tax</label>
                    <input id="" type="text" value="IDR 20.000" disabled="true">
                </div>

                <div class="uk-form-row">
                    <label for="">Grand Total</label>
                    <input id="" type="text" value="IDR 620.000" disabled="true">
                </div>

                <h5>Personal Identification</h5>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Full Name</label>
                    <input id="" type="text" value="">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Email</label>
                    <input id="" type="text" value="">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Address</label>
                    <input id="" type="text" value="">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">City</label>
                    <input id="" type="text" value="">
                </div>
                <div class="uk-form-row uk-margin-remove">
                    <label for="">Country</label>
                    <input id="" type="text" value="">
                </div>

                <h5 class="uk-margin-bottom-remove">Terms &amp; Conditions <span>(<a href="#!">read</a>)</span></h5>
                <p class="uk-margin-top-remove"><input type="checkbox" class="ja-check"> I have read and accepted the Terms and Conditions of Use.</p>

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
