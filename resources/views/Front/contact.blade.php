@extends('Front.layouts.master')

@section('content')

    <div class="module-content module-search-warp">
        <div class="pos-vertical-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                        <form class="form-search">
                            <input
                                class="form-control"
                                type="text"
                                placeholder="type words then enter"
                            />
                            <button></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a class="module-cancel" href="#"><i class="fas fa-times"></i></a>
    </div>

    <section class="map map-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="d-none">@lang('site.our office map')</h3>
                </div>
            </div>
        </div>
        <iframe
            src="{{ $settings->location }}"
            width="600"
            height="450"
            style="border: 0"
        ></iframe>
    </section>

    <section class="testimonial testimonial-5 bg-overlay bg-overlay-white2">
        <div class="bg-section">
            <img
                src="assets/images/background/wavy-pattern.png"
                alt="background"
            />
        </div>
        <div class="container">
            <div class="contact-panel contact-panel-2">
                <div class="row">
                    <div class="col-12 col-lg-5 img-card-holder">
                        <div class="img-card img-card-2 bg-overlay bg-overlay-theme">
                            <div class="bg-section">
                                <img src="assets/images/contact/2.jpg" alt="image"/>
                            </div>
                            <div class="card-content">
                                <div class="content-top">
                                    <p>
                                        {{ trans('site.how_the_integration') }}
                                    </p>
                                    <a href="{{ route('contact') }}"
                                    ><i class="energia-arrow-right"></i>@lang('site.our office map')</a
                                    >
                                </div>
                                <div class="content-bottom">
                                    <ul class="list-unstyled contact-infos">
                                        <li class="contact-info">
                                            <i class="energia-phone-Icon"></i>
                                            <p>
                                                @lang('site.Emergency Line'):
                                                <a href="tel:123-456-7890">(002) 01061245741</a>
                                            </p>
                                        </li>
                                        <li class="contact-info">
                                            <i class="energia-location-Icon"></i>
                                            <p>
                                                @lang('site.Location'):
                                                <a
                                                    href="#"
                                                >{{ trans_model($settings,'address') }}
                                                </a>
                                            </p>
                                        </li>
                                        <li class="contact-info">
                                            <i class="energia-clock-Icon"></i>
                                            <p>{{ $settings->work_date }}</p>
                                        </li>
                                    </ul>
                                    <a class="btn btn--white" href="{{ route('about_us') }}"
                                    >@lang('site.about us') <i class="energia-arrow-right"></i
                                        ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="contact-card">
                            <div class="contact-body">
                                <h5 class="card-heading">@lang('site.get in touch')</h5>
                                <p class="card-desc">
                                    @lang('site.contact_desc')
                                </p>
                                <form
                                    class="contactForm"
                                    id="contactForm"
                                >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="contact-name"
                                                name="name"
                                                placeholder="@lang('site.name')"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input
                                                class="form-control"
                                                type="email"
                                                id="contact-email"
                                                name="email"
                                                placeholder="@lang('site.email')"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="contact-phone"
                                                name="phone"
                                                placeholder="@lang('site.phone')"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-control" id="select-1" required name="services">
                                                <option value="">
                                                    @lang('site.select your services')
                                                </option>
                                                @foreach($services as $service)
                                                   <option value="{{ $service->id }}">{{ trans_model($service,'title') }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                          <textarea
                              class="form-control"
                              id="contact-infos"
                              placeholder="@lang('site.additional information')"
                              name="message"
                              cols="30"
                              rows="10"
                          ></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn--secondary" id="contact-btn">
                                                @lang('site.send request') <i class="energia-arrow-right"></i>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="contact-result load-contact">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $('#contact-btn').on('click', function (e) {
            e.preventDefault();
            // var form = $('#contact-form');
            var formData = new FormData(document.getElementById("contactForm"));
            // alert(formData.message);
            $.ajax({
                'method': 'post',
                'type': 'POST',
                'data': formData,
                '_token': "{{ csrf_token() }}",
                'url': "{{ route('contactStore') }}",
                beforeSend: function (data) {
                    $('.load-contact').html('Loading ... ');
                },
                success: function (data) {
                    if (data.status === 200) {
                        toastr.success('message send success');
                        $('#contactForm input').val('');
                        $('.load-contact').html('');
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
                                    toastr.error(''+value);
                                    // alert(value);
                                });
                            }
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
