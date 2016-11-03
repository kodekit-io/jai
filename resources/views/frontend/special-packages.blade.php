@extends('layouts.default')

@section('page-level-styles')
@endsection

@section('content')

<header class="ja-header-ticket uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">Special Packages</h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-ticket">
    <div class="uk-container uk-container-center">
        <div class="ja-ticket__content uk-margin-bottom">
            This special packages are intended for tour operators. Volume incentives are available. Pre-booking is
required at least 7 days in advance as groups must be pre-qualified before receiving this rate. Please contact the booking office by call <a href="tel:+62 212 3456 789" class="cyan-text">+62 212 3456 789</a> or email <a href="mailto:specialprograms@jakartaaquarium.org" class="cyan-text">specialprograms@jakartaaquarium.org</a> with the following information: Your name, school or organization name, contact information, and preferred date of visit.
        </div>

        <div class="ja-ticket__content uk-margin-large-bottom">
            <div class="uk-accordion" data-uk-accordion>

                @if (count($packages) > 0)
                    @foreach($packages as $package)
                        <h3 class="uk-accordion-title">{!! $package->title !!}</h3>
                        <div class="uk-accordion-content">
                            @if ($package->file_name != '') <img src="{!! asset('images/medium/' . $package->file_name) !!}" class="uk-align-left" /> @endif
                            {!! $package->content !!}
                        </div>
                    @endforeach
                @endif


            </div>
        </div>

    </div>
</main>

@endsection

@section('page-level-scripts')
    <script src="{!! asset('frontend/js/components/accordion.min.js') !!}"></script>
@endsection
