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
                <span class="side-menu__label">{{trans('admin.users')}}</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{route('users.index')}}" class="slide-item">{{trans('admin.all_users')}}</a></li>
                <li><a href="{{route('admins.index')}}" class="slide-item">{{trans('admin.all_admins')}}</a></li>


            </ul>
        </li>


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">طلبات الوثائق</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{route('document_types.index')}}" class="slide-item">انوع الوثائق</a></li>
                <li><a href="{{route('documents.index')}}" class="slide-item">طلبات الوثائق</a></li>


            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">المعنيون بالشواهد والدبلوم</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{route('certificates.index')}}" class="slide-item">شواهد الدبلومات</a></li>


            </ul>
        </li>


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">وثائق الطالب</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">

                <li><a href="{{route('documents.student')}}" class="slide-item">وثائق الطالب</a></li>


            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{ route('departments.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.departments') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{ route('branches.index') }}">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.branches') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('userBranches.index') }}">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.Users_Branches') }}</span>
            </a>
        </li>


        <li class="slide">
            <a class="side-menu__item" href="{{ route('subject_unit_doctor.index') }}">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subject_unit_doctors') }}</span>
            </a>
        </li>


        <li class="slide">
            <a class="side-menu__item" href="{{ route('group.index') }}">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.groups') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{ route('subject.index') }}">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subjects') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('unit.index') }}">
                <i class="fe fe-file-text side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.units') }}</span>
            </a>
        </li>



        <li class="slide">
            <a class="side-menu__item" href="{{ route('subject_student.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subject_students') }}</span>
            </a>
        </li>



        <li class="slide">
            <a class="side-menu__item" href="{{ route('subject_exam_students.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subject_exam_students') }}</span>
            </a>
        </li>


        {{--start website departments--}}

{{--        <li class="slide">--}}
{{--            <a class="side-menu__item" data-toggle="slide" href="#">--}}
{{--                <i class="fe fe-file-text side-menu__icon"></i>--}}
{{--                <span class="side-menu__label">اج</span><i class="angle fa fa-angle-right"></i>--}}
{{--            </a>--}}
{{--            <ul class="slide-menu">--}}
{{--                <li><a href="#" class="slide-item"></a></li>--}}
{{--                <li><a href="#" class="slide-item"></a></li>--}}


{{--            </ul>--}}
{{--        </li>--}}

        {{--end website departments--}}



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
            <a class="side-menu__item" href="{{ route('subject_exams.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subject_exams') }}</span>
            </a>
        </li>



        <li class="slide">
            <a class="side-menu__item" href="{{ route('elements.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.elements') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('process_degrees.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.process_degrees') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('subject_exam_student_result.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.subject_exam_student_results') }}</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('pages.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.pages') }}</span>
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
            <a class="side-menu__item" href="{{ route('university_settings.index') }}">
                <i class="fa fa-video side-menu__icon"></i>
                <span class="side-menu__label">{{ trans('admin.university_settings') }}</span>
            </a>
        </li>
    </ul>
</aside>
