@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-ticket uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">Special Packages</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-ticket">
    <div class="uk-container uk-container-center">
        <div class="ja-ticket__content uk-margin-bottom">
            This special packages are intended for tour operators. Volume incentives are available. Pre-booking is
required at least 7 days in advance as groups must be pre-qualified before receiving this rate. Please contact the booking office by call <a href="tel:+62 212 3456 789" class="cyan-text">+62 212 3456 789</a> or email <a href="mailto:specialprograms@jakartaaquarium.org" class="cyan-text">specialprograms@jakartaaquarium.org</a> with the following information: Your name, school or organization name, contact information, and preferred date of visit.
        </div>

        <div class="ja-ticket__content uk-margin-large-bottom">
            <div class="uk-accordion" data-uk-accordion>

                <h3 class="uk-accordion-title">School Program</h3>
                <div class="uk-accordion-content">
                    <img src="{!! asset('frontend/img/img-sample-01.jpg') !!}" class="uk-align-left" />
                    <p>At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud quirelle exercitation ullamco ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis laboris nisi ut aliquip ex eamus commodo consequat. Duis aute irure dignis imosse ducmation quisa cillum fugiat Extravaganza nulla pariatur.</p>
                    <p>Excepteur sint exercitation ullamco accusamus et iusto cupidatat non proident. Set ed ut perspiciatis, unde omnis iste natus laboris nisi ut aliquip ex ea commodo consequat error sit voluptatem accusantium iusto cupidatat non proident doloremque requiem  et dolore magnam accusamus et iusto odio voluptatem.</p>
                </div>

                <h3 class="uk-accordion-title">CAMP PROGRAM</h3>
                <div class="uk-accordion-content">
                    <img src="{!! asset('frontend/img/img-sample-02.jpg') !!}" class="uk-align-left" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <h3 class="uk-accordion-title">Back of the House tour</h3>
                <div class="uk-accordion-content">
                    <p>The aquarium is one of Indonesia's most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate. Please contact the booking office by call +62 212 3456 789 or email specialprograms@jakartaaquarium.org with the following information: Your name, your organization name and contact information, preferred date of visit, and number of people. Helping you to create the right experience is our goal.</p>
                </div>
                <h3 class="uk-accordion-title">Multiple Entries </h3>
                <div class="uk-accordion-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <h3 class="uk-accordion-title">COMBO PACKAGE</h3>
                <div class="uk-accordion-content">
                    <p>The aquarium is one of Indonesia's most unforgettable group activities! Groups of 10 or more people receive discounted admission to the aquarium! Pre-booking is required at least 7 days in advance as groups must be pre-qualified before receiving this rate. Please contact the booking office by call +62 212 3456 789 or email specialprograms@jakartaaquarium.org with the following information: Your name, your organization name and contact information, preferred date of visit, and number of people. Helping you to create the right experience is our goal.</p>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
@endsection
