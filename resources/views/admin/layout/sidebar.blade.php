<div class="sidebar scrollbar" id="toggled">
    <div class="sideBar-top flexbox-sidebar ">
        <div class="logo">
            <a href="#"><img src="{{asset('/assets/admin/images/data/logo.svg')}}" alt=""></a>
        </div>
        <button class="toogle-menu">
            <i class="icon-bar fas fa-bars"></i>
        </button>
    </div>
    <div class="gNav ">
        <ul id="menu" class="border-0 menu menu-0">

            @isset($menus)
            @include('admin.layout.menu', ['items' => $menus, 'level' => 1])
            @endif
        </ul>
    </div>
    <hr>
</div>