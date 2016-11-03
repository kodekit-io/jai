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
            <?php // var_dump($featuredImage); exit; ?>
            <input type="hidden" id="featured_image_id" name="featured_image_id" value="@if ($featuredImage){!! $featuredImage->id !!}@endif">
            <img src="@if ($featuredImage) {!! url('images/featured/' . $featuredImage->file_name) !!} @endif" id="featured_image"><br>
            <a id="ajax-demo" data-url="{!! backendUrl('tiny-image-manager') !!}" data-toggle="modal"> Set image </a>
            <a id="remove-featured"> Remove image </a>
        </div>
        {{--end of portlet body--}}
    </div>
</div>
{{--end of image--}}