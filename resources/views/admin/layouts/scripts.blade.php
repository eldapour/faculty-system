<!-- DATATABLE CSS -->
<link href="{{asset('assets/admin')}}/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet"/>
<link href="{{asset('assets/admin')}}/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet"/>
<link href="{{asset('assets/admin')}}/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet"/>

<!-- JQUERY JS -->
<script src="{{asset('assets/admin')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{asset('assets/admin/js/bootstrap4-toggle.min.js')}}"></script>

<!-- DATATABLE JS -->
<script src="{{asset('assets/admin')}}/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/datatable.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/jszip.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/pdfmake.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/vfs_fonts.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/buttons.html5.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/buttons.print.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/datatable/fileexport/buttons.colVis.min.js"></script>


<link href="{{ asset('assets/admin//css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('assets/admin//js/select2.min.js') }}"></script>


<!-- BOOTSTRAP JS -->
<script src="{{asset('assets/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/bootstrap/js/popper.min.js"></script>

<!-- SPARKLINE JS-->
<script src="{{asset('assets/admin')}}/js/jquery.sparkline.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{asset('assets/admin')}}/js/circle-progress.min.js"></script>

<!-- RATING STARJS -->
<script src="{{asset('assets/admin')}}/plugins/rating/jquery.rating-stars.js"></script>

<!-- EVA-ICONS JS -->
<script src="{{asset('assets/admin')}}/iconfonts/eva.min.js"></script>

<!-- INPUT MASK JS-->
<script src="{{asset('assets/admin')}}/plugins/input-mask/jquery.mask.min.js"></script>

<!-- SIDE-MENU JS-->
<script src="{{asset('assets/admin')}}/plugins/sidemenu/sidemenu.js"></script>

{{--<!-- PERFECT SCROLL BAR js-->--}}
<script src="{{asset('assets/admin')}}/plugins/p-scroll/perfect-scrollbar.min.js"></script>
<script src="{{asset('assets/admin')}}/plugins/sidemenu/sidemenu-scroll.js"></script>

<!-- CUSTOM SCROLLBAR JS-->
<script src="{{asset('assets/admin')}}/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- SIDEBAR JS -->
<script src="{{asset('assets/admin')}}/plugins/sidebar/sidebar.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('assets/admin')}}/js/custom.js"></script>


<!-- Switcher JS -->
<script src="{{asset('assets/admin')}}/switcher/js/switcher.js"></script>

<!-- dropify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<!-- toastr JS -->
<script type="text/javascript" src="{{ asset('assets/admin/toastr/toastr.js') }}"></script>


<script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/admin/js/dropify.js')}}"></script>

{{--owl carousel --}}
<script src="{{ asset('assets/front/') }}/assets/js/owl.carousel.min.js"></script>


<script>

    $('.dropify').dropify();

    $(document).ready(function () {
        let userType = '{{ auth()->user()->user_type }}';
        let maintenance = '{{ $maintenance->maintenance }}';

        if (userType == 'student' && maintenance == 1) {
            toastr.error('{{ trans('admin.The_platform_is_in_maintenance') }}');
            setTimeout(x => {
                window.location.href = '{{ route('logout') }}';
            }, 2000);

        }
    });

    $(document).ready(function () {
        let userType = '{{ auth()->user()->user_type }}';
        let active = '{{ auth()->user()->user_status }}';

        if (userType == 'student' && active == 'un_active') {
            toastr.error('{{ trans('admin.logout') }}');
            setTimeout(x => {
                window.location.href = '{{ route('logout') }}';
            }, 2000);

        }
    });

    var loader = `<div class="linear-background">
                            <div class="inter-crop"></div>
                            <div class="inter-right--top"></div>
                            <div class="inter-right--bottom"></div>
                        </div>`;

    @php
        $period = \App\Models\Period::query()
            ->where('status', '=', 'start')
            ->first();

        $reregistration = \App\Models\DepartmentBranchStudent::query()
        ->where('user_id', '=', Auth::user()->id)
        ->where('register_year','=',$period->year_start)
        ->where('register_year','<',$period->year_end)
        ->first();
    @endphp


    @if($reregistration)
    @if($reregistration->branch_restart_register == 0)
    $(document).ready(function () {
        if ({{ auth()->user()->user_type == 'student' && $university_settings->reregister_end > \Carbon\Carbon::now() }}) {
            $('#RegisterForm-body').html(loader)
            $('#RegisterForm').modal('show')
            setTimeout(function () {
                $('#RegisterForm-body').load('{{ route('reregisterForm') }}')
            }, 250)
        }
    })
    @endif
    @endif



    $(document).ready(function () {
        // Get the modal
        var modal = $('#RegisterForm');

        $(window).click(function (event) {
            if (event.target == modal[0]) {
                // Modal cannot be closed
                return false;
            }
        });
    });

</script>


<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 1000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
    }
</script>


@yield('js')
