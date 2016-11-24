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
            <div class="uk-accordion" data-uk-accordion>

                <h3 class="uk-accordion-title">GENERAL ADMISSION</h3>
                <div class="uk-accordion-content">
                    <p>Come and meet sharks, turtles, jellyfish, octopuses, seahorses, otters, and other beautiful animals. The Jakarta Aquarium is suited to all ages and interests. Purchasing tickets online is a great way to speed up your access to all that the Jakarta Aquarium has to offer.</p>

                    <p>Ticket Price:<br>
                    General Admission : Weekday  IDR 200.000   |   Weekend  IDR 250.000<br>
                    Package A : Weekday  IDR 200.000   |   Weekend  IDR 250.000<br>
                    Package B : Weekday  IDR 200.000   |   Weekend  IDR 250.000</p>

                    <form class="uk-form uk-margin-top uk-margin-bottom" action="{!! lang_url('book-detail') !!}">
                        <div class="uk-form-row">
                            <label for="visit_date"><i class="uk-icon-calendar"></i>Visit Date</label>
                            <input id="visit_date" name="visit_date" type="text" data-uk-datepicker="{format:'dddd, DD-MM-YYYY'}">
                        </div>
                        <div class="uk-form-row">
                            <label for="package">Package</label>
                            <select name="package">
                                <option value="1">General Admission</option>
                                <option value="1">Package A</option>
                                <option value="1">Package B</option>
                            </select>
                        </div>
                        <div class="uk-form-row">
                            <label for="visitor"><i class="ja-adult"></i>Visitor</label>
                            <input id="visitor" type="number" placeholder="0">
                            {{--<label for="visitorchild" class="uk-margin-left"><i class="ja-child"></i>Babies (<2 years, Free)</label>--}}
                            {{--<input id="visitorchild" type="number" placeholder="">--}}
                        </div>
                        <div class="uk-form-row">
                            <label for="promo"><i class="uk-icon-tag"></i>Promo</label>
                            <input id="promo" type="text" placeholder="Coupon code / membership code">
                        </div>
                        <div class="uk-form-row">
                            <button type="submit" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4">Book Now</button>
                        </div>
                    </form>
                </div>

                <h3 class="uk-accordion-title">5D THEATER PACKAGE</h3>
                <div class="uk-accordion-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <h3 class="uk-accordion-title">VIP, SCHOOL, AND BIRTHDAY TOUR</h3>
                <div class="uk-accordion-content">
                    <p>The aquarium is one of Indonesia's most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate. Please contact the booking office by call +62 212 3456 789 or email specialprograms@jakartaaquarium.org with the following information: Your name, your organization name and contact information, preferred date of visit, and number of people. Helping you to create the right experience is our goal.</p>
                </div>

            </div>
        </div>
        <div class="ja-ticket__content uk-margin-bottom">
            <h3 class="light-blue-text text-darken-4">OPENING HOURS</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor crasher malarki requiem predantia incididunt ut labore et dolore magna aliqua. Ut eni ad minim veniam, quisiom nostrud at autumn irure dor in reprehenderit exercitation.</p>
            <ul class="uk-list">
                <li>Weekday	(Monday - Thursday)	:  08.00 a.m. - 07.00 p.m.</li>
                <li>Weekend 	(Friday - Sunday)	:  08.00 a.m. - 09.00 p.m.</li>
            </ul>
            <div class="uk-panel-box">
                <h4 class="uk-margin-remove">Announcement:</h4>
                <p class="uk-margin-remove">Jakarta Aquarium will close on 24th and 25th December for the Christmas holiday, and also on 31st December and 1st January for the New Year holiday.</p>
            </div>
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/components/datepicker.min.js') !!}"></script>
    <script>
        jQuery('#visit_date').change(function() {
            var visitDate = new Date(jQuery(this).val());
            var ajaxUrl = '{!! url('get-package-by-date') !!}';
            jQuery.ajax({
                type: "POST",
                url: ajaxUrl,
                data: { visit_date: visitDate, _token: "{!! csrf_token() !!}" }
            }).done(function (data) {
                console.log(data);
            });
        });
    </script>
@endsection
