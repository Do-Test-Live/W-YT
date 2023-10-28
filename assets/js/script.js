(function ($) {
  "use strict";
  /*============= preloader js css =============*/
  var cites = [];
  cites[0] =
    "We design Listy for the readers, optimizing not for page views or engagement";
  cites[1] = "Listy turns out that context is a key part of learning.";
  cites[2] = "You can create any type of product documentation with Listy";
  cites[3] = "Advanced visual search system powered by Ajax";
  var cite = cites[Math.floor(Math.random() * cites.length)];
  $("#preloader p").text(cite);
  $("#preloader").addClass("loading");

  $(window).on("load", function () {
    setTimeout(function () {
      $("#preloader").fadeOut(500, function () {
        $("#preloader").removeClass("loading");
      });
    }, 500);
  });

  //sticky header

  var $window = $(window);
  var didScroll,
    lastScrollTop = 0,
    delta = 5,
    $mainNav = $(".header-menu"),
    $mainNavHeight = $mainNav.outerHeight(),
    scrollTop;

  $window.on("scroll", function () {
    didScroll = true;
    scrollTop = $(this).scrollTop();
  });

  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 200);

  function hasScrolled() {
    if (Math.abs(lastScrollTop - scrollTop) <= delta) {
      return;
    }
    if (scrollTop > lastScrollTop && scrollTop > $mainNavHeight) {
      $mainNav.css("top", -$mainNavHeight);
    } else {
      if (scrollTop + $(window).height() < $(document).height()) {
        $mainNav.css("top", 0);
      }
    }
    lastScrollTop = scrollTop;
  }

  //sticky header
  function navbarFixed() {
    if ($(".header-menu").length) {
      $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll) {
          $(".header-menu").addClass("navbar_fixed");
        } else {
          $(".header-menu").removeClass("navbar_fixed");
        }
      });
    }
  }
  navbarFixed();

  $(".navbar-nav > li .mobile_dropdown_icon").on("click", function (e) {
    $(this).parent().find("ul").first().toggle(300);
    $(this).parent().siblings().find("ul").hide(300);
  });
  if ($(".dropdown").length) {
    $(".dropdown > .dropdown-toggle").on("click", function () {
      var location = $(this).attr("href");
      window.location.href = location;
      return false;
    });
  }
  // === Back to Top Button
  var back_top_btn = $("#back-to-top");

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      back_top_btn.addClass("show");
    } else {
      back_top_btn.removeClass("show");
    }
  });

  back_top_btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
  });
  //exclisive automated slide widgets
  $(document).ready(function () {
    var numSlick = 0;
    $(".exclusive-slider").each(function () {
      numSlick++;
      $(this)
        .addClass("exc_slider-" + numSlick)
        .slick({
          autoplay: true,
          slidesToScroll: 1,
          slidesToShow: 1,
          arrows: true,
          dots: false,
          asNavFor: ".exclusive-slider-thumbnails.exc_slider-" + numSlick,
        });
    });

    numSlick = 0;
    $(".exclusive-slider-thumbnails").each(function () {
      numSlick++;
      $(this)
        .addClass("exc_slider-" + numSlick)
        .slick({
          dots: false,
          focusOnSelect: true,
          variableWidth: true,
          asNavFor: ".exclusive-slider.exc_slider-" + numSlick,
          autoplay: true,
          slidesToShow: 4,
        })
        .find(".slick-slide")
        .removeClass("slick-active");
      $(this).eq(0).addClass("slick-active");
    });
  });

  //** === Counters js === **//

  $(".counter-count").each(function () {
    $(this)
      .prop("Counter", 0)
      .animate(
        {
          Counter: $(this).text(),
        },
        {
          //change count up speed here
          duration: 4000,
          easing: "swing",
          step: function (now) {
            $(this).text(Math.ceil(now));
          },
        }
      );
  });

  //** === Video js === **//

  $(document).ready(function () {
    // get video source from data-src button
    var $videoSrc;
    $(".video-btn").click(function () {
      $videoSrc = $(this).data("src");
    });

    // autoplay video on modal load
    $("#myModal").on("shown.bs.modal", function (e) {
      // youtube iframe configuration and settings
      $("#video").attr(
        "src",
        $videoSrc + "?autoplay=1&rel=0&controls=1&loop=1&modestbranding=1"
      );
    });
    // stop playing the youtube video when modal closed
    $("#myModal").on("hide.bs.modal", function (e) {
      // stop video
      $("#video").attr("src", $videoSrc);
    });
  });

  if ($(".history-wrapper").length) {
    var $carousel = $(".history-wrapper");
    var $slider;
    $carousel
      .slick({
        speed: 300,
        arrows: false,
        infinite: false,
        loop: false,
        slidesToShow: 3,
        responsive: [
          {
            breakpoint: 800,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      })
      .on("afterChange", (e, slick, slide) => {
        $slider.slider("value", slide);
      });

    $slider = $(".history-scrollbar").slider({
      min: 0,
      max: 7,
      slide: function (event, ui) {
        var slick = $carousel.slick("getSlick"),
          goTo = (ui.value * (slick.slideCount - 1)) / 7;

        $carousel.slick("goTo", goTo);
      },
    });
  }
  if ($(".client-main-slider").length) {
    $(".client-main-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      prevArrow:
        '<button type="button" class="slick-prev"><i class="las la-arrow-left"></i></button>',
      nextArrow:
        '<button type="button" class="slick-next"><i class="las la-arrow-right"></i></button>',

      asNavFor: ".client-thumb-slider",
      centerMode: false,
    });
    $(".client-thumb-slider").slick({
      slidesToShow: 6,
      asNavFor: ".client-main-slider",
      dots: false,
      centerMode: false,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: "0px",
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 475,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
  // Pricing Two Switcher
  $(".pricing-switcher-2 .nav-link").on("click", function () {
    if ($("#monthly-tab").hasClass("active")) {
      $(".switcher-bg").removeClass("right");
    } else {
      $(".switcher-bg").addClass("right");
    }
  });

  // Pricing Two Switcher
  $(".day-switcher .nav-link").on("click", function () {
    if ($("#annual-tab").hasClass("active")) {
      $(".day-switcher").removeClass("right");
    } else {
      $(".day-switcher").addClass("right");
    }
  });

  //ediatable location select
  if ($("#locationSelect").length) {
    $("#locationSelect").editableSelect();
  }
  if ($(".custom-select").length) {
    $(".custom-select").niceSelect();
  }

  //initilalize Telephone Input Country
  if ($("#inputPhoneNumber").length) {
    $("#inputPhoneNumber").intlTelInput({
      separateDialCode: false,
      utilsScript: "assets/vendors/inTellInput/utils.js",
    });
  }

  //initilalize DropeZone
  if ($("#dropzone").length) {
    $("#dropzone").dropzone({
      paramName: "file",
      url: "upload-target",
    });
  }
  if ($(".listing-dropzone").length) {
    $(".listing-dropzone").dropzone({
      paramName: "file",
      url: "upload-target",
    });
  }

  //initialize nice select
  if ($("select").length) {
    $("select").niceSelect();
  }
  var radiusSlider = document.getElementById("radius-slider");
  var radiusInput = document.getElementById("radius-slider-input");
  if (radiusSlider && radiusInput) {
    noUiSlider.create(radiusSlider, {
      start: [50],
      connect: [true, false],
      step: 1,
      range: {
        min: [1],
        max: [100],
      },
    });

    radiusSlider.noUiSlider.on("update", function (values, handle) {
      radiusInput.value = Math.round(values[handle]) + " km";
    });

    radiusInput.addEventListener("change", function () {
      radiusSlider.noUiSlider.set(parseInt(this.value));
    });
  }

  $(".about-tabs-navigator .navbar li a").click(function (event) {
    var offset = 70;
    event.preventDefault();
    let dims = $($(this).attr("href"))[0].offsetTop;
    window.scrollTo(window.scrollX, dims - offset);
  });

  $(".toggleSearchIcon").click(function () {
    $(".toggle-search-widget").toggleClass("open");
  });

  $(".dynamic-star-rating i").click(function () {
    const rating = $(this).index() + 1;
    $("#dynamic-star-rating-input").val(rating);
    $(".dynamic-star-rating i").removeClass("active");
    $(this).prevAll().addBack().addClass("active");
  });

  if ($(".searchJobDynamicFocus input").is(":focus")) {
    console.log('An input in the class "my-class" is focused.');
  }
  $(".searchJobDynamicFocus input").on("focus", function () {
    $(".searchJobDynamicFocus").addClass("focused");
  });
  $(".searchJobDynamicFocus input").on("focusout", function () {
    $(".searchJobDynamicFocus").removeClass("focused");
  });
  $(".geolocationButton").on("click", function (e) {
    e.preventDefault();
    // Step 1: Get user coordinates
    function getCoordintes() {
      var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0,
      };

      function success(pos) {
        var crd = pos.coords;
        var lat = crd.latitude.toString();
        var lng = crd.longitude.toString();
        var coordinates = [lat, lng];
        getCity(coordinates);
        return;
      }

      function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
      }

      navigator.geolocation.getCurrentPosition(success, error, options);
    }

    // Step 2: Get city name
    function getCity(coordinates) {
      var xhr = new XMLHttpRequest();
      var lat = coordinates[0];
      var lng = coordinates[1];

      // Paste your LocationIQ token below.
      xhr.open(
        "GET",
        "https://us1.locationiq.com/v1/reverse.php?key=pk.15c08d07dfc51dd1a4dfcbe31d6eca20&lat=" +
          lat +
          "&lon=" +
          lng +
          "&format=json",
        true
      );
      xhr.send();
      xhr.onreadystatechange = processRequest;
      xhr.addEventListener("readystatechange", processRequest, false);

      function processRequest(e) {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          var city = response.address.city;
          $(".geoLocationInp").val(city);
          return;
        }
      }
    }
    getCoordintes();
  });
  //initialize wow js
  new WOW({}).init();

  /*--------------- Tab button js--------*/

  $(".next").on("click", function () {
    const nextTabLinkEl = $(".v_menu .active")
      .closest("li")
      .next("li")
      .find("a");
    const nextTab = new bootstrap.Tab(nextTabLinkEl);
    nextTab.show();
  });
  $(".previous").on("click", function () {
    const prevTabLinkEl = $(".v_menu  .active")
      .closest("li")
      .prev("li")
      .find("a");
    const prevTab = new bootstrap.Tab(prevTabLinkEl);
    prevTab.show();
  });

  function Click_menu_hover() {
    if ($(".tab-demo").length) {
      $.fn.tab = function (options) {
        var opts = $.extend({}, $.fn.tab.defaults, options);
        return this.each(function () {
          var obj = $(this);

          $(obj)
            .find(".tabHeader li")
            .on(opts.trigger_event_type, function () {
              $(obj).find(".tabHeader li").removeClass("active");
              $(this).addClass("active");

              $(obj).find(".tabContent .tab-pane").removeClass("active show");
              $(obj)
                .find(".tabContent .tab-pane")
                .eq($(this).index())
                .addClass("active show");
            });
        });
      };
      $.fn.tab.defaults = {
        trigger_event_type: "click", //mouseover | click é»˜è®¤æ˜¯click
      };
    }
  }

  Click_menu_hover();

  function Tab_menu_activator() {
    if ($(".tab-demo").length) {
      $(".tab-demo").tab({
        trigger_event_type: "mouseover",
      });
    }
  }

  Tab_menu_activator();

  function DataTable() {
    if ($("#dtMaterialDesignExample").length) {
      $(document).ready(function () {
        $("#dtMaterialDesignExample").DataTable();
        $("#dtMaterialDesignExample_wrapper")
          .find("label")
          .each(function () {
            $(this).parent().append($(this).children());
          });
        $("#dtMaterialDesignExample_wrapper .dataTables_filter")
          .find("input")
          .each(function () {
            const $this = $(this);
            $this.attr("placeholder", "Search");
            $this.removeClass("form-control-sm");
          });
        $("#dtMaterialDesignExample_wrapper .dataTables_length").addClass(
          "d-flex flex-row"
        );
        $("#dtMaterialDesignExample_wrapper .dataTables_filter").addClass(
          "md-form"
        );
        $("#dtMaterialDesignExample_wrapper select").removeClass(
          "custom-select custom-select-sm form-control form-control-sm"
        );
        $("#dtMaterialDesignExample_wrapper select").addClass("mdb-select");
        $("#dtMaterialDesignExample_wrapper .dataTables_filter")
          .find("label")
          .remove();
      });
    }
  }

  DataTable();

  $(".modal").on("shown.bs.modal", function (e) {
    $(".modal_slider")
      .not(".slick-initialized")
      .slick({
        slidesToScroll: 1,
        dots: false,
        focusOnSelect: true,
        arrows: true,
        infinite: false,
        swipeToSlide: false,
        centerMode: true,
        asNavFor: ".modal_carousel",
        slidesToShow: 3,
        prevArrow: ".prev_modal",
        nextArrow: ".next_modal",
        responsive: [
          {
            breakpoint: 767,
            settings: {
              vertical: false,
              centerPadding: "0px",
            },
          },
          {
            breakpoint: 575,
            settings: {
              vertical: false,
              centerPadding: "0px",
              slidesToShow: 1,
            },
          },
        ],
      })
      .on("beforeChange", function (event, slick, currentSlide, nextSlide) {
        $(".modal_slider_css .slick-current video").attr(
          "src",
          $(".modal_slider_css .slick-current video").attr("src")
        );
        $(".modal_slider_css .slick-current .video-js").removeClass(
          "vjs-playing"
        );
      });
    $(".close").click(function () {
      $(".modal_slider_css .slick-current video").attr(
        "src",
        $(".modal_slider_css .slick-current video").attr("src")
      );
      $(".modal_slider_css .slick-current .video-js").removeClass(
        "vjs-playing"
      );
    });
    $(".modal_carousel")
      .not(".slick-initialized")
      .slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: false,
        asNavFor: ".modal_slider",
        dots: false,
        focusOnSelect: true,
        arrows: true,
        infinite: false,
        swipeToSlide: true,
        prevArrow: $(".prev_car"),
        nextArrow: $(".next_car"),
        centerMode: false,
        responsive: [
          {
            breakpoint: 1199,
            settings: {
              vertical: false,
              slidesToShow: 4,
            },
          },
          {
            breakpoint: 991,
            settings: {
              vertical: false,
              slidesToShow: 2,
            },
          },
          {
            breakpoint: 767,
            settings: {
              vertical: false,
              slidesToShow: 2,
              centerMode: false,
            },
          },
          {
            breakpoint: 575,
            settings: {
              vertical: false,
              slidesToShow: 1,
              centerMode: false,
            },
          },
        ],
      })
      .on("beforeChange", function (event, slick, currentSlide, nextSlide) {
        $(".modal_slider_css .slick-current video").attr(
          "src",
          $(".modal_slider_css .slick-current video").attr("src")
        );
        $(".modal_slider_css .slick-current .video-js").removeClass(
          "vjs-playing"
        );
      });
  });

  $(document).ready(function () {
    $(".divs div").each(function (e) {
      if (e != 0) $(this).hide();
    });

    $(".next").click(function () {
      //$(".list li").addClass("active");
      if (($(".divs div:visible").next().length = !0)) {
        $(".divs div:visible").next().show().prev().hide();
        var activeClass = "." + $(".divs div:visible").attr("class");
        $(".list").find("li").removeClass("active show");
        $(".list").find(activeClass).addClass("active show");
      } else {
        $(".divs div:visible").hide();
        $(".divs div:first").show();
        $(".list").find("li").removeClass("active show");
        $(".list li:first").addClass("active show");
      }
      return false;
    });

    $(".prev").click(function () {
      if (($(".divs div:visible").prev().length = !0)) {
        $(".divs div:visible").prev().show().next().hide();
        var activeClass = "." + $(".divs div:visible").attr("class");
        $(".list").find("li").removeClass("active show");
        $(".list").find(activeClass).addClass("active show");
      } else {
        $(".divs div:visible").hide();
        $(".divs div:last").show();
        $(".list").find("li").removeClass("active show");
        $(".list li:last").addClass("active show");
      }
      return false;
    });
    $(".close_btn").on("click", function () {
      $(".nav.list li").removeClass("active show");
      $(".nav.list li .dropdown-menu").removeClass("show");
      $("body").removeClass("blur");
    });
    $(".nav.list li .img_pointing").on("click", function () {
      $("body").toggleClass("blur");
    });
    var selector, elems, makeActive;

    selector = ".nav.list li";

    elems = document.querySelectorAll(selector);

    makeActive = function () {
      for (var i = 0; i < elems.length; i++)
        elems[i].classList.remove("active");

      this.classList.add("active");
    };

    for (var i = 0; i < elems.length; i++)
      elems[i].addEventListener("mousedown", makeActive);

    if ($(".nav.list li").hasClass("active")) {
      $("body").addClass("blur");
    }
  });

  /*--------------- popup-js--------*/
  function popupGallery() {
    if ($(".img_popup").length) {
      $(".img_popup").each(function () {
        $(".img_popup").magnificPopup({
          type: "image",
          closeOnContentClick: true,
          closeBtnInside: false,
          fixedContentPos: true,
          removalDelay: 300,
          mainClass: "mfp-no-margins mfp-with-zoom",
          image: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1], // Will preload 0 - before current, and 1 after the current image,
          },
        });
      });
    }
  }

  /*------------- Dark Mode -------------- */
  function createCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
  }

  function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  var prefersDark =
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches;
  var selectedNightTheme = readCookie("body_dark");

  if (
    selectedNightTheme == "true" ||
    (selectedNightTheme === null && prefersDark)
  ) {
    applyNight();
    $(".dark_mode_switcher").prop("checked", true);
  } else {
    applyDay();
    $(".dark_mode_switcher").prop("checked", false);
  }

  function applyNight() {
    if ($(".js-darkmode-btn .ball").length) {
      $(".js-darkmode-btn .ball").css("left", "26px");
    }
    $("body").addClass("body_dark");
  }

  function applyDay() {
    if ($(".js-darkmode-btn .ball").length) {
      $(".js-darkmode-btn .ball").css("left", "3px");
    }
    $("body").removeClass("body_dark");
  }

  $(".dark_mode_switcher").change(function () {
    if ($(this).is(":checked")) {
      applyNight();

      createCookie("body_dark", true, 999);
    } else {
      applyDay();
      createCookie("body_dark", false, 999);
    }
  });

  popupGallery();

  $(".shadow-sm").hover(
    function () {
      $(this).addClass("shadow-lg");
    },
    function () {
      $(this).removeClass("shadow-lg");
    }
  );
})(jQuery);
