@extends('layouts.default')

@section('page-level-styles')
@endsection
@section('content')

<header class="ja-header-ticket uk-vertical-align">
    <div class="uk-vertical-align-middle uk-width-1-1">
        <div class="uk-container uk-container-center">
            <h1 class="ja-title ja-title__blue light-blue-text text-darken-4">
                @if ($status == 'completed')
                    THANK YOU
                @elseif($status == 'on-hold')
                    BOOKING STATUS
                @endif
            </h1>
        </div>
    </div>
    @include('includes.sidebanner')
</header>

<main class="ja-ticket">
    <div class="uk-container uk-container-center">
        <div class="ja-ticket__content uk-margin-bottom">

            {{--<h3 class="ja-alert-payment light-blue-text text-darken-4">--}}
                {{--<span><i class="uk-icon-refresh white-text"></i></span>--}}
                {{--YOUR ORDER HAS BEEN PLACED! PLEASE PAY FOR YOUR ORDER.--}}
            {{--</h3>--}}
            {{--<h3 class="ja-success-payment light-blue-text text-darken-4">--}}
                {{--<span><i class="uk-icon-check white-text"></i></span>--}}
                {{--SUCCESS PAYMENT MESSAGE--}}
            {{--</h3>--}}
            {{--<h3 class="ja-error-payment red-text">--}}
                {{--<span><i class="uk-icon-close white-text"></i></span>--}}
                {{--ERROR PAYMENT MESSAGE--}}
            {{--</h3>--}}
            
            @if ($status == 'completed')
                <h3 class="ja-success-payment light-blue-text text-darken-4">
                <span><i class="uk-icon-check white-text"></i></span>
                SUCCESS PAYMENT MESSAGE
                </h3>
                <h3 class="light-blue-text text-darken-4">Your Payment Has been Successfully Completed</h3>
                <h5>You will receive an email shortly which will contain the details of this transaction</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor crasher malarki requiem predantia incididunt ut labore et dolore magna aliqua. Ut eni ad minim veniam, quisiom nostrud at autumn irure dor in reprehenderit exercitation.</p>
                <a href="{!! lang_url('') !!}" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4">Back to Homepage</a>
            @elseif($status == 'on-hold')

                <h3 class="ja-alert-payment light-blue-text text-darken-4">
                    <span><i class="uk-icon-refresh white-text"></i></span>
                    YOUR ORDER HAS BEEN PLACED! PLEASE PAY FOR YOUR ORDER.
                </h3>

                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla occaecat cupidatat non proident sunt on <strong>December 21, 2017 16:30:15</strong>.</p>

                <p>Payment Code:<br>
                    <span class="uk-text-large red-text">{!! $paymentCode !!}</span>
                </p>

                <p>Deadline Time:<br>
                    <span class="uk-text-large red-text">03 Days: 04 Hours: 15 Mins: 28 Secs</span>
                </p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad minim veniam.</p>
                <ol>
                    <li>Sed ut perspiciatis unde omnis iste natus del error sit voluptatem accusantium 				doloremque laudantium doredo.</li>
                    <li>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed 				consequuntur magni dolores eos qui ratione.</li>
                    <li>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,  				velit sed quia non numquam eius modi tempora incidunda.</li>
                    <li>At vero eos et accusamus et iusto dignissimos ducimus praesentium.</li>
                </ol>
                <hr>
                <a href="{!! lang_url('') !!}" class="uk-button uk-button-large amber darken-1 light-blue-text text-darken-4">Back to Homepage</a>
                {{--<ul class="uk-subnav uk-subnav-line uk-margin-bottom-remove">--}}
                    {{--<li><a href="" class="cyan-text text-darken-1">See Booking Details</a></li>--}}
                    {{--<li><a href="" class="cyan-text text-darken-1">See Terms and Conditions of Tickets</a></li>--}}
                {{--</ul>--}}
            @endif
        </div>
    </div>
</main>

@endsection

@section('page-level-scripts')
@endsection
