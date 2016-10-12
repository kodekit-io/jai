@extends('backend.layouts.app')

@section('page-level-styles')
@endsection

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE BAR -->
        <!-- END PAGE BAR -->

        <!-- BEGIN PAGE TITLE-->
        <!-- h1 class="page-title"> Users
            <small> list</small>
        </h1 -->
        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Add User</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('user') !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('user/save') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{!! old('name') !!}" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">{!! $errors->first('name') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group  @if ($errors->has('email')) has-error @endif">
                                            <label>Email Address</label>
                                            <input type="text" name="email" class="form-control" placeholder="Email Address" value="{!! old('email') !!}">
                                            @if ($errors->has('email'))
                                                <span class="help-block">{!! $errors->first('email') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group  @if ($errors->has('password')) has-error @endif">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">{!! $errors->first('password') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group  @if ($errors->has('password2')) has-error @endif">
                                            <label>Re-enter Password</label>
                                            <input type="password" name="password2" class="form-control" placeholder="Re-enter Your Password">
                                            @if ($errors->has('password2'))
                                                <span class="help-block">{!! $errors->first('password2') !!}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <div class="mt-checkbox-inline">
                                                @foreach($roles as $role)
                                                    <label class="mt-checkbox mt-checkbox-outline">
                                                        <input type="checkbox" name="roles[]" value="{!! $role->id !!}"> {!! $role->name !!}
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