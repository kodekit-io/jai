<div class="form-group">
    <label>After Map Content</label>
    <textarea name="afterMap[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
              placeholder="After Map Content ({!! $lang['title'] !!})">{!! ( old('afterMap['.$lang['code'].']') != '' ? old('afterMap['.$lang['code'].']') : $afterMap ) !!}</textarea>
</div>