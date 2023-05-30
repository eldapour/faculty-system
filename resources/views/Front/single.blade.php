@extends('Front.layouts.master')

@section('content')
    <div class="module-content module-search-warp">
        <div class="pos-vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                        <form class="form-search">
                            <input class="form-control" type="text" placeholder="type words then enter" />
                            <button></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="module-cancel" href="#"><i class="fas fa-times"></i></a>
    </div>

    <section class="page-title page-title-blank bg-white" id="page-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="d-none">
                        High Efficiency Solar Cells For Manufacturers
                    </h3>
                    <div class="breadcrumb-wrap">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('product') }}">@lang('site.products')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ trans_model($product, 'title') }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="single-product" id="single-product">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="main-slider slider-right">
                        @foreach ($product->images as $image)
                            <div class="product-img">
                                <img class="img-fluid" src="{{ asset($image) }}" alt="product image" />
                                <a href="{{ asset($image) }}" class="img-popup" alt="product image"></a>
                            </div>
                        @endforeach


                    </div>
                    <div class="small-slider">
                        @foreach ($product->images as $image)
                            <img style="width: 179px;height: 120px;padding: 15px" class="img-fluid"
                                src="{{ asset($image) }}" alt="product image" />
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="product-content">
                        <div class="product-title">
                            <h3>{{ trans_model($product, 'title') }}</h3>
                        </div>

                        <div class="product-review">
                            {{--                            <div class="product-rating"> --}}
                            {{--                                <i class="fas fa-star active"></i><i class="fas fa-star active"></i><i --}}
                            {{--                                    class="fas fa-star active"></i><i class="fas fa-star active"></i><i --}}
                            {{--                                    class="fas fa-star"></i> --}}
                            {{--                            </div> --}}
                            <!-- <span>5 Review(s)</span
                                        ><span><a href="#">Add Review</a></span> -->
                        </div>

                        <!-- <div class="product-price"><span>$15.00</span></div> -->

                        <div class="product-desc">
                            <p>
                                {{ trans_model($product, 'sub_title') }}
                            </p>
                        </div>
                        <div class="product-details">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="name">{{ lang() == 'ar' ? 'كود التخزين التعريفي' : 'SKU' }}:</td>
                                        <td class="value">{{ $product->sku }}</td>
                                    </tr>
                                    <tr>
                                        <td class="name">@lang('site.categories'):</td>
                                        <td class="value">
                                            {{ lang() == 'ar' ? $product->category->title_ar : $product->category->title_en }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="name">{{ lang() == 'ar' ? 'العلامات' : 'tags' }}:</td>
                                        <td class="value">{{ implode(' , ', $product->tags) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="product-share">
                            <a class="facebook-bg" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a><a
                                class="twitter-bg" href="javascript:void(0)"><i class="fab fa-twitter"></i></a><a
                                class="pinterest-bg" href="javascript:void(0)"><i class="fab fa-pinterest"></i></a><a
                                class="instagram-bg" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <form action="{{ route('quoteIndex') }}" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit"
                                class="btn btn-primary">{{ lang() == 'ar' ? 'اطلب الان' : 'Order Now' }}</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation">
                                <a class="active" href="#description" data-bs-target="#description"
                                    aria-controls="description" role="tab" data-bs-toggle="tab"
                                    aria-selected="true">{{ lang() == 'ar' ? 'وصف' : 'Description' }}</a>
                            </li>
                            <li role="presentation">
                                <a href="#details" data-bs-target="#details" aria-controls="details" role="tab"
                                    data-bs-toggle="tab"
                                    aria-selected="false">{{ lang() == 'ar' ? 'معلومات المواصفات' : 'specification information' }}</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="description" role="tabpanel">
                                <p>
                                    {{ trans_model($product, 'desc') }}
                                </p>
                            </div>

                            <div class="tab-pane" id="details" role="tabpanel">
                                <div class="html2pdf">
                                    <h5>{{ lang() == 'ar' ? 'تفاصيل تقنية' : 'Technical Details' }}</h5>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>{{ lang() == 'ar' ? 'رقم القطعة' : 'Part Number' }}</td>
                                                <td>{{ $product->part_number }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ lang() == 'ar' ? 'وزن السلعة' : 'Item Weight' }}</td>
                                                <td>{{ $product->weight }} pounds</td>
                                            </tr>
                                            <tr>
                                                <td>{{ lang() == 'ar' ? 'ابعاد المنتج' : 'Product Dimensions' }}</td>
                                                <td>{{ $product->dimensions }} inches</td>
                                            </tr>
                                            <tr>
                                                <td>{{ lang() == 'ar' ? 'رقم موديل السلعة' : 'Item model number' }}</td>
                                                <td>{{ $product->model_number }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <a href="">
                                        <button>

                                            <a href="{{ asset($product->pdf) }}"
                                                download="product pdf-{{ $product->id }}">{{ lang() == 'ar' ? 'تحميل PDF' : 'download pdf' }}</a>

                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop shop-2">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>@lang('site.recent products')</h5>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="product-item" data-hover="">
                            <div class="product-img-wrap">
                                <div class="product-img">
                                    <img src="{{ asset($item->images[0]) }}" alt="Product" />
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-title">
                                    <a href="{{ route('get.product', $item->id) }}">{{ trans_model($item, 'title') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    <div class="" id="details-print" hidden>
        <div class="">
            <img style="width: 165px;margin: 12px" src="{{ asset($settings->logo) }}" />
            <h2 style="text-align: center;margin-bottom: 20px">{{ trans_model($product, 'title') }}</h2>
            <hr>
            <h3 style="margin-bottom: 30px">{{ lang() == 'ar' ? 'تفاصيل تقنية' : 'Technical Details' }}</h3>

            <table class="table table-bordered center">
                <thead>
                    <th>{{ lang() == 'ar' ? 'رقم القطعة' : 'Part Number' }}</th>
                    <th>{{ lang() == 'ar' ? 'وزن السلعة' : 'Item Weight' }}</th>
                    <th>{{ lang() == 'ar' ? 'ابعاد المنتج' : 'Product Dimensions' }}</th>
                    <th>{{ lang() == 'ar' ? 'رقم موديل السلعة' : 'Item model number' }}</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->part_number }} </td>
                        <td>{{ $product->weight }} pounds </td>
                        <td>{{ $product->dimensions }} inches </td>
                        <td>{{ $product->model_number }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script type="text/javascript">
        $('#product-print').on('click', function(e) {
            e.preventDefault();

            var prtContent = document.getElementById("details-print");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(
                '<html><head> <title>{{ trans_model($product, 'title') }}</title><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"></head><body>' +
                prtContent.innerHTML + '</body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            // WinPrint.close();
        })
    </script>
@endsection
