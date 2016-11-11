@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__bluelong light-blue-text text-darken-4 uk-text-uppercase">Attractions and experience</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-news">
    <div class="uk-container uk-container-center">
        <ul class="uk-subnav" data-uk-switcher={connect:'#attractions'}>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase">Experiences</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase">Show &amp; Attractions</a></li>
            <li><a class="uk-button ja-button hover grey darket-2 white-text uk-text-uppercase">Dining &amp; Shopping</a></li>
        </ul>
        <ul id="attractions" class="uk-switcher uk-margin-large-bottom">
            <?php //tab1 ?>
            <li>
                <ul class="uk-list uk-list-space">
                    @foreach($experiences as $experience)
                    <?php $imagePath = isset($experience->file_name) ? $experience->file_name : 'noimage.png'; ?>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-collapse uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url('{!! url('images/whatsOn/' . $imagePath) !!}')"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">{!! $experience->title !!}</h5>
        							<p>{!! $experience->content !!}</p>
        						</div>
        					</div>
        				</div>
        			</li>
					@endforeach
                </ul>
            </li>
            <?php //tab2 ?>
            <li>
                <ul class="uk-list uk-list-space">
                    @foreach($shows as $show)
                    <?php $imagePath = isset($show->file_name) ? $show->file_name : 'noimage.png'; ?>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-collapse uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url('{!! url('images/whatsOn/' . $imagePath) !!}')"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">{!! $show->title !!}</h5>
        							<p>{!! $show->content !!}</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    @endforeach
                </ul>
            </li>
            <?php //tab3 ?>
            <li>
                <ul class="uk-list uk-list-space">
                    @foreach($dinings as $dining)
                    <?php $imagePath = isset($dining->file_name) ? $dining->file_name : 'noimage.png'; ?>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-collapse uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url('{!! url('images/whatsOn/' . $imagePath) !!}')"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">{!! $dining->title !!}</h5>
        							<p>{!! $dining->content !!}</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    @endforeach
                </ul>
            </li>
        </ul>

    </div>
</main>

@endsection

@section('page-level-scripts')
@endsection
