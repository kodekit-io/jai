@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-ticket uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">AQUARIUM MAP</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-ticket">
    <div class="uk-container uk-container-center">
        <p>At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dignis imosse ducma quisa cillum fugiat nulla pariatur excepteur sint exercitation ullamco accusamus et iusto cupidatat non proident.</p>
        <div class="uk-width-1-1 uk-margin-bottom">
            <h4 class="uk-margin-bottom-remove">UPPER LEVEL</h4>
            <img class="uk-responsive-width" src="{!! asset('frontend/img/map-upper.png') !!}" />
        </div>

        <div class="uk-width-1-1 uk-margin-bottom">
            <h4 class="uk-margin-bottom-remove">LOWER LEVEL</h4>
            <img class="uk-responsive-width" src="{!! asset('frontend/img/map-lower.png') !!}" />
        </div>

        <div class="uk-width-1-1 uk-margin-bottom">
            <img class="uk-responsive-width" src="{!! asset('frontend/img/map-legend.png') !!}" />
        </div>

        <?php /*
        <ul class="uk-subnav uk-subnav-line ja-bold" data-uk-switcher={connect:'#levels'}>
            <li>Level 1</li>
            <li>Level 2</li>
        </ul>
        <ul id="levels" class="uk-switcher uk-margin-bottom">
            <li>
                <img class="uk-responsive-width" src="{!! asset('frontend/img/map-LG-LGM-A4-01.png') !!}" />
                <a class="ja-loc-point L1-1" data-uk-tooltip title="Point 1"></a>
                <a class="ja-loc-point L1-2" data-uk-tooltip title="Point 2"></a>
                <a class="ja-loc-point L1-3" data-uk-tooltip title="Point 3"></a>
                <a class="ja-loc-point L1-4" data-uk-tooltip title="Point 4"></a>
                <a class="ja-loc-point L1-5" data-uk-tooltip title="Point 5"></a>
                <a class="ja-loc-point L1-B" data-uk-tooltip title="Point B"></a>
                <a class="ja-loc-point L1-D" data-uk-tooltip title="Point D"></a>
                <a class="ja-loc-point L1-photo1" data-uk-tooltip title="Photo Point"></a>
                <a class="ja-loc-point L1-photo2" data-uk-tooltip title="Photo Point"></a>
                <a class="ja-loc-point L1-elevator" data-uk-tooltip title="Elevator"></a>
                <a class="ja-loc-point L1-stairs" data-uk-tooltip title="Stairs"></a>
                <a class="ja-loc-point L1-exit" data-uk-tooltip title="Exit"></a>
            </li>
            <li>
                <img class="uk-responsive-width" src="{!! asset('frontend/img/map-LG-LGM-A4-02.png') !!}" />
            </li>
        </ul>

        <div class="ja-ticket__content uk-margin-bottom">
            <p>Neo SOHO provides at vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dignis imosse ducma quisa cillum fugiat nulla pariatur excepteur sint occaecat exercitation ullamco accusamus et iusto odio laboris cupidatat non proident.</p>
            <ul class="uk-list uk-list-space">
                <li>
                    <i class="uk-icon-large ja-icon-facility park"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">Car and Motorcycle Parking Spaces</h5>
                    Aliquip ex ea commodo odio madeline consequat.
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility vip"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">VIP Vallet</h5>
                    Aliquip ex ea commodo odio madeline consequat Rp.50.000.
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility wheelchair"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">Wheelchair Accessible Parking Spaces</h5>
                    Aliquip ex ea commodo odio madeline consequat.
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility bike"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">Bike Racks</h5>
                    Aliquip ex ea commodo odio madeline consequat.
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility shuttle"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">Shuttle Bus</h5>
                    Duis aute Taman Anggrek, Central Park, two public halte, and two hotels.
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility taxi"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">Blue Bird Taxi Stand</h5>
                    Aliquip ex ea commodo odio madeline consequat.
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility bus"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">Public Bus Halte</h5>
                    Exercitation ullamco laboris Halte Transjakarta Koridor Podomoro City.
                </li>
            </ul>
        </div>
        */ ?>

        <div class="ja-ticket__content uk-margin-bottom">
            <h3 class="light-blue-text text-darken-4">VIEW PRINTABLE MAP</h3>
            <p>Our Aquarium Map is now available in high-qualitied PDF format for your convenience. Download and use it to plan your day at the park. The contents of the Aquarium Map may change without prior notice.</p>
            <a href="{!! asset('frontend/img/map-LG-LGM-A4.pdf') !!}" target="_blank" class="uk-button uk-button-primary ja-button cyan darken-1 white-text"><i class="uk-icon-file-pdf-o"></i> DOWNLOAD PDF MAP</a>
        </div>

        {{--<div class="ja-ticket__content uk-margin-large-bottom">--}}
            {{--<h3 class="light-blue-text text-darken-4">MOBILE APP</h3>--}}
            {{--<p>{!! $getTheApp !!}</p>--}}
            {{--<p><a href="#!" title="Download on The App Store"><img src="{!! asset('frontend/img/download-store.png') !!}" alt="Download on The App Store" /></a>--}}
            {{--<a href="#!" title="Get it on Google Play"><img src="{!! asset('frontend/img/download-play.png') !!}" alt="Get it on Google Play" /></a></p>--}}
        {{--</div>--}}

    </div>
</main>

<section id="getapp" class="ja-home-section">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-hidden-small">
            <div class="uk-width-1-3">
                <img src="{!! asset('frontend/img/mobile-app.jpg') !!}" alt="Get The App" />
            </div>
            <div class="uk-width-2-3">
                <h3 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-top uk-margin-bottom">Get The App <img src="{!! asset('frontend/img/coming-soon.png') !!}" alt="Coming Soon" /></h3>
                <p>{!! $getTheApp !!}</p>
                <p><a href="#!" title="Download on The App Store"><img src="{!! asset('frontend/img/download-store.png') !!}" alt="Download on The App Store" /></a>
                    <a href="#!" title="Get it on Google Play"><img src="{!! asset('frontend/img/download-play.png') !!}" alt="Get it on Google Play" /></a></p>
            </div>
        </div>
        <a href="#!" title="Get Mobile App" class="uk-visible-small"><img src="{!! asset('frontend/img/banner-getmobile.png') !!}" alt="Get Mobile App" /></a>
    </div>
</section>

@endsection

@section('page-level-scripts')

@endsection
