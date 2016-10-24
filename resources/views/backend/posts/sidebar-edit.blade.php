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
                        <input type="text" name="publish_date" size="16" value="{!! $publishDate !!}" readonly class="form-control">
                        <span class="input-group-btn">
                            <button class="btn default date-set" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <a href="{!! backendUrl('post') !!}" class="btn btn-sm sbold green">Back</a> <input type="submit" name="status" class="btn btn-sm btn-default" value="Draft"> <input type="submit" name="status" class="btn btn-sm btn-default" value="Publish">
            </div>
        </div>
    </div>
    {{--end of publish--}}

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

    {{--image--}}
    <div class="col-md-12">
        <div class="portlet light bordered">
            {{--portlet title--}}
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-image"></i> <span class="caption-subject"> Image</span></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                </div>
            </div>
            {{--end of portlet title--}}
            {{--portlet body--}}
            <div class="portlet-body tabbable-custom ">
                <input type="hidden" id="featured_image_id" name="featured_image_id" value="{!! $featuredImage->id !!}">
                <img src="{!! url('images/featured/' . $featuredImage->file_name) !!}" id="featured_image"><br>
                <a id="ajax-demo" data-url="{!! backendUrl('tiny-image-manager') !!}" data-toggle="modal"> Set image </a>
                <a id="remove-featured"> Remove image </a>
            </div>
            {{--end of portlet body--}}
        </div>
    </div>
    {{--end of image--}}

</div>
{{--end of sidebar--}}