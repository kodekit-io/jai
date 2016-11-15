{{--package--}}
<div class="col-md-12">
    <div class="portlet light bordered">
        {{--portlet title--}}
        <div class="portlet-title">
            <div class="caption"><i class="fa fa-ticket"></i> <span class="caption-subject"> Career Details</span></div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
            </div>
        </div>
        {{--end of portlet title--}}
        {{--portlet body--}}
        <div class="portlet-body tabbable-custom ">
            <div class="normal-type">
                <div class="form-group">
                    <label>Department :</label>
                    <input type="text" name="department" class="form-control"
                           @if (isset($career->department)) value='{!! $career->department !!}' @endif>
                </div>
                <div class="form-group">
                    <label>Active Date :</label>
                    <input type="text" name="active_date" class="form-control date-picker"
                           @if (isset($career->active_date)) value='{!! Carbon\Carbon::createFromFormat('Y-m-d', $career->active_date)->format('m/d/Y') !!}' @endif >
                </div>
                <div class="form-group">
                    <label>Contact Person :</label>
                    <input type="text" name="contact_person" class="form-control"
                           @if (isset($career->contact_person)) value='{!! $career->contact_person !!}' @endif >
                </div>
            </div>
        </div>
        {{--end of portlet body--}}
    </div>
</div>
{{--end of package--}}