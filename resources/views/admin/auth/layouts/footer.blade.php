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
<style>
    .toast-center-center {
        top: 50%;
        left: 50%;
        width: 900px;
        transform: translate(-50%, -50%);
    }
</style>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    $(document).on('click', '.langBtn', function() {
        let url = $(this).data('url');
        location.href = url;
    })

    $('input[name="email"]').on('keyup', function() {
        let emailErr = $('.email-error');
        if ($(this).val() == '')
            emailErr.removeClass('d-none');
        else
            emailErr.addClass('d-none');
    })

    $('input[name="password"]').on('keyup', function() {
        let passwordErr = $('.password-error');
        if ($(this).val() == '')
            passwordErr.removeClass('d-none');
        else
            passwordErr.addClass('d-none');
    })

    // student login form
    $(document).on('click', '.btnLogin-student', function() {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let type = $('input[name="user_type"]').val();
        let emailErr = $('.email-error');
        let passwordErr = $('.password-error');

        if (email == '') {
            emailErr.removeClass('d-none');
        } else if (password == '') {
            passwordErr.removeClass('d-none');
        } else {
            $.ajax({
                method: 'POST',
                url: '{{ route('login') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email,
                    'password': password,
                    'user_type': type,
                },
                success: function(data) {
                    if (data === 200) {
                        toastr.success('{{ trans('login.Logged in successfully') }}');
                        setTimeout(function () {
                            location.href = '{{ route('admin.home') }}';
                        }, 2000)
                    } else if (data === 700) {} else if (data === 405) {
                        toastr.error('{{ trans('login.The email or password is incorrect') }}');
                    } else if (data === 700) {
                        toastr.error('{{ trans('admin.The_platform_is_in_maintenance') }}');
                    } else if (data === 600) {
                        toastr.error(
                            '{{ trans('admin.This email is not activated. Do it through the link sent to the mail, or contact the administration') }}',
                            null, {
                                "timeOut": "90000000",
                            });
                        setTimeout(E => {
                            window.location.href = '{{ route('logout') }}';
                        }, 3000);
                    }
                },
                error: function(data) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function(key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function(key, value) {
                                toastr.error(value, '{{ trans('login.Error') }}');
                            });
                        }
                    });
                }
            })
        }
    })

    // login form
    $(document).on('click', '.btnLogin', function() {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let type = $('select[name="user_type"]').val();
        let emailErr = $('.email-error');
        let passwordErr = $('.password-error');

        if (email == '') {
            emailErr.removeClass('d-none');
        } else if (password == '') {
            passwordErr.removeClass('d-none');
        } else {
            $.ajax({
                method: 'POST',
                url: '{{ route('login') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'email': email,
                    'password': password,
                    'user_type': type,
                },
                success: function(data) {
                    if (data === 200) {
                        toastr.success('{{ trans('login.Logged in successfully') }}');
                        setTimeout(function() {
                            location.href = '{{ route('admin.home') }}';
                        }, 2000)
                    } else if (data === 405) {
                        toastr.error('{{ trans('login.The email or password is incorrect') }}');
                    }
                },
                error: function(data) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function(key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function(key, value) {
                                toastr.error(value, '{{ trans('login.Error') }}');
                            });
                        }
                    });
                }
            })
        }
    })


    $(document).on('submit', 'Form#ActiveForm', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $('#ActiveForm').attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function() {
                $('#addButton').html('<span class="spinner-border spinner-border-sm mr-2" ' +
                    ' ></span> <span style="margin-left: 4px;">{{ trans('admin.wait') }} ..</span>'
                ).attr(
                    'disabled', true);
            },
            success: function(data) {
                if (data == 200) {
                    toastr.success(
                        ' {{ trans('login.Account activation') . ' ' . trans('admin.Loading') }} '
                    );
                    setTimeout(x => {
                         window.location.href = '{{ route('emailSentBack') }}';
                    }, 3000)
                } else if (data == 401) {
                    toastr.error('{{ trans('admin.This email has already been activated') }}');
                } else if (data == 600)
                    toastr.error('{{ trans('admin.Verify that the data is correct and try again') }}');
            },
            error: function(data) {
                if (data.status === 500) {
                    toastr.error(' {{ trans('admin.something_went_wrong') }} ..');
                } else if (data.status === 422) {
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors, function(key, value) {
                        if ($.isPlainObject(value)) {
                            $.each(value, function(key, value) {
                                toastr.error(value, '{{ trans('admin.wrong') }}');
                            });
                        }
                    });
                } else
                    toastr.error('{{ trans('admin.something_went_wrong') }} ..');
                $('#addButton').html(`{{ trans('admin.add') }}`).attr('disabled', false);
            }, //end error method

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
</body>
<!-- END: Body-->

</html>
