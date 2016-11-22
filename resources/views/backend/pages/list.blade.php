@extends('backend.layouts.app')

@section('page-level-styles')
    <link href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}" rel="stylesheet" type="text/css" />
    @endsection

    @section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Pages</span>
                            {{--<div class="caption-desc font-grey-cascade"> Default list element style. Activate by adding <pre class="mt-code">.list-news ext-1</pre> class to the <pre class="mt-code">ul</pre> element. </div>--}}
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('pages/add') !!}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        @if (session('message'))
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Info!</strong> {{ session('message') }}
                            </div>
                        @endif
                        <div class="mt-element-list">
                            <div class="mt-list-head list-news ext-1 font-white bg-grey-gallery">
                                <div class="list-head-title-container">
                                    <h3 class="list-title">Page List</h3>
                                </div>
                                {{--<div class="list-count pull-right bg-red">2</div>--}}
                            </div>
                            <div class="mt-list-container list-news ">
                                <ul>
                                    @foreach($thePages as $page)
                                    <li class="mt-list-item">
                                        <div class="list-icon-container">
                                            <a href="{!! backendUrl('page/' . $page->id . '/edit') !!}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                        {{--<div class="list-thumb">--}}
                                            {{--<a href="javascript:;">--}}
                                                {{--<img alt="" src="../assets/global/img/portfolio/600x600/08.jpg" />--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        <div class="list-datetime bold uppercase font-dark">{!! Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $page->publish_date)->format('j M, Y') !!}</div>
                                        <div class="list-item-content">
                                            <h3 class="uppercase">
                                                <a href="javascript:;">{!! $page->title !!}</a>
                                            </h3>
                                            <p>{!! \Illuminate\Support\Str::words(strip_tags($page->content), 40) !!}</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
@endsection

@section('page-level-plugins')
    <script src="{!! asset('assets/global/plugins/bootbox/bootbox.min.js') !!}" type="text/javascript"></script>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('assets/global/scripts/delete-confirmation.js') !!}" type="text/javascript"></script>
@endsection
