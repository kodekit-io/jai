@extends('backend.layouts.app')

@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        @if ($errors->has('unauthorized'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <strong>Oops!</strong> {!! $errors->first('unauthorized') !!}
            </div>
        @endif
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Blank Page Layout
            <small>blank page layout</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="note note-info">
            <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
        </div>
    </div>
    <!-- END CONTENT BODY -->
@endsection