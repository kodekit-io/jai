@extends('layouts.default')
@section('content')

<header class="ja-header-showtime">
    <div class="uk-container uk-container-center">
        <div class="ja-overlay"></div>
        <div class="ja-showtime-intro">
            <h2 class="ja-title ja-title__large white-text">THE MERMAID SONG</h2>
            <p>Lorem Ipsum Dolore Sit Art Department,<br>Doe Fugiat on August 20th-28th, 2016</p>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
<main class="ja-showtime">
    <div class="uk-container uk-container-center">
        <h1 class="ja-title ja-title__blue light-blue-text text-darken-4 uk-margin-large-top uk-margin-large-bottom">Show Time</h1>
        <p>There's always something new and exciting happening at the Jakarta Aquarium. With an ever-evolving lineup of shows, Jakarta Aquarium always has something interesting to see. Join us for a show led by our educational and entertaining interpreters to learn more about the animals that live at the Jakarta Aquarium.</p>
        <ul class="uk-subnav uk-margin-top">
            <li><a class="uk-icon-stop light-green-text" data-uk-toggle="{target:'.ja-showtime__all'}"></a> ALL DAYS</li>
            <li><a class="uk-icon-stop amber-text" data-uk-toggle="{target:'.ja-showtime__part'}"></a> PARTICULAR</li>
            <li><a class="uk-icon-stop pink-text" data-uk-toggle="{target:'.ja-showtime__limited'}"></a> LIMITED</li>
        </ul>
        <ul class="uk-list uk-list-line uk-width-1-1 ja-showtime-list uk-margin-large-bottom">
            <li class="ja-showtime__all">
                <div class="uk-grid">
                    <div class="uk-width-1-5 uk-text-right grey-text">
                        <h4 class="grey-text">ALL DAYS</h4>
                        09.00 a.m.
                    </div>
                    <div class="uk-width-4-5">
                        <h4>CORAL REEF STORY TIME</h4>
                        <p>At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.</p>
                    </div>
                </div>
            </li>
            <li class="ja-showtime__part">
                <div class="uk-grid">
                    <div class="uk-width-1-5 uk-text-right grey-text">
                        <h4 class="grey-text">MONDAYS</h4>
                        09.00 a.m.
                    </div>
                    <div class="uk-width-4-5">
                        <h4>CORAL REEF STORY TIME</h4>
                        <p>At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.</p>
                    </div>
                </div>
            </li>
            <li class="ja-showtime__limited">
                <div class="uk-grid">
                    <div class="uk-width-1-5 uk-text-right grey-text">
                        <h4 class="pink-text uk-margin-remove">LIMITED</h4>
                        <h4 class="grey-text uk-margin-remove">AUG 11-13</h4>
                        09.00 a.m.
                    </div>
                    <div class="uk-width-4-5">
                        <h4>CORAL REEF STORY TIME</h4>
                        <p>At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.</p>
                    </div>
                </div>
            </li>
            <li class="ja-showtime__all">
                <div class="uk-grid">
                    <div class="uk-width-1-5 uk-text-right grey-text">
                        <h4 class="grey-text">ALL DAYS</h4>
                        09.00 a.m.
                    </div>
                    <div class="uk-width-4-5">
                        <h4>CORAL REEF STORY TIME</h4>
                        <p>At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.</p>
                    </div>
                </div>
            </li>
            <li class="ja-showtime__part">
                <div class="uk-grid">
                    <div class="uk-width-1-5 uk-text-right grey-text">
                        <h4 class="grey-text">WEDNESDAY</h4>
                        09.00 a.m.
                    </div>
                    <div class="uk-width-4-5">
                        <h4>CORAL REEF STORY TIME</h4>
                        <p>At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.</p>
                    </div>
                </div>
            </li>
            <li class="ja-showtime__limited">
                <div class="uk-grid">
                    <div class="uk-width-1-5 uk-text-right grey-text">
                        <h4 class="pink-text uk-margin-remove">LIMITED</h4>
                        <h4 class="grey-text uk-margin-remove">AUG 11-13</h4>
                        09.00 a.m.
                    </div>
                    <div class="uk-width-4-5">
                        <h4>CORAL REEF STORY TIME</h4>
                        <p>At vero eos et accusamus et iusto odio madeline dignis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo mallera consequat aller proident.</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</main>

@endsection
