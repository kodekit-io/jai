{{--sidebar--}}
<div class="col-md-4">
    {{--publish--}}
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-gift"></i> Publisher</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="form-group">
                    <label>Publish Date</label>
                    <div class="input-group date form_datetime">
                        <input type="text" name="publish_date" size="16" value="{!! $currentDateTime !!}" readonly class="form-control">
                        <span class="input-group-btn">
                            <button class="btn default date-set" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <a href="{!! backendUrl('post') !!}" class="btn btn-sm sbold green">Back</a> <input type="submit" name="status" class="btn btn-sm btn-default" value="Save">
            </div>
        </div>
    </div>
    {{--end of publish--}}

</div>
{{--end of sidebar--}}