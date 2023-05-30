<header
class="header header-light header-topbar header-topbar2 header-shadow"
id="navbar-spy"
>
<div class="top-bar top-bar-2">
  <div class="block-left">
    <p class="headline">
      <i class="energia-alert-Icon"></i> now hiring:
      <a href="page-careers.html">Senior Design & Sales technician</a>
    </p>
  </div>
  <div class="block-right">
    <div class="top-contact">
      <div class="contact-infos">
        <i class="energia-email--icon"></i>
        <div class="contact-body">
          <p>
            email:
            <a
              href="../cdn-cgi/l/email-protection.html#137a7d757c53767d7661747a723d707c7e"
              ><span
                class="__cf_email__"
                data-cfemail="9df4f3fbf2ddf8f3f8effaf4fcb3fef2f0"
                >[email&#160;protected]</span
              >
            </a>
          </p>
        </div>
      </div>
      <div class="contact-infos">
        <i class="energia-clock-Icon"></i>
        <div class="contact-body">
          <p>hours: Mon-Fri: 8am – 7pm</p>
        </div>
      </div>
    </div>

    <div class="social-links">
      <a class="share-facebook" href="javascript:void(0)"
        ><i class="energia-facebook"></i></a
      ><a class="share-instagram" href="javascript:void(0)"
        ><i class="energia-twitter"></i></a
      ><a class="share-twitter" href="javascript:void(0)"
        ><i class="energia-youtube"></i
      ></a>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-sticky" id="primary-menu">
  <a class="navbar-brand" href="index.html"
    ><img
      class="logo logo-dark"
      src="{{ asset('assets/front/') }}/assets/images/logo/logo-dark.png"
      alt="Energia Logo" /><img
      class="logo logo-mobile"
      src="assets/images/logo/logo-mobile.png"
      alt="Energia Logo"
  /></a>
  <div class="module-holder module-holder-phone">
    <div class="module module-search">
      <div class="module-icon module-icon-search">
        <i class="energia-search-Icon"></i>
      </div>
    </div>
    <div class="module module-cart">
      <div class="module-icon module-icon-cart">
        <i class="fas fa-shopping-cart"></i
        ><span class="title">shop cart</span>
        <label class="module-label">2</label>
      </div>
      <div class="module-cart-warp">
        <ul class="cart-overview">
          <li>
            <img src="{{ asset('assets/front/') }}/assets/images/shop/thumb/1.png" alt="product" />
            <div class="product-meta">
              <h5>pentair controller</h5>
              <p>$ 325.00</p>
            </div>
            <a class="cart-cancel" href="javascript:void(0)"
              ><i class="fas fa-times"></i
            ></a>
          </li>
          <li>
            <img src="{{ asset('assets/front/') }}/assets/images/shop/thumb/2.png" alt="product" />
            <div class="product-meta">
              <h5>solar royal</h5>
              <p>$ 295.00</p>
            </div>
            <a class="cart-cancel" href="javascript:void(0)"
              ><i class="fas fa-times"></i
            ></a>
          </li>
        </ul>
        <span>total: <i class="total-price">$620.00</i></span>
        <div class="cart--control">
          <a class="btn" href="shop-cart.html">view cart</a>
        </div>
      </div>
    </div>
    <button
      class="navbar-toggler collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarContent"
      aria-controls="navbarContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="navbarContent">
    <ul class="navbar-nav me-auto">
      <li class="nav-item has-dropdown drop-edit @if (Route::currentRouteName() == 'home') active @endif" data-hover="">
        <a class="dropdown-toggle" href="{{ route('home') }}"><span>home</span></a>
        <!-- <ul class="dropdown-menu">
          <li class="nav-item">
            <a href="index.html"><span>Home main</span></a>
          </li>
          <li class="nav-item current">
            <a href="home-modern.html"><span>home modern</span></a>
          </li>
          <li class="nav-item">
            <a href="home-classic.html"><span>home classic</span></a>
          </li>
        </ul> -->
      </li>
      <li class="nav-item has-dropdown drop-edit" data-hover="">
        <a class="dropdown-toggle" href="{{ route('about_us') }}"><span>about us</span></a>
      </li>
      <li class="nav-item has-dropdown drop-edit" data-hover="">
        <a class="dropdown-toggle" href="{{ route('service') }}"><span>services</span></a>
      </li>
      <li class="nav-item has-dropdown drop-edit" data-hover="">
        <a class="dropdown-toggle" href="{{ route('product') }}"><span>products</span></a>
      </li>
      <!-- <li class="nav-item has-dropdown" data-hover="">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown"
          ><span>company</span></a
        >
        <ul class="dropdown-menu">
          <li class="nav-item">
            <a href="page-about.html"><span>about us</span></a>
          </li>
          <li class="nav-item">
            <a href="page-how-works.html"><span>how it works</span></a>
          </li>
          <li class="nav-item">
            <a href="page-team.html"><span>leadership team</span></a>
          </li>
          <li class="nav-item">
            <a href="page-awards.html"
              ><span>awards &amp; recognition</span></a
            >
          </li>
          <li class="nav-item">
            <a href="page-pricing.html"
              ><span>pricing &amp; plans</span></a
            >
          </li>
          <li class="nav-item">
            <a href="page-faqs.html"><span>help &amp; fAQs</span></a>
          </li>
          <li class="nav-item">
            <a href="page-gallery.html"><span>our gallery</span></a>
          </li>
          <li class="nav-item">
            <a href="page-careers.html"><span>careers</span></a>
          </li>
          <li class="nav-item">
            <a href="shop-products.html"><span>shop</span></a>
          </li>
        </ul>
      </li> -->
      <!-- <li class="nav-item has-dropdown" id="departments" data-hover="">
        <a
          class="dropdown-toggle"
          href="page-services.html"
          data-toggle="dropdown"
          ><span>services</span></a
        >
        <ul class="dropdown-menu">
          <li class="nav-item">
            <a href="services-turbines.html"
              ><span>wind generators</span></a
            >
          </li>
          <li class="nav-item">
            <a href="services-solar.html"
              ><span>solar pv materials</span></a
            >
          </li>
          <li class="nav-item">
            <a href="services-battery.html"
              ><span>battery materials</span></a
            >
          </li>
          <li class="nav-item">
            <a href="services-plants.html"
              ><span>hydropower plants</span></a
            >
          </li>
          <li class="nav-item">
            <a href="services-fossil.html"
              ><span>fossil resources</span></a
            >
          </li>
          <li class="nav-item">
            <a href="services-controllers.html"
              ><span>charge controllers</span></a
            >
          </li>
        </ul>
      </li> -->
      <!-- <li class="nav-item has-dropdown" data-hover="">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown"
          ><span>projects</span></a
        >
        <ul class="dropdown-menu">
          <li class="nav-item">
            <a href="projects-standard.html"
              ><span>projects standard</span></a
            >
          </li>
          <li class="nav-item">
            <a href="projects-modern.html"
              ><span>projects modern</span></a
            >
          </li>
          <li class="nav-item">
            <a href="projects-grid.html"><span>projects grid</span></a>
          </li>
          <li class="nav-item">
            <a href="projects-single.html"
              ><span>project single</span></a
            >
          </li>
        </ul>
      </li> -->
      <!-- <li class="nav-item has-dropdown" data-hover="">
        <a class="dropdown-toggle" href="#" data-toggle="dropdown"
          ><span>blog</span></a
        >
        <ul class="dropdown-menu">
          <li class="nav-item">
            <a href="blog-grid.html"><span>blog grid</span></a>
          </li>
          <li class="nav-item">
            <a href="blog-standard.html"><span>blog standard</span></a>
          </li>
          <li class="nav-item">
            <a href="blog-single.html"><span>single blog post</span></a>
          </li>
        </ul>
      </li> -->
      <li class="nav-item" id="contact" data-hover="">
        <a href="{{ route('contact') }}"><span>contact</span></a>
      </li>
    </ul>
    <div class="module-holder">
       
      <div class="module-call">
        <i class="icons-energiaphone-call"> </i>
        <div>
          <p>call us now:</p>
          +2<a href="tel:01061245741"></a>
        </div>
      </div>
      <div class="module module-search">
        <div class="module-icon module-icon-search">
          <i class="energia-search-Icon"></i>
        </div>
      </div>
      <div class="module-contact module-contact-2">
        <a class="btn btn--primary" href="{{ route('request') }}"
          >request a quote <i class="energia-arrow-right"></i
        ></a>
      </div>
      <!-- <div class="module module-cart">
        <div class="module-icon module-icon-cart">
          <i class="fas fa-shopping-cart"></i
          ><span class="title">shop cart</span>
          <label class="module-label">2</label>
        </div>
        <div class="module-cart-warp">
          <ul class="cart-overview">
            <li>
              <img src="assets/images/shop/thumb/1.png" alt="product" />
              <div class="product-meta">
                <h5>pentair controller</h5>
                <p>$ 325.00</p>
              </div>
              <a class="cart-cancel" href="javascript:void(0)"
                ><i class="fas fa-times"></i
              ></a>
            </li>
            <li>
              <img src="assets/images/shop/thumb/2.png" alt="product" />
              <div class="product-meta">
                <h5>solar royal</h5>
                <p>$ 295.00</p>
              </div>
              <a class="cart-cancel" href="javascript:void(0)"
                ><i class="fas fa-times"></i
              ></a>
            </li>
          </ul>
          <span>total: <i class="total-price">$620.00</i></span>
          <div class="cart--control">
            <a class="btn" href="shop-cart.html">view cart</a>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</nav>
</header>
