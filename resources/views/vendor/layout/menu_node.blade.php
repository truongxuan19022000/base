
<li class="item item-menu-{{ (isset($item_menu['type'])?$item_menu['type']:"") }}">
    @if(isset($item_menu['childs']) AND count($item_menu['childs']))
        <a data-bs-toggle="collapse" href="#collapseExample-{{ $index  }}" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            <img src="{{$item_menu['icon']}}" alt=""> &emsp;
            <span>{{ $item_menu['name'] }}</span>
        </a>
        <div class="collapse" id="collapseExample-{{ $index  }}">
            <div>
                    <ul class="menu menu-{{ $level }} border-0">
                        @include('admin.layout.menu', ['items' => $item_menu['childs'], 'level' => ++$level])
                    </ul>
            </div>
        </div>

    @elseif(isset($item_menu['type']) AND $item_menu['type'] == 'static')
        <a href="{{ $item_menu['url'] }}">
            <img src="{{$item_menu['icon']}}" alt=""> &emsp;
            <span>{{ $item_menu['name'] }}</span>
        </a>

    @elseif(isset($item_menu['type']) AND $item_menu['type'] == 'router')
        <a href="{{ route($item_menu['url']) }}">
            <img src="{{$item_menu['icon']}}" alt=""> &emsp;
            <span>{{ $item_menu['name'] }}</span>
        </a>

    @elseif(isset($item_menu['type']) AND $item_menu['type'] == 'label')
        <span class="label">
            <img src="{{$item_menu['icon']}}" alt=""> &emsp;
            <span >{{ $item_menu['name'] }}</span>
        </span>

    @elseif(isset($item_menu['type']) AND $item_menu['type'] == 'divider')
         <div class="divider"></div>
    @endif
</li>