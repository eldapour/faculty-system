<head>
    <meta charset="utf-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $university_settings->title }}</title>
    <link href="{{ logo()  }}" rel="icon" />

    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Jost:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
