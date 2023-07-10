<style>
    .digitalA a:hover{
        color: white;
        background-color: #ff7350;
    }
</style>
<!-- digital platform -->
<section class="digital-platform mt-5">
    <div class="container">
        <h1 class="text-white text-center mb-5">@lang('admin.digital platform')</h1>
        <div class="owl-carousel owl-theme">
            <div class="m-3 digitalA d-flex justify-content-center">
                <a href="{{ route('student.login') }}" class="text-decoration-none btn-platform">@lang('admin.Digital Student Platform')</a>
            </div>
            <div class="m-3 digitalA d-flex justify-content-center">
                <a href="#" class="text-decoration-none btn-platform">@lang('admin.Colleges Digital Platform')</a>
            </div>
            <div class="m-3 digitalA d-flex justify-content-center">
                <a href="#" class="text-decoration-none btn-platform">@lang('admin.Colleges Digital Magazine')</a>
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<section class="footer pt-5 pb-5">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <a class="navbar-brand" href="index.html">
                    <img class="mb-4" src="{{ asset($university_settings[0]->logo) }}" alt="no logo">
                </a>
                @foreach ($university_settings as $university_setting)
                    <p>{!! $university_setting->getTranslation('description', app()->getLocale()) !!}</p>
                @endforeach
                <div class="mt-5 mb-4">
                    <a class="text-decoration-none footer-btn" href="{{ route('index.presentation') }}">
                        @lang('admin.details')
                        <i class="fa-solid fa-arrow-right-long ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="mt-3">
                    <h2 class="title-footer">@lang('admin.latest posts')</h2>
                </div>
                <ul>
                    @foreach ($advertisements as $advertisement)
                        <li class="mb-3">
                            <div class="d-flex blog">
                                <div class="me-3"><img src="{{ asset($advertisement->image) }}"></div>
                                <div>
                                    <div style="max-width: 190px;">
                                        <a class="text-decoration-none" href="#">{!! $advertisement->getTranslation('title', app()->getLocale()) !!}</a>

                                    </div>
                                    <p class="color-second">{{ $advertisement->created_at->format('d') }}</p>


                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="mt-3">
                    <h2 class="title-footer">@lang('admin.Contact Us')</h2>
                </div>
                <ul>
                    @foreach ($university_settings as $university_setting)
                        <li class="mb-4">
                            <div class="d-flex">
                                <div class="icon-footer me-3">
                                    <i class="fa-solid fa-phone-flip text-white"></i>
                                </div>
                                <div class="d-flex align-items-center"><a class="text-decoration-none phone"
                                                                          href="tel: {{ $university_setting->phone }}">
                                        {{ $university_setting->phone }}
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
                                    {{ $university_setting->getTranslation('address', app()->getLocale()) }}
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
        Copyright © 2023 <a target="_blank" style="color: white;text-decoration: none" href="https://topbusiness.io">Top
            Business</a> . All rights reserved.
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="d-flex justify-content-end p-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Embed your video here -->
                <iframe width="100%" height="315" src=""
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('assets/front/') }}/assets/js/jquery-1.10.1.min.js"></script>
<script src="{{ asset('assets/front/') }}/assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('assets/front/') }}/assets/js/slick.min.js"></script>


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

<script>
    $(document).ready(function () {
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var url = button.data('url') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('.modal-body iframe').attr('src', url)
        })
    })
</script>
