<div class="comlum-sidebar">
    <div class="companyLabel">
        <span class="item"><img src="{{URL::asset('assets/vendor/images/common/icon-company.svg')}}" alt=""></span>
        <div class="company-info">
            <p class="company-name">{{trans('vendor/common.header.company_name')}}</p>
            <p class="company-txt">{{trans('vendor/common.header.company_text')}}</p>
        </div>
    </div>
    <div class="navSidebar">
        @isset($menu)
            @include('vendor.layout.menu', ['items' => $menu, 'level' => 1])
        @endif
    </div>
</div>
