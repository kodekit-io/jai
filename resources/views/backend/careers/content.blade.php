<div class="tab-content">
    @foreach($langs as $lang)
    <div class="tab-pane @if($lang['code'] == $defaultLang) active @endif" id="{!! $lang['code'] !!}">
        <div class="form-group @if ($errors->has('title')) has-error @endif">
            <label>Job Position</label>
            <input type="text" id="title"
                   name="title[{!! $lang['code'] !!}]"
                   class="form-control" placeholder="Title ({!! $lang['title'] !!})"
                   value="{!! old('title['.$lang['code'].']') !!}"
                   @if($lang['code'] == $defaultLang) autofocus @endif />
            @if ($errors->has('title'))
                <span class="help-block">{!! $errors->first('title') !!}</span>
            @endif
        </div>
        <div class="form-group @if ($errors->has('content')) has-error @endif">
            <label>Job Description</label>
            <textarea name="content[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                      placeholder="Content ({!! $lang['title'] !!})">{!! old('title['.$lang['code'].']') !!}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">{!! $errors->first('content') !!}</span>
            @endif
        </div>
        <div class="form-group">
            <label>Meta Description</label>
            <textarea name="meta_description[{!! $lang['code'] !!}]" class="form-control"></textarea>
        </div>
    </div>
    @endforeach
</div>