<!DOCTYPE html>
<html>
  @include('front.layouts.head')
  <body>

    @include('front.layouts.header')
    @include('front.layouts.nav')

      @yield('content')

    @include('front.layouts.footer')







{{--    @toastr_js--}}
{{--    @toastr_render--}}

    <script src="{{ asset('assets/front/') }}/assets/js/jquery-1.10.1.min.js"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/slick.min.js"></script>

    <script src="{{ asset('assets/front/') }}/assets/js/plugin.js"></script>

    <script src="{{ asset('assets/front/') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/all.min.js"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/vendor.js"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/functions.js"></script>
    <!-- slick plugin -->
    <script src="{{ asset('assets/front/') }}/assets/js/slick.min.js"></script>
    <script src="{{ asset('assets/front/') }}/assets/js/plugin.js"></script>

    <script src="{{ asset('assets/front/') }}/assets/js/main.js"></script>
  </body>
</html>
