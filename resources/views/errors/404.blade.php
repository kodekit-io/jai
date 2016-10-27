@include('includes.header')

<nav class="ja-nav">
	<h1 class="ja-logo light-blue darken-4"><a href="{!! lang_url('') !!}" title="Jakarta Aquarium">Jakarta Aquarium</a></h1>
</nav>

<main class="ja-404 uk-vertical-align">
    <div class="ja-overlay"></div>
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center uk-text-center">
            <img src="{!! asset('frontend/img/404.png') !!}" />
            <h1 class="font-intro light-blue-text text-darken-4 uk-text-center">OH SNAP, WHERE IS THE FISH?</h1>
            <h5 class="font-intro-book uk-text-center">This page does not seem to exist or some other error has occurred.</h5>
        </div>
    </div>
</main>

@include('includes.footer')
