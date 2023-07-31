@include('admin.auth.layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">

    <div class="content-wrapper">

        <div class="content-body container-fluid">

            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-12 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <div class="d-flex justify-content-center">
                                <img style="width: 60%" src="{{ asset('uploads/university_setting/'.$university_settings->logo) }}" />
                            </div>
                            <form class="auth-Active-form mt-2" method="POST" id="ActiveForm" action="{{ route('DoneResetPass') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <label class="form-label" for="password">New Password</label>
                                    <input class="form-control" id="password" type="password" name="password"
                                           placeholder="*********" aria-describedby="email" autofocus=""
                                           tabindex="1"/>
                                    <label class="form-label" for="password">Repeat New Password</label>
                                    <input class="form-control" id="password" type="password" name="repeat_password"
                                           placeholder="**********" aria-describedby="email" autofocus=""
                                           tabindex="1"/>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btnActive-student"
                                        tabindex="4">submit</button>
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
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets') }}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>


<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets') }}/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets') }}/js/core/app-menu.js"></script>
<script src="{{ asset('app-assets') }}/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets') }}/js/scripts/pages/page-auth-login.js"></script>
<!-- END: Page JS-->
