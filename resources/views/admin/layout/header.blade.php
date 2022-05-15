<div class="headeTop">
    <div class="headeTop-info">
        <div class="headeTop-title">
            <h1 class="title"><span class="title-item">
                    @if(isset($admin_icon_page))
                    <img class="svg" src="{{ asset($admin_icon_page) }}"></span>{{ trans($meta['title']) }}
                @endif
            </h1>
            @if(isset($admin_btn_add))
            <a class="btn btn-primary" href="{{ route($admin_btn_add['action']) }}">{{ trans($admin_btn_add['title']) }}</a>
            @endif
        </div>
    </div>
    <div class="headeTop-user">
        <nav class="navbar navbar-expand-sm">
            <!-- Links -->
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <img src="{{asset('/assets/admin/images/data/thumb-user.png')}}" alt="">
                            </span> {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a>
                            <a class="dropdown-item" href="#">Change password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><img src="{{asset('/assets/admin/images/common/icon-logOut.svg')}}" alt=""> ログアウト </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>