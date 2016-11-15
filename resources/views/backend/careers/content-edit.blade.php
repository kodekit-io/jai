<div class="tab-content">
    @foreach($langs as $lang)
        <?php
            $detail = $post->details()->where('lang', $lang['code']);
            $meta = $post->metas()->where('meta_key', 'meta_description-'.$lang['code']);
            $title = '';
            $content = '';
            $metaDesc = '';
            if ($detail->count() > 0) {
                $detail = $detail->first();
                $title = $detail->position;
                $content = $detail->description;
            }
            if ($meta->count() > 0) {
                $meta = $meta->first();
                $metaDesc = $meta->meta_value;
            }
        ?>
        <div class="tab-pane @if($lang['code'] == $defaultLang) active @endif" id="{!! $lang['code'] !!}">
            <div class="form-group @if ($errors->has('position')) has-error @endif">
                <label>Job Position</label>
                <input type="text" id="title"
                       name="title[{!! $lang['code'] !!}]"
                       class="form-control" placeholder="Title ({!! $lang['title'] !!})"
                       value="{!! ( old('title['.$lang['code'].']') != '' ? old('title['.$lang['code'].']') : $title ) !!}"
                       @if($lang['code'] == $defaultLang) autofocus @endif />
                @if ($errors->has('position'))
                    <span class="help-block">{!! $errors->first('position') !!}</span>
                @endif
            </div>
            <div class="form-group @if ($errors->has('description')) has-error @endif">
                <label>Job Description</label>
                <textarea name="content[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                          placeholder="Content ({!! $lang['title'] !!})">{!! ( old('content['.$lang['code'].']') != '' ? old('content['.$lang['code'].']') : $content ) !!}</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">{!! $errors->first('description') !!}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description[{!! $lang['code'] !!}]" class="form-control">{!! ( old('meta_description['.$lang['code'].']') != '' ? old('meta_description['.$lang['code'].']') : $metaDesc ) !!}</textarea>
            </div>
        </div>
    @endforeach
</div>