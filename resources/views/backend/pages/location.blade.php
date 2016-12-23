<div class="form-group">
    <label>After Map Content</label>
    <textarea name="afterMap[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
              placeholder="After Map Content ({!! $lang['title'] !!})">{!! ( old('afterMap['.$lang['code'].']') != '' ? old('afterMap['.$lang['code'].']') : $afterMap ) !!}</textarea>
</div>

<div class="form-group">
    <label>Parking</label>
    <input type="text" class="form-control" placeholder="Parking Title ({!! $lang['title'] !!})" name="parkingTitle[{!! $lang['code'] !!}]" value="{!! ( old('parkingTitle['.$lang['code'].']') != '' ? old('parkingTitle['.$lang['code'].']') : $parkingTitle ) !!}"><br>
    <textarea name="parkingDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Parking Description ({!! $lang['title'] !!})">{!! ( old('parkingDesc['.$lang['code'].']') != '' ? old('parkingDesc['.$lang['code'].']') : $parkingDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>VIP</label>
    <input type="text" class="form-control" placeholder="VIP Title ({!! $lang['title'] !!})" name="vipTitle[{!! $lang['code'] !!}]" value="{!! ( old('vipTitle['.$lang['code'].']') != '' ? old('vipTitle['.$lang['code'].']') : $vipTitle ) !!}"><br>
    <textarea name="vipDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="VIP Description ({!! $lang['title'] !!})">{!! ( old('vipDesc['.$lang['code'].']') != '' ? old('vipDesc['.$lang['code'].']') : $vipDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Wheelchair</label>
    <input type="text" class="form-control" placeholder="Wheelchair Title ({!! $lang['title'] !!})" name="wheelchairTitle[{!! $lang['code'] !!}]" value="{!! ( old('wheelchairTitle['.$lang['code'].']') != '' ? old('wheelchairTitle['.$lang['code'].']') : $wheelchairTitle ) !!}"><br>
    <textarea name="wheelchairDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Wheelchair Description ({!! $lang['title'] !!})">{!! ( old('wheelchairDesc['.$lang['code'].']') != '' ? old('wheelchairDesc['.$lang['code'].']') : $wheelchairDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Bike Rack</label>
    <input type="text" class="form-control" placeholder="Bike Rack Title ({!! $lang['title'] !!})" name="bikeRackTitle[{!! $lang['code'] !!}]" value="{!! ( old('bikeRackTitle['.$lang['code'].']') != '' ? old('bikeRackTitle['.$lang['code'].']') : $bikeRackTitle ) !!}"><br>
    <textarea name="bikeRackDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Bike Rack Description ({!! $lang['title'] !!})">{!! ( old('bikeRackDesc['.$lang['code'].']') != '' ? old('bikeRackDesc['.$lang['code'].']') : $bikeRackDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Shuttle Bus</label>
    <input type="text" class="form-control" placeholder="Shuttle Bus Title ({!! $lang['title'] !!})" name="shuttleBusTitle[{!! $lang['code'] !!}]" value="{!! ( old('shuttleBusTitle['.$lang['code'].']') != '' ? old('shuttleBusTitle['.$lang['code'].']') : $shuttleBusTitle ) !!}"><br>
    <textarea name="shuttleBusDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Shuttle Bus Description ({!! $lang['title'] !!})">{!! ( old('shuttleBusDesc['.$lang['code'].']') != '' ? old('shuttleBusDesc['.$lang['code'].']') : $shuttleBusDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Blue Bird Taxi</label>
    <input type="text" class="form-control" placeholder="Blue Bird Title ({!! $lang['title'] !!})" name="blueBirdTitle[{!! $lang['code'] !!}]" value="{!! ( old('blueBirdTitle['.$lang['code'].']') != '' ? old('blueBirdTitle['.$lang['code'].']') : $blueBirdTitle ) !!}"><br>
    <textarea name="blueBirdDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Blue Bird Description ({!! $lang['title'] !!})">{!! ( old('blueBirdDesc['.$lang['code'].']') != '' ? old('blueBirdDesc['.$lang['code'].']') : $blueBirdDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Public Bus</label>
    <input type="text" class="form-control" placeholder="Public Bus Title ({!! $lang['title'] !!})" name="publicBusTitle[{!! $lang['code'] !!}]" value="{!! ( old('publicBusTitle['.$lang['code'].']') != '' ? old('publicBusTitle['.$lang['code'].']') : $publicBusTitle ) !!}"><br>
    <textarea name="publicBusDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Public Bus Description ({!! $lang['title'] !!})">{!! ( old('publicBusDesc['.$lang['code'].']') != '' ? old('publicBusDesc['.$lang['code'].']') : $publicBusDesc ) !!}</textarea>
</div>