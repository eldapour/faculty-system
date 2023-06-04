@extends('front.layouts.master')

@section('content')

<!-- breadcrumb -->
      <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">Time uses</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="index.html">home</a>|
                    <span class="ms-2">Time uses</span>
                </div>
            </div>
        </div>
      </div>

      <!-- section -->
      <section class="pt-5 pb-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="scroll">
                        <table class="table">
                            <tbody>
                                <tr class="head-table">
                                    <th scope="col">track</th>
                                    <th scope="col">class</th>
                                    <th scope="col">regiment</th>
                                    <th scope="col">download</th>
                                  </tr>
                              <tr>
                                <td>Holiday</td>
                                <td>first</td>
                                <td>first</td>
                                <td>
                                    <div class="p-1">
                                      <a class="text-decoration-none main-btn btn-table" href="#">
                                        <i class="fa-solid fa-download me-2 text-white"></i>
                                        pdf
                                      </a>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Holiday</td>
                                <td>fourth</td>
                                <td>first</td>
                                <td>
                                  <div class="p-1">
                                    <a class="text-decoration-none main-btn btn-table" href="#">
                                      <i class="fa-solid fa-download me-2 text-white"></i>
                                      pdf
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Holiday</td>
                                <td>six</td>
                                <td>first</td>
                                <td>
                                  <div class="p-1">
                                    <a class="text-decoration-none main-btn btn-table" href="#">
                                      <i class="fa-solid fa-download me-2 text-white"></i>
                                      pdf
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Holiday</td>
                                <td>six</td>
                                <td>first</td>
                                <td>
                                  <div class="p-1">
                                    <a class="text-decoration-none main-btn btn-table" href="#">
                                      <i class="fa-solid fa-download me-2 text-white"></i>
                                      pdf
                                    </a>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Holiday</td>
                                <td>six</td>
                                <td>first</td>
                                <td>
                                  <div class="p-1">
                                    <a class="text-decoration-none main-btn btn-table" href="#">
                                      <i class="fa-solid fa-download me-2 text-white"></i>
                                      pdf
                                    </a>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="col-lg-3 col-12 sidebar mt-2">
                    <div class="mt-3 ms-3">
                        <h2 class="title" style="font-size: 30px;">latest post</h2>
                      </div>
                      <ul class="ms-3">
                        <li class="mb-3">
                          <div class="d-flex blog">
                            <div class="me-3"><img src="photo/s-blogimg-01.png"></div>
                          <div>
                            <div style="max-width: 190px;">
                              <a class="text-decoration-none" href="#">Nothing impossble to need hard work</a>
                            </div>
                            <span class="color-second">7 march, 2023</span>
                          </div>
                          </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex blog">
                              <div class="me-3"><img src="photo/s-blogimg-01.png"></div>
                            <div>
                              <div style="max-width: 190px;">
                                <a class="text-decoration-none" href="#">Nothing impossble to need hard work</a>
                              </div>
                              <span class="color-second">7 march, 2023</span>
                            </div>
                            </div>
                          </li>
                          <li class="mb-3">
                            <div class="d-flex blog">
                              <div class="me-3"><img src="photo/s-blogimg-01.png"></div>
                            <div>
                              <div style="max-width: 190px;">
                                <a class="text-decoration-none" href="#">Nothing impossble to need hard work</a>
                              </div>
                              <span class="color-second">7 march, 2023</span>
                            </div>
                            </div>
                          </li>
                        <li class="mb-3">
                          <div class="d-flex blog">
                            <div class="me-3"><img src="photo/s-blogimg-02.png"></div>
                          <div>
                            <div style="max-width: 190px;">
                              <a class="text-decoration-none" href="#">Nothing impossble to need hard work</a>
                            </div>
                            <span class="color-second">7 march, 2023</span>
                          </div>
                          </div>
                        </li>
                      </ul>
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
