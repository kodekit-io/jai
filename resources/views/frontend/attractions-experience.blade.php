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
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-01.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">HANGING EXHIBIT</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-02.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">ART INSTALLATIONS</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-03.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">LIVING WITH MANGROVE</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-04.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">OUTER REEF CAMPAIGN</h5>
        							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-sample-01.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">CLASSROOM</h5>
        							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                </ul>
            </li>
            <?php //tab2 ?>
            <li>
                <ul class="uk-list uk-list-space">
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-05.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">the aquarium</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-04.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">Dive with Sharks</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-03.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">5D Theater</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-02.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">SEA TREKKING</h5>
        							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-sample-02.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">FEEDING BOAT</h5>
        							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                </ul>
            </li>
            <?php //tab3 ?>
            <li>
                <ul class="uk-list uk-list-space">
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-03.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">THE LEGEND OF RORO KIDUL</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-01.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">THE MERMAID SONG</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-05.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">PIRATE SNORKEL</h5>
        							<p>At vero eos et accusamus et iusto odio madeline dignis imosse ducimus qui. Ut enim ad minim veniam, quis nostrud mellark exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure cillum fugiat nulla pariatu prodiener excepteur sint occaecat cupidatat non proident.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-news-04.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">OUTER REEF CAMPAIGN</h5>
        							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                    <li class="ja-post uk-margin-bottom">
        				<div class="uk-grid uk-grid-match" data-uk-grid-match>
        					<div class="uk-width-medium-2-5">
                                <div class="ja-post--imgcover uk-cover-background" style="background-image:url({!! asset('frontend/img/img-sample-01.jpg') !!})"></div>
        					</div>
        					<div class="uk-width-medium-3-5">
        						<div class="ja-post--content_wide">
        							<h5 class="uk-text-uppercase">CLASSROOM</h5>
        							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        						</div>
        					</div>
        				</div>
        			</li>
                </ul>
            </li>
        </ul>

    </div>
</main>

@endsection

@section('page-level-scripts')
@endsection
