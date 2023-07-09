@if($maintenance->maintenance == 1)
   @include('admin.error.maintenance')
@else
    <!DOCTYPE html>
    <html>
    @include('front.layouts.head')
    <body>

    @include('front.layouts.header')
    @include('front.layouts.nav')

    @yield('content')

    @include('front.layouts.footer')

    </body>
    </html>
@endif

