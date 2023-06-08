<!-- footer -->
<section class="footer pt-5 pb-5">
    <div class="container pt-4 pb-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <a class="navbar-brand" href="index.html">
                    <img class="mb-4" src="{{ asset('assets/front/assets') }}/photo/logo.png" alt="no logo">
                </a>
                @foreach ($university_settings as $university_setting)
                    <p>{!! $university_setting->description[lang()] !!}</p>
                @endforeach
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
