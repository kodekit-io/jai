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
                            <form role="form" action="{!! backendUrl('page/' . $post->id . '/update') !!}" method="post" >
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="row">

                                        {{--main form--}}
                                        <div class="col-md-8">
                                            @include('backend.pages.about-us-content-edit')
                                        </div>
                                        {{--end of main form--}}

                                        <div class="col-md-4">
                                            {{--publish--}}
                                            <div class="col-md-12">
                                                <div class="portlet light bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption"><i class="fa fa-gift"></i> Publisher</div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="form-group">
                                                            <label>Publish Date</label>
                                                            <div class="input-group date form_datetime">
                                                                <input type="text" name="publish_date" size="16" value="{!! $publishDate !!}" readonly class="form-control">
                                                                <span class="input-group-btn">
                                                                    <button class="btn default date-set" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <a href="{!! backendUrl($baseUrl) !!}" class="btn btn-sm sbold green">Back</a> <input type="submit" name="status" class="btn btn-sm btn-default" value="Publish">
                                                    </div>
                                                </div>
                                            </div>
                                            {{--end of publish--}}

                                            {{--@include('backend.partials.category-edit-box')--}}

                                            @include('backend.partials.featured-edit-box')

                                        </div>

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

            tinymce.init({
                selector:'.tinytextarea',
//                plugins: [ 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
//                    'searchreplace wordcount visualblocks visualchars code fullscreen',
//                    'insertdatetime media nonbreaking save table contextmenu directionality',
//                    'template paste textcolor colorpicker imagetools code' ],
//                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//                toolbar2: 'print preview media | forecolor backcolor | code',
                plugins: [ 'table code' ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code',
                image_advtab: true,
                menubar: false,
//                force_p_newlines : false,
//                forced_root_block : '',
                height : "100",
                style_formats: [
                    {title: 'Headers', items: [
                        {title: 'Title', block: 'h4', classes: 'cyan-text text-darken-1' },
                        {title: 'Sightseeing Highlight', block: 'h2', classes: 'font-intro amber-text text-darken-1 uk-margin-remove' },
                        {title: 'Sightseeing Small', block: 'p', classes: 'uk-margin-remove' },
                        {title: 'Header 1', format: 'h1'},
                        {title: 'Header 2', format: 'h2'},
                        {title: 'Header 3', format: 'h3'},
                        {title: 'Header 4', format: 'h4'},
                        {title: 'Header 5', format: 'h5'},
                        {title: 'Header 6', format: 'h6'}
                    ]},
                    {title: 'Inline', items: [
                        {title: 'Bold', icon: 'bold', format: 'bold'},
                        {title: 'Italic', icon: 'italic', format: 'italic'},
                        {title: 'Underline', icon: 'underline', format: 'underline'},
                        {title: 'Strikethrough', icon: 'strikethrough', format: 'strikethrough'},
                        {title: 'Superscript', icon: 'superscript', format: 'superscript'},
                        {title: 'Subscript', icon: 'subscript', format: 'subscript'},
                        {title: 'Code', icon: 'code', format: 'code'}
                    ]},
                    {title: 'Blocks', items: [
                        {title: 'Paragraph', format: 'p'},
                        {title: 'Blockquote', format: 'blockquote'},
                        {title: 'Div', format: 'div'},
                        {title: 'Pre', format: 'pre'}
                    ]},
                    {title: 'Alignment', items: [
                        {title: 'Left', icon: 'alignleft', format: 'alignleft'},
                        {title: 'Center', icon: 'aligncenter', format: 'aligncenter'},
                        {title: 'Right', icon: 'alignright', format: 'alignright'},
                        {title: 'Justify', icon: 'alignjustify', format: 'alignjustify'}
                    ]}
                ],
//                style_formats: [
//                    { title: 'Bold text', inline: 'strong' },
//                    { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
//                    { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
//                    { title: 'Title', block: 'h4', classes: 'cyan-text text-darken-1' }
//                ],
                formats: {
                    alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
                    aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
                    alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
                    alignfull: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
                    bold: { inline: 'span', 'classes': 'bold' },
                    italic: { inline: 'span', 'classes': 'italic' },
                    underline: { inline: 'span', 'classes': 'underline', exact: true },
                    strikethrough: { inline: 'del' },
                    customformat: { inline: 'span', styles: { color: '#00ff00', fontSize: '20px' }, attributes: { title: 'My custom format' }, classes: 'example1' },
                }
            });
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