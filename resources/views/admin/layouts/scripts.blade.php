<!-- DATATABLE CSS -->
<link href="{{asset('assets/admin')}}/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="{{asset('assets/admin')}}/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
<link href="{{asset('assets/admin')}}/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />

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


<link href="{{ asset('assets/admin//css/select2.min.css') }}" rel="stylesheet" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.dropify').dropify();--}}
{{--    });--}}
{{--    @if(auth()->user()->can('CS') || admin()->user()->can('Master'))--}}
{{--    $('#contact-span').load("{{route('getCount')}}")--}}
{{--    $('#nav-span').load("{{route('getCount')}}")--}}
{{--    @endif--}}
{{--    $('.header-brand-img').attr("src","{{asset($setting->logo)}}")--}}
{{--</script>--}}

<script src="{{asset('assets/admin/ckeditor/ckeditor.js')}}"></script>
<script>

    $('.dropify').dropify();

    $(document).ready(function() {
        let userType = '{{ auth()->user()->user_type }}';
        let maintenance = '{{ $maintenance->maintenance }}';

        if(userType == 'student' && maintenance == 1){
            toastr.error('{{ trans('admin.The_platform_is_in_maintenance') }}');
            setTimeout(x => {
                window.location.href = '{{ route('logout') }}';
            }, 2000);

        }
    });
</script>

@yield('js')
