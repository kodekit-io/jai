@extends('backend.layouts.app')

@section('page-level-styles')
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
                            <span class="caption-subject bold uppercase"> Add Post</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('post') !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('post/save') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">

                                    {{--main form--}}
                                    <div class="col-md-8">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            <label>Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{!! old('name') !!}" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{!! $errors->first('name') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                                            <label>Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug" value="{!! old('slug') !!}" readonly>
                                            @if ($errors->has('slug'))
                                                <span class="help-block">{!! $errors->first('slug') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea id="content"></textarea>
                                        </div>
                                    </div>
                                    {{--end of main center--}}

                                    {{--sidebar--}}
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
                                                            <input type="text" size="16" readonly class="form-control">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <input type="submit" class="btn btn-default" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                        {{--end of publish--}}

                                        {{--category--}}
                                        <div class="col-md-12">
                                            <div class="portlet light bordered">
                                                {{--portlet title--}}
                                                <div class="portlet-title">
                                                    <div class="caption"><i class="icon-pin"></i> <span class="caption-subject"> Categories</span></div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                                                    </div>
                                                </div>
                                                {{--end of portlet title--}}
                                                {{--portlet body--}}
                                                <div class="portlet-body tabbable-custom ">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a href="#portlet_tab1" data-toggle="tab"> Categories </a>
                                                        </li>
                                                        <li>
                                                            <a href="#portlet_tab2" data-toggle="tab"> Most Used </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="portlet_tab1">
                                                            <div class="scroller" style="height: 200px;">
                                                                <h4>Tab 1 Content</h4>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="portlet_tab2">
                                                            <div class="scroller" style="height: 200px;">
                                                                <h4>Tab 2 Content</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--end of portlet body--}}
                                            </div>
                                        </div>
                                        {{--end of category--}}
                                    </div>
                                    {{--end of sidebar--}}

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
@endsection

@section('page-level-scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: [ 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools' ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,
            menubar: false
        });
    </script>
    <script type="text/javascript">
        $( "#name" ).focusout(function() {
            name = $('#name').val();
            if (name.length > 3) {
                $.ajax({
                    method: "POST",
                    url: '{!! backendUrl('get-slug/category') !!}',
                    data: {
                        title: name,
                        _token: '{!! csrf_token() !!}'
                    }
                }).done(function( msg ) {
                    $('#slug').val(msg);
                });
            }
        });
    </script>
@endsection