@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-ticket uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">Location</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-ticket">
    <div class="uk-container uk-container-center">
        <div class="ja-ticket__content">
            <p>{!! $post->content !!}</p>

            <h5 class="cyan-text text-darken-1 uk-margin-bottom-remove">Jakarta Aquarium Address:</h5>
            <p class="uk-margin-remove">
                Neo SOHO Floor LG 101 - LGM 101, Jl. Letjen S. Parman Kav. 28.<br>
                Jakarta Barat, 11470
            </p>
        </div>
        <div id="map" class="ja-map uk-margin-bottom"></div>

        <div class="ja-ticket__content uk-margin-large-bottom">
            <p>{!! $afterMap !!}</p>
            <ul class="uk-list uk-list-space">
                <li>
                    <i class="uk-icon-large ja-icon-facility locker"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $lockerTitle !!}</h5>
                    {!! $lockerDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility restroom"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $restroomTitle !!}</h5>
                    {!! $restroomDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility wheelchair"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $wheelchairTitle !!}</h5>
                    {!! $wheelchairDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility baby"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $babyTitle !!}</h5>
                    {!! $babyDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility wifi"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $wifiTitle !!}</h5>
                    {!! $wifiDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility cafetaria"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $cafeTitle !!}</h5>
                    {!! $cafeDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility souvenir"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $souvenirTitle !!}</h5>
                    {!! $souvenirDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility restaurant"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $restaurantTitle !!}</h5>
                    {!! $restaurantDesc !!}
                </li>
            </ul>
        </div>

        {{--<div class="ja-ticket__content uk-margin-large-bottom">--}}
            {{--<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla  veniam cillum fugiat proident <a href="{!! lang_url('location-map') !!}" class="cyan-text text-darken-1" data-uk-tooltip title="See indoor aquarium map 3D">see indoor aquarium map 3D here</a>.</p>--}}
        {{--</div>--}}

    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/gmaps.js') !!}"></script>
    <script src="//maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.22&key=AIzaSyD0xQ95h9PKdy5-MZsaQjqEY-yM3dX8-e8"></script>
    <script>
        var map;
        $(document).ready(function(){
            map = new GMaps({
                div: '#map',
                lat: -6.1764969,
                lng: 106.7914429
            });
            map.addMarker({
                lat: -6.1764969,
                lng: 106.7914429,
                title: 'Central Park Mall',
                infoWindow: {
                    content: '<p>Neo Soho Central Park,<br>Jalan Letjend S. Parman Kav. 28,<br>Kecamatan Grogol Petamburan,<br>Jakarta Barat,<br>Indonesia 11470</p>'
                }
            });
        });
    </script>
@endsection
