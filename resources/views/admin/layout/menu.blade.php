
    @foreach ($items as $index => $item_menu)
    @include('admin.layout.menu_node', ['item_menu' => $item_menu, 'level' => $level, 'index' => $index] )
    @endforeach
