<li class="item item-menu-{{ $item_menu['type'] }} {{ $item_menu['active'] ? 'active' : '' }} {{ $item_menu['hasActive'] ? 'has-active' : '' }}" title="{{ $item_menu['name'] }}">
    @if(count($item_menu['childs']))
    <a data-bs-toggle="collapse" href="#collapseExample-{{ $index  }}" role="button" aria-expanded="false" aria-controls="collapseExample">
        @if($item_menu['icon'])
        <img src="{{$item_menu['icon']}}" alt="">
        @endif
        <div class="menu-text">{{ $item_menu['name'] }}</div>
    </a>
    <div class="collapse {{ $item_menu['hasActive'] ? 'show' : '' }}" id="collapseExample-{{ $index  }}">
        <div>
            <ul class="submenu menu-{{ $level }} border-0">
                @include('admin.layout.menu', ['items' => $item_menu['childs'], 'level' => ++$level])
            </ul>
        </div>
    </div>

    @elseif($item_menu['type'] == 'static')
    <a href="{{ $item_menu['url'] }}">
        @if($item_menu['icon'])
        <img src="{{$item_menu['icon']}}" alt="">
        @endif
        <div class="menu-text">{{ $item_menu['name'] }}</div>
    </a>

    @elseif($item_menu['type'] == 'router')
    <a href="{{ route($item_menu['url']) }}">
        @if($item_menu['icon'])
        <img src="{{$item_menu['icon']}}" alt="">
        @endif
        <div class="menu-text">{{ $item_menu['name'] }}</div>
    </a>

    @elseif($item_menu['type'] == 'label')
    <span class="label">
        @if($item_menu['icon'])
        <img src="{{$item_menu['icon']}}" alt="">
        @endif
        <div class="menu-text">{{ $item_menu['name'] }}</div>
    </span>

    @elseif($item_menu['type'] == 'divider')
    <div class="divider"></div>
    @endif
</li>