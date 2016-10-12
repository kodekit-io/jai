@foreach($items as $item)
    @if($item->hasChildren())
        <li class="nav-item @if($item->data('activated'))active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="{!! $item->icon_class !!}"></i>
                <span class="title">{!! $item->title !!}</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" >
                @include('backend.partials.menu', array('items' => $item->children()))
            </ul>
        </li>
    @else

        <li class="nav-item @if($item->data('activated')) active open @endif">
            <a href="@if($item->menu_link != '' && $item->menu_link != 'javascript:;') {!! url($item->menu_link) !!} @else javascript:; @endif" class="nav-link">
                <i class="{!! $item->icon_class !!}"></i>
                <span class="title">{!! $item->title !!}</span>
            </a>
        </li>
    @endif
@endforeach