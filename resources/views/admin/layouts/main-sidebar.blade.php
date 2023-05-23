<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="#">
            <img src="" class="header-brand-img desktop-logo" alt="logo">
            <img src="" class="header-brand-img toggle-logo" alt="logo">
            <img src="" class="header-brand-img light-logo" alt="logo">
            <img src="" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li>
            <h3>Dashboard</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('users.index') }}">
                <i class="icon icon-home side-menu__icon"></i>
                <span class="side-menu__label">users</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('categories.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">Category</span>
            </a>
        </li>
{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" href="{{ route('index') }}">--}}
{{--                <i class="icon icon-user side-menu__icon"></i>--}}
{{--                <span class="side-menu__label">Admin</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        {{--  @can('roles_and_permission')  --}}
            {{--  <li class="slide">
                <a class="side-menu__item" href="{{ route('roles.index') }}">
                    <i class="fe fe-git-commit side-menu__icon"></i>
                    <span class="side-menu__label">الادوار والصلاحيات</span>
                </a>
            </li>  --}}
        {{--  @endcan  --}}
    </ul>
</aside>