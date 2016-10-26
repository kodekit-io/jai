<div class="tab-content">
    <div class="form-group @if ($errors->has('title')) has-error @endif">
        <label>Title</label>
        <input type="text" id="title"
               name="title"
               class="form-control" placeholder="Title"
               value="{!! ( old('title') ? old('title') : $slider->title ) !!}"
               autofocus />
        @if ($errors->has('title'))
            <span class="help-block">{!! $errors->first('title') !!}</span>
        @endif
    </div>

    <div class="portlet light bordered">
        <div class="portlet-title tabbable-line">
            <div class="caption font-dark">
                <i class="fa fa-image font-dark"></i>
                <span class="caption-subject bold uppercase"> Images</span>
            </div>
            <ul class="nav nav-tabs">
                @foreach($langs as $lang)
                    <li @if($lang['code'] == $defaultLang) class="active" @endif>
                        <a href="#{!! $lang['code'] !!}" data-toggle="tab"> {!! $lang['title'] !!} </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="portlet-body">
            <div class="tab-content">
                @foreach($langs as $lang)
                    <div class="tab-pane @if($lang['code'] == $defaultLang) active @endif" id="{!! $lang['code'] !!}">
                        <?php $itemByLang = $slider->items()->where('lang', $lang); ?>
                        @if ($itemByLang->count() > 0)
                            {{--Repeater Start--}}
                            <div class="form-group mt-repeater !!}">
                                <div data-repeater-list="items">
                                    @foreach($itemByLang->get() as $item)
                                    <div data-repeater-item class="mt-repeater-item">
                                        <div class="row mt-repeater-row">
                                            <div class="form-group col-md-4">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                        <img src="{!! url('images/medium/' . $item->file_name) !!}" alt="...">
                                                    </div>
                                                    <div>
                                                        <span class="btn red btn-outline btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="image-{!! $lang['code'] !!}">
                                                        </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <div class="col-md-12">
                                                    <label class="control-label">Title</label>
                                                    <input type="text" name="title-{!! $lang['code'] !!}" value="{!! $item->content !!}"  class="form-control" />
                                                </div>
                                                <div class="col-md-12 margin-top-10">
                                                    <label class="control-label">Link</label>
                                                    <input type="text" name="link-{!! $lang['code'] !!}" value="{!! $item->link !!}"  class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                        </div>
                                        {{--end of mt-repeater-row--}}

                                    </div>
                                    {{--end of mt-repeater-item--}}
                                    @endforeach
                                </div>

                                <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                    <i class="fa fa-plus"></i> Add Slider Image
                                </a>

                            </div>
                            {{--End of repeater--}}


                        @endif

                    </div>
                    {{--end of tab-pane--}}

                @endforeach

            </div>
            {{--end of tab-content--}}
        </div>
        {{--end of portlet-body--}}

    </div>

</div>