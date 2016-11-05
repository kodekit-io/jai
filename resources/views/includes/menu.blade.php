@foreach($items as $item)
    @if($item->hasChildren())
        <li class="@if($item->isActive) active @endif">
            <a href="javascript:;" title="{!! $item->title !!}" class="{!! $item->icon_class !!}" data-uk-toggle={target:'#subvisit'}>{!! $item->title !!}
            </a>
            <ul id="subvisit" class="@if($item->isActive) uk-list ja-nav-sub @else uk-list uk-hidden ja-nav-sub @endif" >
                @include('includes.menu', array('items' => $item->children()))
            </ul>
        </li>
    @else
        <li class="@if($item->isActive) active @endif">
            <a href="@if($item->menu_link != '' && $item->menu_link != 'javascript:;') {!! lang_url($item->menu_link) !!} @else javascript:; @endif"
               title="{!! $item->title !!}"
               class="{!! $item->icon_class !!}">
                {!! $item->title !!}
            </a>
        </li>
    @endif
@endforeach