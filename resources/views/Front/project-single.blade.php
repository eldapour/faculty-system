@extends('Front.layouts.master')

@section('content')

<section class="page-title page-title-blank bg-white" id="page-title">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="d-none">
            High Efficiency Solar Cells For Manufacturers
          </h3>
          <div class="breadcrumb-wrap">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('site.home')</a></li>
              <li class="breadcrumb-item">
                <a href="{{ route('projects') }}">@lang('site.Projects')</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                  {{ trans_model($oneProject,'title') }}
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="project-single" id="project-single">
    <div class="project-intro">
      <div class="container">
        <div class="row">
          <div class="project-img">
            <img src="{{ asset($oneProject->image) }}" alt="image" />
            <div class="project-panel">
              <div class="project-panel-holder">
                <div class="project-content">
                  <div class="project-cat">
                    <a href="{{ route('service') }}">@lang('site.our services')</a>
                  </div>
                  <div class="project-title">
                    <h4>
                      <a href="{{ route('serviceProject',$oneProject->service->id) }}"
                      >{{ trans_model($oneProject->service,'title') }}</a
                      >
                    </h4>
                  </div>
                  <div class="project-desc">
                    <p>
                      {{ trans_model($oneProject->service,'desc') }}
                    </p>
                  </div>
                  <div class="project-more">
                    <a class="btn btn--primary" href="{{ route('quoteIndex') }}"
                    >@lang('site.request a quote') <i class="energia-arrow-right"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="project-overview project-overview-1">
      <div class="container">
        <div class="heading heading-20">
          <div class="row">
            <div class="col-12 col-lg-5">
              <p class="heading-subtitle">@lang('site.the overview')</p>
              <h2 class="heading-title">
                {{ trans_model($oneProject,'title') }}
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <p class="heading-desc">
            {{ trans_model($oneProject,'desc') }}
              </p>
              {{-- <p class="heading-desc">
                Our high-efficiency PV cells are suitable for a broad range
                of module applications including private rooftop
                installations, commercial and industrial rooftop
                installations, remote power generators and large-scale power
                plants on the ground and on the water.
              </p> --}}
            </div>
            <div class="col-12 col-lg-5">
              <div class="project-details">
                <table class="table">
                  <tbody>
                  <tr>
                    <td class="name">@lang('site.client'):</td>
                    <td class="value">{{ $oneProject->client }}</td>
                  </tr>
                  <tr>
                    <td class="name">@lang('site.Location'):</td>
                    <td class="value">{{ $oneProject->location }}</td>
                  </tr>
                  <tr>
                    <td class="name">@lang('site.services'):</td>
                    <td class="value">
                      {{ trans_model($oneProject->service,'title') }}
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <a class="btn btn--secondary" href="{{ route('contact') }}"
              >@lang('site.contact') <i class="energia-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="project-image-carousel projects projects-gallery">
      <div
              class="carousel owl-carousel carousel-dots carousel-navs"
              data-slide="4"
              data-slide-rs="3"
              data-center="data-center"
              data-autoplay="true"
              data-nav="true"
              data-dots="true"
              data-space="30"
              data-loop="false"
              data-speed="800"
      >
      @foreach ($projects as $project)


        <div class=" ">
          <div class="project-panel">
            <div class="project-panel-holder">
              <div class="project-img">
                <img
                        src="{{ asset($project->image) }}"
                        alt=" item"
                />
                <div class="project-hover">
                  <div class="project-action">
                    <div class="project-zoom">
                      <i class="far fa-eye"></i
                      ><a
                            class="img-gallery-item"
                            href="{{ asset($project->image) }}"
                            title="wind generators item"
                    ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    {{-- <div class="project-overview project-overview-2">
      <div class="container">
        <div class="heading heading-20">
          <div class="row">
            <div class="col-12 col-lg-5">
              <p class="heading-subtitle">The Challenge!</p>
              <h2 class="heading-title">
                Proof Record Of The High Performance & Reliability
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <p class="heading-desc">
                Bifacial solar modules enable EPCs, installers, contractors
                and solar PV developers to maximize power density, with
                dual-side light capture resulting in increased power output
                at a lower cost. Delivering an attractive design,
                low-degradation and maximum power density, the bifacial
                modules we supply are made from high-purity silicon to
                ensure superior efficiency.
              </p>
              <p class="heading-desc">
                Bifacial panels are eligible for Targray’s flexible
                wholesale solar financing platform, designed to help
                businesses of all sizes preserve their working capital,
                unlock value and accelerate growth. By leveraging Targray
                Group’s robust financing facility and our decades-long
                partnerships with leading international PV manufacturers,
                we’re able to create tailored supply chains solutions backed
                by flexible terms not offered by solar distributors.
              </p>
            </div>
            <div class="col-12 col-lg-5">
              <div class="advantages-list-holder">
                <p>
                  Can we meet the growing demand for electricity while
                  protecting our climate?
                </p>
                <ul class="list-unstyled advantages-list">
                  <li>Reliabe and performance</li>
                  <li>In-time manufacturing</li>
                  <li>Solar material financing</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- <section
            class="processes processes-1 bg-overlay bg-overlay-theme4"
            id="processes-1"
    >
      <div class="bg-section">
        <img
                src="{{ asset('assets/front') }}/assets/images/background/wavy-pattern.png"
                alt="Background"
        />
      </div>
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="block-right-holder">
            <div class="heading heading-light heading-light2">
              <p class="heading-subtitle">how it works!</p>
              <h2 class="heading-title">
                Fueling The Transition To Renewable Power.
              </h2>
            </div>
            <div class="counters-holder">
              <div class="counter counter-3">
                <div class="counter-holder">
                  <div class="counter-num">
                        <span
                                class="counting"
                                data-counterup-nums="25"
                                data-counterup-beginat="12"
                        >{{ $settings->year_of_experince }}</span
                        >
                  </div>
                  <div class="counter-img">
                    <div class="bg-section">
                      <img src="assets/images/counters/1.jpg" alt="image" />
                    </div>
                    <i class="flaticon-020-factory"></i>
                  </div>
                </div>
                <div class="counter-desc">
                  <p>Years Of Experience In The Solar Industry</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="processes-holder">
            <div
                    class="carousel owl-carousel carousel-dots process-content-carousel"
                    data-slide="1"
                    data-slide-rs="1"
                    data-autoplay="true"
                    data-nav="false"
                    data-dots="true"
                    data-space="0"
                    data-loop="false"
                    data-speed="800"
            >
              <div>
                <div class="process-panel">
                  <p class="process-number">01.</p>
                  <div class="process-body">
                    <div class="process-content">
                      <h5>we design &amp; ship</h5>
                      <p>
                        We collaborate with you to design and deliver a
                        system that meets your utility usage and needs, We
                        also selecting equipment from 66+ manufacturers so
                        you do not have to be worried or compromise with
                        your money or with your effort.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="process-panel">
                  <p class="process-number">02.</p>
                  <div class="process-body">
                    <div class="process-content">
                      <h5>contract or install</h5>
                      <p>
                        Whether you want to install the system or hire local
                        contractors, managing installation yourself ensures
                        the fastest return on your solar investment.We
                        deliver a system that meets your utility usage and
                        needs, We also selecting equipment from.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="process-panel">
                  <p class="process-number">03.</p>
                  <div class="process-body">
                    <div class="process-content">
                      <h5>power your home</h5>
                      <p>
                        Even after your system is installed and operating,
                        you can always count on Wholesale Solar to provide
                        the support you need, just contact us at any time,
                        and we will be there for you. Whether you want to
                        install the system or hire local contractors.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="images-holder">
              <div
                      class="carousel owl-carousel process-image-carousel"
                      data-slide="1"
                      data-slide-rs="1"
                      data-autoplay="true"
                      data-drag="false"
                      data-nav="false"
                      data-dots="false"
                      data-space="0"
                      data-loop="false"
                      data-speed="800"
              >
                <img
                        src="{{ asset('assets/front') }}/assets/images/processes/1.jpg"
                        alt="process"
                /><img
                      src="{{ asset('assets/front') }}/assets/images/processes/2.jpg"
                      alt="process"
              /><img src="{{ asset('assets/front') }}/assets/images/processes/3.jpg" alt="process" />
              </div>
              <div class="processes-panel">
                <h3 class="panel-title">
                  Commercial, Residential And Industrial Solar Systems!
                </h3>
                <p class="panel-desc">
                  Our presence ensures timeliness, cost efficiency &
                  compliance adherence!
                </p>
                <a href="page-contact.html"
                >schedule A Visit <i class="energia-arrow-right"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="project-overview project-overview-3">
      <div class="container">
        <div class="heading heading-20">
          <div class="row">
            <div class="col-12 col-lg-5">
              <p class="heading-subtitle">The Recommendations!</p>
              <h2 class="heading-title">
                Mono, Multi & Bi-Facial Solar Cell Products
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <p class="heading-desc">
                Bifacial panels are eligible for flexible wholesale solar
                financing platform, designed to help businesses of all sizes
                preserve their working capital, unlock value and accelerate
                growth. By leveraging robust financing facility and our
                decades-long partnerships with leading manufacturers.
              </p>
              <p class="heading-desc">
                Despite these diverse developments, developments in fossil
                fuel systems almost entirely eliminated any wind turbine
                systems larger than supermicro size. In the early 1970s,
                however, anti-nuclear protests in Denmark spurred artisan
                mechanics to develop microturbines of 22 kW.
              </p>
              <p class="heading-desc">
                We’re able to create tailored supply chains solutions backed
                by flexible terms not offered by solar distributors or
                commercial banks.
              </p>
            </div>
            <div class="col-12 col-lg-5">
              <p class="heading-desc">
                Suitable for commercial, residential and utility-scale
                projects, our bifacial panels are supported by supply chain
                management. For detailed specifications,<br />
                consult our Solar Division.
              </p>
              <a class="btn btn--primary" href="page-contact.html"
              >get started <i class="energia-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>

        <div class="counters-bar">
          <div class="counter counter-5">
            <div class="counter-name">
              <h6>power</h6>
            </div>
            <div class="counter-num">
                  <span class="counting" data-counterup-nums="5,54">5,54</span
                  ><span class="unit">KWp</span>
            </div>
          </div>

          <div class="counter counter-5">
            <div class="counter-name">
              <h6>price</h6>
            </div>
            <div class="counter-num">
                  <span class="unit">$</span
                  ><span class="counting" data-counterup-nums="14,600"
            >14,600</span
            >
            </div>
          </div>

          <div class="counter counter-5">
            <div class="counter-name">
              <h6>yearly output</h6>
            </div>
            <div class="counter-num">
                  <span class="counting" data-counterup-nums="6,721">6,721</span
                  ><span class="unit">KWh</span>
            </div>
          </div>

          <div class="counter counter-5">
            <div class="counter-name">
              <h6>monthly</h6>
            </div>
            <div class="counter-num">
                  <span class="unit">$</span
                  ><span class="counting" data-counterup-nums="146">146</span>
            </div>
          </div>

          <div class="counter counter-5">
            <div class="counter-name">
              <h6>price</h6>
            </div>
            <div class="counter-num">
                  <span class="unit">$</span
                  ><span class="counting" data-counterup-nums="14,600"
            >14,600</span
            >
            </div>
          </div>
        </div>
      </div>
    </div>

    <section
            class="features features-4 bg-overlay bg-overlay-theme2"
            id="features-3"
    >
      <div class="features-overlay bg-overlay bg-overlay-theme2">
        <div class="bg-section">
          <img src="assets/images/background/2.jpg" alt="Background" />
        </div>
      </div>
      <div class="container">
        <div class="heading heading-2 heading-light heading-light2">
          <div class="row">
            <div class="col-12 col-lg-5">
              <p class="heading-subtitle">
                Sustainable, Reliable & Affordable Energy!
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-5">
              <h2 class="heading-title">
                Providing Value To Our ClientsThrough Ongoing Product &
                Innovation.
              </h2>
            </div>
            <div class="col-12 col-lg-6">
              <p class="heading-desc">
                While improving the yield and performance of solar energy
                products, our PV industry experience enables us to provide
                in-depth material sourcing, financing and supply chain
                expertise for every step.
              </p>
              <p class="heading-desc">
                Raw polycrystalline silicon for PV manufacturing. Offered in
                various grades and formats including chunks, chips, powder
                and ingot.
              </p>
              <div class="actions-holder">
                <a
                        class="btn btn--primary btn--inversed"
                        href="page-contact.html"
                >get started<i class="energia-arrow-right"></i></a
                ><a
                      class="btn btn--bordered btn--white"
                      href="page-about.html"
              >explore our plans</a
              >
              </div>
            </div>
          </div>
        </div>

        <div
                class="carousel owl-carousel carousel-dots"
                data-slide="4"
                data-slide-rs="2"
                data-autoplay="true"
                data-nav="false"
                data-dots="true"
                data-space="25"
                data-loop="true"
                data-speed="800"
        >
          <div>
            <div class="feature-panel-holder" data-hover="">
              <div class="feature-panel">
                <div class="feature-icon">
                  <i class="flaticon-024-energy"></i>
                </div>
                <div class="feature-content">
                  <h4>Save Your Money</h4>
                  <p>
                    Save money on utilities or increase the value of your
                    home by installing solar panels as a great option.
                  </p>
                </div>
                <a href="page-about.html"
                ><i class="energia-arrow-right"></i>
                  <span>explore more</span>
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="feature-panel-holder" data-hover="">
              <div class="feature-panel">
                <div class="feature-icon">
                  <i class="flaticon-028-greenhouse"></i>
                </div>
                <div class="feature-content">
                  <h4>Home Is Energy</h4>
                  <p>
                    Everyday the sun provides us with abundance of free
                    energy by placing solar panels on your roof.
                  </p>
                </div>
                <a href="page-about.html"
                ><i class="energia-arrow-right"></i>
                  <span>explore more</span>
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="feature-panel-holder" data-hover="">
              <div class="feature-panel">
                <div class="feature-icon">
                  <i class="flaticon-026-world"></i>
                </div>
                <div class="feature-content">
                  <h4>Consult &amp; Planning</h4>
                  <p>
                    Our remote industrial solar systems are designed to
                    reliably power our clients critical.
                  </p>
                </div>
                <a href="page-about.html"
                ><i class="energia-arrow-right"></i>
                  <span>explore more</span>
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="feature-panel-holder" data-hover="">
              <div class="feature-panel">
                <div class="feature-icon">
                  <i class="flaticon-008-plant"></i>
                </div>
                <div class="feature-content">
                  <h4>Certified Engineers</h4>
                  <p>
                    Our sales engineers on our staff have experience and can
                    design any complete solar system.
                  </p>
                </div>
                <a href="page-about.html"
                ><i class="energia-arrow-right"></i>
                  <span>explore more</span>
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="feature-panel-holder" data-hover="">
              <div class="feature-panel">
                <div class="feature-icon">
                  <i class="flaticon-024-energy"></i>
                </div>
                <div class="feature-content">
                  <h4>Save Your Money</h4>
                  <p>
                    Save money on utilities or increase the value of your
                    home by installing solar panels as a great option.
                  </p>
                </div>
                <a href="page-about.html"
                ><i class="energia-arrow-right"></i>
                  <span>explore more</span>
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="feature-panel-holder" data-hover="">
              <div class="feature-panel">
                <div class="feature-icon">
                  <i class="flaticon-028-greenhouse"></i>
                </div>
                <div class="feature-content">
                  <h4>Home Is Energy</h4>
                  <p>
                    Everyday the sun provides us with abundance of free
                    energy by placing solar panels on your roof.
                  </p>
                </div>
                <a href="page-about.html"
                ><i class="energia-arrow-right"></i>
                  <span>explore more</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="project-overview project-overview-4">
      <div class="container">
        <div class="heading heading-20">
          <div class="row">
            <div class="col-12 col-lg-5">
              <p class="heading-subtitle">The Results!</p>
              <h2 class="heading-title">
                Mono, Multi & Bi-Facial Solar Cell Products
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <p class="heading-desc">
                A leading international supplier of solar wafers for PV
                module manufacturers. We market a complete portfolio of
                reliable, high-quality solar wafers to meet the
                manufacturing demands of our customers. Our solar silicon
                wafers can be built to the exact specifications of solar
                manufacturers.
              </p>
              <p class="heading-desc">
                Working with our suppliers and trade associations like SEIA
                we help PV manufacturers increase efficiency while
                minimizing costs.
              </p>
            </div>
            <div class="col-12 col-lg-5">
              <div class="counters-holder">
                <div class="row">
                  <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                    <div class="counter counter-6">
                      <div class="counter-num">
                            <span class="counting" data-counterup-nums="6,154"
                            >6,154</span
                            >
                      </div>
                      <div class="counter-name">
                        <h6>Projects Completed In Last 5 Years</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                    <div class="counter counter-6">
                      <div class="counter-num">
                            <span class="counting" data-counterup-nums="3,584"
                            >3,584</span
                            >
                      </div>
                      <div class="counter-name">
                        <h6>Qualified Employees &amp; Workers With Us</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="testimonial testimonial-4">
      <div class="testimonial-overlay">
        <div class="bg-section">
          <img
                  src="assets/images/background/wavy-pattern-2.png"
                  alt="background"
          />
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-4">
            <div class="counters-holder">
              <div class="counter counter-3">
                <div class="counter-holder">
                  <div class="counter-num">
                        <span
                                class="counting"
                                data-counterup-nums="25"
                                data-counterup-beginat="12"
                        >25</span
                        >
                  </div>
                  <div class="counter-img">
                    <div class="bg-section">
                      <img src="assets/images/counters/1.jpg" alt="image" />
                    </div>
                    <i class="flaticon-020-factory"></i>
                  </div>
                </div>
                <div class="counter-desc">
                  <p>Years Of Experience In The Solar Industry</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-7">
            <div class="heading heading-14">
              <p class="heading-subtitle">Customers Doing it Their Way!</p>
            </div>
            <div class="testimonials-holder">
              <div
                      class="carousel owl-carousel testimonials-carousel"
                      data-slide="1"
                      data-slide-rs="1"
                      data-autoplay="true"
                      data-nav="false"
                      data-dots="false"
                      data-space="0"
                      data-loop="false"
                      data-speed="800"
              >
                <div class="testimonial-panel testimonial-panel-2">
                  <div class="testimonial-body">
                    <div class="testimonial-content">
                      <p>
                        Energia has been absolutely the best to work with.
                        Their attention to detail and customer support was
                        amazing!! They were fantastic through the entire
                        purchase process. Had lots of questions and they
                        were patient. When my system arrived, it was well
                        packed.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="testimonial-panel testimonial-panel-2">
                  <div class="testimonial-body">
                    <div class="testimonial-content">
                      <p>
                        Energia has been absolutely the best to work with.
                        Their attention to detail and customer support was
                        amazing!! They were fantastic through the entire
                        purchase process. Had lots of questions and they
                        were patient. When my system arrived, it was well
                        packed.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="testimonial-panel testimonial-panel-2">
                  <div class="testimonial-body">
                    <div class="testimonial-content">
                      <p>
                        Energia has been absolutely the best to work with.
                        Their attention to detail and customer support was
                        amazing!! They were fantastic through the entire
                        purchase process. Had lots of questions and they
                        were patient. When my system arrived, it was well
                        packed.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial-thumbs">
              <div class="testimonial-thumb active" data-hover="">
                <div class="thumb-img">
                  <img
                          src="assets/images/testimonial/1.jpg"
                          alt="Testimonial Author"
                  />
                </div>
                <div class="thumb-body">
                  <h6>sami wade</h6>
                  <p>promina</p>
                </div>
              </div>
              <div class="testimonial-thumb" data-hover="">
                <div class="thumb-img">
                  <img
                          src="assets/images/testimonial/2.jpg"
                          alt="Testimonial Author"
                  />
                </div>
                <div class="thumb-body">
                  <h6>john peter</h6>
                  <p>optima inc</p>
                </div>
              </div>
              <div class="testimonial-thumb" data-hover="">
                <div class="thumb-img">
                  <img
                          src="assets/images/testimonial/3.jpg"
                          alt="Testimonial Author"
                  />
                </div>
                <div class="thumb-body">
                  <h6>sony blake</h6>
                  <p>koira ind</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="project-share">
      <div class="container">
        <div class="tags">
          <a href="page-services.html">finance</a
          ><a href="page-services.html">supply chain</a
        ><a href="page-services.html">solar panels</a>
        </div>
        <div class="social-share">
          <a class="share-facebook" href="javascript:void(0)"
          ><i class="fab fa-facebook-f"></i></a
          ><a class="share-instagram" href="javascript:void(0)"
        ><i class="fab fa-twitter"></i></a
        ><a class="share-twitter" href="javascript:void(0)"
        ><i class="fab fa-linkedin-in"></i
        ></a>
        </div>
      </div>
    </div> --}}

    <section
            class="projects projects-standard projects-standard-2"
            id="projects-standard-2"
    >
      <div class="container">
        <div class="heading heading-21 text-center">
          <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3">
              <h2 class="heading-title">@lang('site.related Projects')</h2>
            </div>
          </div>
        </div>

        <div
                class="carousel owl-carousel carousel-dots"
                data-slide="3"
                data-slide-rs="1"
                data-center="false"
                data-autoplay="true"
                data-nav="false"
                data-dots="true"
                data-space="30"
                data-loop="false"
                data-speed="800"
        >
        @foreach ($projects as $project)
          <div>
            <div class="project-panel" data-hover="">

              <div class="project-panel-holder">
                <div class="project-img">
                  <a class="link" href="projects-single.html"></a
                  ><img
                        src="{{ asset($project->image) }}"
                        alt="project image"
                        class="w-100"
                />
                </div>

                <div class="project-content">
                  <div class="project-title">
                    <h4>
                      <a href="projects-single.html"
                      >{{ trans_model($project,'title') }}</a
                      >
                    </h4>
                  </div>
                  <div class="project-cat">
                    <a href="projects-standard.html">{{ trans_model($project->service,'title') }}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="row">
          <div class="col-12">
            <div class="projects-load-more">
              <a class="btn btn--secondary" href="{{ route('projects') }}"
              >@lang('site.explore all projects') <i class="energia-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>

  @endsection
