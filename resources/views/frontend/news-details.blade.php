@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__bluesmall light-blue-text text-darken-4">News</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-news">
    <div class="uk-container uk-container-center">
        <img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-04.jpg') !!}" />
        <div class="ja-news__content ja-news__content-details uk-margin-bottom">

            <h1 class="light-blue-text text-darken-4 uk-text-uppercase">Jakarta Aquarium Saved and Recovered the Turtles after They Had Been Hooked</h1>
            <ul class="uk-subnav uk-subnav-line">
                <li>NOVEMBER 22, 2016</li>
                <li>POSTED BY:  <span class="ja-bold">ADMIN</span></li>
            </ul>
            <ul class="uk-list ja-share">
                <li><a href="#!" class="uk-icon-button uk-icon-facebook light-blue darken-4"></a></li>
                <li><a href="#!" class="uk-icon-button uk-icon-twitter  light-blue accent-2"></a></li>
                <li><a href="#!" class="uk-icon-button uk-icon-google-plus red"></a></li>
                <li><a href="#!" class="uk-icon-button uk-icon-envelope amber darken-1"></a></li>
            </ul>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>

            <blockquote>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
    		fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
    		sequi malarki torepue porro nesciunt.</blockquote>

            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fugait harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis establish eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis dell voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. </p>
        </div>
        <div class="ja-news__content uk-margin-large-bottom">
            <h3 class="cyan-text text-darken-1">YOU MIGHT ALSO LIKE TO READ</h3>
            <ul class="uk-grid uk-grid-medium uk-grid-width-medium-1-3" data-uk-grid-margin data-uk-grid-match>
                <li>
                    <a href="#!"><img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-01.jpg') !!}" /></a>
                    <p class="uk-margin-bottom-remove">November 22, 2016</p>
                    <h5 class="uk-margin-remove"><a href="#!" class="grey-text text-darken-3">Developing New Technology Solutions to Protect Our Oceans and Balance Human Impacts</a></h5>
                </li>
                <li>
                    <a href="#!"><img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-02.jpg') !!}" /></a>
                    <p class="uk-margin-bottom-remove">November 22, 2016</p>
                    <h5 class="uk-margin-remove"><a href="#!" class="grey-text text-darken-3">10 Things You Didn’t Know About Moon Jellyfish</a></h5>
                </li>
                <li>
                    <a href="#!"><img  class="uk-responsive-width" src="{!! asset('frontend/img/img-news-03.jpg') !!}" /></a>
                    <p class="uk-margin-bottom-remove">November 22, 2016</p>
                    <h5 class="uk-margin-remove"><a href="#!" class="grey-text text-darken-3">Conservation Update: The Mysteries of Corals Rebound on Tanjung Barat Coast</a></h5>
                </li>
            </ul>
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/slideshow.min.js') !!}"></script>
@endsection
