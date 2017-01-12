<?php //Side Banner ?>
<ul class="uk-list uk-list-space ja-side-banner uk-animation-slide-top uk-hidden-small" data-uk-sticky="{top: 200}">
	<li><a href="{!! lang_url('ticket-hours') !!}" title=""><img src="{!! asset('frontend/img/banner-ticket.png') !!}" /></a></li>
	<li><a href="{!! lang_url('promo') !!}" title=""><img src="{!! asset('frontend/img/banner-promo.png') !!}" /></a></li>
</ul>
<ul class="uk-list ja-side-banner uk-visible-small">
	<li><a href="{!! lang_url('ticket-hours') !!}" title=""><img src="{!! asset('frontend/img/banner-ticket.png') !!}" /></a></li>
	<li><a href="{!! lang_url('promo') !!}" title=""><img src="{!! asset('frontend/img/banner-promo.png') !!}" /></a></li>
</ul>
<ul class="uk-subnav ja-lang ja-lang_side">
	<li>Language:</li>
	{{--<li class="uk-active"><a href="#!">English</a></li>--}}
	{{--<li><a href="#!">Indonesia</a></li>--}}
	{!! $gLangSwitcher !!}
</ul>
