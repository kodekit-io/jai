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
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase"> Order List</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        @if (session('message'))
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Info!</strong> {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Order Date</th>
                                <th>Visit Date</th>
                                <th>Total Amount</th>
                                <th>Status</th>
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
                ajax: '{!! route('order.data') !!}',
                order: [[ 0, "desc" ]],
                columns: [
                    { data: 'id', name: 'id', "width": "50px" },
                    { data: 'user', name: 'user', "width": "150px" },
                    { data: 'order_date', name: 'order_date' },
                    { data: 'visit_date', name: 'visit_date' },
                    { data: 'total', name: 'total', "width": "100px" },
                    { data: 'status', name: 'status', "width": "100px" },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width": "80px" }
                ]
            });
        });
    </script>
    <script src="{!! asset('assets/global/scripts/delete-confirmation.js') !!}" type="text/javascript"></script>
@endsection
