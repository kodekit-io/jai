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
                            {{--<a class="btn btn-xs sbold green" href="{!! backendUrl('general-setting') !!}">--}}
                                {{--<i class="fa fa-arrow-left"></i> Back--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" action="{!! backendUrl('general-setting') !!}" method="post" >
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        @foreach($fields as $key => $val)
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label>{!! $val[0] !!}</label>
                                                    @if ($val[1] == 'text')
                                                        <input type="text" name="{!! $key !!}" class="form-control" placeholder="{!! $val[0] !!}" value="{!! isset($settings[$key]) ? $settings[$key] : '' !!}" @if($loop->index == 0) autofocus @endif>
                                                    @elseif($val[1] == 'textarea')
                                                        <textarea name="{!! $key !!}" class="form-control" @if($loop->index == 0) autofocus @endif>{!! isset($settings[$key]) ? $settings[$key] : '' !!}</textarea>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach

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