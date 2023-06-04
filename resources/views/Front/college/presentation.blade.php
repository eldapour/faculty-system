@extends('front.layouts.master')

@section('content')

<!-- breadcrumb -->
      <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">presentation</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="index.html">home</a>|
                    <span class="ms-2">presentation</span>
                </div>
            </div>
        </div>
      </div>

      <!-- section the word -->
      <section class="word pt-5 pb-5" style="background: white;">
        <div class="container pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 col-12" style="position: relative;">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <div class="image-word" style="height: 90%;">
                        <img class="w-100 h-100 img-fluid" src="{{ asset('assets/front/assets') }}/photo/about_img.png" alt="no-image">
                    </div>
                </div>
                <div class="col-6">
                    <div class="image-word mb-3">
                        <img class="w-100 img-fluid" src="{{ asset('assets/front/assets') }}/photo/inner_b1.jpg" alt="no-image">
                      </div>
                      <div class="image-word">
                        <img class="w-100 img-fluid" src="{{ asset('assets/front/assets') }}/photo/about_img.png" alt="no-image">
                      </div>
                </div>
              </div>
              <div class="card-years">
                <h4>34</h4>
                <p>years of giving</p>
              </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="main-heading mb-3">
                    <div class="d-flex color-second mb-1">
                      <i class="fa-solid fa-graduation-cap"></i>
                      <h6 class="ms-2 me-2">our news</h6>
                    </div>
                    <h1 class="color-dark">A Few Words About the presentation</h1>
                  </div>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur porro laborum molestias.</p>
              <p class="text-black-50">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero nostrum aspernatur non consequatur, deserunt modi voluptate impedit excepturi unde aliquam voluptatum perferendis adipisci reprehenderit numquam laborum, necessitatibus accusamus. Nulla, alias?</p>
            </div>
          </div>
          <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur porro laborum molestias.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis quam?
          </p>
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
