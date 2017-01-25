@extends('layouts.default')

@section('content')
@include('includes.homeslide')

<section id="whatson" class="ja-home-section">
	@include('includes.sidebanner')
	<div class="uk-container uk-container-center">
		<h3 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-bottom">What's On</h3>
        {{--Whatson Posts--}}
		<ul class="uk-list uk-list-space">
			@foreach($whatsOnContents as $whatsOn)
			<li class="ja-post uk-margin-bottom">
				<div class="uk-grid">
					<div class="uk-width-medium-1-2">
						@if (isset(getMediaByPostId($whatsOn->id)->file_name))
                        	<?php $imagePath = getMediaByPostId($whatsOn->id)->file_name; ?>
							<a href="{!! lang_url('news/' . $whatsOn->slug) !!}" class="ja-post--img" style="background-image: url('{!! url('images/whatsOn/' . $imagePath) !!}')">Learn more</a>
						@endif
					</div>
					<div class="uk-width-medium-1-2">
						<div class="ja-post--content">
							<h5 class="ja-post--title"><a href="{!! lang_url('news/' . $whatsOn->slug) !!}" title="{!! $whatsOn->title !!}">{!! $whatsOn->title !!}</a></h5>
							<p class="uk-margin-remove">{!! excerpt($whatsOn->content, 30) !!}</p>
							<a href="{!! lang_url('news/' . $whatsOn->slug) !!}" class="ja-post--link"><i class="uk-icon-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</section>
<section id="sightseeing" class="ja-home-section uk-hidden-small">
	<div class="uk-overlay-background ja-overlay"></div>
	<div class="uk-container uk-container-center white-text">
		<h3 class="ja-title ja-title__orange uk-margin-large-bottom white-text">Highlight</h3>
		<p>{!! $sightseeingContent !!}</p>

		<ul class="uk-grid uk-grid-collapse">
			<li class="uk-width-2-5">
				{!! ( isset($firstBox->meta_value) ? $firstBox->meta_value : '' ) !!}
			</li>
			<li class="uk-width-1-2">
				{!! ( isset($secondBox->meta_value) ? $secondBox->meta_value : '' ) !!}
			</li>

			{{--<li class="uk-width-2-5">--}}
				{{--{!! ( isset($thirdBox->meta_value) ? $thirdBox->meta_value : '' ) !!}--}}
			{{--</li>--}}
			{{--<li class="uk-width-1-2">--}}
				{{--{!! ( isset($fourthBox->meta_value) ? $fourthBox->meta_value : '' ) !!}--}}
			{{--</li>--}}

		</ul>
	</div>
</section>
<section id="themoment" class="ja-home-section">
	<div class="uk-container uk-container-center">
		<h3 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-bottom">The Moment</h3>
		{{--The Moments--}}
		<ul class="uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-medium-1-3">
            @foreach($moments as $moment)
                @if($loop->iteration == 2)
                    <li>
                        <a class="uk-vertical-align" style="background-image: url()">
                            <div class="uk-vertical-align-middle">
                                Come to find out and enjoy your great moments at the aquarium!
                            </div>
                        </a>
                    </li>
                @endif
                @if($loop->iteration == 3)
                    <li>
                        <a href="https://www.instagram.com/explore/tags/jakartaaquarium/" target="_blank" class="uk-vertical-align" style="background-image: url()">
                            <div class="uk-vertical-align-middle">
                                <i class="uk-icon-instagram teal-text uk-icon-large uk-margin-bottom"></i><br>
                                #JAKARTAAQUARIUM<br>
                                Share your great moments with us on Instagram!
                            </div>
                        </a>
                    </li>
                @endif
            <li>
                <a class="uk-vertical-align"
                   @if(isset($moment->file_name))style="background-image: url({!! asset('images/original/' . $moment->file_name) !!})"@endif>
                    <div class="uk-vertical-align-middle">
                        @if($moment->title != '')
                        <div class="funfact uk-vertical-align">
                            <div class="uk-vertical-align-middle">
                                <h5 class="white-text">{!! $moment->title !!}</h5>
                                {!! $moment->content !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </a>
            </li>
            @endforeach
			<li>
				<a class="uk-vertical-align" style="background-image: url()">
					<div class="uk-vertical-align-middle">
						<i class="uk-icon-tripadvisor teal-text uk-icon-large uk-margin-bottom"></i><br>
						<span class="uk-text-large">"It's kinda cool display in Indonesia!"</span>
					</div>
				</a>
			</li>
		</ul>
	</div>
</section>
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
	<script src="{!! asset('frontend/js/components/slideshow.min.js') !!}"></script>
	<script src="{!! asset('frontend/js/components/sticky.min.js') !!}"></script>
	<script>
		$(document).ready(function() {
			var fw = $('#themoment ul li a').width(),
				fh = $('#themoment ul li a').height();
			$('#themoment ul li a .funfact').height(fh).width(fw);
			$( "#themoment ul li a" ).hover(
				function() {
					$( this ).find('.funfact').show();
				}, function() {
					$( this ).find('.funfact').hide();
				}
			);
		});
	</script>
@endsection
