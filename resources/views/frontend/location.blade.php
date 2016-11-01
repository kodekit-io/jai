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
            <p>Jakarta Aquarium is located in Neo SOHO in popular and leisure district, Grogol - Tomang. Consider exploring the beauty of the district that consist of malls, parks, apartments, hotels, shops, restaurants, nightlife, and highways, before or after your visit to the Aquarium.</p>

            <h5 class="cyan-text text-darken-1 uk-margin-bottom-remove">Jakarta Aquarium Address:</h5>
            <p class="uk-margin-remove">Neo Soho Central Park, Jalan Letjend S. Parman Kav. 28,<br>
            Kecamatan Grogol Petamburan, Jakarta Barat, Indonesia 11470</p>
        </div>
        <div id="map" class="ja-map uk-margin-bottom">

        </div>

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

        <div class="ja-ticket__content uk-margin-bottom">
            <p>At vero eos et accusamus et iusto odio madeline dignis imosse ducma quisa. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla  veniam cillum fugiat proident <a href="{!! lang_url('location-map') !!}" class="cyan-text text-darken-1" data-uk-tooltip title="See indoor aquarium map 3D">see indoor aquarium map 3D here</a>.</p>
        </div>

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
