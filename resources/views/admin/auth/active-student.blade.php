@include('admin.auth.layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">

    <div class="content-wrapper">

        <div class="content-body container-fluid">

            <div class="auth-wrapper auth-v2">
                <div class="auth-inner col-12 row justify-content-center">
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-6 col-12 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <div class="d-flex justify-content-center">
                                <img style="width: 100%"
                                     src="{{ asset('uploads/university_setting/'.$university_settings->logo) }}"/>
                            </div>
                            <h2 class="card-title font-weight-bold mb-1">@lang('login.welcome to ')</h2>
                            <p class="card-text mb-2">@lang('login.Account activation')</p>
                            <form class="auth-Active-form mt-2" method="POST" id="ActiveForm"
                                  action="{{ route('activeStudents') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="national_id">@lang('admin.national_id')</label>
                                    <input class="form-control" id="national_id" type="text" name="national_id"
                                           placeholder="XXXXXXXXXXXXXXXX" aria-describedby="email" autofocus=""
                                           tabindex="1"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="national_number">@lang('admin.national_number')
                                        / @lang('admin.department_branch_code')</label>
                                    <input class="form-control" id="national_number" type="text" name="national_number"
                                           placeholder="XXXXXXXXXXXXXXXX" aria-describedby="email" autofocus=""
                                           tabindex="1"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="birthday_date">@lang('admin.birthday_date')</label>
                                    <input class="form-control" id="birthday_date" type="date" name="birthday_date"
                                           placeholder="" aria-describedby="email" autofocus=""
                                           tabindex="1"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">@lang('login.email')</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                           placeholder="john@example.com" aria-describedby="email" autofocus=""
                                           tabindex="1"/>
                                </div>
                                <small
                                    class="text-danger d-none email-error">* @lang('login.This field is required')</small>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="login-password">@lang('login.password')</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" id="password"
                                               type="password" name="password" placeholder="············"
                                               aria-describedby="password" tabindex="2"/>
                                        <div class="input-group-append"><span
                                                class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span></div>
                                    </div>
                                    <small
                                        class="text-danger d-none password-error">* @lang('login.This field is required')</small>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="login-password">@lang('login.confirmPass')</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" id="password"
                                               type="password" name="confirmPassword" placeholder="············"
                                               aria-describedby="password" tabindex="2"/>
                                        <div class="input-group-append"><span
                                                class="input-group-text cursor-pointer"><i
                                                    data-feather="eye"></i></span></div>
                                    </div>
                                    <small
                                        class="text-danger d-none confirmPassword-error">
                                        * @lang('login.This field is required')
                                    </small>
                                    <small
                                        class="text-danger d-none confirmPassword-error2">
                                        * @lang('login.passwords does not match')
                                    </small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btnActive-student"
                                        tabindex="4">@lang('login.Account activation')</button>
                            </form>
                        </div>
                    </div>
                    <!-- /Login-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@include('admin.auth.layouts.footer')
