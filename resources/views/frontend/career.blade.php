@extends('layouts.default')
@section('content')

<header class="ja-header-news uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">CAREER WITH US</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>
<main class="ja-page">
    <div class="uk-container uk-container-center">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur sunt in culpa qui officia best deserunt mollit.</p>


        <div class="ja-career uk-margin-bottom">
            <div class="cyan darken-1 ja-career-title">
                <h4 class="uk-grid white-text">
                    <div class="uk-width-1-2">JOB POSITIONS</div>
                    <div class="uk-width-1-2">DEPARTMENT</div>
                </h4>
            </div>
            <div class="uk-accordion" data-uk-accordion>
                <h5 class="uk-accordion-title uk-grid">
                    <div class="uk-width-1-2">Environment Scientist</div>
                    <div class="uk-width-1-2">Biologial Programs</div>
                </h5>
                <div class="uk-accordion-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <h5 class="uk-accordion-title uk-grid">
                    <div class="uk-width-1-2">Operation Manager</div>
                    <div class="uk-width-1-2">Operation and Business Development</div>
                </h5>
                <div class="uk-accordion-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <h5 class="uk-accordion-title uk-grid">
                    <div class="uk-width-1-2">Project Supervisor</div>
                    <div class="uk-width-1-2">Mission Programs</div>
                </h5>
                <div class="uk-accordion-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <a href="#!" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4 uk-margin-large-bottom" title="Apply Now">Apply Now</a>
    </div>
    <div class="ja-career-footer uk-cover-background" style="background-image: url({!! asset('frontend/img/img-career.jpg') !!})"></div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
@endsection
