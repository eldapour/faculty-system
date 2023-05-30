@extends('Front.layouts.master')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <section class="page-title page-title-9" id="page-title">
        <div class="page-title-wrap bg-overlay bg-overlay-dark-2">
            <div class="bg-section">
                <img src="{{ asset($slider->image_product) }}" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="title text-center">
                            <h1 class="title-heading">@lang('site.products')</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrap">
            <div class="container">
                <ol class="breadcrumb d-flex">
                    <li class="breadcrumb-item"><a href="index.html">@lang('site.home')</a></li>
                    <li class="breadcrumb-item"><a href="">@lang('site.company')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('site.shop')</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="shop" id="shop">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-options">
                                <div class="products-show">
                                    <p>@lang('site.showing') {{ $products->count() }} @lang('site.of') {{ \App\Models\Product::count() }}
                                        @lang('site.products')</p>
                                </div>
                                <div class="products-sort">
                                    <div class="select-holder">
                                        <select class="product-sort" id="product-sort">
                                            <option value="default" selected>@lang('site.default')</option>
                                            <option value="new">@lang('site.Newest Products')</option>
                                            <option value="old">@lang('site.oldest Products')</option>
                                        </select>
                                        <button style="width: 100px;height: 60px;" class="btn btn-sm btn-primary"
                                                type="button" id="sort-btn">@lang('site.filter')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row product-search">

                        @foreach ($products as $product)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="product-item" data-hover="">
                                    <div class="product-img-wrap">
                                        <div class="product-img">
                                            <img src="{{ asset($product->images[0]) }}" alt="Product" />
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <div class="product-title">
                                            <a href="{{ route('get.product', $product->id) }}">{{ trans_model($product,'title') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-categories">
                            <div class="widget-title">
                                <h5>@lang('site.categories')</h5>
                            </div>
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    <li>
                                        <a data-id="all" class="category-sort">
                                            @lang('site.All products')
                                        </a>
                                        <span>{{ $products->count() }}</span>
                                    </li>
                                </ul>
                            </div>
                            @foreach ($categories as $category)
                                <div class="widget-content">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a data-id="{{ $category->id }}" class="category-sort">
                                                {{ trans_model($category, 'title') }}
                                            </a>
                                            <span>{{ $category->product->count() }}</span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>

                        <div class="widget widget-search">
                            <div class="widget-title">
                                <h5>@lang('site.search')</h5>
                            </div>
                            <div class="widget-content">
                                <form class="form-search">
                                    <div class="input-group">
                                        <input class="form-control search" type="text"
                                               placeholder="Search for products or SKU" name="search" id="search" /><span
                                            class="input-group-btn">
                                            <button class="btn" id="btn-search" type="button">
                                                <i class="energia-search-Icon"></i></button></span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="widget widget-recent-products">
                            <div class="widget-title">
                                <h5>@lang('site.recent products')</h5>
                                <?php $recents = \App\Models\Product::latest()
                                    ->take(3)
                                    ->get(); ?>
                            </div>
                            <div class="widget-content">
                                @foreach ($recents as $recent)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ asset($recent->images[0]) }}" alt="product" />
                                        </div>
                                        <div class="product-desc">
                                            <div class="product-title">
                                                <a
                                                    href="{{ route('get.product', $recent->id) }}">{{ trans_model($recent, 'title') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        var loader = $('<div class="preloader"><div class="dual-ring"></div></div>');

        $('.search').on('keyup', function() {
            $value = $(this).val();

            $.ajax({
                type: 'get',
                url: '{{ route('product-search') }}',
                data: {
                    'search': $value
                },
                beforeSend: function(data) {
                    $('.product-search').html(loader);
                },
                success: function(data) {
                    // alert(data)
                    $('.product-search').html(data);
                },
                error: function(data) {
                    $('.product-search').html('<h2 class="error">{{ lang() == 'ar' ? 'لا يوجد منتجات' : 'NO PROJECT FOUND' }}</h2>');
                }
            });
        });

        $('#sort-btn').on('click', function(e) {
            e.preventDefault();
            // alert($('#product-sort option:selected').val());
            var filter = $('#product-sort option:selected').val();
            $.ajax({
                type: 'get',
                url: '{{ route('product-filter') }}',
                data: {
                    'filter': filter
                },
                beforeSend: function(data) {
                    $('.product-search').html(loader);
                },
                success: function(data) {
                    // alert(data)
                    $('.product-search').html(data);
                },
                error: function(data) {
                    $('.product-search').html('<h2 class="error">{{ lang() == 'ar' ? 'لا يوجد منتجات' : 'NO PROJECT FOUND' }}</h2>');
                }
            });
        });

        $('.category-sort').on('click', function(e) {
            e.preventDefault();


            var id = $(this).data('id');
            // alert(id);

            $.ajax({
                type: 'get',
                url: '{{ route('categorySort') }}',
                data: {
                    'id': id
                },
                beforeSend: function(data) {
                    $('.product-search').html(loader);
                },
                success: function(data) {
                    // alert(data)
                    $('.product-search').html(data);
                },
                error: function(data) {
                    $('.product-search').html('<h2 class="error">{{ lang() == 'ar' ? 'لا يوجد منتجات' : 'NO PROJECT FOUND' }}</h2>');
                }
            });
        });

        {{-- $.ajax({ --}}
        {{--    type: 'get', --}}
        {{--    url: '{{ route('product-search') }}', --}}
        {{--    data: {'search': $value}, --}}
        {{--    beforeSend: function (data) { --}}
        {{--        $('.product-search').html(loader); --}}
        {{--    }, --}}
        {{--    success: function (data) { --}}
        {{--        // alert(data) --}}
        {{--        $('.product-search').html(data); --}}
        {{--    }, --}}
        {{--    error: function (data) { --}}
        {{--        $('.product-search').html('<h2 class="error">{{ lang() == 'ar' ? 'لا يوجد منتجات' : 'NO PROJECT FOUND' }}</h2>'); --}}
        {{--    } --}}
        {{-- }); --}}
    </script>
@endsection
