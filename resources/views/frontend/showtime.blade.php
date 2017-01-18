@extends('layouts.default')
@section('content')

@foreach($sliders as $slider)
<header class="ja-header-showtime" style="background-image: url({!! url('images/original/' . $slider->file_name) !!})">
    <div class="uk-container uk-container-center">
        <div class="ja-overlay"></div>
        <div class="ja-showtime-intro">
            <h2 class="ja-title ja-title__large white-text">{!! $slider->title !!}</h2>
            <p>{!! $slider->content !!}</p>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
@endforeach

<main class="ja-showtime">
    <div class="uk-container uk-container-center">
        <h1 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-top uk-margin-large-bottom">{!! $page->title !!}</h1>
        <p>{!! $page->content !!}</p>
        <ul id="filtershow" class="uk-subnav uk-margin-top">
            <li><a href="" data-uk-filter="" data-uk-tooltip title="All Show">SCHEDULE :</a></li>
            <li><a href="" data-uk-filter="ja-showtime__all"><i class="uk-icon-stop light-green-text"></i> ALL DAYS</a></li>
            <li><a href="" data-uk-filter="ja-showtime__part"><i class="uk-icon-stop amber-text"></i> PARTICULAR</a></li>
            <li><a href="" data-uk-filter="ja-showtime__limited"><i class="uk-icon-stop pink-text"></i> LIMITED</a></li>
        </ul>
        <ul class="uk-list uk-list-line uk-width-1-1 ja-showtime-list uk-margin-large-bottom" data-uk-grid="{controls: '#filtershow'}">
            @if(count($shows) > 0)
            @foreach($shows as $show)
                @if($show->show_type == 1)
                    <li class="ja-showtime__all" data-uk-filter="ja-showtime__all">
                        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-text-right grey-text">
                                <h5 class="grey-text uk-margin-remove">ALL DAYS</h5>
                                {{--{!! Carbon\Carbon::createFromFormat('G:i:s', $show->start_time)->format('G:i A') !!}--}}
                                {!! $show->particular_showtime !!}
                            </div>
                            <div class="uk-width-medium-4-5">
                                <div class="uk-margin-left">
                                    <h5>{!! $show->title !!}</h5>
                                    <p>{!! $show->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @elseif($show->show_type == 2)
                    <li class="ja-showtime__part" data-uk-filter="ja-showtime__part">
                        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-text-right grey-text">
                                {{--<h4 class="grey-text">{!! get_day_from_number($show->day, $lang) !!}</h4>--}}
                                {{--{!! Carbon\Carbon::createFromFormat('G:i:s', $show->start_time)->format('G:i A') !!}--}}
                                {!! $show->particular_showtime !!}
                            </div>
                            <div class="uk-width-medium-4-5">
                                <div class="uk-margin-left">
                                    <h5>{!! $show->title !!}</h5>
                                    <p>{!! $show->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="ja-showtime__limited" data-uk-filter="ja-showtime__limited">
                        <div class="uk-grid uk-grid-collapse uk-grid-margin" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-text-right grey-text">
                                <h5 class="pink-text uk-margin-remove">LIMITED</h5>
                                {{--<h4 class="grey-text uk-margin-remove">{!! Carbon\Carbon::createFromFormat('Y-m-d', $show->start_date)->format('M') !!} {!! Carbon\Carbon::createFromFormat('Y-m-d', $show->start_date)->format('d') !!}-{!! Carbon\Carbon::createFromFormat('Y-m-d', $show->end_date)->format('d') !!}</h4>--}}
                                {{--{!! Carbon\Carbon::createFromFormat('G:i:s', $show->start_time)->format('G:i A') !!}--}}
                                {!! $show->particular_showtime !!}
                            </div>
                            <div class="uk-width-medium-4-5">
                                <div class="uk-margin-left">
                                    <h5>{!! $show->title !!}</h5>
                                    <p>{!! $show->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
            @endif


        </ul>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/grid.min.js') !!}"></script>
@endsection
