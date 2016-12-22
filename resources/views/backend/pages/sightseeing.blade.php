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