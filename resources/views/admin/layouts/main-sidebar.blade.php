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

{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" href="{{ route('users.index') }}">--}}
{{--                <i class="icon icon-home side-menu__icon"></i>--}}
{{--                <span class="side-menu__label">users</span>--}}
{{--            </a>--}}
{{--        </li>--}}


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">المستخدمين</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{route('users.index')}}" class="slide-item">جميع الطلبه</a></li>
{{--                <li><a href="{{route('users.all','doctor')}}" class="slide-item">جميع الدكاتره</a></li>--}}
{{--                <li><a href="{{route('users.all','employee')}}" class="slide-item">جميع موظفي الشئؤن</a></li>--}}
{{--                <li><a href="{{route('users.all','factor')}}" class="slide-item">جميع العاملين</a></li>--}}
{{--                <li><a href="{{route('users.all','manger')}}" class="slide-item">جميع الادمن</a></li>--}}

            </ul>
        </li>

        <li class="slide">

            <a class="side-menu__item" href="{{ route('categories.index') }}">

                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.categories') }}</span>
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
        <li class="slide">
            <a class="side-menu__item" href="{{ route('services.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.services') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('departments.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.departments') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('branches.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.branches') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('userBranches.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.Users_Branches') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('sliders.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.sliders') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('word.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.wordManager') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('internal_ads.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.internal_ads') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('video.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.videos') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('advertisements.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.ads') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('presentations.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.presentations') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('group.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.groups') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('subject.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subjects') }}</span>
            </a>
        </li>
    </ul>
</aside>
