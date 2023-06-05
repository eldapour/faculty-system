{{-- <footer class="footer footer-1"> --}}
{{--    <div class="footer-top"> --}}
{{--        <div class="container"> --}}
{{--            <div class="row"> --}}
{{--                <div class="col-12 col-sm-6 col-md-6 col-lg-2"> --}}
{{--                    <div class="footer-widget widget-links"> --}}
{{--                        <div class="footer-widget-title"> --}}
{{--                            <h5>@lang('site.company')</h5> --}}
{{--                        </div> --}}
{{--                        <div class="widget-content"> --}}
{{--                            <ul> --}}
{{--                                <li><a href="{{ route('about_us') }}">@lang('site.About Us')</a></li> --}}
{{--                                <li><a href="{{ route('product') }}">@lang('site.Our Product')</a></li> --}}
{{--                                <li><a href="{{ route('contact') }}">@lang('site.contact')</a></li> --}}
{{--                            </ul> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}

{{--                <div class="col-12 col-sm-6 col-md-6 col-lg-2"> --}}
{{--                    <div class="footer-widget widget-links"> --}}
{{--                        <div class="footer-widget-title"> --}}
{{--                            <h5>@lang('site.services')</h5> --}}
{{--                        </div> --}}
{{--                        <div class="widget-content"> --}}
{{--                            <!-- Get 5 Latest for Model Services --> --}}
{{--                            @php --}}
{{--                                $services = App\Models\Service::latest()->take(5)->get(); --}}
{{--                            @endphp --}}
{{--                            @foreach ($services as $service) --}}

{{--                                <ul> --}}
{{--                                    <li><a href="{{ route('service') }}">{{ trans_model($service,'title') }}</a></li> --}}
{{--                                </ul> --}}

{{--                            @endforeach --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}

{{--                <div class="col-12 col-sm-6 col-md-6 col-lg-5"> --}}
{{--                    <div class="footer-widget widget-links widget-icon"> --}}
{{--                        <div class="footer-widget-title"> --}}
{{--                            <h5>@lang('site.support')</h5> --}}
{{--                        </div> --}}
{{--                        <div class="widget-content"> --}}
{{--                            <ul> --}}
{{--                                @foreach ($questions as $question) --}}
{{--                                    <li> --}}
{{--                                        <a href="{{ route('faqs') }}">{{ trans_model($question,'title') }}</a> --}}
{{--                                    </li> --}}
{{--                                @endforeach --}}
{{--                            </ul> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}

{{--                <div class="col-12 col-md-6 col-lg-3"> --}}
{{--                    <div class="footer-widget widget-contact"> --}}
{{--                        <div class="widget-content"> --}}
{{--                            <ul> --}}


{{--                                <li class="phone"> --}}
{{--                                    @lang('site.phone') --}}
{{--                                    <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a> --}}
{{--                                </li> --}}


{{--                                <li class="email"> --}}

{{--                                    @lang('site.Email'): --}}
{{--                                    <a --}}
{{--                                        href="mailto:{{ $settings->email }}" --}}
{{--                                    ><span --}}
{{--                                            class="__cf_email__" --}}
{{--                                            data-cfemail="e1888f878ea1848f8493868880cf828e8c" --}}
{{--                                        >{{ $settings->email }}</span --}}
{{--                                        ></a --}}
{{--                                    > --}}
{{--                                </li> --}}

{{--                                <li class="email"> --}}

{{--                                    {{ trans('site.support_email') }} : --}}
{{--                                    <a --}}
{{--                                        href="mailto:{{ $settings->linked_in }}" --}}
{{--                                    ><span --}}
{{--                                            class="__cf_email__" --}}
{{--                                            data-cfemail="e1888f878ea1848f8493868880cf828e8c" --}}
{{--                                        >{{ $settings->linked_in }}</span --}}
{{--                                        ></a --}}
{{--                                    > --}}
{{--                                </li> --}}

{{--                                <li class="email"> --}}

{{--                                    {{ trans('site.sales_email') }}: --}}
{{--                                    <a --}}
{{--                                        href="mailto:{{ $settings->youtube }}" --}}
{{--                                    ><span --}}
{{--                                            class="__cf_email__" --}}
{{--                                            data-cfemail="e1888f878ea1848f8493868880cf828e8c" --}}
{{--                                        >{{ $settings->youtube }}</span --}}
{{--                                        ></a --}}
{{--                                    > --}}
{{--                                </li> --}}

{{--                                <li class="address"> --}}
{{--                                    @lang('site.address') --}}
{{--                                    <p>{{ app()->getLocale() == 'ar' ? $settings->address_ar : $settings->address_en }}</p> --}}


{{--                                </li> --}}
{{--                                <li class="directions"> --}}
{{--                                    <a href="{{ route('contact') }}" --}}
{{--                                    ><i class="energia-location-Icon"></i>@lang('site.get directions')</a --}}
{{--                                    > --}}
{{--                                </li> --}}
{{--                            </ul> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}

{{--    <div class="footer-bottom"> --}}
{{--        <div class="container"> --}}
{{--            <div class="row"> --}}
{{--                <div class="col-12"> --}}
{{--                    <div class="footer-copyright"> --}}
{{--                        <div class="copyright"> --}}
{{--                <span --}}
{{--                > --}}
{{--                  @lang('site.all rights reserved') @lang('site.by') --}}
{{--                  <a href="https://topbusiness.io/contact3.html"> Top Business</a>. --}}
{{--                    &copy; {{ date('Y') }} --}}
{{--                </span> --}}
{{--                            <ul class="list-unstyled social-icons"> --}}

{{--                                <li> --}}
{{--                                    <a class="share-facebook" href="{{ $settings->linked_in }}" --}}
{{--                                    ><i class="energia-facebook"></i>@lang('site.facebook') --}}
{{--                                    </a> --}}
{{--                                </li> --}}
{{--                                --}}{{-- <li> --}}
{{--                                    <a class="share-twitter" href="{{ $settings->twitter }}" --}}
{{--                                    ><i class="energia-twitter"></i>twitter</a --}}
{{--                                    > --}}
{{--                                </li> --}}
{{--                                <li> --}}
{{--                                    <a class="share-youtube" href="{{ $settings->youtube }}" --}}
{{--                                    ><i class="energia-youtube"></i>youtube</a --}}
{{--                                    > --}}
{{--                                </li> --}}


{{--                            </ul> --}}
{{--                        </div> --}}
{{--                    </div> --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}
{{-- </footer> --}}
<!-- footer -->
<section class="footer pt-5 pb-5">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <a class="navbar-brand" href="index.html">
                    <img class="mb-4" src="{{ asset('assets/front/assets') }}/photo/logo.png" alt="no logo">
                </a>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, iusto quo! Cum nam cumque
                    repellat ex cupiditate laborum veritatis, quidem asperiores itaque! Iure fugit voluptates
                    perferendis temporibus. Vero, odit harum!</p>
                <div class="mt-5 mb-4">
                    <a class="text-decoration-none footer-btn" href="#">
                        details
                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="mt-3">
                    <h2 class="title-footer">latest post</h2>
                </div>
                <ul>
                    @foreach ($advertisements as $advertisement)
                        <li class="mb-3">
                            <div class="d-flex blog">
                                <div class="me-3"><img src="{{ asset($advertisement->image) }}"></div>
                                <div>
                                    <div style="max-width: 190px;">
                                        <a class="text-decoration-none" href="#">{!! $advertisement->title[lang()] !!}</a>
                                    </div>
                                    <p class="color-second">{{ $advertisement->created_at->format('d') }}
                                        {{ $advertisement->created_at->format('M') }},
                                        {{ $advertisement->created_at->format('Y') }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="mt-3">
                    <h2 class="title-footer">contact us</h2>
                </div>
                <ul>
                    @foreach ($university_settings as $university_setting)
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="icon-footer me-3">
                                    <i class="fa-solid fa-phone-flip text-white"></i>
                                </div>
                                <div class="d-flex align-items-center"><a class="text-decoration-none phone"
                                        href="tel: 01025408606">
                                        01025408606
                                    </a></div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="icon-footer me-3">
                                    <i class="fa-regular fa-envelope text-white"></i>
                                </div>
                                <div class="d-flex align-items-center"><a class="text-decoration-none phone"
                                        href="mailto: {{ $university_setting->email }}">
                                        {{ $university_setting->email }}
                                    </a></div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="icon-footer me-3">
                                    <i class="fa-solid fa-location-dot text-white"></i>
                                </div>
                                <div class="d-flex align-items-center">
                                    {{ $university_setting->address[lang()] }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- copyright -->
<div class="copyright">
    <div class="container text-center">
        Copyright © 2023 . All rights reserved.
    </div>
</div>

<!-- scroll to top -->
<a href="#" class="scroll-top">
    <div class="top">
        <i class="fa-solid fa-turn-up fa-lg"></i>
    </div>
</a>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="d-flex justify-content-end p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Embed your video here -->
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/lvYM9tHRz0M"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
