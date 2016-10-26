@extends('backend.layouts.app')

@section('page-level-styles')
    <link href="{!! asset('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css') !!}" rel="stylesheet" type="text/css" />
    @endsection

    @section('content')
            <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">

        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption font-dark">
                                <i class="icon-user font-dark"></i>
                                <span class="caption-subject bold uppercase"> Edit News</span>
                            </div>
                            <ul class="nav nav-tabs">
                                @foreach($langs as $lang)
                                    <li @if($lang['code'] == $defaultLang) class="active" @endif>
                                        <a href="#{!! $lang['code'] !!}" data-toggle="tab"> {!! $lang['title'] !!} </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <form role="form" action="{!! backendUrl('news/' . $post->id . '/update') !!}" method="post" >
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">

                                        {{--main form--}}
                                        <div class="col-md-8">
                                            @include('backend.posts.content-edit')
                                        </div>
                                        {{--end of main form--}}

                                        @include('backend.posts.sidebar-edit')

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
@endsection

@section('page-level-scripts')
    <script src="{!! asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js') !!}" type="text/javascript"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#remove-featured').hide();
        });

        tinymce.init({
            selector:'textarea',
            plugins: [ 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools code' ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | code',
            image_advtab: true,
            menubar: false,
            force_p_newlines : false,
            forced_root_block : '',
            height : "400"
        });
        $(".form_datetime").datetimepicker({
            autoclose: true,
            isRTL: App.isRTL(),
            format: "dd-MM-yyyy - hh:ii",
            pickerPosition: (App.isRTL() ? "bottom-right" : "bottom-left")
        });

        //ajax demo:
        var $modal = $('#ajax-modal');
        $('#ajax-demo').on('click', function(){
            // create the backdrop and wait for next modal to be triggered
            $('body').modalmanager('loading');
            var el = $(this);

            $modal.load(el.attr('data-url'), '', function(){
                $modal.modal();
            });
        });

        $('#remove-featured').click(function() {
            $('#featured_image_id').val('');
            $('#featured_image').attr('src', '');
            $(this).hide();
        });
    </script>
@endsection