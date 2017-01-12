@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-text-uppercase">Search Result</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-page">
    <div class="uk-container uk-container-center">
        <p class="ja-bold">{!! count($searchResults) !!} Result Found</p>
        <div class="ja-page__content uk-margin-large-bottom ja-border-top">
            <ul class="uk-list uk-list-line ja-media">
                @if (count($searchResults) > 0)
                    @foreach($searchResults as $result)
                        <?php
                            $type = '';
                            $url = '';
                            switch ($result->post_type_id) {
                                case '2':
                                    $type = 'News';
                                    $url = 'news/' . $result->slug;
                                    break;
                                case '3':
                                    $type = 'Attraction &amp; Experience';
                                    $url = 'attractions-experience';
                                    break;
                                case '4':
                                    $type = 'Media';
                                    $url = 'media-room/' . $result->slug;
                                    break;
                                case '7':
                                    $type = 'Promo';
                                    $url = 'promo/' . $result->slug;
                                    break;
                            }
                        ?>
                        <li>
                            <h4 class="uk-margin-remove">
                                <a href="{!! lang_url($url) !!}" class="cyan-text text-darken-1">{!! $result->title !!}</a>
                            </h4>
                            <span class="grey-text text-darken-1">{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $result->publish_date)->format('F j, Y') !!} - {!! $type !!}</span>
                            <p>{!! excerpt($result->content, 30) !!}</p>
                        </li>
                    @endforeach
                @else
                    <li>
                        <h4 class="uk-margin-remove">
                            <a href="#!" class="cyan-text text-darken-1">DATA NOT FOUND</a>
                        </h4>
                    </li>
                @endif
            </ul>
            {{--<ul class="uk-pagination uk-pagination-left uk-margin-large-top uk-margin-bottom-remove">--}}
                {{--<li class="uk-disabled"><span><i class="uk-icon-arrow-left"></i></span></li>--}}
                {{--<li class="uk-active"><span>1</span></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><span>...</span></li>--}}
                {{--<li><a href="#">20</a></li>--}}
                {{--<li><a href="#"><i class="uk-icon-arrow-right"></i></a></li>--}}
            {{--</ul>--}}
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/grid.min.js') !!}"></script>
@endsection
