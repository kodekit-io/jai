<?php //Navigation ?>
<nav class="ja-nav">
	<h1 class="ja-logo white"><a href="{!! lang_url('') !!}" title="Jakarta Aquarium">Jakarta Aquarium</a></h1>
	<a href="#" class="uk-visible-small ja-mobmenu ja-mobmenu cyan darken-1" data-uk-toggle="{target:'.ja-mobhide',cls:'uk-hidden-small',animation:'uk-animation-slide-fade, uk-animation-fade'}"><i class="uk-icon-bars"></i></a>
	{{--<ul class="uk-list ja-nav-main cyan darken-1 ja-mobhide uk-hidden-small">--}}
		{{--<li><a href="{!! lang_url('about-us') !!}" title="About Us" class="ja-icon-about">About Us</a></li>--}}
		{{--<li>--}}
			{{--<a href="#!" title="Plan Your Visit" class="ja-icon-loc" data-uk-toggle={target:'#subvisit'}>Plan Your Visit</a>--}}
			{{--<ul id="subvisit" class="uk-list uk-hidden ja-nav-sub">--}}
				{{--<li><a href="{!! lang_url('ticket-hours') !!}" title="Ticket &amp; Hours">Ticket &amp; Hours</a></li>--}}
				{{--<li><a href="{!! lang_url('special-packages') !!}" title="Special Packages">Special Packages</a></li>--}}
				{{--<li><a href="{!! lang_url('show-time') !!}" title="Show Time">Show Time</a></li>--}}
				{{--<li><a href="{!! lang_url('location') !!}" title="Location">Location</a></li>--}}
			{{--</ul>--}}
		{{--</li>--}}
		{{--<li><a href="{!! lang_url('attractions-experience') !!}" title="Attractions and Experience" class="ja-icon-attract">Attractions and Experience</a></li>--}}
		{{--<li><a href="{!! lang_url('conservation') !!}" title="Education and Conservation" class="ja-icon-edu">Education and Conservation</a></li>--}}
		{{--<li><a href="{!! lang_url('news-blog') !!}" title="News" class="ja-icon-news">News</a></li>--}}
	{{--</ul>--}}
    <ul class="uk-list ja-nav-main cyan darken-1 ja-mobhide uk-hidden-small">
	    @include('includes.menu', array('items' => $menu->roots()))
    </ul>

	<form class="ja-searchform cyan darken-1 ja-mobhide uk-hidden-small" method="post" action="{!! lang_url('search-result') !!}">
		{!! csrf_field() !!}
		<input type="text" name="search" placeholder="Search">
		<input type="submit">
	</form>
	<div class="ja-socmed cyan darken-1 uk-text-center ja-mobhide uk-hidden-small">
		<a href="{!! get_jai_setting('facebook_link') !!}" target="_blank" class="uk-icon-facebook"></a>
		<a href="{!! get_jai_setting('twitter_link') !!}" target="_blank" class="uk-icon-twitter"></a>
		<a href="{!! get_jai_setting('tripadvisor_link') !!}" target="_blank" class="uk-icon-tripadvisor"></a>
		<a href="{!! get_jai_setting('instagram_link') !!}" target="_blank" class="uk-icon-instagram"></a>
		<a href="{!! get_jai_setting('googleplus_link') !!}" target="_blank" class="uk-icon-google-plus"></a>
		<a href="{!! get_jai_setting('linkedin_link') !!}" target="_blank" class="uk-icon-linkedin"></a>
	</div>
	<div class="ja-info uk-hidden">
		<p>Opening Hours</p>
		<p>Weekday<br>
		08.00AM - 07.00PM</p>
		<p>Weekend<br>
		08.00AM - 08.00PM</p>
		<p>Penguin Restaurant<br>
		08.00AM - 09.00PM</p>
	</div>
</nav>
