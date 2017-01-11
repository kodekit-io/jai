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

            if ($post->id == config('misc.statics.about-us')) {
                $metaPhilosophy = $post->metas()->where('meta_key', 'philosophy-' . $lang['code'])->first();
                $philosophy = count($metaPhilosophy) > 0 ? $metaPhilosophy->meta_value : '';
                $metaStory = $post->metas()->where('meta_key', 'story-' . $lang['code'])->first();
                $story = count($metaStory) > 0 ? $metaStory->meta_value : '';
            }

            if ($post->id == config('misc.statics.sightseeing')) {
                $metaFirstBox = $post->metas()->where('meta_key', 'firstBox-' . $lang['code'])->first();
                $firstBox = count($metaFirstBox) > 0 ? $metaFirstBox->meta_value : '';
                $metaSecondBox = $post->metas()->where('meta_key', 'secondBox-' . $lang['code'])->first();
                $secondBox = count($metaSecondBox) > 0 ? $metaSecondBox->meta_value : '';
                $metaThirdBox = $post->metas()->where('meta_key', 'thirdBox-' . $lang['code'])->first();
                $thirdBox = count($metaThirdBox) > 0 ? $metaThirdBox->meta_value : '';
                $metaFourthBox = $post->metas()->where('meta_key', 'fourthBox-' . $lang['code'])->first();
                $fourthBox = count($metaFourthBox) > 0 ? $metaFourthBox->meta_value : '';
            }

            if ($post->id == config('misc.statics.ticket-hours')) {
                $metaOpeningHours = $post->metas()->where('meta_key', 'openingHours-' . $lang['code'])->first();
                $openingHours = count($metaOpeningHours) > 0 ? $metaOpeningHours->meta_value : '';
            }

            if ($post->id == config('misc.statics.location')) {
                $metaAfterMap = $post->metas()->where('meta_key', 'afterMap-' . $lang['code'])->first();
                $afterMap = count($metaAfterMap) > 0 ? $metaAfterMap->meta_value : '';

                // locker
                $meta = $post->metas()->where('meta_key', 'lockerTitle-' . $lang['code'])->first();
                $lockerTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'lockerDesc-' . $lang['code'])->first();
                $lockerDesc = count($meta) > 0 ? $meta->meta_value : '';

                // restroom
                $meta = $post->metas()->where('meta_key', 'restroomTitle-' . $lang['code'])->first();
                $restroomTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'restroomDesc-' . $lang['code'])->first();
                $restroomDesc = count($meta) > 0 ? $meta->meta_value : '';

                // wheelchair
                $meta = $post->metas()->where('meta_key', 'wheelchairTitle-' . $lang['code'])->first();
                $wheelchairTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'wheelchairDesc-' . $lang['code'])->first();
                $wheelchairDesc = count($meta) > 0 ? $meta->meta_value : '';

                // baby
                $meta = $post->metas()->where('meta_key', 'babyTitle-' . $lang['code'])->first();
                $babyTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'babyDesc-' . $lang['code'])->first();
                $babyDesc = count($meta) > 0 ? $meta->meta_value : '';

                // wifi
                $meta = $post->metas()->where('meta_key', 'wifiTitle-' . $lang['code'])->first();
                $wifiTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'wifiDesc-' . $lang['code'])->first();
                $wifiDesc = count($meta) > 0 ? $meta->meta_value : '';

                // cafe
                $meta = $post->metas()->where('meta_key', 'cafeTitle-' . $lang['code'])->first();
                $cafeTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'cafeDesc-' . $lang['code'])->first();
                $cafeDesc = count($meta) > 0 ? $meta->meta_value : '';

                // souvenir
                $meta = $post->metas()->where('meta_key', 'souvenirTitle-' . $lang['code'])->first();
                $souvenirTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'souvenirDesc-' . $lang['code'])->first();
                $souvenirDesc = count($meta) > 0 ? $meta->meta_value : '';

                // restaurant
                $meta = $post->metas()->where('meta_key', 'restaurantTitle-' . $lang['code'])->first();
                $restaurantTitle = count($meta) > 0 ? $meta->meta_value : '';
                $meta = $post->metas()->where('meta_key', 'restaurantDesc-' . $lang['code'])->first();
                $restaurantDesc = count($meta) > 0 ? $meta->meta_value : '';
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

            @if ($post->id == config('misc.statics.about-us'))
                @include('backend.pages.about-us')
            @endif

            @if ($post->id == config('misc.statics.sightseeing'))
                @include('backend.pages.sightseeing')
            @endif

            @if ($post->id == config('misc.statics.ticket-hours'))
                @include('backend.pages.ticket-hours')
            @endif

            @if ($post->id == config('misc.statics.location'))
                @include('backend.pages.location')
            @endif

            <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description[{!! $lang['code'] !!}]" class="form-control">{!! ( old('meta_description['.$lang['code'].']') != '' ? old('meta_description['.$lang['code'].']') : $metaDesc ) !!}</textarea>
            </div>
        </div>
    @endforeach
</div>