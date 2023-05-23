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
            <a class="side-menu__item" href="{{ route('home') }}">
                <i class="icon icon-home side-menu__icon"></i>
                <span class="side-menu__label">Home</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">Admin</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('deadlines.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.deadlines')}}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('settings.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.settings') }}</span>
            </a>
        </li>
    </ul>
</aside>
