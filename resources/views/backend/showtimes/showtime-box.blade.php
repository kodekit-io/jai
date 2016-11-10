{{--showtime--}}
<div class="col-md-12">
    <div class="portlet light bordered">
        {{--portlet title--}}
        <div class="portlet-title">
            <div class="caption"><i class="fa fa-ticket"></i> <span class="caption-subject"> Show Details</span></div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
            </div>
        </div>
        {{--end of portlet title--}}
        {{--portlet body--}}
        <div class="portlet-body tabbable-custom ">
            <div class="form-group">
                <label>Show Type :</label>
                {!! $showTimeTypeSelect !!}
            </div>
            <div class="particular form-group">
                <label>Day</label>
                {!! $daySelect !!}
            </div>
            <div class="limited">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="text" name="start_date" class="form-control date-picker"
                           @if (isset($show->start_date)) value='{!! $show->start_date !!}' @endif>
                </div>
                <div class="form-group">
                    <label>End Date :</label>
                    <input type="text" name="end_date" class="form-control date-picker"
                           @if (isset($show->end_date)) value='{!! $show->end_date !!}' @endif >
                </div>
            </div>
            <div class="form-group">
                <label>Time :</label>
                <input type="text" name="start_time" class="form-control timepicker timepicker-24"
                       @if (isset($show->start_time)) value='{!! $show->start_time !!}' @endif >
            </div>
        </div>
        {{--end of portlet body--}}
    </div>
</div>
{{--end of showtime--}}