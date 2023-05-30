@extends('Front.layouts.master')

@section('content')

    <div class="module-content module-search-warp">
        <div class="pos-vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                        <form class="form-search">
                            <input class="form-control" type="text" placeholder="type words then enter"/>
                            <button></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="module-cancel" href="#"><i class="fas fa-times"></i></a>
    </div>

    <section class="page-title page-title-14" id="page-title">
        <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
            <div class="bg-section">
                <img src="{{ asset('assets/front') }}/assets/images/page-titles/14.jpg" alt="Background"/>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="title">
                            <h1 class="title-heading">@lang('site.requesta_quote')</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact contact-4" id="contact-4">
        <div class="container">
            <div class="contact-panel contact-panel-3">
                <div class="heading heading-6">
                    <p class="heading-subtitle">
                        @lang('site.How_can_network_connected')
                    </p>
                    <h2 class="heading-title">
                        @lang('site.discover_independence')
                    </h2>
                    <p class="heading-desc">
                        @lang('site.enhancing_sustainability')
                    </p>
                    <div class="advantages-list-holder">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="list-unstyled advantages-list advantages-list-3">
                                    <li>@lang('site.Reliabe and performance')</li>
                                    <li>@lang('site.Solar material financing')</li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <ul class="list-unstyled advantages-list advantages-list-3">
                                    <li>@lang('site.50% more energy output')</li>
                                    <li>@lang('site.In-time manufacturing')</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="contact-action">
                        <a class="btn btn--primary" href="{{ route('about_us') }}">@lang('site.learn more') <i
                                class="energia-arrow-right"></i></a><a class="btn btn--bordered btn--white"
                                                                       href="{{ route('faqs') }}">@lang('site.our core values')</a>
                    </div>
                    <div class="contact-quote contact-quote-3">
                        <img src="{{ asset('assets/front') }}/assets/images/icons/noteicon-2.png" alt="icon"/>
                        <p>
                            @lang('site.Receive an accurate')
                            <a href="{{ $settings->phone }}">{{ $settings->phone }}</a>
                        </p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="contact-body">
                        <h5 class="card-heading">@lang('site.request a quote')</h5>
                        <p class="card-desc">
                            @lang('site.We take great pride')
                        </p>
                        <form id="quoteForm" class="form-qoute" method="post">
                            @csrf
                            <div class="mb-20">
                                <div class="row">
                                    <div class="mb-20">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="contact-first-name">@lang('site.First name')</label>
                                                <input class="form-control" type="text" id="contact-first-name"
                                                       name="first_name" placeholder="@lang('site.First name')" required=""/>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="contact-last-name">@lang('site.Last name')</label>
                                                <input class="form-control" type="text" id="contact-last-name"
                                                       name="last_name" placeholder="@lang('site.Last name')" required=""/>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="contact-phone">@lang('site.Phone')</label>
                                                <input class="form-control" type="text" id="contact-phone" name="phone"
                                                       placeholder="@lang('site.Phone')" required=""/>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="contact-email">@lang('site.Email')</label>
                                                <input class="form-control" type="email" id="contact-email" name="email"
                                                       placeholder="@lang('site.Email')" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label" for="contact-address">@lang('site.Street address')</label>
                                                <input class="form-control" type="text" id="contact-address"
                                                       name="address" placeholder="@lang('site.write street address')" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    @if($product)
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div>
                                            <div class="row">
                                                <div class="widget-content ">
                                                    <div class="product" style="display: flex;margin-bottom: 15px;">
                                                        <div class="product-img">
                                                            <img src="{{ asset($product->images[0]) }}"
                                                                 style="width: 130px;border-radius: 25px;" alt="product"/>
                                                        </div>
                                                        <div class="product-desc">
                                                            <div class="product-title">
                                                                <h5 style="position: absolute;margin: 30px 0px 0px 38px">
                                                                    {{ trans_model($product, 'title') }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                    <div>
                                        <div class="row">
                                            <div class="widget-title">
                                                <h5>@lang('site.select product')</h5>
                                            </div>
                                            <div class="widget-content">
                                                <select class="form-control" name="product_id">
                                                   @foreach($products as $product)
                                                       <option value="{{ $product->id }}">
                                                           <div>
                                                                {{ trans_model($product,'title') }}
                                                           </div>
                                                       </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        @endif
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="widget-content product-qoute">

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="widget-content loading-qoute">

                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn--secondary w-100" id="quote-btn" type="button">
                                                @lang('site.submit request') <i class="energia-arrow-right"></i>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="contact-result load-contact"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        {{--$('#select-product').on('change', function () {--}}

        {{--    // var selectVal = $("#selectId option:selected").val();--}}
        {{--    console.log('aaa');--}}
        {{--    $.ajax({--}}
        {{--        type: 'get',--}}
        {{--        url: '{{ route('quoteSearch') }}',--}}
        {{--        data: {--}}
        {{--            'search': $value--}}
        {{--        },--}}
        {{--        beforeSend: function (data) {--}}
        {{--            $('.product-qoute').html('<h5>loading ...</h5>');--}}
        {{--        },--}}
        {{--        success: function (data) {--}}
        {{--            // alert(data)--}}
        {{--            $('.product-qoute').html(data);--}}
        {{--        },--}}
        {{--        error: function (data) {--}}
        {{--            $('.product-qoute').html('<h2 class="error">NO PRODUCT FOUND</h2>');--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        $('#quote-btn').on('click', function (e) {
            e.preventDefault();
            // var form = $('#contact-form');
            var formData = new FormData(document.getElementById("quoteForm"));
            // alert(formData.message);
            $.ajax({
                'method': 'post',
                'type': 'POST',
                'data': formData,
                '_token': "{{ csrf_token() }}",
                'url': "{{ route('quoteStore') }}",
                beforeSend: function (data) {
                    $('.load-contact').html('Loading ... ');
                },
                success: function (data) {
                    if (data.status === 200) {
                        toastr.success('Quote send success');
                        $('.load-contact').html('');
                        $('#quoteForm input').val('');
                    }
                },
                error: function (data) {
                    if (data.status === 500) {
                        toastr.error('error sending message !!');
                    } else if (data.status === 422) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                            // alert(value);
                            if ($.isPlainObject(value)) {
                                $.each(value, function (key, value) {
                                    toastr.error('' + value);
                                    // alert(value);
                                });
                            }
                            $('.load-contact').html('error');
                        });
                        $('.load-contact').html('error');
                    }
                }

                ,
                cache: false,
                processData: false,
                contentType: false
            })
        })
    </script>
@endsection
