<div class="form-group">
    <label>Opening Hours</label>
    <textarea name="openingHours[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
              placeholder="Opening hours ({!! $lang['title'] !!})">{!! ( old('openingHours['.$lang['code'].']') != '' ? old('openingHours['.$lang['code'].']') : $openingHours ) !!}</textarea>
</div>