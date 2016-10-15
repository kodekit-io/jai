<header class="ja-header">
	<?php //Main Slideshow ?>
	<div class="ja-slideshow uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
		<ul class="uk-slideshow uk-overlay-active">
			<li>
				<img src="{!! asset('frontend/img/head-sample-01.jpg') !!}" />
				<div class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
					<div class="uk-container uk-container-center">
						<h2 class="ja-slide-title">Discover Our New<br>Clownfish Tank on<br>Summer Holiday</h2>
						<a href="#!" class="uk-button ja-button-outline" title="Learn More" style="z-index:5;position:relative;">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
					</div>
				</div>
			</li>
			<li>
				<img src="{!! asset('frontend/img/head-sample-02.jpg') !!}" />
				<div class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
					<div class="uk-container uk-container-center">
						<h2 class="ja-slide-title">Explore a Hundred<br>of beautiful jellies in a<br>dark tank</h2>
						<a href="#!" class="uk-button ja-button-outline" title="Learn More" style="z-index:5;position:relative;">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
					</div>
				</div>
			</li>
			<li>
				<img src="{!! asset('frontend/img/head-sample-03.jpg') !!}" />
				<div class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
					<div class="uk-container uk-container-center">
						<h2 class="ja-slide-title">Here you will meet<br>face-to-face with the<br>tame predators</h2>
						<a href="#!" class="uk-button ja-button-outline" title="Learn More" style="z-index:5;position:relative;">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
					</div>
				</div>
			</li>
		</ul>
		<div class="ja-slideshow-nav">
			<div class="uk-container uk-container-center">
				<ul class="uk-dotnav">
					<li data-uk-slideshow-item="0"><a href=""></a></li>
					<li data-uk-slideshow-item="1"><a href=""></a></li>
					<li data-uk-slideshow-item="2"><a href=""></a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php //Head Content ?>
	<div class="ja-header-content uk-container uk-container-center">
		<ul class="uk-subnav ja-lang">
			<li>Language:</li>
			<li class="uk-active"><a href="#!">English</a></li>
			<li><a href="#!">Indonesia</a></li>
		</ul>
		<div class="ja-info uk-visible-small">
			<p>Today: Sat, Oct 15 2016<br>
			OPEN 08.00AM - 09.00PM</p>
		</div>
		<div class="ja-header-banner uk-hidden-small">
			<ul class="uk-margin-bottom-remove uk-subnav">
				<li><a href="#!"><img src="{!! asset('frontend/img/banner-book.png') !!}" /></a></li>
				<li>
					<?php //Banner Slideshow ?>
					<div class="ja-slideshow-banner uk-slidenav-position" data-uk-slideshow>
						<ul class="uk-slideshow">
							<li><a href="#!"><img src="{!! asset('frontend/img/banner-cimb.jpg') !!}" /></a></li>
							<li><a href="#!"><img src="{!! asset('frontend/img/banner-bca.jpg') !!}" /></a></li>
						</ul>
						<a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
						<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</header>
