@extends('backend.layouts.app')

@section('page-level-styles')
    <link href="{!! asset('assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
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
                            <span class="caption-subject bold uppercase"> User List</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('user/add') !!}">
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
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="collapse_1" class="panel-collapse collapse">
                                        <form role="form" action="" method="post">
                                            {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control search-input" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label>Email Address</label>
                                                            <input type="text" class="form-control" placeholder="Email Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit" class="btn btn-sm sbold green"><i class="fa fa-search"></i> Search</button>
                                                    <button type="button" class="btn btn-sm sbold green search-close"><i class="fa fa-close"></i> Close</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
@endsection

@section('page-level-plugins')
    <script src="{!! asset('assets/global/scripts/datatable.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/bootbox/bootbox.min.js') !!}" type="text/javascript"></script>
@endsection

@section('page-level-scripts')
    <script>
        $(function() {
            $('#sample_1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('user.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width": "180px" }
                ]
            });

            $('#collapse_1').on('shown.bs.collapse', function () {
                $('.search-input').focus();
            });

            $('.search-close').click(function() {
                $('#collapse_1').collapse('hide');
            })
        });
    </script>
    <script src="{!! asset('assets/global/scripts/delete-confirmation.js') !!}" type="text/javascript"></script>
@endsection