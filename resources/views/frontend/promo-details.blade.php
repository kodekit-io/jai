@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

    <header class="ja-header-news uk-vertical-align">
        <div class="uk-vertical-align-middle uk-width-1-1">
            <div class="uk-container uk-container-center">
                <h1 class="ja-title ja-title__bluesmall light-blue-text text-darken-4">Promo</h1>
            </div>
        </div>
        @include('includes.sidebanner')
    </header>

    <main class="ja-news">
        <div class="uk-container uk-container-center">
            <img  class="uk-responsive-width" src="{!! asset('images/original/' . $post->file_name) !!}" />
            <div class="ja-news__content ja-news__content-details uk-margin-bottom">

                <h1 class="light-blue-text text-darken-4 uk-text-uppercase">{!! $post->title !!}</h1>
                <ul class="uk-subnav uk-subnav-line">
                    <li>{!! isset($post->publish_date) ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('F j, Y') : '' !!}</li>
                    {{--<li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>--}}
                </ul>
                <ul class="uk-list ja-share">
                    <li><a href="javascript:;" class="share s_facebook uk-icon-button uk-icon-facebook light-blue darken-4" title="Share on Facebook"></a></li>
                    <li><a href="javascript:;" class="share s_twitter uk-icon-button uk-icon-twitter light-blue accent-2" title="Share on Twitter"></a></li>
                    <li><a href="javascript:;" class="share s_plus uk-icon-button uk-icon-google-plus red" title="Share on Google Plus"></a></li>
                    <li><a href="javascript:;" class="share s_email uk-icon-button uk-icon-envelope amber darken-1" title="Share via Email"></a></li>
                    <li class="uk-visible-small"><a href="#!" class="share s_whatsapp uk-icon-button uk-icon-whatsapp green darken-1" title="Share on Whatsapp"></a></li>
                </ul>
                <p>{!! $post->content !!}</p>
            </div>

        </div>
    </main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/slideshow.min.js') !!}"></script>
    <script src="{!! asset('frontend/js/socialshare.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".share").ShareLink({
                title: "{!! $post->title !!}",
                text: "{!! \Illuminate\Support\Str::words(strip_tags($post->content), 10) !!}",
                image: "{!! asset('images/promo/' . $post->file_name) !!}",
                url: "{!! lang_url('promo/' . $post->slug) !!}"
            });
        });
    </script>
@endsection
