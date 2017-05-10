@extends('layouts.default')
@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">PROMO</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
<main class="ja-page">
    <div class="uk-container uk-container-center">
        <ul class="uk-grid uk-grid-width-medium-1-2 uk-margin-large-bottom uk-grid-match" data-uk-grid-margin="" data-uk-grid-match="{target:'.white'}">
            @if (count($promos) > 0)
                @foreach($promos as $promo)
                    <li>
                        <div class="white">
                            @if (isset($promo->file_name))
                                <a href="#" title=""><img src="{!! url('images/original/' . $promo->file_name) !!}" /></a>
                            @endif
                            <div class="uk-panel uk-panel-box noborder white">
                                <h4><a href="{!! lang_url('promo/' . $promo->slug) !!}">{!! $promo->title !!}</a></h4>
                                <p>{!! $promo->content !!}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif

            {{--<li>--}}
                {{--<a href="#" title=""><img src="{!! asset('frontend/img/promo-placeholder.png') !!}" /></a>--}}
                {{--<div class="uk-panel uk-panel-box noborder white">--}}
                    {{--<h4>15% DISCOUNT</h4>--}}
                    {{--<p>Tempor praesenti sed Value Incidia sparkle magnuse doredomain Melrose at iusto.</p>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#" title=""><img src="{!! asset('frontend/img/promo-placeholder.png') !!}" /></a>--}}
                {{--<div class="uk-panel uk-panel-box noborder white">--}}
                    {{--<h4>15% DISCOUNT</h4>--}}
                    {{--<p>Tempor praesenti sed Value Incidia sparkle magnuse doredomain Melrose at iusto.</p>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#" title=""><img src="{!! asset('frontend/img/promo-placeholder.png') !!}" /></a>--}}
                {{--<div class="uk-panel uk-panel-box noborder white">--}}
                    {{--<h4>15% DISCOUNT</h4>--}}
                    {{--<p>Tempor praesenti sed Value Incidia sparkle magnuse doredomain Melrose at iusto.</p>--}}
                {{--</div>--}}
            {{--</li>--}}
        </ul>
    </div>
</main>

@endsection

@section('page-level-scripts')
@endsection
