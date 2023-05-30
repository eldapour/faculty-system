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

    <section class="page-title page-title-6" id="page-title">
        <div class="page-title-wrap bg-overlay bg-overlay-dark-3">
            <div class="bg-section">
                <img src="{{ asset($slider->image_faqs) }}" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="title">
                            <h1 class="title-heading">FAQs</h1>
                            <p class="title-desc">
                                We offer products, solutions, and services across the entire
                                energy value chain. We support our customers on their way to
                                a more sustainable future.
                            </p>
                            <div class="title-action">
                                <a
                                    class="btn btn--bordered btn--white"
                                    href="{{ route('contact') }}"
                                >
                                    <span>learn more</span><i class="energia-arrow-right"></i
                                    ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrap">
            <div class="container">
                <ol class="breadcrumb d-flex">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="">company</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="faqs faqs-2" id="faqs-1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3">
                    <div class="heading heading-18 text-center">
                        <p class="heading-subtitle">What Are You Looking For?</p>
                        <h2 class="heading-title">Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-2" id="accordion03">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        @foreach($questions as $question)
                            <div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a
                                            class="card-link collapsed"
                                            data-hover=""
                                            data-bs-toggle="collapse"
                                            role="button"
                                            aria-expanded="false"
                                            aria-controls="question-{{ $question->id }}"
                                            href="#question-{{ $question->id }}"
                                        >{{ trans_model($question,'title') }}
                                        </a>
                                    </div>
                                    <div
                                        class="collapse"
                                        id="question-{{ $question->id }}"
                                        data-bs-parent="#question-{{ $question->id }}"
                                    >
                                        <div class="card-body">
                                            {!! trans_model($question,'desc') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="more-faqs">
                <p>
                    Sustainable, reliable & affordable energy systems,
                    <a href="{{ route('service') }}">find your solutions now! </a>
                </p>
            </div>
        </div>
    </section>

@endsection
