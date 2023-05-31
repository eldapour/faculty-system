@extends('Front.layouts.master')

@section('content')
    <!-- landing -->
    <div class="landing">
        <div id="carouselExampleFade" class="carousel slide carousel-fade bg-black" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Photo/slider_bg_01.ac8b8779408287a47977.png" class="d-block w-100" alt="no image">
                    <div class="carousel-caption d-md-block text-white">
                        <p class="small-title text-start">welcome to university</p>
                        <h1 class="heading text-white text-start tw-bolder">
                            education is the best success in lif
                        </h1>
                        <p class="text-start description">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit velit facilis temporibus officia nemo officiis repudiandae, pariatur in corporis deserunt perspiciatis tenetur iusto perferendis, eveniet eum culpa soluta tempore optio!
                        </p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="Photo/slider_bg.6e3f0f1a1b58ac6d6c12.png" class="d-block w-100" alt="no image">
                    <div class="carousel-caption d-md-block text-white">
                        <p class="small-title text-start">welcome to university</p>
                        <h1 class="heading text-white text-start tw-bolder">
                            education is the best
                            <br> success in lif
                        </h1>
                        <p class="text-start description">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit velit facilis temporibus officia nemo officiis repudiandae, pariatur in corporis deserunt perspiciatis tenetur iusto perferendis, eveniet eum culpa soluta tempore optio!
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev"  data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <div class="prev-icon">
                    <i class="fa-solid fa-angle-left fa-lg"></i>
                </div>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <div class="prev-icon">
                    <i class="fa-solid fa-angle-right fa-lg"></i>
                </div>
            </button>
        </div>
    </div>

    <!-- blogs -->
    <section class="blogs pt-5 pb-5">
        <div class="container pt-5">
            <div class="main-heading mb-5">
                <div class="d-flex color-second mb-1">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h6 class="ms-2 me-2">our news</h6>
                </div>
                <h1 class="color-dark">The latest news</h1>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-3.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>16</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-2.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-3.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>16</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-1.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>16</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-3.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-2.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-3.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-2.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-3.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-1.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-3.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="card card-blog">
                            <a class="text-decoration-none" href="single-blog.html">
                                <img src="photo/evn-img-2.jpg" class="card-img-top" alt="no-image">
                            </a>
                            <div class="card-body mt-3">
                                <div class="card-date">
                                    <h4>15</h4>
                                    <p>march,2023</p>
                                </div>
                                <h3 class="card-title">
                                    <a class="text-decoration-none color-dark" href="single-blog.html">Learning Network Webinars for Music Teachers</a>
                                </h3>
                                <p class="card-text color-gray">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="time color-gray">
                                    3:30 pm - 4:30 pm
                                    <i class="fa-solid fa-arrow-right-long ms-2 me-2"></i>
                                    <strong class="color-second">united kingdom</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- video -->
    <section class="video-slider mb-5 mt-5">
        <div class="container">
            <div class="owl-carousel owl-theme">
                <div class="row card-video">
                    <div class="col-lg-6 col-12">
                        <h1 class="heading-video text-white">
                            education is the best success in lif
                        </h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eius explicabo atque est iure voluptatibus incidunt </p>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="icon-video">
                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="photo/play-button.png" alt="no-video">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row card-video">
                    <div class="col-lg-6 col-12">
                        <h1 class="heading-video text-white">
                            education is the best success in lif
                        </h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eius explicabo atque est iure voluptatibus incidunt </p>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="icon-video">
                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="photo/play-button.png" alt="no-video">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row card-video">
                    <div class="col-lg-6 col-12">
                        <h1 class="heading-video text-white">
                            education is the best success in lif
                        </h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eius explicabo atque est iure voluptatibus incidunt </p>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="icon-video">
                            <a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="photo/play-button.png" alt="no-video">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- newest -->
    <section class="newest-blog pt-5 pb-5">
        <div class="container pt-5">
            <div class="main-heading mb-5">
                <div class="d-flex justify-content-center color-second mb-1">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <h6 class="ms-2 me-2">our events</h6>
                </div>
                <h1 class="color-dark text-center">The latest events</h1>
            </div>
            <div>
                <div class="owl-carousel owl-theme">
                    <div class="m-3">
                        <div class="card card-newest">
                            <div class="image-card">
                                <img src="photo/inner_b1.jpg" class="card-img-top" alt="no-image">
                            </div>
                            <div class="card-body">
                                <div class="card-date1">
                                    <p>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        16 march,2023
                                    </p>
                                </div>
                                <a class="text-decoration-none" href="single-newest.html">
                                    <h4 class="card-title color-dark mt-2 mb-3">Seas accumsan nulla nec lacus ultricies placerat.</h4>
                                </a>
                                <p class="card-text text-black-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur,</p>
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="card card-newest ms-3">
                            <div class="image-card">
                                <img src="photo/inner_b1.jpg" class="card-img-top" alt="no-image">
                            </div>
                            <div class="card-body">
                                <div class="card-date1">
                                    <p>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        16 march,2023
                                    </p>
                                </div>
                                <a class="text-decoration-none" href="single-newest.html">
                                    <h4 class="card-title color-dark mt-2 mb-3">Seas accumsan nulla nec lacus ultricies placerat.</h4>
                                </a>
                                <p class="card-text text-black-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur,</p>
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="card card-newest ms-3">
                            <div class="image-card">
                                <img src="photo/inner_b1.jpg" class="card-img-top" alt="no-image">
                            </div>
                            <div class="card-body">
                                <div class="card-date1">
                                    <p>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        16 march,2023
                                    </p>
                                </div>
                                <a class="text-decoration-none" href="single-newest.html">
                                    <h4 class="card-title color-dark mt-2 mb-3">Seas accumsan nulla nec lacus ultricies placerat.</h4>
                                </a>
                                <p class="card-text text-black-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur,</p>
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="card card-newest ms-3">
                            <div class="image-card">
                                <img src="photo/inner_b1.jpg" class="card-img-top" alt="no-image">
                            </div>
                            <div class="card-body">
                                <div class="card-date1">
                                    <p>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        16 march,2023
                                    </p>
                                </div>
                                <a class="text-decoration-none" href="single-newest.html">
                                    <h4 class="card-title color-dark mt-2 mb-3">Seas accumsan nulla nec lacus ultricies placerat.</h4>
                                </a>
                                <p class="card-text text-black-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur,</p>
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="card card-newest ms-3">
                            <div class="image-card">
                                <img src="photo/inner_b1.jpg" class="card-img-top" alt="no-image">
                            </div>
                            <div class="card-body">
                                <div class="card-date1">
                                    <p>
                                        <i class="fa-solid fa-calendar-days"></i>
                                        16 march,2023
                                    </p>
                                </div>
                                <a class="text-decoration-none" href="single-newest.html">
                                    <h4 class="card-title color-dark mt-2 mb-3">Seas accumsan nulla nec lacus ultricies placerat.</h4>
                                </a>
                                <p class="card-text text-black-50">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet consectetur,</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- faculty number -->

    <section class="faculty-num mt5 mb-5">
        <div class="container">
            <div class="main-heading mb-5">
                <h1 class="color-second text-center">College in numbers</h1>
            </div>
            <div class="row mt-5">
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="photo/مجموع الطلبة-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">Total students</h4>
                        <h6 class="text-center">2000</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="photo/الاطقم الادارية-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">Administrative crews</h4>
                        <h6 class="text-center">30</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="photo/الاطقم التربوية-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">Educational crews</h4>
                        <h6 class="text-center">50</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="photo/طلبة الاجازة-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">vacation students</h4>
                        <h6 class="text-center">3000</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="photo/طلبة الماستر-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">Master students</h4>
                        <h6 class="text-center">200</h6>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                    <div class="text-white">
                        <div class="d-flex justify-content-center image-number">
                            <img src="photo/طلبة الدكتوراه-01.png" alt="no-image">
                        </div>
                        <h4 class="text-center">PhD students</h4>
                        <h6 class="text-center">150</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- the word -->
    <section class="word pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="image-word">
                        <img class="w-100 img-fluid rounded" src="photo/about_img.png" alt="no-image">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <h1 class="mt-3">ahmed hesham </h1>
                    <h5 class="color-second mb-3">College Dean </h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur porro laborum molestias.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia modi sint aliquid beatae dolorem?</p>
                    <div class="mt-5">
                        <a class="text-decoration-none main-btn" href="Dean-speech.html">
                            details
                            <i class="fa-solid fa-arrow-right-long ms-2 text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- digital platform -->
    <section class="digital-platform mt-5">
        <div class="container">
            <h1 class="text-white text-center mb-5">digital platform</h1>
            <div class="owl-carousel owl-theme">
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital student platform</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">College digital locker</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital College Journal</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital student platform</a>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <a class="text-decoration-none btn-platform">Digital student platform</a>
                </div>
            </div>
        </div>
    </section>



@endsection