@extends('front.layouts.master')

@section('content')

<!-- breadcrumb -->
      <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">Dean's speech</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="index.html">home</a>|
                    <span class="ms-2">Dean's speech</span>
                </div>
            </div>
        </div>
      </div>

      <!-- section the word -->
      <section class="word pt-5 pb-5">
        <div class="container pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="image-word">
                <img class="w-100 img-fluid rounded" src="{{ asset('assets/front/assets') }}/photo/about_img.png" alt="no-image">
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <h1 class="mt-3">ahmed hesham </h1>
              <h3>ahmed hesham </h3>
              <h5 class="color-second mb-3">College Dean </h5>
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
