<div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ request()->routeIs('dashboard', 'admin-faqs.*', 'admin.testimonials.*') ? 'here show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
        <span class="menu-title">Dashboards</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Default</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-faqs.*') ? 'active' : '' }}"
                href="{{ route('admin-faqs.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Create FAQs') }}</span>
            </a>
        </div>
    </div>
    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"
                href="{{ route('admin.testimonials.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Testimonials') }}</span>
            </a>
        </div>
    </div>
</div>

<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item pt-5">
    <!--begin:Menu content-->
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
    </div>
    <!--end:Menu content-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ request()->routeIs('user-management.*') ? 'here show' : '' }}">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
        <span class="menu-title">User Management</span>
        <span class="menu-arrow"></span>
    </span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('user-management.users.*') ? 'active' : '' }}"
                href="{{ route('user-management.users.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Users</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('user-management.roles.*') ? 'active' : '' }}"
                href="{{ route('user-management.roles.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Roles</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('user-management.permissions.*') ? 'active' : '' }}"
                href="{{ route('user-management.permissions.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Permissions</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
    </div>
    <!--end:Menu sub-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item pt-5">
    <!--begin:Menu content-->
    <div class="menu-content">
        <span class="menu-heading fw-bold text-uppercase fs-7">Help</span>
    </div>
    <!--end:Menu content-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities" target="_blank">
        <span class="menu-icon">{!! getIcon('rocket', 'fs-2') !!}</span>
        <span class="menu-title">Components</span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs" target="_blank">
        <span class="menu-icon">{!! getIcon('abstract-26', 'fs-2') !!}</span>
        <span class="menu-title">Documentation</span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--begin:Menu item-->
<div class="menu-item">
    <!--begin:Menu link-->
    <a class="menu-link" href="https://preview.keenthemes.com/laravel/metronic/docs/changelog" target="_blank">
        <span class="menu-icon">{!! getIcon('code', 'fs-2') !!}</span>
        <span class="menu-title">Changelog v8.2.8</span>
    </a>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
