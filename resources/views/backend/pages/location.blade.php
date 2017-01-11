<div class="form-group">
    <label>After Map Content</label>
    <textarea name="afterMap[{!! $lang['code'] !!}]" id="content" class="tinytextarea"
              placeholder="After Map Content ({!! $lang['title'] !!})">{!! ( old('afterMap['.$lang['code'].']') != '' ? old('afterMap['.$lang['code'].']') : $afterMap ) !!}</textarea>
</div>

<div class="form-group">
    <label>Locker</label>
    <input type="text" class="form-control" placeholder="Locker Title ({!! $lang['title'] !!})" name="lockerTitle[{!! $lang['code'] !!}]" value="{!! ( old('lockerTitle['.$lang['code'].']') != '' ? old('lockerTitle['.$lang['code'].']') : $lockerTitle ) !!}"><br>
    <textarea name="lockerDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Locker Description ({!! $lang['title'] !!})">{!! ( old('lockerDesc['.$lang['code'].']') != '' ? old('lockerDesc['.$lang['code'].']') : $lockerDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Restroom</label>
    <input type="text" class="form-control" placeholder="Restroom Title ({!! $lang['title'] !!})" name="restroomTitle[{!! $lang['code'] !!}]" value="{!! ( old('restroomTitle['.$lang['code'].']') != '' ? old('restroomTitle['.$lang['code'].']') : $restroomTitle ) !!}"><br>
    <textarea name="restroomDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Restroom Description ({!! $lang['title'] !!})">{!! ( old('restroomDesc['.$lang['code'].']') != '' ? old('restroomDesc['.$lang['code'].']') : $restroomDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Wheelchair</label>
    <input type="text" class="form-control" placeholder="Wheelchair Title ({!! $lang['title'] !!})" name="wheelchairTitle[{!! $lang['code'] !!}]" value="{!! ( old('wheelchairTitle['.$lang['code'].']') != '' ? old('wheelchairTitle['.$lang['code'].']') : $wheelchairTitle ) !!}"><br>
    <textarea name="wheelchairDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Wheelchair Description ({!! $lang['title'] !!})">{!! ( old('wheelchairDesc['.$lang['code'].']') != '' ? old('wheelchairDesc['.$lang['code'].']') : $wheelchairDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Baby changing room</label>
    <input type="text" class="form-control" placeholder="Baby changing room Title ({!! $lang['title'] !!})" name="babyTitle[{!! $lang['code'] !!}]" value="{!! ( old('babyTitle['.$lang['code'].']') != '' ? old('babyTitle['.$lang['code'].']') : $babyTitle ) !!}"><br>
    <textarea name="babyDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Baby changing room Description ({!! $lang['title'] !!})">{!! ( old('babyDesc['.$lang['code'].']') != '' ? old('babyDesc['.$lang['code'].']') : $babyDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Wifi</label>
    <input type="text" class="form-control" placeholder="Wifi Title ({!! $lang['title'] !!})" name="wifiTitle[{!! $lang['code'] !!}]" value="{!! ( old('wifiTitle['.$lang['code'].']') != '' ? old('wifiTitle['.$lang['code'].']') : $wifiTitle ) !!}"><br>
    <textarea name="wifiDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Wifi Description ({!! $lang['title'] !!})">{!! ( old('wifiDesc['.$lang['code'].']') != '' ? old('wifiDesc['.$lang['code'].']') : $wifiDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Cafetaria</label>
    <input type="text" class="form-control" placeholder="Cafetaria Title ({!! $lang['title'] !!})" name="cafeTitle[{!! $lang['code'] !!}]" value="{!! ( old('cafeTitle['.$lang['code'].']') != '' ? old('cafeTitle['.$lang['code'].']') : $cafeTitle ) !!}"><br>
    <textarea name="cafeDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Cafetaria Description ({!! $lang['title'] !!})">{!! ( old('cafeDesc['.$lang['code'].']') != '' ? old('cafeDesc['.$lang['code'].']') : $cafeDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Souvenir</label>
    <input type="text" class="form-control" placeholder="Souvenir Title ({!! $lang['title'] !!})" name="souvenirTitle[{!! $lang['code'] !!}]" value="{!! ( old('souvenirTitle['.$lang['code'].']') != '' ? old('souvenirTitle['.$lang['code'].']') : $souvenirTitle ) !!}"><br>
    <textarea name="souvenirDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Souvenir Description ({!! $lang['title'] !!})">{!! ( old('souvenirDesc['.$lang['code'].']') != '' ? old('souvenirDesc['.$lang['code'].']') : $souvenirDesc ) !!}</textarea>
</div>

<div class="form-group">
    <label>Restaurant</label>
    <input type="text" class="form-control" placeholder="Restaurant Title ({!! $lang['title'] !!})" name="restaurantTitle[{!! $lang['code'] !!}]" value="{!! ( old('restaurantTitle['.$lang['code'].']') != '' ? old('restaurantTitle['.$lang['code'].']') : $restaurantTitle ) !!}"><br>
    <textarea name="restaurantDesc[{!! $lang['code'] !!}]" id="content" class="form-control"
              placeholder="Restaurant Description ({!! $lang['title'] !!})">{!! ( old('restaurantDesc['.$lang['code'].']') != '' ? old('restaurantDesc['.$lang['code'].']') : $restaurantDesc ) !!}</textarea>
</div>