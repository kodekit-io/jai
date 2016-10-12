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
                            <span class="caption-subject bold uppercase"> Edit Role</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('role') !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('role/' . $role->id . '/update') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name"
                                                   value="@if ($errors->has('name')){!! old('name') !!}@else{!! $role->name !!}@endif"
                                                   autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{!! $errors->first('name') !!}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Permission</label>
                                            <div class="mt-checkbox-inline">
                                                @foreach($permissions as $permission)
                                                    <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" @if($selectedPermissions->contains($permission->id)) checked @endif name="permissions[]" value="{!! $permission->name !!}"> {!! $permission->name !!}
                                                        <span></span>
                                                    </label>
                                                @endforeach
                                            </div>
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
@endsection