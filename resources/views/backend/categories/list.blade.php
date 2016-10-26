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
                            <span class="caption-subject bold uppercase"> Category List</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! backendUrl('post-category/' . $postTypeId .'/add') !!}">
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
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Parent</th>
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
                ajax: '{!! backendUrl('post-category-data/' . $postTypeId) !!}',
                columns: [
                    { data: 'id', name: 'id', "width": "100px" },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'parent', name: 'parent' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width": "180px" }
                ]
            });
        });
    </script>
    <script src="{!! asset('assets/global/scripts/delete-confirmation.js') !!}" type="text/javascript"></script>
@endsection
