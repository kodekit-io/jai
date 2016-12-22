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