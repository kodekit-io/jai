@extends('backend.layouts.app')

@section('page-level-styles')
{{--    <link href="{!! asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') !!}" rel="stylesheet" type="text/css" />--}}
    <link href="{!! asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
        <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Add Holiday</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('holiday') !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('holiday/save') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group @if ($errors->has('title')) has-error @endif">
                                            <label>Name</label>
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="{!! old('title') !!}" autofocus>
                                            @if ($errors->has('title'))
                                                <span class="help-block">{!! $errors->first('title') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('date')) has-error @endif">
                                            <label>Date Range</label>
                                            <div class="input-group input-large date-picker input-daterange"
                                                 data-date="" data-date-format="d-M-yy">
                                                <input type="text" class="form-control" name="start_date">
                                                <span class="input-group-addon"> to </span>
                                                <input type="text" class="form-control" name="end_date">
                                            </div>
                                            @if ($errors->has('date'))
                                                <span class="help-block">{!! $errors->first('date') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm sbold green">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->

</div>
<!-- END CONTENT -->
@endsection

@section('page-level-plugins')
    <script src="{!! asset('assets/global/plugins/moment.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}" type="text/javascript"></script>
{{--    <script src="{!! asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}" type="text/javascript"></script>--}}
@endsection

@section('page-level-scripts')
    <script type="text/javascript">
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            orientation: "left",
            autoclose: true
        });
    </script>
@endsection