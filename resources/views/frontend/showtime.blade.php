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
        <ul id="filtershow" class="uk-subnav uk-margin-top">
            <li><a href="" data-uk-filter="" data-uk-tooltip title="All Show">SHOW TIMES:</a></li>
            <li><a href="" data-uk-filter="ja-showtime__all"><i class="uk-icon-stop light-green-text"></i> ALL DAYS</a></li>
            <li><a href="" data-uk-filter="ja-showtime__part"><i class="uk-icon-stop amber-text"></i> PARTICULAR</a></li>
            <li><a href="" data-uk-filter="ja-showtime__limited"><i class="uk-icon-stop pink-text"></i> LIMITED</a></li>
        </ul>
        <ul class="uk-list uk-list-line uk-width-1-1 ja-showtime-list uk-margin-large-bottom" data-uk-grid="{controls: '#filtershow'}">
            <li class="ja-showtime__all" data-uk-filter="ja-showtime__all">
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
            <li class="ja-showtime__part" data-uk-filter="ja-showtime__part">
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
            <li class="ja-showtime__limited" data-uk-filter="ja-showtime__limited">
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
            <li class="ja-showtime__all" data-uk-filter="ja-showtime__all">
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
            <li class="ja-showtime__part" data-uk-filter="ja-showtime__part">
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
            <li class="ja-showtime__limited" data-uk-filter="ja-showtime__limited">
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

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/grid.min.js') !!}"></script>
@endsection