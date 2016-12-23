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
            <p>{!! $afterMap->meta_value !!}</p>
            <ul class="uk-list uk-list-space">
                <li>
                    <i class="uk-icon-large ja-icon-facility park"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $parkingTitle !!}</h5>
                    {!! $parkingDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility vip"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $vipTitle !!}</h5>
                    {!! $vipDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility wheelchair"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $wheelchairTitle !!}</h5>
                    {!! $wheelchairDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility bike"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $bikeRackTitle !!}</h5>
                    {!! $bikeRackDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility shuttle"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $shuttleBusTitle !!}</h5>
                    {!! $shuttleBusDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility taxi"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $blueBirdTitle !!}</h5>
                    {!! $blueBirdDesc !!}
                </li>
                <li>
                    <i class="uk-icon-large ja-icon-facility bus"></i>
                    <h5 class="uk-margin-small-top uk-margin-bottom-remove">{!! $publicBusTitle !!}</h5>
                    {!! $publicBusDesc !!}
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
