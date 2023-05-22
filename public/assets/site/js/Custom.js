$(document).ready(function () {
  // goBack
  function goBack() {
    window.history.back();
  };

  // odometer
  $('.odometer').appear(function (e) {
    var odo = $(".odometer");
    odo.each(function () {
      var countNumber = $(this).attr("data-count");
      $(this).html(countNumber);
    });
  });
  //navbar animation
  $(window).scroll(function () {
    var appScroll = $(document).scrollTop();
    if ((appScroll > 60) && (appScroll < 99999999999)) {
      $(".navbar").addClass("animatedNav");
    };
    if ((appScroll > 0) && (appScroll < 60)) {
      $(".mainNav").removeClass("animatedNav");
    };
  });
  //MainSlider
  var swiper = new Swiper('.MainSlider-container', {
    spaceBetween: 0,
    centeredSlides: true,
    loop: true,
    effect: 'fade',
    speed: 500,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    keyboard: {
      enabled: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  //PRICES
  var swiper = new Swiper('.prices-container', {
    spaceBetween: 10,
    // loop: true,
    speed: 500,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    keyboard: {
      enabled: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  // 3D Card
  const myAtropos = Atropos({
    el: '.my-atropos',
    activeOffset: 40,
    shadowScale: 1.05,
    rotateXMax: 25,
    rotateYMax: 25,
    shadow: true,
    shadowOffset: 50,
    shadowScale: .9,
    highlight: true,
    onEnter() {},
    onLeave() {},
    onRotate(x, y) {}
  });
  //  Carousel
  const logoCarousel = new Carousel(document.querySelector("#logoCarousel"), {
    friction: 0.83,
    Dots: false,
    on: {
      change: (carousel, to) => {
        // Clear active elements
        document
          .querySelectorAll("#logoCarousel .is-active, #logoBar .is-active")
          .forEach((el) => {
            el.classList.remove("is-active");
          });
        // Mark current elements as active
        document
          .querySelectorAll(
            `#logoCarousel [data-for="${to}"], #logoBar [data-for="${to}"]`
          )
          .forEach((el) => {
            el.classList.add("is-active");
          });
      },
    },
  });
  // Make links clickable
  document.getElementById("logoBar").addEventListener("click", (event) => {
    const index = event.target.dataset.for || -1;
    if (index > -1) {
      event.preventDefault();
      logoCarousel.slideTo(index);
    }
  });
  //WOW js
  new WOW().init();
});