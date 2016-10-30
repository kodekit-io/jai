{{--category--}}
<div class="col-md-12">
    <div class="portlet light bordered">
        {{--portlet title--}}
        <div class="portlet-title">
            <div class="caption"><i class="fa fa-ticket"></i> <span class="caption-subject"> Package Details</span></div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
            </div>
        </div>
        {{--end of portlet title--}}
        {{--portlet body--}}
        <div class="portlet-body tabbable-custom ">
            <div class="mt-checkbox-outline form-group">
                <label class="mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="is_general_admission"
                           @if (isset($package->is_general_admission) && $package->is_general_admission == 1) checked @endif
                           value="1"> General Admission ?
                    <span></span>
                </label>
            </div>
            <div class="form-group">
                <label>Package Type :</label>
                {!! $packageSelect !!}
            </div>
            <div class="normal-type">
                <div class="form-group">
                    <label>Normal Price :</label>
                    <input type="text" name="normal_price" class="form-control"
                           @if (isset($package->normal_price)) value='{!! $package->normal_price !!}' @endif>
                </div>
                <div class="form-group">
                    <label>Weekend Price :</label>
                    <input type="text" name="weekend_price" class="form-control"
                           @if (isset($package->weekend_price)) value='{!! $package->weekend_price !!}' @endif >
                </div>
                <div class="form-group">
                    <label>Holiday Price :</label>
                    <input type="text" name="holiday_price" class="form-control"
                           @if (isset($package->holiday_price)) value='{!! $package->holiday_price !!}' @endif >
                </div>
            </div>
        </div>
        {{--end of portlet body--}}
    </div>
</div>
{{--end of category--}}