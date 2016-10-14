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
                            <span class="caption-subject bold uppercase"> Edit Category</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('category') !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('category/' . $category->id . '/update') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            <label>Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                                                   value="@if ($errors->has('name')){!! old('name') !!}@else{!! $category->name !!}@endif"
                                                   autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{!! $errors->first('name') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group @if ($errors->has('slug')) has-error @endif">
                                            <label>Slug</label>
                                            <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug"
                                                   value="@if ($errors->has('slug')){!! old('slug') !!}@else{!! $category->slug !!}@endif"
                                                   readonly>
                                            @if ($errors->has('slug'))
                                                <span class="help-block">{!! $errors->first('slug') !!}</span>
                                            @endif
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
@endsection

@section('page-level-scripts')
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