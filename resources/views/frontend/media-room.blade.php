@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-text-uppercase">Media Room</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-page">
    <div class="uk-container uk-container-center">

        <ul id="filtermedia" class="uk-subnav">
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase uk-active" href="" data-uk-filter="">ALL</a></li>
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase" href="" data-uk-filter="ja-media__{!! $category->slug !!}">{!! $category->name !!}</a></li>
                @endforeach
            @endif
        </ul>
        <div class="ja-page__content uk-margin-large-bottom">
            @if (count($mediaRooms) > 0)

            <ul class="uk-list uk-list-line ja-media" data-uk-grid="{controls: '#filtermedia'}">
                @foreach($mediaRooms as $media)
                    <?php
                        $categories = get_post_categories($media->id);
                        $filterClass = '';
                        if (count($categories) > 0) {
                            $x = 0;
                            foreach($categories as $cat) {
                                $filterClass .= ( $x > 0 ? ', ja-media__' . $cat->slug : 'ja-media__' . $cat->slug );
                                $x++;
                            }
                        }
                    ?>
                    <li data-uk-filter="{!! $filterClass !!}">
                        <span class="grey-text text-darken-1">{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $media->publish_date)->format('j F Y') !!}</span>
                        <h4 class="uk-margin-remove"><a href="{!! lang_url('media-room/' . $media->slug) !!}" class="cyan-text text-darken-1">{!! $media->title !!}</a></h4>
                    </li>
                @endforeach
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
            @endif
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/grid.min.js') !!}"></script>
@endsection
