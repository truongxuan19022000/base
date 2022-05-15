<ul>
    @foreach ($items as $item_menu)
    @include('vendor.layout.menu_node', ['item_menu' => $item_menu, 'level' => $level])
    @endforeach
</ul>