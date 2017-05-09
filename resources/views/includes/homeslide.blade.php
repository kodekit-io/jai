<header class="ja-header">
	{{--homeslide--}}
	<div class="ja-slideshow uk-slidenav-position" data-uk-slideshow="{autoplay:true}">
		<ul class="uk-slideshow uk-overlay-active">
			@foreach($sliders as $slider)
			<li>
				<img src="{!! url('images/original/' . $slider->file_name) !!}" />
				<div class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
					<div class="uk-container uk-container-center">
						<h2 class="ja-slide-title">{!! $slider->content !!}</h2>
						<a href="{!! $slider->link !!}" class="uk-button ja-button-outline" title="Learn More" style="z-index:5;position:relative;">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
					</div>
				</div>
			</li>
            @endforeach

			{{-- sample --}}
			<li>
				<iframe src="//www.youtube.com/embed/bjepsM2CeME?autoplay=1&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;loop=1&amp;modestbranding=1&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>
				<div class="uk-overlay-panel uk-overlay-fade uk-overlay-background">
					<div class="uk-container uk-container-center">
						<h2 class="ja-slide-title">Title</h2>
						<a href="#" class="uk-button ja-button-outline" title="Learn More" style="z-index:5;position:relative;">Learn More <i class="uk-margin-small-left uk-icon-chevron-right"></i></a>
					</div>
				</div>
			</li>
		</ul>
		<div class="ja-slideshow-nav">
			<div class="uk-container uk-container-center">
				<ul class="uk-dotnav">
                    @foreach($sliders as $slider)
					<li data-uk-slideshow-item="{!! $loop->index !!}"><a href=""></a></li>
                    @endforeach
					{{-- sample --}}
					<li data-uk-slideshow-item="4"><a href=""></a></li>
				</ul>
			</div>
		</div>
	</div>

	<?php //Head Content ?>
	<div class="ja-header-content uk-container uk-container-center">
		<ul class="uk-subnav ja-lang">
			<li>Language:</li>
			{!! $gLangSwitcher !!}
		</ul>
		<div class="ja-info uk-hidden">
			<p>Today: Sat, Oct 15 2016<br>
			OPEN 08.00AM - 09.00PM</p>
		</div>
		<div class="ja-header-banner uk-hidden-small">
			<ul class="uk-margin-bottom-remove uk-subnav">
				<li><a href="{!! lang_url('ticket-hours') !!}"><img src="{!! asset('frontend/img/banner-book.png') !!}" /></a></li>
				{{--<li>--}}
					{{--<div class="ja-slideshow-banner uk-slidenav-position" data-uk-slideshow>--}}
						{{--<ul class="uk-slideshow">--}}
							{{--<li><a href="#!"><img src="{!! asset('frontend/img/banner-cimb.jpg') !!}" /></a></li>--}}
							{{--<li><a href="#!"><img src="{!! asset('frontend/img/banner-bca.jpg') !!}" /></a></li>--}}
						{{--</ul>--}}
						{{--<a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideshow-item="previous"></a>--}}
						{{--<a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideshow-item="next"></a>--}}
					{{--</div>--}}
				{{--</li>--}}
			</ul>
		</div>
	</div>
</header>
