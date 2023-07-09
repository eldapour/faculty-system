<head>
    <meta charset="utf-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY FACULTY</title>
{{--    <link href="{{ asset($settings->logo) }}" rel="icon"/>--}}
    <link href="{{ asset('assets/front/assets/')}}/photo/logo.png" rel="icon" />

    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    {{--  @dd(@lang())  --}}
    <!-- slick plugin -->
    @if(@lang() != 'ar')
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/responsive.css">

    @else
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/rtl.css">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/owl.theme.default.min.css">

    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('assets/front') }}/assets/css/slick.css">



    <!-- rtl -->
    {{--  <!-- <link rel="stylesheet" href="css/rtl.css"> -->  --}}

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Jost:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">






{{--    @toastr_css--}}
    {{--    <link href="{{ asset('assets/front/') }}/assets/css/edit.css" rel="stylesheet" />--}}

{{--    <script>--}}
{{--        (function (w, d, s, l, i) {--}}
{{--            w[l] = w[l] || [];--}}
{{--            w[l].push({"gtm.start": new Date().getTime(), event: "gtm.js"});--}}
{{--            var f = d.getElementsByTagName(s)[0],--}}
{{--                j = d.createElement(s),--}}
{{--                dl = l != "dataLayer" ? "&l=" + l : "";--}}
{{--            j.async = true;--}}
{{--            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;--}}
{{--            f.parentNode.insertBefore(j, f);--}}
{{--        })(window, document, "script", "dataLayer", "GTM-MDF43VH");--}}
{{--    </script>--}}
</head>
