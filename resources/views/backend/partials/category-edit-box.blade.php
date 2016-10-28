{{--category--}}
<div class="col-md-12">
    <div class="portlet light bordered">
        {{--portlet title--}}
        <div class="portlet-title">
            <div class="caption"><i class="icon-pin"></i> <span class="caption-subject"> Categories</span></div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
            </div>
        </div>
        {{--end of portlet title--}}
        {{--portlet body--}}
        <div class="portlet-body tabbable-custom ">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="mt-checkbox-outline">
                        @foreach($categoryCheckboxes as $checkbox)
                            {!! $checkbox !!}<br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{--end of portlet body--}}
    </div>
</div>
{{--end of category--}}