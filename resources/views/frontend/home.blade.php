@extends('layouts.default')

@section('content')
@include('includes.homeslide')

<section id="whatson" class="ja-home-section">
	@include('includes.sidebanner')
	<div class="uk-container uk-container-center">
		<h3 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-bottom">What's On</h3>
		<?php //Whatson Posts ?>
		<ul class="uk-list uk-list-space">
			@foreach($whatsOnContents as $whatsOn)
			<li class="ja-post uk-margin-bottom">
				<div class="uk-grid">
					<div class="uk-width-medium-1-2">
                        <?php $imagePath = getMediaByPostId($whatsOn->id)->file_name; ?>
						<a href="#!" class="ja-post--img" style="background-image: url('{!! url('images/whatsOn/' . $imagePath) !!}')">Learn more</a>
					</div>
					<div class="uk-width-medium-1-2">
						<div class="ja-post--content">
							<h5 class="ja-post--title"><a href="#!" title="{!! $whatsOn->title !!}">{!! $whatsOn->title !!}</a></h5>
							<p class="uk-margin-remove">{!! $whatsOn->content !!}</p>
							<a class="ja-post--link"><i class="uk-icon-chevron-right"></i></a>
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
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidale laborum et dolorem magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation autem.</p>

		<ul class="uk-grid uk-grid-collapse">
			<li class="uk-width-2-5">
				{!! ( isset($firstBox->meta_value) ? $firstBox->meta_value : '' ) !!}
			</li>
			<li class="uk-width-1-2">
				{!! ( isset($secondBox->meta_value) ? $secondBox->meta_value : '' ) !!}
			</li>
			<li class="uk-width-2-5">
				{!! ( isset($thirdBox->meta_value) ? $thirdBox->meta_value : '' ) !!}
			</li>
			<li class="uk-width-1-2">
				{!! ( isset($fourthBox->meta_value) ? $fourthBox->meta_value : '' ) !!}
			</li>
		</ul>
	</div>
</section>
<section id="themoment" class="ja-home-section">
	<div class="uk-container uk-container-center">
		<h3 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-bottom">The Moment</h3>
		<?php //The Moments ?>
		<ul class="uk-grid uk-grid-collapse uk-grid-width-1-2 uk-grid-width-medium-1-3">
			<li>
				<a class="uk-vertical-align" style="background-image: url(https://scontent-sin6-1.cdninstagram.com/t51.2885-15/e35/14726416_519228651603618_6547434921265201152_n.jpg?ig_cache_key=MTM2MTUyMDM1MTUxNTU1MDA4Mw%3D%3D.2)">
					<div class="uk-vertical-align-middle">

					</div>
				</a>
			</li>
			<li>
				<a class="uk-vertical-align" style="background-image: url()">
					<div class="uk-vertical-align-middle">
						Come to find out and enjoy your great moments at the aquarium!
					</div>
				</a>
			</li>
			<li>
				<a class="uk-vertical-align" style="background-image: url(https://scontent-sin6-1.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/13397565_582605318588903_30300940_n.jpg?ig_cache_key=MTI3NzEyMjk5ODMxNjc3ODk1Nw%3D%3D.2)">
					<div class="uk-vertical-align-middle">

					</div>
				</a>
			</li>
			<li>
				<a class="uk-vertical-align" style="background-image: url()">
					<div class="uk-vertical-align-middle">
						<i class="uk-icon-instagram teal-text uk-icon-large uk-margin-bottom"></i><br>
						#JAKARTAAQUARIUM<br>
						Share your great moments with us on Instagram!
					</div>
				</a>
			</li>

			<li>
				<a class="uk-vertical-align" style="background-image: url(https://scontent-sin6-1.cdninstagram.com/t51.2885-15/e35/14705107_196280684133214_1208691904053510144_n.jpg?ig_cache_key=MTM2MTQ4MDQ3MTQzNTA2Njk3OQ%3D%3D.2)">
					<div class="uk-vertical-align-middle">

					</div>
				</a>
			</li>
			<li>
				<a class="uk-vertical-align" style="background-image: url(https://scontent-sin6-1.cdninstagram.com/t51.2885-15/e35/14624455_1651937268431126_8432737066684514304_n.jpg?ig_cache_key=MTM2MTQ5NDI2NDE5MzkxNjMyMA%3D%3D.2)">
					<div class="uk-vertical-align-middle">

					</div>
				</a>
			</li>
			<li>
				<a class="uk-vertical-align" style="background-image: url(https://scontent-sin6-1.cdninstagram.com/t51.2885-15/e35/14478519_1752247551691686_1452266654825185280_n.jpg?ig_cache_key=MTM2MTM3Mjg3MDAyMTc4NzgwNA%3D%3D.2)">
					<div class="uk-vertical-align-middle">

					</div>
				</a>
			</li>
			<li>
				<a class="uk-vertical-align" style="background-image: url(https://scontent-sin6-1.cdninstagram.com/t51.2885-15/e35/14606940_186909541717211_6510452349448749056_n.jpg?ig_cache_key=MTM1NzI4OTQ4NTkyNjI2ODkyNA%3D%3D.2)">
					<div class="uk-vertical-align-middle">

					</div>
				</a>
			</li>
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
				<img src="{!! asset('frontend/img/mobile-app.png') !!}" alt="Get The App" />
			</div>
			<div class="uk-width-2-3">
				<h3 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-bottom">Get The App</h3>
				<p>Download free Jakarta Aquarium app now! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
@endsection
