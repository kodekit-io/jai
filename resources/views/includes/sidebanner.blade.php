<?php //Side Banner ?>
<ul class="uk-list uk-list-space ja-side-banner uk-animation-slide-top uk-visible-large" data-uk-sticky="{top: 200}">
	<li><a href="{!! lang_url('ticket-hours') !!}" title=""><img src="{!! asset('frontend/img/banner-ticket.png') !!}" /></a></li>
	<li><a href="{!! lang_url('promo') !!}" title=""><img src="{!! asset('frontend/img/banner-promo.png') !!}" /></a></li>
</ul>
<ul class="uk-list ja-side-banner uk-hidden-large">
	<li><a href="{!! lang_url('ticket-hours') !!}" title=""><img src="{!! asset('frontend/img/banner-ticket.png') !!}" /></a></li>
	<li><a href="{!! lang_url('promo') !!}" title=""><img src="{!! asset('frontend/img/banner-promo.png') !!}" /></a></li>
</ul>

<ul class="uk-subnav ja-lang ja-lang_side uk-animation-slide-top" data-uk-sticky="{top: 30}">
	{{--<li>Language:</li>--}}
	{!! $gLangSwitcher !!}
</ul>
