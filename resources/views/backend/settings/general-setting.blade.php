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
                            <span class="caption-subject bold uppercase"> General Setting</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('general-setting') !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('general-setting') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group @if ($errors->has('facebook_link')) has-error @endif">
                                                <label>Facebook</label>
                                                <input type="text" name="facebook_link" class="form-control" placeholder="Facebook Link" value="{!! old('facebook_link') !!}" autofocus>
                                                @if ($errors->has('facebook_link'))
                                                <span class="help-block">{!! $errors->first('facebook_link') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group @if ($errors->has('twitter_link')) has-error @endif">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter_link" class="form-control" placeholder="Twitter Link" value="{!! old('twitter_link') !!}" autofocus>
                                                @if ($errors->has('twitter_link'))
                                                <span class="help-block">{!! $errors->first('twitter_link') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group @if ($errors->has('tripadvisor_link')) has-error @endif">
                                                <label>Trip Advisor</label>
                                                <input type="text" name="tripadvisor_link" class="form-control" placeholder="Trip Advisor Link" value="{!! old('tripadvisor_link') !!}" autofocus>
                                                @if ($errors->has('tripadvisor_link'))
                                                <span class="help-block">{!! $errors->first('tripadvisor_link') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group @if ($errors->has('instagram_link')) has-error @endif">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram_link" class="form-control" placeholder="Instagram Link" value="{!! old('instagram_link') !!}" autofocus>
                                                @if ($errors->has('instagram_link'))
                                                <span class="help-block">{!! $errors->first('instagram_link') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group @if ($errors->has('googleplus_link')) has-error @endif">
                                                <label>Google+</label>
                                                <input type="text" name="googleplus_link" class="form-control" placeholder="Google+ Link" value="{!! old('googleplus_link') !!}" autofocus>
                                                @if ($errors->has('googleplus_link'))
                                                    <span class="help-block">{!! $errors->first('googleplus_link') !!}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
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