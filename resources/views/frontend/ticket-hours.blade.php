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

                    {{--<div class="uk-panel uk-panel-box cyan darken-1 white-text noborder uk-margin-bottom">--}}
                        {{--<div class="uk-grid">--}}
                            {{--<div class="uk-width-medium-2-3">--}}
                                {{--<h4 class="white-text">REGULAR</h4>--}}
                                {{--Aquarium Admission--}}
                            {{--</div>--}}
                            {{--<div class="uk-width-medium-1-3">--}}
                                {{--Monday - Friday (Weekday):<br><span class="ja-bold">IDR 220.000</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="uk-panel uk-panel-box grey darken-1 white-text noborder uk-margin-bottom">--}}
                        {{--<div class="uk-grid">--}}
                            {{--<div class="uk-width-medium-2-3">--}}
                                {{--<h4 class="white-text">EXLCUSIVE</h4>--}}
                                {{--Aquarium Admission, 5D Theater, Printed Photo Souvenir, and Multiple Entry within Four Hour.--}}
                            {{--</div>--}}
                            {{--<div class="uk-width-medium-1-3">--}}
                                {{--Monday - Friday (Weekday):<br><span class="ja-bold">IDR 275.000</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="uk-panel uk-panel-box amber darken-2 white-text noborder uk-margin-bottom">--}}
                        {{--<div class="uk-grid">--}}
                            {{--<div class="uk-width-medium-2-3">--}}
                                {{--<h4 class="white-text">PREMIUM</h4>--}}
                                {{--Aquarium Admission, 5D Theater, and Printed Photo Souvenir.--}}
                            {{--</div>--}}
                            {{--<div class="uk-width-medium-1-3">--}}
                                {{--Saturday - Sunday (Weekend):<br><span class="ja-bold">IDR 290.000</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="uk-panel uk-panel-box light-blue darken-4 white-text noborder uk-margin-bottom">--}}
                        {{--<div class="uk-grid">--}}
                            {{--<div class="uk-width-medium-2-3">--}}
                                {{--<h4 class="white-text">ULTIMATE</h4>--}}
                                {{--Aquarium Admission, 5D Theater,Seatrek/Dive, Shark/piranha Feeding, Fast Lane to Enter 5D Theater, Front Seat on Underwater Theater Show, Premium Seat in Pingoo Restaurant, 0% Installment (Terms and condition apply), and Multiple Entry within Four Hours.--}}
                            {{--</div>--}}
                            {{--<div class="uk-width-medium-1-3">--}}
                                {{--Monday - Sunday:<br><span class="ja-bold">IDR 550.000</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>

                    <form id="bookForm" class="uk-form uk-margin-top uk-margin-bottom" method="post" action="{!! lang_url('book-detail') !!}">
                        {!! csrf_field() !!}
                        <div class="uk-form-row">
                            <label for="visit_date"><i class="uk-icon-calendar"></i>Visit Date</label>
                            <input id="visit_date" name="visit_date" type="text" data-uk-datepicker="{format:'dddd, DD-MM-YYYY'}" required>
                        </div>
                        <div class="uk-form-row">
                            <h4 class="cyan-text text-darken-1">Admission Package</h4>
                            <div class="uk-grid uk-grid-small uk-grid-match packages" data-uk-grid-match data-uk-grid-margin>
                                {{--@foreach($generalPackages as $package)--}}
                                {{--<div class="uk-width-medium-1-3">--}}
                                    {{--<div class="uk-panel-box {!! $package->color !!} white-text">--}}
                                        {{--<h4 class="white-text uk-margin-remove">{!! $package->title !!}</h4>--}}
                                        {{--<div class="jai-submission-info">{!! $package->content !!}</div>--}}
                                        {{--<div class="jai-submission-price">--}}
                                            {{--Weekday IDR {!! number_format($package->normal_price, 0) !!}--}}
                                            {{--Weekend IDR {!! number_format($package->weekend_price, 0) !!}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="uk-panel-box jai-submission-order white uk-text-right">--}}
                                        {{--<input type="number" name="packages[{!! $package->id !!}]" class="right" value="0">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--@endforeach--}}
                                {{--<div class="uk-width-medium-1-3">--}}
                                    {{--<div class="uk-panel-box light-blue darken-4 white-text">--}}
                                        {{--<h4 class="white-text uk-margin-remove">Premium Admission</h4>--}}
                                        {{--<div class="jai-submission-info">Aquarium Tour, 5D Theater and Printed Photo Souvenir.</div>--}}
                                        {{--<div class="jai-submission-price">Weekday IDR 265.000</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="uk-panel-box jai-submission-order white uk-text-right">--}}
                                        {{--<input type="number" class="right" value="0">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="uk-width-medium-1-3">--}}
                                    {{--<div class="uk-panel-box amber darken-1 white-text">--}}
                                        {{--<h4 class="white-text uk-margin-remove">Exclusive Admission</h4>--}}
                                        {{--<div class="jai-submission-info">Aquarium Tour, 5D Theater, Shark/Piranha Feeding, Seatrek/Dive and Printed Photo Souvenir.</div>--}}
                                        {{--<div class="jai-submission-price">Weekday IDR 550.000</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="uk-panel-box jai-submission-order white uk-text-right">--}}
                                        {{--<input type="number" class="right" value="0">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>

                        <div class="uk-form-row infant-info uk-hidden">
                            <h4>* Admissions for infants under 2 years old is free</h4>
                        </div>

                        {{--<div class="uk-form-row">--}}
                            {{--<label for="promo"><i class="uk-icon-tag"></i>Promo</label>--}}
                            {{--<input id="promo" type="text" placeholder="Coupon code / membership code">--}}
                        {{--</div>--}}

                        <h4 class="cyan-text text-darken-1">Personal Identification</h4>
                        <div class="uk-form-row uk-margin-remove">
                            <label for="order_name">Full Name</label>
                            <input id="" type="text" value="" name="order_name" placeholder="Input your name" required>
                        </div>
                        <div class="uk-form-row uk-margin-remove">
                            <label for="order_email">Email</label>
                            <input id="" type="text" value="" name="order_email" placeholder="Input your email" required>
                        </div>
                        <div class="uk-form-row uk-margin-remove">
                            <label for="order_phone">Phone Number</label>
                            <input id="" type="text" value="" name="order_phone" placeholder="Input your phone" required>
                        </div>
                        {{--<div class="uk-form-row uk-margin-remove">--}}
                            {{--<label for="">Address</label>--}}
                            {{--<input id="" type="text" value="" name="order_address" placeholder="Input your address">--}}
                        {{--</div>--}}
                        {{--<div class="uk-form-row uk-margin-remove">--}}
                            {{--<label for="">City</label>--}}
                            {{--<input id="" type="text" value="" name="order_city" placeholder="Input your city">--}}
                        {{--</div>--}}
                        {{--<div class="uk-form-row uk-margin-remove">--}}
                            {{--<label for="">Country</label>--}}
                            {{--<input id="" type="text" value="" name="order_country" placeholder="Input your country">--}}
                        {{--</div>--}}
                        <div class="uk-form-row agree">
                            <h5 class="uk-margin-bottom-remove">Terms &amp; Conditions <span>(<a href="#!">read</a>)</span></h5>
                            <p class="uk-margin-top-remove">
                                <input name="agree" type="checkbox" class="ja-check" required>
                                <label class="no-style" for="agree">I have read and accepted the Terms and Conditions of Use.</label>
                            </p>
                        </div>

                        <div class="uk-form-row">
                            <button type="submit" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4">Book Now</button>
                        </div>
                    </form>
                </div>

                {{--<h3 class="uk-accordion-title">5D THEATER PACKAGE</h3>--}}
                {{--<div class="uk-accordion-content">--}}
                    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
                {{--</div>--}}

                {{--<h3 class="uk-accordion-title">VIP, SCHOOL, AND BIRTHDAY TOUR</h3>--}}
                {{--<div class="uk-accordion-content">--}}
                    {{--<p>The aquarium is one of Indonesia's most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate. Please contact the booking office by call +62 212 3456 789 or email specialprograms@jakartaaquarium.org with the following information: Your name, your organization name and contact information, preferred date of visit, and number of people. Helping you to create the right experience is our goal.</p>--}}
                {{--</div>--}}

            </div>

        <div class="ja-ticket__content uk-margin-large-bottom">
            <h3 class="light-blue-text text-darken-4">OPENING HOURS</h3>
            {!! $openingHours->meta_value !!}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor crasher malarki requiem predantia incididunt ut labore et dolore magna aliqua. Ut eni ad minim veniam, quisiom nostrud at autumn irure dor in reprehenderit exercitation.</p>--}}
            {{--<ul class="uk-list">--}}
                {{--<li>Weekday	(Monday - Thursday)	:  08.00 a.m. - 07.00 p.m.</li>--}}
                {{--<li>Weekend (Friday - Sunday)	:  08.00 a.m. - 09.00 p.m.</li>--}}
            {{--</ul>--}}
            {{--<div class="uk-panel-box">--}}
                {{--<h4 class="uk-margin-remove">Announcement:</h4>--}}
                {{--<p class="uk-margin-remove">Jakarta Aquarium will close on 24th and 25th December for the Christmas holiday, and also on 31st December and 1st January for the New Year holiday.</p>--}}
            {{--</div>--}}
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/components/datepicker.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/jquery.validate.min.js') !!}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script>
        $(document).ready(function() {
            var getAvailableProducts = function (visitDate) {
                var ajaxUrl = '{!! url('get-package-by-date') !!}';
                jQuery.ajax({
                    type: "POST",
                    url: ajaxUrl,
                    data: { visit_date: visitDate, _token: "{!! csrf_token() !!}" },
                    beforeSend : function(xhr) {
                        $('.packages').block({
                            message: '<img src="{!! asset('frontend/img/spinner.gif') !!}" class="preloader">',
                            css: { border: 'none', zIndex: 100, width: 50, height: 50 },
                            overlayCSS: { background: 'none', zIndex: 100 }
                        });
                    },
                    complete : function(xhr, status) {
                        $('.packages').unblock();
                    }
                }).done(function (data) {
                    // console.log(data);
                    jQuery('.packages').html(data);
                });
            }
            var errorCounter = 0;
            var visitDate = jQuery('#visit_date').val();
            if (visitDate != '') {
                getAvailableProducts(visitDate);
            }

            jQuery('#visit_date').change(function() {
                visitDate = jQuery(this).val();
                console.log(visitDate);
                getAvailableProducts(visitDate);
            });

            $('#bookForm').validate({
                rules: {
                    order_email: {
                        required: true,
                        email: true
                    }
                },
                submitHandler: function(form) { // for demo
                    var orderTotal = 0;
                    $('input[name^=products]').each(function() {
                        var order = $(this).attr('type');
                        if(order == 'number') {
                            if (order == 'number') {
                                var value = $(this).val();
                                orderTotal = orderTotal + parseInt(value);
                            }
                        }
                    });

                    if (orderTotal < 1) {
                        $('.packages p').remove();
                        $('.packages').append('<p><label id="package-error" class="error">Please choose one of this package first.</label></p>');
                        return false;
                    } else {
                        return true;
                    }
                }
            });
        });
    </script>
@endsection
