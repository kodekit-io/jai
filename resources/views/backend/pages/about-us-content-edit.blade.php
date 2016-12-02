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
                $title = $detail->title;
                $content = $detail->content;
            }
            if ($meta->count() > 0) {
                $meta = $meta->first();
                $metaDesc = $meta->meta_value;
            }

            if ($pageSlug == 'about-us') {
                $metaPhilosophy = $post->metas()->where('meta_key', 'philosophy-' . $lang['code'])->first();
                $philosophy = count($metaPhilosophy) > 0 ? $metaPhilosophy->meta_value : '';
                $metaStory = $post->metas()->where('meta_key', 'story-' . $lang['code'])->first();
                $story = count($metaStory) > 0 ? $metaStory->meta_value : '';
            }

            if ($pageSlug == 'sightseeing') {
                $metaFirstBox = $post->metas()->where('meta_key', 'firstBox-' . $lang['code'])->first();
                $firstBox = count($metaFirstBox) > 0 ? $metaFirstBox->meta_value : '';
                $metaSecondBox = $post->metas()->where('meta_key', 'secondBox-' . $lang['code'])->first();
                $secondBox = count($metaSecondBox) > 0 ? $metaSecondBox->meta_value : '';
                $metaThirdBox = $post->metas()->where('meta_key', 'thirdBox-' . $lang['code'])->first();
                $thirdBox = count($metaThirdBox) > 0 ? $metaThirdBox->meta_value : '';
                $metaFourthBox = $post->metas()->where('meta_key', 'fourthBox-' . $lang['code'])->first();
                $fourthBox = count($metaFourthBox) > 0 ? $metaFourthBox->meta_value : '';
            }
        ?>
        <div class="tab-pane @if($lang['code'] == $defaultLang) active @endif" id="{!! $lang['code'] !!}">
            <div class="form-group @if ($errors->has('title')) has-error @endif">
                <label>Title</label>
                <input type="text" id="title"
                       name="title[{!! $lang['code'] !!}]"
                       class="form-control" placeholder="Title ({!! $lang['title'] !!})"
                       value="{!! ( old('title['.$lang['code'].']') != '' ? old('title['.$lang['code'].']') : $title ) !!}"
                       @if($lang['code'] == $defaultLang) autofocus @endif />
                @if ($errors->has('title'))
                    <span class="help-block">{!! $errors->first('title') !!}</span>
                @endif
            </div>
            <div class="form-group @if ($errors->has('content')) has-error @endif">
                <label>Content</label>
                <textarea name="content[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                          placeholder="Content ({!! $lang['title'] !!})">{!! ( old('content['.$lang['code'].']') != '' ? old('content['.$lang['code'].']') : $content ) !!}</textarea>
                @if ($errors->has('content'))
                    <span class="help-block">{!! $errors->first('content') !!}</span>
                @endif
            </div>

            @if ($pageSlug == 'about-us')
            <div class="form-group">
                <label>Philosophy</label>
                <textarea name="philosophies[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                          placeholder="Philosophy ({!! $lang['title'] !!})">{!! ( old('philosophy['.$lang['code'].']') != '' ? old('philosophy['.$lang['code'].']') : $philosophy ) !!}</textarea>
            </div>
            <div class="form-group">
                <label>Story</label>
                <textarea name="stories[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                          placeholder="Story ({!! $lang['title'] !!})">{!! ( old('story['.$lang['code'].']') != '' ? old('story['.$lang['code'].']') : $story ) !!}</textarea>
            </div>
            @endif

            @if ($pageSlug == 'sightseeing')
            <div class="form-group">
                <label>First Box</label>
                <textarea name="firstBox[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                    placeholder="First Box ({!! $lang['title'] !!})">
                    {!! ( old('firstBox['.$lang['code'].']') != '' ? old('firstBox['.$lang['code'].']') : $firstBox ) !!}</textarea>
            </div>
            <div class="form-group">
                <label>Second Box</label>
                <textarea name="secondBox[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                    placeholder="Second Box ({!! $lang['title'] !!})">
                    {!! ( old('secondBox['.$lang['code'].']') != '' ? old('secondBox['.$lang['code'].']') : $secondBox ) !!}</textarea>
            </div>
            <div class="form-group">
                <label>Third Box</label>
            <textarea name="thirdBox[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                      placeholder="Third Box ({!! $lang['title'] !!})">
                {!! ( old('thirdBox['.$lang['code'].']') != '' ? old('thirdBox['.$lang['code'].']') : $thirdBox ) !!}</textarea>
            </div>
            <div class="form-group">
                <label>Fourth Box</label>
            <textarea name="fourthBox[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
                      placeholder="Fourth Box ({!! $lang['title'] !!})">
                {!! ( old('fourthBox['.$lang['code'].']') != '' ? old('fourthBox['.$lang['code'].']') : $fourthBox ) !!}</textarea>
            </div>
            @endif

            <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description[{!! $lang['code'] !!}]" class="form-control">{!! ( old('meta_description['.$lang['code'].']') != '' ? old('meta_description['.$lang['code'].']') : $metaDesc ) !!}</textarea>
            </div>
        </div>
    @endforeach
</div>