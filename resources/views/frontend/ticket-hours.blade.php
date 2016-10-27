@extends('layouts.default')
@section('content')

<header class="ja-header-about">
    <div class="uk-container uk-container-center">
        <div class="ja-overlay"></div>
        <div class="ja-about-intro">
            <h1 class="ja-title ja-title__orange uk-margin-large-bottom white-text uk-text-center">About Us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
<main class="ja-about">
    <div class="uk-container uk-container-center">
        <div class="ja-about__content cyan darken-1 white-text uk-text-center">
            <h3 class="ja-title ja-title__alt light-blue-text text-darken-4 uk-text-center">Our Philosophy</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
            <ul class="uk-grid uk-grid-width-medium-1-4 uk-margin-large-top">
                <li>
                    <img src="{!! asset('frontend/img/i-about-01.png') !!}" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
                <li>
                    <img src="{!! asset('frontend/img/i-about-02.png') !!}" />
                    <p>Sed do eiusmod tempor incididunt ut labore.</p>
                </li>
                <li>
                    <img src="{!! asset('frontend/img/i-about-03.png') !!}" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
                <li>
                    <img src="{!! asset('frontend/img/i-about-04.png') !!}" />
                    <p>Tempor incididunt ut labore et dolore magna aliqua.</p>
                </li>
            </ul>
        </div>
        <div class="ja-about__content white uk-text-center uk-margin-bottom">
            <h3 class="ja-title ja-title__alt light-blue-text text-darken-4 uk-text-center">Our Story</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="ja-about__content light-blue darken-4 white-text uk-text-center uk-margin-large-bottom">
            <h3 class="ja-title ja-title__alt amber-text text-darken-1 uk-text-center">Contact Us</h3>
            <p>
                Neo Soho Central Park, Jalan Letjen S. Parman Kav. 28.<br>
                Kecamatan Grogol Petamburan, Jakarta Barat, Indonesia 1147
            </p>
            <p class="uk-margin-bottom-remove">
                T. +62 21 56988888 | F. +62 21 21 56988888<br>
                (Call on 09.00 AM until 05.30 PM)<br>
                E. info@jakartaaquarium.com
            </p>
        </div>
    </div>
</main>

@endsection
