@extends('backend.layouts.app')

@section('page-level-styles')
@endsection

@section('content')
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-shopping-cart font-dark"></i>
                            <span class="caption-subject bold uppercase"> Order Details: #{!! $order->id !!}</span>
                        </div>
                        <div class="pull-right">
                            <a href="{!! backendUrl('order') !!}" class="btn btn-default"><i class="fa fa-arrow-left"></i> BACK</a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="bold">STATUS :</h6>
                                <span class="label label-success bold">{!! $order->status_description != '' ? $order->status_description : 'open' !!}</span>
                                {{--
                                <span class="label label-default bold">Default</span>
                                <span class="label label-primary bold">Primary</span>
                                <span class="label label-success bold">Success</span>
                                <span class="label label-info bold">Info</span>
                                <span class="label label-warning bold">Warning</span>
                                <span class="label label-danger bold">Danger</span>
                                --}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="bold">INFORMATION</h6>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Name
                                        <span class="pull-right">{!! $order->name !!}</span>
                                    </li>
                                    <li class="list-group-item">
                                        Email
                                        <span class="pull-right">{!! $order->email !!}</span>
                                    </li>
                                    <li class="list-group-item">
                                        Phone
                                        <span class="pull-right">{!! $order->phone_number !!}</span>
                                    </li>
                                </ul>
                            </div>
                            {{--<div class="col-md-6">--}}
                                {{--<h6 class="bold">PAYMENT</h6>--}}
                                {{--<ul class="list-group">--}}
                                    {{--<li class="list-group-item">--}}
                                        {{--Payment Type--}}
                                        {{--<span class="pull-right">DOKU</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-group-item">--}}
                                        {{--Payment Date--}}
                                        {{--<span class="pull-right">13/13/13</span>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-group-item">--}}
                                        {{--Payment Channel--}}
                                        {{--<span class="pull-right">Credit Card</span>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="bold">DETAIL</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package</th>
                                            <th>QTY</th>
                                            <th class="text-right">Amount</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($orderDetails) > 0)
                                        @foreach($orderDetails as $detail)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{!! $detail->product_name !!}</td>
                                                <td>{!! $detail->qty !!}</td>
                                                <td class="text-right">{!! amount_formatting($detail->price) !!}</td>
                                                <th class="text-right">{!! amount_formatting($detail->total_price) !!}</th>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-right"
                                                colspan="4"
                                                style="padding-right:8px;border-top:1px solid #999;">
                                                TOTAL
                                            </td>
                                            <td class="text-right"
                                                style="padding-right:8px;border-top:1px solid #999;">
                                                {!! amount_formatting($order->total_amount) !!}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <script src="{!! asset('assets/global/scripts/datatable.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('assets/global/plugins/bootbox/bootbox.min.js') !!}" type="text/javascript"></script>
@endsection

@section('page-level-scripts')
@endsection
