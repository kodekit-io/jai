@extends('backend.layouts.app')

@section('page-level-styles')
    <link href="{!! asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}" rel="stylesheet" type="text/css" />
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
                                <span class="caption-subject bold uppercase"> Add Slider</span>
                            </div>
                            {{--<ul class="nav nav-tabs">--}}
                                {{--@foreach($langs as $lang)--}}
                                    {{--<li @if($lang['code'] == $defaultLang) class="active" @endif>--}}
                                        {{--<a href="#{!! $lang['code'] !!}" data-toggle="tab"> {!! $lang['title'] !!} </a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        </div>
                        <div class="portlet-body">
                            <form role="form" action="{!! backendUrl('slider/save') !!}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">

                                        {{--main form--}}
                                        <div class="col-md-8">
                                        @include('backend.sliders.content')
                                        </div>
                                        {{--end of main form--}}

                                        @include('backend.sliders.sidebar')

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{--modal--}}
                    <div id="ajax-modal" class="modal container fade" tabindex="-1"> </div>
                    {{--end of modal--}}

                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->

    </div>
    <!-- END CONTENT -->
@endsection

@section('page-level-plugins')
    <script src="{!! asset('assets/global/plugins/jquery-repeater/jquery.repeater.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}" type="text/javascript"></script>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}" type="text/javascript"></script>
    {{--<script src="{!! asset('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') !!}" type="text/javascript"></script>--}}
    {{--<script src="{!! asset('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js') !!}" type="text/javascript"></script>--}}
    {{--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
    <script>
        $(".form_datetime").datetimepicker({
            autoclose: true,
            isRTL: App.isRTL(),
            format: "dd-MM-yyyy - hh:ii",
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left")
        });

        $('.mt-repeater').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
            },
            isFirstItemUndeletable: true
        });

    </script>
@endsection