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
            {{--<ul class="nav nav-tabs">--}}
            {{--<li class="active">--}}
            {{--<a href="#portlet_tab1" data-toggle="tab"> Categories </a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="#portlet_tab2" data-toggle="tab"> Most Used </a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--<div class="tab-content">--}}
            {{--<div class="tab-pane active" id="portlet_tab1">--}}
            {{--<div class="scroller" style="height: 200px;">--}}
            {{--<h4>Tab 1 Content</h4>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="tab-pane" id="portlet_tab2">--}}
            {{--<div class="scroller" style="height: 200px;">--}}
            {{--<h4>Tab 2 Content</h4>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="mt-checkbox-outline">
                        {{--@foreach($categories as $category)--}}
                        {{--<label class="mt-checkbox mt-checkbox-outline"><input type="checkbox" name="categories[]" value="{!! $category->id!!}"> {!! $category->name !!}<span></span></label><br>--}}
                        {{--@endforeach--}}
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