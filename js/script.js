"use strict";
(function() {
  function e(e) {
    return (
      !!f ||
      (e.offset().top + e.outerHeight() >= l.scrollTop() &&
        e.offset().top <= l.scrollTop() + l.height())
    );
  }
  function t(t, a) {
    var r = function() {
      !t.hasClass("lazy-loaded") &&
        e(t) &&
        (a.call(), t.addClass("lazy-loaded"));
    };
    r(), l.on("scroll", r);
  }
  var a = navigator.userAgent.toLowerCase(),
    r = new Date(),
    s = $(document),
    l = $(window),
    n = $("html"),
    o = $("body"),
    p = n.hasClass("desktop"),
    m = -1 < navigator.userAgent.toLowerCase().indexOf("firefox"),
    g = "rtl" === n.attr("dir"),
    h =
      -1 == a.indexOf("msie")
        ? -1 == a.indexOf("trident")
          ? -1 != a.indexOf("edge") && 12
          : 11
        : parseInt(a.split("msie")[1]),
    u = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    ),
    f = window.xMode,
    v = {
      pointerEvents: !!(11 > h) && "js/pointer-events.min.js",
      bootstrapTooltip: $("[data-toggle='tooltip']"),
      bootstrapModalDialog: $(".modal"),
      bootstrapTabs: $(".tabs-custom"),
      copyrightYear: $(".copyright-year"),
      rdNavbar: $(".rd-navbar"),
      rdMailForm: $(".rd-mailform"),
      rdInputLabel: $(".form-label"),
      regula: $("[data-constraints]"),
      owl: $(".owl-carousel"),
      swiper: document.querySelectorAll(".swiper-container"),
      search: $(".rd-search"),
      searchResults: $(".rd-search-results"),
      mfp: $("[data-lightbox]").not(
        '[data-lightbox="gallery"] [data-lightbox]'
      ),
      mfpGallery: $('[data-lightbox^="gallery"]'),
      statefulButton: $(".btn-stateful"),
      isotope: $(".isotope"),
      popover: $('[data-toggle="popover"]'),
      viewAnimate: $(".view-animate"),
      lightGallery: $("[data-lightgallery='group']"),
      lightGalleryItem: $("[data-lightgallery='item']"),
      lightDynamicGalleryItem: $("[data-lightgallery='dynamic']"),
      radio: $("input[type='radio']"),
      checkbox: $("input[type='checkbox']"),
      customToggle: $("[data-custom-toggle]"),
      counter: $(".counter"),
      progressLinear: $(".progress-linear"),
      circleProgress: $(".progress-bar-circle"),
      dateCountdown: $(".DateCountdown"),
      pageLoader: $(".preloader"),
      flickrfeed: $(".flickr"),
      selectFilter: $("select"),
      rdAudioPlayer: $(".rd-audio"),
      vide: $(".vide_bg"),
      jPlayerInit: $(".jp-player-init"),
      customParallax: $(".custom-parallax"),
      slick: $(".slick-slider"),
      countDown: $(".countdown"),
      calendar: $(".rd-calendar"),
      bookingCalendar: $(".booking-calendar"),
      bootstrapDateTimePicker: $("[data-time-picker]"),
      facebookWidget: $("#fb-root"),
      twitterfeed: $(".twitter-timeline"),
      rdRange: $(".rd-range"),
      stepper: $("input[type='number']"),
      customWaypoints: $("[data-custom-scroll-to]"),
      scroller: $(".scroll-wrap"),
      captcha: $(".recaptcha"),
      materialParallax: $(".parallax-container"),
      wow: $(".wow"),
      textRotator: $(".text-rotator"),
      particles: $("#particles-js"),
      customCarousel: document.querySelectorAll(".circle-carousel"),
      maps: $(".google-map-container")
    };
  l.on("load", function() {
    if (
      (0 < v.pageLoader.length && !f
        ? (v.pageLoader.fadeOut("slow"), l.trigger("resize"))
        : v.pageLoader.remove(),
      v.isotope.length)
    )
      for (var e, t = 0; t < v.isotope.length; t++)
        (e = v.isotope[t]), e.isotope.layout();
  }),
    $(function() {
      function a(e, t) {
        return t.parentNode.insertBefore(e, t.nextSibling);
      }
      function y(e) {
        function t(e) {
          var t = e.$wrapperEl[0].children[e.activeIndex];
          return {
            centerX: t.getAttribute("data-circle-cx")
              ? e.width * t.getAttribute("data-circle-cx")
              : e.width / 2,
            centerY: t.getAttribute("data-circle-cy")
              ? e.height * t.getAttribute("data-circle-cy")
              : e.height / 2,
            radius: t.getAttribute("data-circle-r")
              ? e.width * t.getAttribute("data-circle-r")
              : 0.4 * e.height
          };
        }
        (e.params.svg = {
          fill: e.$el[0].getAttribute("data-circle-fill") || "#f1f1f1",
          easingIn: "easeOutQuad",
          easingOut: "easeOutQuad"
        }),
          (e.svg = {}),
          (e.svg.el = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
          )),
          e.svg.el.setAttribute("class", "swiper-svg"),
          e.svg.el.setAttribute("width", "100%"),
          e.svg.el.setAttribute("height", "100%"),
          e.svg.el.setAttribute("viewbox", "0 0 " + e.width + " " + e.height),
          (e.svg.circle = t(e)),
          (e.svg.el.innerHTML =
            '<circle fill="' +
            e.params.svg.fill +
            '"  cx="' +
            e.svg.circle.centerX +
            '" cy="' +
            e.svg.circle.centerY +
            '" r="' +
            e.svg.circle.radius +
            '"/>'),
          e.$el[0].insertBefore(e.svg.el, e.$wrapperEl[0]),
          (e.svg.circleEl = e.svg.el.querySelector("circle")),
          e.on("resize", function() {
            (e.svg.circle = t(e)),
              e.svg.circleEl.setAttribute("cx", e.svg.circle.centerX),
              e.svg.circleEl.setAttribute("cy", e.svg.circle.centerY),
              e.svg.circleEl.setAttribute("r", e.svg.circle.radius);
          }),
          e.on("slideChangeTransitionStart", function() {
            var e = this;
            e.svg.circle = t(e);
            (function() {
              return new Promise(function(t) {
                anime({
                  targets: e.svg.circleEl,
                  duration: e.params.speed / 4,
                  easing: e.params.svg.easingIn,
                  cx: e.width / 2,
                  cy: e.height / 2,
                  r: e.width,
                  complete: t
                });
              });
            })().then(function() {
              return new Promise(function(t) {
                anime({
                  targets: e.svg.circleEl,
                  duration: e.params.speed / 4,
                  delay: e.params.speed / 2,
                  easing: e.params.svg.easingOut,
                  cx: e.svg.circle.centerX,
                  cy: e.svg.circle.centerY,
                  r: e.svg.circle.radius,
                  complete: t
                });
              });
            });
          });
      }
      function b(e) {
        var t = function(e, t) {
          switch (t) {
            case "step1":
              return (
                "M 0,0 0," +
                e.height +
                " " +
                e.width +
                "," +
                e.height +
                " " +
                e.width +
                ",0 0,0 Z M " +
                e.frame.size +
                "," +
                e.frame.size +
                " " +
                e.width +
                ",0 " +
                e.width +
                "," +
                e.height +
                " 0," +
                e.height +
                " Z"
              );
              break;
            case "step2":
              return (
                "M 0,0 0," +
                e.height +
                " " +
                e.width +
                "," +
                e.height +
                " " +
                e.width +
                ",0 0,0 Z M " +
                e.frame.size +
                "," +
                e.frame.size +
                " " +
                (e.width - e.frame.size) +
                "," +
                e.frame.size +
                " " +
                e.width +
                "," +
                e.height +
                " 0," +
                e.height +
                " Z"
              );
              break;
            case "step3":
              return (
                "M 0,0 0," +
                e.height +
                " " +
                e.width +
                "," +
                e.height +
                " " +
                e.width +
                ",0 0,0 Z M " +
                e.frame.size +
                "," +
                e.frame.size +
                " " +
                (e.width - e.frame.size) +
                "," +
                e.frame.size +
                " " +
                (e.width - e.frame.size) +
                "," +
                (e.height - e.frame.size) +
                " 0," +
                e.height +
                " Z"
              );
              break;
            case "step4":
              return (
                "M 0,0 0," +
                e.height +
                " " +
                e.width +
                "," +
                e.height +
                " " +
                e.width +
                ",0 0,0 Z M " +
                e.frame.size +
                "," +
                e.frame.size +
                " " +
                (e.width - e.frame.size) +
                "," +
                e.frame.size +
                " " +
                (e.width - e.frame.size) +
                "," +
                (e.height - e.frame.size) +
                " " +
                e.frame.size +
                "," +
                (e.height - e.frame.size) +
                " Z"
              );
              break;
            default:
              return (
                "M 0,0 0," +
                e.height +
                " " +
                e.width +
                "," +
                e.height +
                " " +
                e.width +
                ",0 0,0 Z M 0,0 " +
                e.width +
                ",0 " +
                e.width +
                "," +
                e.height +
                " 0," +
                e.height +
                " Z"
              );
          }
        };
        (e.params.frame = {
          fill: e.$el[0].getAttribute("data-frame-fill") || "#f1f1f1",
          easingIn: "easeOutQuad",
          easingOut: "easeOutQuad"
        }),
          (e.frame = {}),
          (e.frame.size = e.width / 12),
          (e.frame.paths = {
            initial: t(e),
            step1: t(e, "step1"),
            step2: t(e, "step2"),
            step3: t(e, "step3"),
            step4: t(e, "step4")
          }),
          (e.frame.el = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
          )),
          e.frame.el.setAttribute("class", "swiper-frame"),
          e.frame.el.setAttribute("width", "100%"),
          e.frame.el.setAttribute("height", "100%"),
          e.frame.el.setAttribute("fill-rule", "evenodd"),
          e.frame.el.setAttribute("viewbox", "0 0 " + e.width + " " + e.height),
          (e.frame.el.innerHTML =
            '<path fill="' +
            e.params.frame.fill +
            '" d="' +
            e.frame.paths.initial +
            '"/>'),
          e.$el[0].insertBefore(e.frame.el, e.$wrapperEl[0]),
          (e.frame.shape = e.frame.el.querySelector("path")),
          e.on("resize", function() {
            (this.frame.size = this.width / 12),
              (this.frame.paths.initial = t(this)),
              (this.frame.paths.step1 = t(this, "step1")),
              (this.frame.paths.step2 = t(this, "step2")),
              (this.frame.paths.step3 = t(this, "step3")),
              (this.frame.paths.step4 = t(this, "step4")),
              this.frame.el.setAttribute(
                "viewbox",
                "0 0 " + this.width + " " + this.height
              ),
              this.frame.shape.setAttribute(
                "d",
                this.animating
                  ? this.frame.paths.final
                  : this.frame.paths.initial
              );
          }),
          e.on("slideChangeTransitionStart", function() {
            var e = this;
            (function() {
              return new Promise(function(t) {
                var a = 0.14 * e.params.speed,
                  r = anime.timeline({
                    duration: a,
                    easing: e.params.frame.easingIn
                  });
                r.add({ targets: e.frame.shape, d: e.frame.paths.step1 })
                  .add({
                    targets: e.frame.shape,
                    d: e.frame.paths.step2,
                    offset: "-=" + 0.5 * a
                  })
                  .add({
                    targets: e.frame.shape,
                    d: e.frame.paths.step3,
                    offset: "-=" + 0.5 * a
                  })
                  .add({
                    targets: e.frame.shape,
                    d: e.frame.paths.step4,
                    offset: "-=" + 0.5 * a,
                    complete: t
                  });
              });
            })().then(function() {
              return new Promise(function(t) {
                var a = 0.14 * e.params.speed,
                  r = anime.timeline({
                    duration: a,
                    easing: e.params.frame.easingIn
                  });
                r.add({
                  targets: e.frame.shape,
                  delay: 0.25 * e.params.speed,
                  d: e.frame.paths.step3
                })
                  .add({
                    targets: e.frame.shape,
                    d: e.frame.paths.step2,
                    offset: "-=" + 0.5 * a
                  })
                  .add({
                    targets: e.frame.shape,
                    d: e.frame.paths.step1,
                    offset: "-=" + 0.5 * a
                  })
                  .add({
                    targets: e.frame.shape,
                    d: e.frame.paths.initial,
                    offset: "-=" + 0.5 * a,
                    complete: t
                  });
              });
            });
          });
      }
      function w(e) {
        var t = function(e, t) {
            switch (t) {
              case "next":
                return (
                  "M 0,0 0," +
                  e.height +
                  " " +
                  e.width +
                  "," +
                  e.height +
                  " " +
                  e.width +
                  ",0 0,0 Z M " +
                  e.frame.size +
                  "," +
                  e.frame.size +
                  " " +
                  (e.width - e.frame.size) +
                  "," +
                  e.frame.size / 2 +
                  " " +
                  (e.width - e.frame.size) +
                  "," +
                  (e.height - e.frame.size / 2) +
                  " " +
                  e.frame.size +
                  "," +
                  (e.height - e.frame.size) +
                  " Z"
                );
                break;
              case "prev":
                return (
                  "M 0,0 0," +
                  e.height +
                  " " +
                  e.width +
                  "," +
                  e.height +
                  " " +
                  e.width +
                  ",0 0,0 Z M " +
                  e.frame.size +
                  "," +
                  e.frame.size / 2 +
                  " " +
                  (e.width - e.frame.size) +
                  "," +
                  e.frame.size +
                  " " +
                  (e.width - e.frame.size) +
                  "," +
                  (e.height - e.frame.size) +
                  " " +
                  e.frame.size +
                  "," +
                  (e.height - e.frame.size / 2) +
                  " Z"
                );
                break;
              default:
                return (
                  "M 0,0 0," +
                  e.height +
                  " " +
                  e.width +
                  "," +
                  e.height +
                  " " +
                  e.width +
                  ",0 0,0 Z M 0,0 " +
                  e.width +
                  ",0 " +
                  e.width +
                  "," +
                  e.height +
                  " 0," +
                  e.height +
                  " Z"
                );
            }
          },
          a = function(e) {
            return new Promise(function(t) {
              anime({
                targets: e.frame.shape,
                duration: e.params.speed / 4,
                easing: e.params.frame.easingIn,
                d: e.frame.paths.next,
                complete: t
              });
            });
          },
          r = function(e) {
            return new Promise(function(t) {
              anime({
                targets: e.frame.shape,
                duration: e.params.speed / 4,
                easing: e.params.frame.easingIn,
                d: e.frame.paths.prev,
                complete: t
              });
            });
          },
          i = function(e) {
            return function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 4,
                  delay: e.params.speed / 2,
                  easing: e.params.frame.easingOut,
                  d: e.frame.paths.initial,
                  complete: t
                });
              });
            };
          };
        (e.params.frame = {
          fill: e.$el[0].getAttribute("data-frame-fill") || "#f1f1f1",
          easingIn: "easeOutQuint",
          easingOut: "easeOutQuad"
        }),
          (e.frame = {}),
          (e.frame.size = e.width / 12),
          (e.frame.paths = {
            initial: t(e),
            next: t(e, "next"),
            prev: t(e, "prev")
          }),
          (e.frame.el = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
          )),
          e.frame.el.setAttribute("class", "swiper-frame"),
          e.frame.el.setAttribute("width", "100%"),
          e.frame.el.setAttribute("height", "100%"),
          e.frame.el.setAttribute("fill-rule", "evenodd"),
          e.frame.el.setAttribute("viewbox", "0 0 " + e.width + " " + e.height),
          (e.frame.el.innerHTML =
            '<path fill="' +
            e.params.frame.fill +
            '" d="' +
            e.frame.paths.initial +
            '"/>'),
          e.$el[0].insertBefore(e.frame.el, e.$wrapperEl[0]),
          (e.frame.shape = e.frame.el.querySelector("path")),
          e.on("resize", function() {
            (this.frame.size = this.width / 12),
              (this.frame.paths.initial = t(this)),
              (this.frame.paths.next = t(this, "next")),
              (this.frame.paths.prev = t(this, "prev")),
              this.frame.el.setAttribute(
                "viewbox",
                "0 0 " + this.width + " " + this.height
              ),
              this.frame.shape.setAttribute(
                "d",
                this.animating
                  ? this.frame.paths.final
                  : this.frame.paths.initial
              );
          }),
          e.on("slideNextTransitionStart", function() {
            var e = this;
            a(e).then(i(e));
          }),
          e.on("slidePrevTransitionStart", function() {
            var e = this;
            r(e).then(i(e));
          });
      }
      function x(e) {
        var t = function(e, t) {
          var a = e.width,
            r = e.height;
          switch (t) {
            case "slash":
              var i = { x: a / 4 - 50, y: r / 4 + 50 },
                s = { x: a / 4 + 50, y: r / 4 - 50 },
                l = { x: a - s.x, y: r - s.y },
                n = { x: a - i.x, y: r - i.y };
              return [
                "M 0,0",
                "0," + r,
                a + "," + r,
                a + ",0",
                "0,0 Z",
                "M " + i.x + "," + i.y,
                s.x + "," + s.y,
                n.x + "," + n.y,
                l.x + "," + l.y + " Z"
              ].join(" ");
              break;
            default:
              return [
                "M 0,0",
                "0," + r,
                a + "," + r,
                a + ",0",
                "0,0 Z",
                "M 0,0",
                a + ",0",
                a + "," + r,
                "0," + r,
                "0,0 Z"
              ].join(" ");
          }
        };
        (e.params.frame = {
          fill: e.$el[0].getAttribute("data-frame-fill") || "#f1f1f1",
          easingIn: "easeOutQuint",
          easingOut: "easeOutQuad"
        }),
          S(e),
          (e.frame = {}),
          (e.frame.paths = { initial: t(e), final: t(e, "slash") }),
          (e.frame.el = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
          )),
          e.frame.el.setAttribute("class", "swiper-frame"),
          e.frame.el.setAttribute("width", "100%"),
          e.frame.el.setAttribute("height", "100%"),
          e.frame.el.setAttribute("fill-rule", "evenodd"),
          e.frame.el.setAttribute("viewbox", "0 0 " + e.width + " " + e.height),
          (e.frame.el.innerHTML =
            '<path fill="' +
            e.params.frame.fill +
            '" d="' +
            e.frame.paths.initial +
            '"/>'),
          e.$el[0].insertBefore(e.frame.el, e.$wrapperEl[0]),
          (e.frame.shape = e.frame.el.querySelector("path")),
          e.on("resize", function() {
            (this.frame.paths.initial = t(this)),
              (this.frame.paths.final = t(this, "slash")),
              this.frame.el.setAttribute(
                "viewbox",
                "0 0 " + this.width + " " + this.height
              ),
              this.frame.shape.setAttribute(
                "d",
                this.animating
                  ? this.frame.paths.final
                  : this.frame.paths.initial
              );
          }),
          e.on("slideChangeTransitionStart", function() {
            var e = this;
            (function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 4,
                  easing: e.params.frame.easingIn,
                  d: e.frame.paths.final,
                  complete: t
                });
              });
            })().then(function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 4,
                  delay: e.params.speed / 2,
                  easing: e.params.frame.easingOut,
                  d: e.frame.paths.initial,
                  complete: t
                });
              });
            });
          });
      }
      function C(e) {
        var t = function(e) {
            return e.frame.minSize + e.frame.maxSize * Math.random();
          },
          a = function(e, a) {
            switch (a) {
              case "random":
                return (
                  "M 0,0 " +
                  e.width +
                  ",0 " +
                  e.width +
                  "," +
                  e.height +
                  " 0," +
                  e.height +
                  " Z M " +
                  t(e) +
                  "," +
                  t(e) +
                  " " +
                  (e.width - t(e)) +
                  "," +
                  t(e) +
                  " " +
                  (e.width - t(e)) +
                  "," +
                  (e.height - t(e)) +
                  " " +
                  t(e) +
                  "," +
                  (e.height - t(e)) +
                  " Z"
                );
                break;
              default:
                return (
                  "M 0,0 " +
                  e.width +
                  ",0 " +
                  e.width +
                  "," +
                  e.height +
                  " 0," +
                  e.height +
                  " Z M 0,0 " +
                  e.width +
                  ",0 " +
                  e.width +
                  "," +
                  e.height +
                  " 0," +
                  e.height +
                  " Z"
                );
            }
          };
        (e.params.frame = {
          fill: e.$el[0].getAttribute("data-frame-fill") || "#f1f1f1",
          easingIn: "easeOutQuint",
          easingOut: "easeOutQuad"
        }),
          (e.frame = {}),
          (e.frame.maxSize = e.width / 15),
          (e.frame.minSize = e.width / 30),
          (e.frame.paths = { initial: a(e), final: a(e, "random") }),
          (e.frame.el = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
          )),
          e.frame.el.setAttribute("class", "swiper-frame"),
          e.frame.el.setAttribute("width", "100%"),
          e.frame.el.setAttribute("height", "100%"),
          e.frame.el.setAttribute("fill-rule", "evenodd"),
          e.frame.el.setAttribute("viewbox", "0 0 " + e.width + " " + e.height),
          (e.frame.el.innerHTML =
            '<path fill="' +
            e.params.frame.fill +
            '" d="' +
            e.frame.paths.initial +
            '"/>'),
          e.$el[0].insertBefore(e.frame.el, e.$wrapperEl[0]),
          (e.frame.shape = e.frame.el.querySelector("path")),
          e.on("resize", function() {
            (this.frame.maxSize = e.width / 10),
              (this.frame.minSize = e.width / 30),
              (this.frame.paths.initial = a(this)),
              (this.frame.paths.final = a(this, "random")),
              this.frame.el.setAttribute(
                "viewbox",
                "0 0 " + this.width + " " + this.height
              ),
              this.frame.shape.setAttribute(
                "d",
                this.animating
                  ? this.frame.paths.final
                  : this.frame.paths.initial
              );
          }),
          e.on("slideChangeTransitionStart", function() {
            var e = this;
            (function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 4,
                  easing: e.params.frame.easingIn,
                  d: a(e, "random"),
                  complete: t
                });
              });
            })().then(function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 4,
                  delay: e.params.speed / 2,
                  easing: e.params.frame.easingOut,
                  d: e.frame.paths.initial,
                  complete: t
                });
              });
            });
          });
      }
      function A(e) {
        var t = function(e) {
            return {
              x: (e.width - 2 * e.frame.radiusReduced) * Math.random(),
              y:
                (e.height - 2 * e.frame.radiusReduced) * Math.random() +
                e.frame.radiusReduced
            };
          },
          a = function(e, a) {
            var i,
              s = e.width,
              l = e.height,
              n = t(e);
            switch (a) {
              case "reduced":
                return (
                  (i = e.frame.radiusReduced),
                  [
                    "M 0, 0",
                    "H " + s,
                    "V " + l,
                    "H 0 Z",
                    "M " + n.x + ", " + n.y,
                    "a " + i + "," + i + " 0 0,0 " + 2 * i + ",0",
                    "a " + i + "," + i + " 0 0,0 " + 2 * -i + ",0 Z"
                  ].join(" ")
                );
                break;
              default:
                return (
                  (i = e.frame.radiusFull),
                  [
                    "M 0, 0",
                    "H " + s,
                    "V " + l,
                    "H 0 Z",
                    "M " + (s / 2 - i) + ", " + l / 2,
                    "a " + i + "," + i + " 0 0,0 " + 2 * i + ",0",
                    "a " + i + "," + i + " 0 0,0 " + 2 * -i + ",0 Z"
                  ].join(" ")
                );
            }
          },
          r = function(e) {
            var t = Math.max(
              e.width / e.frame.image.initialBox.width,
              e.height / e.frame.image.initialBox.height
            );
            return {
              width: e.frame.image.initialBox.width * t,
              height: e.frame.image.initialBox.height * t
            };
          };
        (e.params.frame = {
          frameBg: e.$el[0].getAttribute("data-frame-bg"),
          easingIn: "easeOutQuint",
          easingOut: "easeInQuad"
        }),
          S(e),
          (e.frame = {}),
          (e.frame.radiusReduced = 0.15 * e.width),
          (e.frame.radiusFull = Math.sqrt(
            Math.pow(e.width, 2) + Math.pow(e.height, 2)
          )),
          (e.frame.paths = { initial: a(e), final: a(e, "reduced") }),
          (e.frame.el = document.createElementNS(
            "http://www.w3.org/2000/svg",
            "svg"
          )),
          e.frame.el.setAttribute("class", "swiper-frame"),
          e.frame.el.setAttribute("width", "100%"),
          e.frame.el.setAttribute("height", "100%"),
          e.frame.el.setAttribute("fill-rule", "evenodd"),
          e.frame.el.setAttribute("viewbox", "0 0 " + e.width + " " + e.height),
          (e.frame.el.innerHTML =
            '<defs><clipPath id="shape__clip"><path d="' +
            e.frame.paths.initial +
            '"/></clipPath></defs><image xlink:href="' +
            e.params.frame.frameBg +
            '" clip-path="url(#shape__clip)" x="0" y="0"/>'),
          e.$el[0].insertBefore(e.frame.el, e.$wrapperEl[0]),
          (e.frame.shape = e.frame.el.querySelector("path")),
          (e.frame.image = {}),
          (e.frame.image.el = e.frame.el.querySelector("image")),
          (e.frame.image.initialBox = (function(e) {
            var t = e.params.frame.frameBg.match(/\d+x\d+/g);
            return t[0]
              ? ((t = t[0].split("x")), { width: t[0], height: t[1] })
              : e.frame.image.el.getBBox();
          })(e)),
          (e.frame.image.box = r(e)),
          e.frame.image.el.setAttribute("width", e.frame.image.box.width),
          e.frame.image.el.setAttribute("height", e.frame.image.box.height),
          e.on("resize", function() {
            (this.frame.radiusReduced = e.width / 8),
              (this.frame.radiusFull = Math.sqrt(
                Math.pow(this.width, 2) + Math.pow(this.height, 2)
              )),
              (this.frame.image.box = r(this)),
              this.frame.image.el.setAttribute(
                "width",
                this.frame.image.box.width
              ),
              this.frame.image.el.setAttribute(
                "height",
                this.frame.image.box.height
              ),
              (this.frame.paths.initial = a(this)),
              (this.frame.paths.final = a(this, "reduced")),
              this.frame.el.setAttribute(
                "viewbox",
                "0 0 " + this.width + " " + this.height
              ),
              this.frame.shape.setAttribute(
                "d",
                this.animating
                  ? this.frame.paths.final
                  : this.frame.paths.initial
              );
          }),
          e.on("slideChangeTransitionStart", function() {
            var e = this;
            (function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 3,
                  easing: e.params.frame.easingIn,
                  d: a(e, "reduced"),
                  complete: t
                });
              });
            })().then(function() {
              return new Promise(function(t) {
                anime({
                  targets: e.frame.shape,
                  duration: e.params.speed / 3,
                  delay: e.params.speed / 3,
                  easing: e.params.frame.easingOut,
                  d: e.frame.paths.initial,
                  complete: t
                });
              });
            });
          });
      }
      function S(e) {
        (e.captWrapperEl = document.createElement("div")),
          (e.captWrapperEl.className = "swiper-wrapper separated"),
          a(e.captWrapperEl, e.$wrapperEl[0]);
        for (
          var t = e.$wrapperEl[0].querySelectorAll(".swiper-slide-caption"),
            r = 0;
          r < t.length;
          r++
        ) {
          var s = t[r].cloneNode(!0),
            l = document.createElement("div");
          (l.className = "swiper-slide"),
            e.captWrapperEl.appendChild(l),
            l.appendChild(s),
            t[r].remove();
        }
        e.captWrapperEl.children[e.activeIndex].classList.add("active"),
          e.on("slideChangeTransitionStart", function() {
            e.captWrapperEl.children[e.activeIndex].classList.add("active");
          }),
          e.on("slideChangeTransitionEnd", function() {
            e.captWrapperEl.children[e.realPrevious].classList.remove("active");
          });
      }
      function T(e) {
        for (
          var t,
            a = $(e.slides[e.previousIndex]),
            r = $(e.slides[e.activeIndex]),
            s = a.find("video"),
            l = 0;
          l < s.length;
          l++
        )
          s[l].pause();
        (t = r.find("video")),
          !f &&
            t.length &&
            (t.get(0).play(), t.css({ visibility: "visible", opacity: "1" }));
      }
      function E(e) {
        var t = e.$wrapperEl[0].children[e.activeIndex];
        e.realPrevious = Array.prototype.indexOf.call(t.parentNode.children, t);
      }
      function M(e, t) {
        t = t || {};
        var a = {
          swiperContentRide: function() {
            (e.animeReset = function() {
              (this.style.transform = "none"), (this.style.opacity = 0);
            }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateY: a ? 0 : [100, 0],
                  translateX: a ? ("next" === a ? [300, 0] : [-300, 0]) : 0,
                  opacity: [0, 1]
                });
              }),
              (e.animeOut = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: 0.3 * t.delay,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateX: a ? ("next" === a ? [0, -300] : [0, 300]) : 0,
                  opacity: [1, 0]
                });
              });
          },
          swiperContentStack: function() {
            (e.animeReset = function() {
              (this.style.transform = "none"), (this.style.opacity = 0);
            }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay || 0,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateY: [300, 0],
                  rotate: ["prev" === a ? 25 : -25, 0],
                  opacity: [0, 1]
                });
              }),
              (e.animeOut = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: 0.6 * t.delay || 0,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateY: [0, -300],
                  rotate: [0, "prev" === a ? -15 : 15],
                  opacity: [1, 0]
                });
              });
          },
          swiperContentDiagonal: function() {
            (e.animeReset = function() {
              (this.style.transform = "none"), (this.style.opacity = 0);
            }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay || 0,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateY: [300, 0],
                  translateX: ["next" === a ? 300 : -300, 0],
                  opacity: [0, 1]
                });
              }),
              (e.animeOut = function() {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: 0.6 * t.delay || 0,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  opacity: [1, 0]
                });
              });
          },
          swiperContentFade: function() {
            (t.easing = t.easing || "easeOutQuint"),
              (e.animeReset = function() {
                (this.style.transform = "none"), (this.style.opacity = 0);
              }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateY: "next" === a ? [100, 0] : [-100, 0],
                  opacity: [0, 1]
                });
              }),
              (e.animeOut = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: 0.6 * t.delay || 0,
                  easing: t.easing || "easeOutQuint",
                  direction: t.direction,
                  translateY: "next" === a ? [0, -100] : [0, 100],
                  opacity: [1, 0]
                });
              });
          },
          swiperSlideRide: function() {
            (e.animeReset = function() {
              this.style.transform = "translateX(0) scale(1.2)";
            }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay || 0,
                  easing: t.easing || "easeInOutQuad",
                  direction: t.direction,
                  translateX: a ? ("next" === a ? [200, 0] : [-200, 0]) : 0,
                  scale: { value: 1.2, duration: 0, delay: 0 }
                });
              });
          },
          swiperSlideRotate: function() {
            (e.animeReset = function() {
              this.style.transform = "rotate(0) scale(1.2)";
            }),
              (e.animeStart = function(a) {
                (e.style.transformOrigin =
                  "next" === a ? "0% 50%" : "100% 50%"),
                  anime({
                    targets: e,
                    duration: t.duration || 600,
                    delay: t.delay || 0,
                    easing: t.easing || "easeOutElastic",
                    direction: t.direction,
                    elasticity: 350,
                    rotate: a ? ("next" === a ? [5, 0] : [-5, 0]) : 0,
                    scale: a ? [1.3, 1.1] : 1
                  });
              });
          },
          swiperSlideZoomOut: function() {
            (e.animeReset = function() {
              this.style.transform = "none";
            }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay || 0,
                  easing: t.easing || "easeInOutQuad",
                  direction: t.direction,
                  translateY: a ? [300, 0] : 0,
                  translateX: a ? ("next" === a ? [300, 0] : [-300, 0]) : 0,
                  scale: a ? [1.7, 1] : 1
                });
              });
          },
          swiperSlideZoomIn: function() {
            (e.animeReset = function() {
              this.style.transform = "none";
            }),
              (e.animeStart = function(a) {
                anime({
                  targets: e,
                  duration: t.duration || 600,
                  delay: t.delay || 0,
                  easing: t.easing || "easeInQuad",
                  direction: t.direction,
                  scale: a ? [0.7, 1.7] : { value: 1.7, duration: 0 }
                });
              });
          }
        };
        a[t.animation]
          ? a[t.animation]()
          : console.warn(
              "Unknown anime on:",
              e,
              "This will cause further errors."
            );
      }
      function I(e) {
        e.params.anime = { animationEvent: "TransitionStart" };
        for (
          var t = e.$el[0].querySelectorAll(".swiper-wrapper"), a = 0;
          a < t.length;
          a++
        ) {
          for (
            var r,
              s = t[a],
              l = s.querySelectorAll("[data-swiper-anime]"),
              n = 0;
            n < l.length;
            n++
          )
            (r = l[n]), M(r, JSON.parse(r.getAttribute("data-swiper-anime")));
          l = s.children[e.activeIndex].querySelectorAll("[data-swiper-anime]");
          for (var n = 0; n < l.length; n++)
            l[n].animeStart && l[n].animeStart();
          e.on(
            "slideNext" + e.params.anime.animationEvent,
            (function(t) {
              return function() {
                for (
                  var a = t.children[e.activeIndex].querySelectorAll(
                      "[data-swiper-anime]"
                    ),
                    r = 0;
                  r < a.length;
                  r++
                )
                  a[r].animeStart && a[r].animeStart("next");
              };
            })(s)
          ),
            e.on(
              "slidePrev" + e.params.anime.animationEvent,
              (function(t) {
                return function() {
                  for (
                    var a = t.children[e.activeIndex].querySelectorAll(
                        "[data-swiper-anime]"
                      ),
                      r = 0;
                    r < a.length;
                    r++
                  )
                    a[r].animeStart && a[r].animeStart("prev");
                };
              })(s)
            ),
            e.on(
              "slideNextTransitionStart",
              (function(t) {
                return function() {
                  var a;
                  if (
                    "number" == typeof e.realPrevious &&
                    e.previousIndex !== e.realPrevious
                  ) {
                    a = t.children[e.realPrevious].querySelectorAll(
                      "[data-swiper-anime]"
                    );
                    for (var r = 0; r < a.length; r++)
                      a[r].animeOut && a[r].animeOut("next");
                  }
                  a = t.children[e.previousIndex].querySelectorAll(
                    "[data-swiper-anime]"
                  );
                  for (var r = 0; r < a.length; r++)
                    a[r].animeOut && a[r].animeOut("next");
                };
              })(s)
            ),
            e.on(
              "slidePrevTransitionStart",
              (function(t) {
                return function() {
                  var a;
                  if (
                    "number" == typeof e.realPrevious &&
                    e.previousIndex !== e.realPrevious
                  ) {
                    a = t.children[e.realPrevious].querySelectorAll(
                      "[data-swiper-anime]"
                    );
                    for (var r = 0; r < a.length; r++)
                      a[r].animeOut && a[r].animeOut("prev");
                  }
                  a = t.children[e.previousIndex].querySelectorAll(
                    "[data-swiper-anime]"
                  );
                  for (var r = 0; r < a.length; r++)
                    a[r].animeOut && a[r].animeOut("prev");
                };
              })(s)
            ),
            "TransitionEnd" === e.params.anime.animationEvent &&
              e.on(
                "slideChangeTransitionStart",
                (function(t) {
                  return function() {
                    for (
                      var a = t.children[e.activeIndex].querySelectorAll(
                          "[data-swiper-anime]"
                        ),
                        r = 0;
                      r < a.length;
                      r++
                    )
                      a[r].animeReset && a[r].animeReset();
                  };
                })(s)
              );
        }
      }
      function O(e) {
        var t = function(e) {
            return function() {
              var t;
              (t = e.getAttribute("data-caption-duration")) &&
                (e.style.animationDuration = t + "ms"),
                e.classList.remove("not-animated"),
                e.classList.add(e.getAttribute("data-caption-animate")),
                e.classList.add("animated");
            };
          },
          a = function(e) {
            for (var t, a = 0; a < e.length; a++)
              (t = e[a]),
                t.classList.remove("animated"),
                t.classList.remove(t.getAttribute("data-caption-animate")),
                t.classList.add("not-animated");
          },
          r = function(e) {
            for (var a, r = 0; r < e.length; r++)
              (a = e[r]),
                a.getAttribute("data-caption-delay")
                  ? setTimeout(t(a), +a.getAttribute("data-caption-delay"))
                  : t(a)();
          };
        (e.params.caption = { animationEvent: "slideChangeTransitionEnd" }),
          a(e.$wrapperEl[0].querySelectorAll("[data-caption-animate]")),
          r(
            e.$wrapperEl[0].children[e.activeIndex].querySelectorAll(
              "[data-caption-animate]"
            )
          ),
          "slideChangeTransitionEnd" === e.params.caption.animationEvent
            ? e.on(e.params.caption.animationEvent, function() {
                a(
                  e.$wrapperEl[0].children[e.previousIndex].querySelectorAll(
                    "[data-caption-animate]"
                  )
                ),
                  r(
                    e.$wrapperEl[0].children[e.activeIndex].querySelectorAll(
                      "[data-caption-animate]"
                    )
                  );
              })
            : (e.on("slideChangeTransitionEnd", function() {
                a(
                  e.$wrapperEl[0].children[e.previousIndex].querySelectorAll(
                    "[data-caption-animate]"
                  )
                );
              }),
              e.on(e.params.caption.animationEvent, function() {
                r(
                  e.$wrapperEl[0].children[e.activeIndex].querySelectorAll(
                    "[data-caption-animate]"
                  )
                );
              }));
      }
      function P(e) {
        var t = $(e);
        f ||
          t.on("click", function(t) {
            t.preventDefault(),
              $("body, html")
                .stop()
                .animate(
                  {
                    scrollTop: $(
                      "#" + $(this).attr("data-custom-scroll-to")
                    ).offset().top
                  },
                  1e3,
                  function() {
                    l.trigger("resize");
                  }
                );
          });
      }
      function D(e) {
        for (
          var t = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
            a = [0, 576, 768, 992, 1200, 1600],
            r = {},
            i = 0;
          i < a.length;
          i++
        ) {
          r[a[i]] = {};
          for (var s = i; -1 <= s; s--)
            !r[a[i]].items &&
              e.attr("data" + t[s] + "items") &&
              (r[a[i]].items =
                0 > s ? 1 : parseInt(e.attr("data" + t[s] + "items"), 10)),
              !r[a[i]].stagePadding &&
                0 !== r[a[i]].stagePadding &&
                e.attr("data" + t[s] + "stage-padding") &&
                (r[a[i]].stagePadding =
                  0 > s
                    ? 0
                    : parseInt(e.attr("data" + t[s] + "stage-padding"), 10)),
              !r[a[i]].margin &&
                0 !== r[a[i]].margin &&
                e.attr("data" + t[s] + "margin") &&
                (r[a[i]].margin =
                  0 > s ? 30 : parseInt(e.attr("data" + t[s] + "margin"), 10));
        }
        e.attr("data-dots-custom") &&
          e.on("initialized.owl.carousel", function(e) {
            var t = $(e.currentTarget),
              a = $(t.attr("data-dots-custom")),
              r = 0;
            t.attr("data-active") && (r = parseInt(t.attr("data-active"), 10)),
              t.trigger("to.owl.carousel", [r, 300, !0]),
              a.find("[data-owl-item='" + r + "']").addClass("active"),
              a.find("[data-owl-item]").on("click", function(a) {
                a.preventDefault(),
                  t.trigger("to.owl.carousel", [
                    parseInt(this.getAttribute("data-owl-item"), 10),
                    300,
                    !0
                  ]);
              }),
              t.on("translate.owl.carousel", function(e) {
                a.find(".active").removeClass("active"),
                  a
                    .find("[data-owl-item='" + e.item.index + "']")
                    .addClass("active");
              });
          }),
          e.on("initialized.owl.carousel", function() {
            G($('[data-lightgallery="group-owl"]'), "lightGallery-in-carousel"),
              Z(
                $('[data-lightgallery="item-owl"]'),
                "lightGallery-in-carousel"
              );
          }),
          e.owlCarousel({
            autoplay: !f && "true" === e.attr("data-autoplay"),
            loop: !f && "false" !== e.attr("data-loop"),
            items: 1,
            rtl: g,
            center: "true" === e.attr("data-center"),
            dotsContainer: e.attr("data-pagination-class") || !1,
            navContainer: e.attr("data-navigation-class") || !1,
            mouseDrag: !f && "false" !== e.attr("data-mouse-drag"),
            nav: "true" === e.attr("data-nav"),
            dots: "true" === e.attr("data-dots"),
            dotsEach:
              !!e.attr("data-dots-each") &&
              parseInt(e.attr("data-dots-each"), 10),
            animateIn:
              !!e.attr("data-animation-in") && e.attr("data-animation-in"),
            animateOut:
              !!e.attr("data-animation-out") && e.attr("data-animation-out"),
            responsive: r,
            navText: (function() {
              try {
                return JSON.parse(e.attr("data-nav-text"));
              } catch (t) {
                return [];
              }
            })(),
            navClass: (function() {
              try {
                return JSON.parse(e.attr("data-nav-class"));
              } catch (t) {
                return ["owl-prev", "owl-next"];
              }
            })()
          });
      }
      function N(e) {
        for (var t = [], a = 0; a < e.length; a++) {
          var r = e[a],
            s = $(r).data();
          for (var l in ((t[a] = {}), s))
            t[a][l.replace("jp", "").toLowerCase()] = s[l];
        }
        return t;
      }
      function L(e, t, a) {
        return new jPlayerPlaylist(
          {
            jPlayer: t.getElementsByClassName("jp-jplayer")[0],
            cssSelectorAncestor: ".jp-audio-" + e
          },
          a,
          {
            playlistOptions: { enableRemoveControls: !1 },
            supplied: "ogv, m4v, oga, mp3",
            useStateClassSkin: !0,
            volume: 0.4
          }
        );
      }
      function R(e) {
        $("#" + e.live)
          .removeClass("cleared")
          .html(),
          e.current++,
          e.spin.addClass("loading"),
          $.get(
            ge,
            {
              s: decodeURI(e.term),
              liveSearch: e.live,
              dataType: "html",
              liveCount: e.liveCount,
              filter: e.filter,
              template: e.template
            },
            function(t) {
              e.processed++;
              var a = $("#" + e.live);
              e.processed !== e.current ||
                a.hasClass("cleared") ||
                (a.find("> #search-results").removeClass("active"),
                a.html(t),
                setTimeout(function() {
                  a.find("> #search-results").addClass("active");
                }, 50)),
                e.spin
                  .parents(".rd-search")
                  .find(".input-group-addon")
                  .removeClass("loading");
            }
          );
      }
      function _(e) {
        for (var t = 0; t < e.length; t++) {
          var a,
            r = $(e[t]);
          r
            .addClass("form-control-has-validation")
            .after("<span class='form-validation'></span>"),
            (a = r.parent().find(".form-validation")),
            a.is(":last-child") && r.addClass("form-control-last-child");
        }
        e.on("input change propertychange blur", function(a) {
          var e,
            r = $(this);
          if (
            ("blur" === a.type || r.parent().hasClass("has-error")) &&
            !r.parents(".rd-mailform").hasClass("success")
          )
            if ((e = r.regula("validate")).length)
              for (t = 0; t < e.length; t++)
                r.siblings(".form-validation")
                  .text(e[t].message)
                  .parent()
                  .addClass("has-error");
            else
              r.siblings(".form-validation")
                .text("")
                .parent()
                .removeClass("has-error");
        }).regula("bind");
        for (
          var s,
            l = [
              {
                type: regula.Constraint.Required,
                newMessage: "El campo es requerido."
              },
              {
                type: regula.Constraint.Email,
                newMessage: "El email ingresado no v\xE1lido"
              },
              {
                type: regula.Constraint.Numeric,
                newMessage: "Ingrese solo n\xFAmerios"
              },
              {
                type: regula.Constraint.Selected,
                newMessage: "Por favor, seleccione una opci\xF3n."
              }
            ],
            t = 0;
          t < l.length;
          t++
        )
          (s = l[t]),
            regula.override({
              constraintType: s.type,
              defaultMessage: s.newMessage
            });
      }
      function q(e, t) {
        var a,
          r = 0;
        if (e.length) {
          for (var i, s = 0; s < e.length; s++)
            if (((i = $(e[s])), (a = i.regula("validate")).length))
              for (Ee = 0; Ee < a.length; Ee++)
                r++,
                  i
                    .siblings(".form-validation")
                    .text(a[Ee].message)
                    .parent()
                    .addClass("has-error");
            else
              i.siblings(".form-validation")
                .text("")
                .parent()
                .removeClass("has-error");
          return t && t.length ? F(t) && 0 == r : 0 == r;
        }
        return !0;
      }
      function F(e) {
        var t = e.find(".g-recaptcha-response").val();
        return (
          0 !== t.length ||
          (e
            .siblings(".form-validation")
            .html("Please, prove that you are not robot.")
            .addClass("active"),
          e.closest(".form-wrap").addClass("has-error"),
          e.on("propertychange", function() {
            var e = $(this),
              t = e.find(".g-recaptcha-response").val();
            0 < t.length &&
              (e.closest(".form-wrap").removeClass("has-error"),
              e
                .siblings(".form-validation")
                .removeClass("active")
                .html(""),
              e.off("propertychange"));
          }),
          !1)
        );
      }
      function B(e) {
        576 > window.innerWidth
          ? (v.bootstrapTooltip.tooltip("dispose"),
            v.bootstrapTooltip.tooltip({ placement: "bottom" }))
          : (v.bootstrapTooltip.tooltip("dispose"),
            v.bootstrapTooltip.tooltip({ placement: e }));
      }
      function G(e, t) {
        f ||
          $(e).lightGallery({
            thumbnail: "false" !== $(e).attr("data-lg-thumbnail"),
            selector: "[data-lightgallery='item']",
            autoplay: "true" === $(e).attr("data-lg-autoplay"),
            pause: parseInt($(e).attr("data-lg-autoplay-delay")) || 5e3,
            addClass: t,
            mode: $(e).attr("data-lg-animation") || "lg-slide",
            loop: "false" !== $(e).attr("data-lg-loop"),
            download: !1
          });
      }
      function H(e, t) {
        f ||
          $(e).on("click", function() {
            $(e).lightGallery({
              thumbnail: "false" !== $(e).attr("data-lg-thumbnail"),
              download: !1,
              selector: "[data-lightgallery='item']",
              autoplay: "true" === $(e).attr("data-lg-autoplay"),
              pause: parseInt($(e).attr("data-lg-autoplay-delay")) || 5e3,
              addClass: t,
              mode: $(e).attr("data-lg-animation") || "lg-slide",
              loop: "false" !== $(e).attr("data-lg-loop"),
              dynamic: !0,
              dynamicEl: JSON.parse($(e).attr("data-lg-dynamic-elements")) || []
            });
          });
      }
      function Z(e, t) {
        f ||
          $(e).lightGallery({
            selector: "this",
            addClass: t,
            counter: !1,
            youtubePlayerParams: {
              modestbranding: 1,
              showinfo: 0,
              rel: 0,
              controls: 0
            },
            vimeoPlayerParams: { byline: 0, portrait: 0 }
          });
      }
      function W(t, a, r, i) {
        var s = {};
        try {
          (s = JSON.parse(t)), i(new google.maps.LatLng(s.lat, s.lng), a, r);
        } catch (s) {
          r.geocoder.geocode({ address: t }, function(e, t) {
            if (t === google.maps.GeocoderStatus.OK) {
              var s = e[0].geometry.location.lat(),
                l = e[0].geometry.location.lng();
              i(new google.maps.LatLng(parseFloat(s), parseFloat(l)), a, r);
            }
          });
        }
      }
      function Q() {
        for (var e, t = 0; t < v.maps.length; t++)
          if (v.maps[t].hasAttribute("data-key")) {
            e = v.maps[t].getAttribute("data-key");
            break;
          }
        $.getScript(
          "//maps.google.com/maps/api/js?" +
            (e ? "key=" + e + "&" : "") +
            "sensor=false&libraries=geometry,places&v=quarterly",
          function() {
            var e = document.getElementsByTagName("head")[0],
              t = e.insertBefore;
            e.insertBefore = function(a, r) {
              (a.href &&
                -1 !==
                  a.href.indexOf("//fonts.googleapis.com/css?family=Roboto")) ||
                -1 !== a.innerHTML.indexOf("gm-style") ||
                t.call(e, a, r);
            };
            for (
              var a = new google.maps.Geocoder(), r = 0;
              r < v.maps.length;
              r++
            ) {
              var s = parseInt(v.maps[r].getAttribute("data-zoom"), 10) || 11,
                l = v.maps[r].hasAttribute("data-styles")
                  ? JSON.parse(v.maps[r].getAttribute("data-styles"))
                  : [],
                n = v.maps[r].getAttribute("data-center") || "New York",
                o = new google.maps.Map(
                  v.maps[r].querySelectorAll(".google-map")[0],
                  {
                    zoom: s,
                    styles: l,
                    scrollwheel: !1,
                    center: { lat: 0, lng: 0 }
                  }
                );
              (v.maps[r].map = o),
                (v.maps[r].geocoder = a),
                (v.maps[r].google = google),
                W(n, null, v.maps[r], function(e, t, a) {
                  a.map.setCenter(e);
                });
              var d = v.maps[r].querySelectorAll(".google-map-markers li");
              if (d.length)
                for (var c, p = [], m = 0; m < d.length; m++)
                  (c = d[m]),
                    W(c.getAttribute("data-location"), c, v.maps[r], function(
                      e,
                      t,
                      a
                    ) {
                      var r =
                          t.getAttribute("data-icon") ||
                          a.getAttribute("data-icon"),
                        i =
                          t.getAttribute("data-icon-active") ||
                          a.getAttribute("data-icon-active"),
                        s = t.getAttribute("data-description") || "",
                        l = new google.maps.InfoWindow({ content: s });
                      t.infoWindow = l;
                      var n = { position: e, map: a.map };
                      r && (n.icon = r);
                      var d = new google.maps.Marker(n);
                      (t.gmarker = d),
                        p.push({ markerElement: t, infoWindow: l }),
                        (d.isActive = !1),
                        google.maps.event.addListener(
                          l,
                          "closeclick",
                          function(e, t) {
                            var a = null;
                            (e.gmarker.isActive = !1),
                              (a =
                                e.getAttribute("data-icon") ||
                                t.getAttribute("data-icon")),
                              e.gmarker.setIcon(a);
                          }.bind(this, t, a)
                        ),
                        google.maps.event.addListener(
                          d,
                          "click",
                          function(e, t) {
                            if (0 !== e.infoWindow.getContent().length) {
                              for (
                                var a, r, i = e.gmarker, s = 0;
                                s < p.length;
                                s++
                              ) {
                                var l;
                                p[s].markerElement === e &&
                                  (r = p[s].infoWindow),
                                  (a = p[s].markerElement.gmarker),
                                  a.isActive &&
                                    p[s].markerElement !== e &&
                                    ((a.isActive = !1),
                                    (l =
                                      p[s].markerElement.getAttribute(
                                        "data-icon"
                                      ) || t.getAttribute("data-icon")),
                                    a.setIcon(l),
                                    p[s].infoWindow.close());
                              }
                              (i.isActive = !i.isActive),
                                i.isActive
                                  ? ((l =
                                      e.getAttribute("data-icon-active") ||
                                      t.getAttribute("data-icon-active")) &&
                                      i.setIcon(l),
                                    r.open(o, d))
                                  : ((l =
                                      e.getAttribute("data-icon") ||
                                      t.getAttribute("data-icon")) &&
                                      i.setIcon(l),
                                    r.close());
                            }
                          }.bind(this, t, a)
                        );
                    });
            }
          }
        );
      }
      if (
        (v.jPlayerInit.length &&
          (n.addClass(
            "ontouchstart" in window || "onmsgesturechange" in window
              ? "touch"
              : "no-touch"
          ),
          $.each(v.jPlayerInit, function(e, t) {
            var a = N($(t).find(".jp-player-list .jp-player-list-item")),
              r = L(e, t, a);
            if ($(t).data("jp-player-name")) {
              var i = $(
                  '[data-jp-playlist-relative-to="' +
                    $(t).data("jp-player-name") +
                    '"]'
                ),
                s = i.find("[data-jp-playlist-item]");
              s.on("click", i.data("jp-playlist-play-on"), function(t) {
                var e = N(s),
                  a = $(t.delegateTarget);
                (!JSON.stringify(r.playlist) !== JSON.stringify(e) &&
                  r.playlist.length) ||
                  r.setPlaylist(e),
                  a.hasClass("playing")
                    ? (s.removeClass("playing last-played"),
                      a.addClass("last-played"),
                      r.pause())
                    : (r.pause(),
                      a.hasClass("last-played") ? r.play() : r.play(s.index(a)),
                      s.removeClass("playing last-played"),
                      a.addClass("playing"));
              }),
                $(r.cssSelector.jPlayer).bind($.jPlayer.event.play, function() {
                  var e = function(e, t) {
                    var a = s.index(s.filter(e));
                    -1 !== a &&
                      0 !== s.eq(a + t).length &&
                      s
                        .eq(a)
                        .removeClass("play-next play-prev playing last-played")
                        .end()
                        .eq(a + t)
                        .addClass("playing");
                  };
                  e(".play-next", 1), e(".play-prev", -1);
                  var t = s.filter(".last-played");
                  t.length &&
                    t.addClass("playing").removeClass("last-played play-next");
                }),
                $(r.cssSelector.jPlayer).bind(
                  $.jPlayer.event.pause,
                  function() {
                    s
                      .filter(".playing")
                      .addClass("last-played")
                      .removeClass("playing"),
                      $(r.cssSelector.cssSelectorAncestor).addClass(
                        "jp-state-visible"
                      );
                  }
                ),
                $(t)
                  .find(".jp-next")
                  .on("click", function() {
                    s.filter(".playing, .last-played").addClass("play-next");
                  }),
                $(t)
                  .find(".jp-previous")
                  .on("click", function() {
                    s.filter(".playing, .last-played").addClass("play-prev");
                  });
            }
          })),
        v.owl.length)
      )
        for (var Y, X = 0; X < v.owl.length; X++)
          (Y = $(v.owl[X])), (v.owl[X].owl = Y), D(Y);
      if (
        ((window.onloadCaptchaCallback = function() {
          for (var e, t = 0; t < v.captcha.length; t++)
            (e = $(v.captcha[t])),
              grecaptcha.render(e.attr("id"), {
                sitekey: e.attr("data-sitekey"),
                size: e.attr("data-size") ? e.attr("data-size") : "normal",
                theme: e.attr("data-theme") ? e.attr("data-theme") : "light",
                callback: function() {
                  $(".recaptcha").trigger("propertychange");
                }
              }),
              e.after("<span class='form-validation'></span>");
        }),
        v.copyrightYear.length && v.copyrightYear.text(r.getFullYear()),
        v.maps.length && t(v.maps, Q),
        navigator.platform.match(/(Mac)/i) && n.addClass("mac-os"),
        m && n.addClass("firefox"),
        h &&
          (10 > h && n.addClass("lt-ie-10"),
          11 > h &&
            v.pointerEvents &&
            $.getScript(v.pointerEvents).done(function() {
              n.addClass("ie-10"), PointerEventsPolyfill.initialize({});
            }),
          11 === h && $("html").addClass("ie-11"),
          12 === h && $("html").addClass("ie-edge")),
        v.bootstrapTooltip.length)
      ) {
        var U = v.bootstrapTooltip.attr("data-placement");
        B(U),
          $(window).on("resize orientationchange", function() {
            B(U);
          });
      }
      if (0 < v.bootstrapModalDialog.length) {
        var X = 0;
        for (X = 0; X < v.bootstrapModalDialog.length; X++) {
          var J = $(v.bootstrapModalDialog[X]);
          J.on(
            "hidden.bs.modal",
            $.proxy(function() {
              var e = $(this),
                t = e.find("video"),
                a = e.find("iframe");
              if ((t.length && t[0].pause(), a.length)) {
                var r = a.attr("src");
                a.attr("src", "").attr("src", r);
              }
            }, J)
          );
        }
      }
      if (v.radio.length) {
        var X;
        for (X = 0; X < v.radio.length; X++) {
          var V = $(v.radio[X]);
          V.addClass("radio-custom").after(
            "<span class='radio-custom-dummy'></span>"
          );
        }
      }
      if (v.checkbox.length) {
        var X;
        for (X = 0; X < v.checkbox.length; X++) {
          var V = $(v.checkbox[X]);
          V.addClass("checkbox-custom").after(
            "<span class='checkbox-custom-dummy'></span>"
          );
        }
      }
      if (
        (v.popover.length &&
          (767 > window.innerWidth
            ? (v.popover.attr("data-placement", "bottom"), v.popover.popover())
            : v.popover.popover()),
        v.statefulButton.length &&
          $(v.statefulButton).on("click", function() {
            var e = $(this).button("loading");
            setTimeout(function() {
              e.button("reset");
            }, 2e3);
          }),
        p &&
          !f &&
          $().UItoTop({
            easingType: "easeOutQuart",
            containerClass: "ui-to-top"
          }),
        v.rdNavbar.length)
      ) {
        var K, X, ee, te, ae, re, ie;
        for (
          K = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
            re = [0, 576, 768, 992, 1200, 1600],
            ie = {},
            ((X = ee = 0), (te = re.length));
          ee < te;
          X = ++ee
        )
          (ae = re[X]),
            ie[re[X]] || (ie[re[X]] = {}),
            v.rdNavbar.attr("data" + K[X] + "layout") &&
              (ie[re[X]].layout = v.rdNavbar.attr("data" + K[X] + "layout")),
            v.rdNavbar.attr("data" + K[X] + "device-layout") &&
              (ie[re[X]].deviceLayout = v.rdNavbar.attr(
                "data" + K[X] + "device-layout"
              )),
            v.rdNavbar.attr("data" + K[X] + "hover-on") &&
              (ie[re[X]].focusOnHover =
                "true" === v.rdNavbar.attr("data" + K[X] + "hover-on")),
            v.rdNavbar.attr("data" + K[X] + "auto-height") &&
              (ie[re[X]].autoHeight =
                "true" === v.rdNavbar.attr("data" + K[X] + "auto-height")),
            v.rdNavbar.attr("data" + K[X] + "stick-up") &&
              (ie[re[X]].stickUp =
                !f && "true" === v.rdNavbar.attr("data" + K[X] + "stick-up")),
            v.rdNavbar.attr("data" + K[X] + "stick-up-offset") &&
              (ie[re[X]].stickUpOffset = v.rdNavbar.attr(
                "data" + K[X] + "stick-up-offset"
              ));
        v.rdNavbar.RDNavbar({
          anchorNav: !f,
          stickUpClone:
            v.rdNavbar.attr("data-stick-up-clone") &&
            !f &&
            "true" === v.rdNavbar.attr("data-stick-up-clone"),
          responsive: ie,
          callbacks: {
            onStuck: function() {
              var e = this.$element.find(".rd-search input");
              e && e.val("").trigger("propertychange");
            },
            onDropdownOver: function() {
              return !f;
            },
            onUnstuck: function() {
              if (null !== this.$clone) {
                var e = this.$clone.find(".rd-search input");
                e && (e.val("").trigger("propertychange"), e.trigger("blur"));
              }
            }
          }
        }),
          v.rdNavbar.attr("data-body-class") &&
            (document.body.className +=
              " " + v.rdNavbar.attr("data-body-class"));
      }
      if (v.viewAnimate.length) {
        var X;
        for (X = 0; X < v.viewAnimate.length; X++) {
          var se = $(v.viewAnimate[X]).not(".active");
          s.on(
            "scroll",
            $.proxy(function() {
              e(this) && this.addClass("active");
            }, se)
          ).trigger("scroll");
        }
      }
      if (v.swiper)
        for (var X = 0; X < v.swiper.length; X++) {
          var le,
            ne = v.swiper[X],
            oe = $(ne).find(".swiper-slide"),
            de = {
              loop: "true" === ne.getAttribute("data-loop") || !1,
              effect: h ? "slide" : ne.getAttribute("data-effect") || "fade",
              direction: ne.getAttribute("data-direction") || "horizontal",
              speed: ne.getAttribute("data-speed")
                ? +ne.getAttribute("data-speed")
                : 1200,
              allowTouchMove: !1,
              preventIntercationOnTransition: !0,
              runCallbacksOnInit: !1,
              separateCaptions:
                "true" === ne.getAttribute("data-separate-captions") || !1
            };
          for (ee = 0; ee < oe.length; ee++) {
            var ce,
              V = $(oe[ee]);
            (ce = V.attr("data-slide-bg")) &&
              V.css({
                "background-image": "url(" + ce + ")",
                "background-size": "cover"
              });
          }
          ne.getAttribute("data-autoplay") &&
            (de.autoplay = {
              delay: +ne.getAttribute("data-autoplay") || 6e3,
              stopOnLastSlide: !1,
              disableOnInteraction: !0,
              reverseDirection: !1
            }),
            "true" === ne.getAttribute("data-keyboard") &&
              (de.keyboard = {
                enabled: "true" === ne.getAttribute("data-keyboard"),
                onlyInViewport: !0
              }),
            "true" === ne.getAttribute("data-mousewheel") &&
              (de.mousewheel = { releaseOnEdges: !0, sensitivity: 0.1 }),
            ne.querySelector(".swiper-button-next, .swiper-button-prev") &&
              (de.navigation = {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
              }),
            ne.querySelector(".swiper-pagination") &&
              (de.pagination = {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: !0
              }),
            ne.querySelector(".swiper-scrollbar") &&
              (de.scrollbar = {
                el: ".swiper-scrollbar",
                hide: !0,
                draggable: !0
              }),
            (de.on = {
              init: function() {
                switch ((E(this), de.effect)) {
                  case "circle-bg":
                    y(this);
                    break;
                  case "frame-rect-serial":
                    b(this);
                    break;
                  case "frame-trapeze":
                    w(this);
                    break;
                  case "frame-slash":
                    x(this);
                    break;
                  case "frame-random":
                    C(this);
                    break;
                  case "cropping-circle":
                    A(this);
                }
                I(this),
                  O(this),
                  T(this),
                  this.on("slideChangeTransitionEnd", function() {
                    E(this);
                  });
              },
              transitionStart: function() {
                T(this);
              }
            }),
            (le = new Swiper(v.swiper[X], de));
        }
      if (v.dateCountdown.length) {
        var X;
        for (X = 0; X < v.dateCountdown.length; X++) {
          var pe = $(v.dateCountdown[X]),
            me = {
              Days: {
                text: "Days",
                show: !0,
                color: pe.attr("data-color") ? pe.attr("data-color") : "#f9f9f9"
              },
              Hours: {
                text: "Hours",
                show: !0,
                color: pe.attr("data-color") ? pe.attr("data-color") : "#f9f9f9"
              },
              Minutes: {
                text: "Minutes",
                show: !0,
                color: pe.attr("data-color") ? pe.attr("data-color") : "#f9f9f9"
              },
              Seconds: {
                text: "Seconds",
                show: !0,
                color: pe.attr("data-color") ? pe.attr("data-color") : "#f9f9f9"
              }
            };
          pe.TimeCircles({
            color: pe.attr("data-color")
              ? pe.attr("data-color")
              : "rgba(247, 247, 247, 1)",
            animation: "smooth",
            bg_width: pe.attr("data-bg-width") ? pe.attr("data-bg-width") : 0.6,
            circle_bg_color: pe.attr("data-bg")
              ? pe.attr("data-bg")
              : "rgba(0, 0, 0, 1)",
            fg_width: pe.attr("data-width") ? pe.attr("data-width") : 0.03
          }),
            $(window).on("load resize orientationchange", function() {
              479 > window.innerWidth
                ? pe
                    .TimeCircles({
                      time: {
                        Days: {
                          text: "Days",
                          show: !0,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        },
                        Hours: {
                          text: "Hours",
                          show: !0,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        },
                        Minutes: {
                          text: "Minutes",
                          show: !0,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        },
                        Seconds: {
                          text: "Seconds",
                          show: !1,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        }
                      }
                    })
                    .rebuild()
                : 767 > window.innerWidth
                ? pe
                    .TimeCircles({
                      time: {
                        Days: {
                          text: "Days",
                          show: !0,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        },
                        Hours: {
                          text: "Hours",
                          show: !0,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        },
                        Minutes: {
                          text: "Minutes",
                          show: !0,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        },
                        Seconds: {
                          text: "",
                          show: !1,
                          color: pe.attr("data-color")
                            ? pe.attr("data-color")
                            : "#f9f9f9"
                        }
                      }
                    })
                    .rebuild()
                : pe.TimeCircles({ time: me }).rebuild();
            });
        }
      }
      if (v.search.length || v.searchResults) {
        var ge = "bat/rd-search.php",
          he =
            '<h5 class="search-title"><a target="_top" href="#{href}" class="search-link">#{title}</a></h5><p>...#{token}...</p><p class="match"><em>Terms matched: #{count} - URL: #{href}</em></p>';
        if (v.search.length)
          for (var X = 0; X < v.search.length; X++) {
            var ue = $(v.search[X]),
              de = {
                element: ue,
                filter: ue.attr("data-search-filter")
                  ? ue.attr("data-search-filter")
                  : "*.html",
                template: ue.attr("data-search-template")
                  ? ue.attr("data-search-template")
                  : he,
                live:
                  !!ue.attr("data-search-live") && ue.attr("data-search-live"),
                liveCount: ue.attr("data-search-live-count")
                  ? parseInt(ue.attr("data-search-live"), 10)
                  : 4,
                current: 0,
                processed: 0,
                timer: {}
              },
              fe = $(".rd-navbar-search-toggle");
            if (
              (fe.length &&
                fe.on(
                  "click",
                  (function(e) {
                    return function() {
                      $(this).hasClass("active") ||
                        e
                          .find("input")
                          .val("")
                          .trigger("propertychange");
                    };
                  })(ue)
                ),
              de.live)
            ) {
              var ve = !1;
              ue.find("input").on(
                "keyup input propertychange",
                $.proxy(
                  function() {
                    (this.term = this.element
                      .find("input")
                      .val()
                      .trim()),
                      (this.spin = this.element.find(".input-group-addon")),
                      clearTimeout(this.timer),
                      2 < this.term.length
                        ? ((this.timer = setTimeout(R(this), 200)),
                          !1 == ve &&
                            ((ve = !0),
                            o.on("click", function(t) {
                              0 ===
                                $(t.toElement).parents(".rd-search").length &&
                                $("#rd-search-results-live")
                                  .addClass("cleared")
                                  .html("");
                            })))
                        : 0 === this.term.length &&
                          $("#" + this.live)
                            .addClass("cleared")
                            .html("");
                  },
                  de,
                  this
                )
              );
            }
            ue.submit(
              $.proxy(
                function() {
                  return (
                    $("<input />")
                      .attr("type", "hidden")
                      .attr("name", "filter")
                      .attr("value", this.filter)
                      .appendTo(this.element),
                    !0
                  );
                },
                de,
                this
              )
            );
          }
        if (v.searchResults.length) {
          var ye = /\?.*s=([^&]+)\&filter=([^&]+)/g,
            be = ye.exec(location.search);
          null !== be &&
            $.get(
              "bat/rd-search.php",
              {
                s: decodeURI(be[1]),
                dataType: "html",
                filter: be[2],
                template: he,
                live: ""
              },
              function(e) {
                v.searchResults.html(e);
              }
            );
        }
      }
      if (v.isotope.length) {
        for (var we = [], X = 0; X < v.isotope.length; X++) {
          var xe = v.isotope[X],
            Ce = {
              itemSelector: ".isotope-item",
              layoutMode: xe.getAttribute("data-isotope-layout")
                ? xe.getAttribute("data-isotope-layout")
                : "masonry",
              filter: "*"
            },
            ke = new Isotope(xe, Ce);
          (xe.isotope = ke), we.push(ke);
        }
        $("[data-isotope-filter]")
          .on("click", function(t) {
            t.preventDefault();
            var e = $(this);
            e
              .parents(".isotope-filters")
              .find(".active")
              .removeClass("active"),
              e.addClass("active");
            var a = $(
                '.isotope[data-isotope-group="' +
                  this.getAttribute("data-isotope-group") +
                  '"]'
              ),
              r = {
                itemSelector: ".isotope-item",
                layoutMode: a.attr("data-isotope-layout")
                  ? a.attr("data-isotope-layout")
                  : "masonry",
                filter:
                  "*" === this.getAttribute("data-isotope-filter")
                    ? "*"
                    : '[data-filter*="' +
                      this.getAttribute("data-isotope-filter") +
                      '"]'
              };
            a.isotope(r);
          })
          .eq(0)
          .trigger("click");
      }
      if (
        (n.hasClass("wow-animation") &&
          v.wow.length &&
          !f &&
          p &&
          new WOW().init(),
        v.bootstrapTabs.length)
      ) {
        var X;
        for (X = 0; X < v.bootstrapTabs.length; X++) {
          var Ae = $(v.bootstrapTabs[X]);
          if (Ae.find(".owl-carousel").length) {
            var Se = Ae.find(".tab-content .tab-pane.active .owl-carousel"),
              Te = f ? 1500 : 300;
            D(Se),
              Ae.find(".tabs-custom-list > li > a").on(
                "click",
                $.proxy(function() {
                  var e = $(this);
                  setTimeout(function() {
                    var t = e
                      .find(".tab-content .tab-pane.active .owl-carousel")
                      .not(".owl-initialised");
                    if (t.length)
                      for (var a, r = 0; r < t.length; r++)
                        (a = $(t[r])), D(a), a.addClass("owl-initialised");
                  }, Te);
                }, Ae)
              );
          }
          Ae.find(".slick-slider").length &&
            Ae.find(".tabs-custom-list > li > a").on(
              "click",
              $.proxy(function() {
                var e = $(this),
                  t = f ? 1500 : 300;
                setTimeout(function() {
                  e.find(".tab-content .tab-pane.active .slick-slider").slick(
                    "setPosition"
                  );
                }, t);
              }, Ae)
            );
        }
      }
      if (
        (v.rdInputLabel.length && v.rdInputLabel.RDInputLabel(),
        v.regula.length && _(v.regula),
        v.captcha.length &&
          $.getScript(
            "//www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=en"
          ),
        v.rdMailForm.length)
      ) {
        var X,
          ee,
          Ee,
          Me = {
            MF000: "Successfully sent!",
            MF001: "Recipients are not set!",
            MF002: "Form will not work locally!",
            MF003: "Please, define email field in your form!",
            MF004: "Please, define type of your form!",
            MF254: "Something went wrong with PHPMailer!",
            MF255: "Aw, snap! Something went wrong."
          };
        for (X = 0; X < v.rdMailForm.length; X++) {
          var ze = $(v.rdMailForm[X]),
            Ie = !1;
          ze.attr("novalidate", "novalidate").ajaxForm({
            data: {
              "form-type": ze.attr("data-form-type") || "contact",
              counter: X
            },
            beforeSubmit: function() {
              if (!f) {
                var e = $(v.rdMailForm[this.extraData.counter]),
                  t = e.find("[data-constraints]"),
                  a = $("#" + e.attr("data-form-output")),
                  r = e.find(".recaptcha"),
                  i = !0;
                if ((a.removeClass("active error success"), q(t, r))) {
                  if (r.length) {
                    var s = r.find(".g-recaptcha-response").val(),
                      l = {
                        CPT001:
                          'Please, setup you "site key" and "secret key" of reCaptcha',
                        CPT002: "Something wrong with google reCaptcha"
                      };
                    (Ie = !0),
                      $.ajax({
                        method: "POST",
                        url: "bat/reCaptcha.php",
                        data: { "g-recaptcha-response": s },
                        async: !1
                      }).done(function(e) {
                        "CPT000" !== e &&
                          (a.hasClass("snackbars")
                            ? (a.html(
                                '<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' +
                                  l[e] +
                                  "</span></p>"
                              ),
                              setTimeout(function() {
                                a.removeClass("active");
                              }, 3500),
                              (i = !1))
                            : a.html(l[e]),
                          a.addClass("active"));
                      });
                  }
                  if (!i) return !1;
                  e.addClass("form-in-process"),
                    a.hasClass("snackbars") &&
                      (a.html(
                        '<p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Sending</span></p>'
                      ),
                      a.addClass("active"));
                } else return !1;
              }
            },
            error: function(e) {
              if (!f) {
                var t = $(
                    "#" +
                      $(v.rdMailForm[this.extraData.counter]).attr(
                        "data-form-output"
                      )
                  ),
                  a = $(v.rdMailForm[this.extraData.counter]);
                t.text(Me[e]),
                  a.removeClass("form-in-process"),
                  Ie && grecaptcha.reset();
              }
            },
            success: function(e) {
              if (!f) {
                var t = $(v.rdMailForm[this.extraData.counter]),
                  a = $("#" + t.attr("data-form-output")),
                  r = t.find("select");
                t.addClass("success").removeClass("form-in-process"),
                  Ie && grecaptcha.reset(),
                  (e = 5 === e.length ? e : "MF255"),
                  a.text(Me[e]),
                  "MF000" === e
                    ? a.hasClass("snackbars")
                      ? a.html(
                          '<p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>' +
                            Me[e] +
                            "</span></p>"
                        )
                      : a.addClass("active success")
                    : a.hasClass("snackbars")
                    ? a.html(
                        ' <p class="snackbars-left"><span class="icon icon-xxs mdi mdi-alert-outline text-middle"></span><span>' +
                          Me[e] +
                          "</span></p>"
                      )
                    : a.addClass("active error"),
                  t.clearForm(),
                  r.length && r.select2("val", ""),
                  t.find("input, textarea").trigger("blur"),
                  setTimeout(function() {
                    a.removeClass("active error success"),
                      t.removeClass("success");
                  }, 3500);
              }
            }
          });
        }
      }
      if (v.lightGallery.length)
        for (var X = 0; X < v.lightGallery.length; X++) G(v.lightGallery[X]);
      if (v.lightGalleryItem.length) {
        for (var Oe = [], Pe = 0; Pe < v.lightGalleryItem.length; Pe++)
          $(v.lightGalleryItem[Pe]).parents(".owl-carousel").length ||
            $(v.lightGalleryItem[Pe]).parents(".swiper-slider").length ||
            $(v.lightGalleryItem[Pe]).parents(".slick-slider").length ||
            Oe.push(v.lightGalleryItem[Pe]);
        v.lightGalleryItem = Oe;
        for (var X = 0; X < v.lightGalleryItem.length; X++)
          Z(v.lightGalleryItem[X]);
      }
      if (v.lightDynamicGalleryItem.length)
        for (var X = 0; X < v.lightDynamicGalleryItem.length; X++)
          H(v.lightDynamicGalleryItem[X]);
      if (v.customToggle.length)
        for (var V, X = 0; X < v.customToggle.length; X++)
          (V = $(v.customToggle[X])),
            V.on(
              "click",
              $.proxy(function(e) {
                e.preventDefault();
                var t = $(this);
                $(t.attr("data-custom-toggle"))
                  .add(this)
                  .toggleClass("active");
              }, V)
            ),
            "true" === V.attr("data-custom-toggle-hide-on-blur") &&
              o.on("click", V, function(t) {
                t.target !== t.data[0] &&
                  $(t.data.attr("data-custom-toggle")).find($(t.target))
                    .length &&
                  0 === t.data.find($(t.target)).length &&
                  $(t.data.attr("data-custom-toggle"))
                    .add(t.data[0])
                    .removeClass("active");
              }),
            "true" === V.attr("data-custom-toggle-disable-on-blur") &&
              o.on("click", V, function(t) {
                t.target !== t.data[0] &&
                  0 ===
                    $(t.data.attr("data-custom-toggle")).find($(t.target))
                      .length &&
                  0 === t.data.find($(t.target)).length &&
                  $(t.data.attr("data-custom-toggle"))
                    .add(t.data[0])
                    .removeClass("active");
              });
      if (v.counter.length) {
        var X;
        for (X = 0; X < v.counter.length; X++) {
          var je = $(v.counter[X]).not(".animated");
          s.on(
            "scroll",
            $.proxy(function() {
              var t = this;
              !t.hasClass("animated") &&
                e(t) &&
                (t.countTo({
                  refreshInterval: 40,
                  from: 0,
                  to: parseInt(t.text(), 10),
                  speed: t.attr("data-speed") || 1e3
                }),
                t.addClass("animated"));
            }, je)
          ).trigger("scroll");
        }
      }
      if (v.circleProgress.length) {
        var X;
        for (X = 0; X < v.circleProgress.length; X++) {
          (function() {
            var e = $.circleProgress.defaults,
              t = e.drawEmptyArc;
            (e.emptyThickness = 5),
              (e.drawEmptyArc = function(e) {
                var a = this.getThickness,
                  r = this.getThickness(),
                  i = this.emptyThickness || _oldThickness.call(this),
                  s = this.radius,
                  l = (r - i) / 2;
                (this.getThickness = function() {
                  return i;
                }),
                  (this.radius = s - l),
                  this.ctx.save(),
                  this.ctx.translate(l, l),
                  t.call(this, e),
                  this.ctx.restore(),
                  (this.getThickness = a),
                  (this.radius = s);
              });
          })();
          var De = $(v.circleProgress[X]);
          s.on(
            "scroll",
            $.proxy(function() {
              var t = $(this);
              if (!t.hasClass("animated") && e(t)) {
                var a = t.attr("data-gradient").split(",");
                t
                  .circleProgress({
                    value: t.attr("data-value"),
                    size: t.attr("data-size") ? t.attr("data-size") : 175,
                    fill: { gradient: a, gradientAngle: Math.PI / 4 },
                    startAngle: 2 * (-Math.PI / 4),
                    emptyFill: t.attr("data-empty-fill")
                      ? t.attr("data-empty-fill")
                      : "rgb(245,245,245)",
                    thickness: t.attr("data-thickness")
                      ? parseInt(t.attr("data-thickness"))
                      : 10,
                    emptyThickness: 1
                  })
                  .on("circle-animation-progress", function(e, t, a) {
                    $(this)
                      .find("span")
                      .text(
                        (a.toFixed(2) + "").replace("0.", "").replace("1.", "1")
                      );
                  }),
                  t.addClass("animated");
              }
            }, De)
          ).trigger("scroll");
        }
      }
      if (v.progressLinear.length)
        for (X = 0; X < v.progressLinear.length; X++) {
          var Ne = $(v.progressLinear[X]);
          l.on(
            "scroll load",
            $.proxy(function() {
              var t = $(this);
              if (!t.hasClass("animated-first") && e(t)) {
                var a = parseInt(
                  $(this)
                    .find(".progress-value")
                    .text(),
                  10
                );
                t.find(".progress-bar-linear").css({ width: a + "%" }),
                  t
                    .find(".progress-value")
                    .countTo({
                      refreshInterval: 40,
                      from: 0,
                      to: a,
                      speed: 500
                    }),
                  t.addClass("animated-first");
              }
            }, Ne)
          );
        }
      if (v.selectFilter.length) {
        var X;
        for (X = 0; X < v.selectFilter.length; X++) {
          var Le = $(v.selectFilter[X]);
          Le.select2({ theme: "bootstrap" })
            .next()
            .addClass(
              Le.attr("class")
                .match(/(input-sm)|(input-lg)|($)/i)
                .toString()
                .replace(/,/g, " ")
            );
        }
      }
      if (0 < v.flickrfeed.length)
        for (var Re, X = 0; X < v.flickrfeed.length; X++)
          (Re = $(v.flickrfeed[X])),
            Re.RDFlickr({
              callback: (function(e) {
                return function() {
                  var t = e.find("[data-lightgallery]");
                  if (t.length)
                    for (var a, r = 0; r < t.length; r++)
                      (a = new Image()),
                        a.setAttribute("data-index", r),
                        (a.onload = function() {
                          t[this.getAttribute("data-index")].setAttribute(
                            "data-size",
                            this.naturalWidth + "x" + this.naturalHeight
                          );
                        }),
                        (a.src = t[r].getAttribute("href"));
                };
              })(Re)
            });
      if (v.rdAudioPlayer.length && !f) {
        var X;
        for (X = 0; X < v.rdAudioPlayer.length; X++)
          $(v.rdAudioPlayer[X]).RDAudio();
      }
      if (0 < v.mfp.length || (0 < v.mfpGallery.length && "designMode" != f)) {
        if (v.mfp.length)
          for (X = 0; X < v.mfp.length; X++) {
            var _e = v.mfp[X];
            $(_e).magnificPopup({ type: _e.getAttribute("data-lightbox") });
          }
        if (v.mfpGallery.length)
          for (X = 0; X < v.mfpGallery.length; X++) {
            for (
              var qe = $(v.mfpGallery[X]).find("[data-lightbox]"), Y = 0;
              Y < qe.length;
              Y++
            )
              $(qe).addClass("mfp-" + $(qe).attr("data-lightbox"));
            qe.end().magnificPopup({
              delegate: "[data-lightbox]",
              type: "image",
              gallery: { enabled: !0 }
            });
          }
      }
      if (v.slick.length) {
        var X;
        for (X = 0; X < v.slick.length; X++) {
          var Fe = $(v.slick[X]);
          Fe.slick({
            slidesToScroll: parseInt(Fe.attr("data-slide-to-scroll")) || 1,
            asNavFor: Fe.attr("data-for") || !1,
            dots: "true" == Fe.attr("data-dots"),
            infinite: !f && "true" == Fe.attr("data-loop"),
            focusOnSelect: !0,
            arrows: "true" == Fe.attr("data-arrows"),
            swipe: "true" == Fe.attr("data-swipe"),
            autoplay: "true" == Fe.attr("data-autoplay"),
            vertical: "true" == Fe.attr("data-vertical"),
            centerMode: "true" == Fe.attr("data-center-mode"),
            centerPadding: Fe.attr("data-center-padding")
              ? Fe.attr("data-center-padding")
              : "0.50",
            mobileFirst: !0,
            responsive: [
              {
                breakpoint: 0,
                settings: { slidesToShow: parseInt(Fe.attr("data-items")) || 1 }
              },
              {
                breakpoint: 479,
                settings: {
                  slidesToShow: parseInt(Fe.attr("data-xs-items")) || 1
                }
              },
              {
                breakpoint: 767,
                settings: {
                  slidesToShow: parseInt(Fe.attr("data-sm-items")) || 1
                }
              },
              {
                breakpoint: 991,
                settings: {
                  slidesToShow: parseInt(Fe.attr("data-md-items")) || 1
                }
              },
              {
                breakpoint: 1199,
                settings: {
                  slidesToShow: parseInt(Fe.attr("data-lg-items")) || 1,
                  swipe: !1
                }
              },
              {
                breakpoint: 1599,
                settings: {
                  slidesToShow: parseInt(Fe.attr("data-xl-items")) || 1,
                  swipe: !1
                }
              }
            ]
          }).on("afterChange", function(e, t, a) {
            var r = $(this),
              i = r.attr("data-child");
            i &&
              ($(i + " .slick-slide").removeClass("slick-current"),
              $(i + " .slick-slide")
                .eq(a)
                .addClass("slick-current"));
          });
        }
      }
      if (v.calendar.length) {
        var X;
        for (X = 0; X < v.calendar.length; X++) {
          var $e = $(v.calendar[X]);
          $e.rdCalendar({
            days: $e.attr("data-days")
              ? $e.attr("data-days").split(/\s?,\s?/i)
              : ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            month: $e.attr("data-months")
              ? $e.attr("data-months").split(/\s?,\s?/i)
              : [
                  "January",
                  "February",
                  "March",
                  "April",
                  "May",
                  "June",
                  "July",
                  "August",
                  "September",
                  "October",
                  "November",
                  "December"
                ]
          });
        }
      }
      if (v.bookingCalendar.length) {
        var X;
        for (X = 0; X < v.bookingCalendar.length; X++) {
          var $e = $(v.bookingCalendar[X]);
          $e.rdCalendar({
            days: $e.attr("data-days")
              ? $e.attr("data-days").split(/\s?,\s?/i)
              : ["S", "M", "T", "W", "T", "F", "S"],
            month: $e.attr("data-months")
              ? $e.attr("data-months").split(/\s?,\s?/i)
              : [
                  "January",
                  "February",
                  "March",
                  "April",
                  "May",
                  "June",
                  "July",
                  "August",
                  "September",
                  "October",
                  "November",
                  "December"
                ]
          });
          var Be = $(".rdc-table_has-events");
          for (X = 0; X < Be.length; X++) {
            var V = $(Be[X]);
            V.on("click", X, function(e) {
              e.preventDefault(),
                e.stopPropagation(),
                $(this).toggleClass("opened");
              var t = $(".rdc-table_events"),
                a = t.outerHeight(),
                r = $(this).children(".rdc-table_events"),
                i = $("#calendarEvent" + e.data);
              $(this).hasClass("opened")
                ? ($(this)
                    .parent()
                    .after(
                      "<tr id='calendarEvent" +
                        e.data +
                        "' style='height: 0'><td colspan='7'></td></tr>"
                    ),
                  r.clone().appendTo($("#calendarEvent" + e.data + " td")),
                  $("#calendarEvent" + e.data + " .rdc-table_events").css(
                    "height",
                    "0"
                  ),
                  $("#calendarEvent" + e.data + " .rdc-table_events").animate(
                    { height: a + "px" },
                    250
                  ))
                : ($("#calendarEvent" + e.data + " .rdc-table_events").animate(
                    { height: "0" },
                    250
                  ),
                  setTimeout(function() {
                    i.remove();
                  }, 250));
            });
          }
          $(window).on("resize", function() {
            if ($(".rdc-table_has-events").hasClass("active")) {
              var e = $(".rdc-table_events"),
                t = e.outerHeight(),
                a = $(".rdc-table_events-count");
              a.css({ height: t + "px" });
            }
          }),
            $('input[type="radio"]').on("click", function() {
              "register" == $(this).attr("value") &&
                ($(".register-form").hide(), $(".login-form").fadeIn("slow")),
                "login" == $(this).attr("value") &&
                  ($(".register-form").fadeIn("slow"), $(".login-form").hide());
            }),
            $(".rdc-next, .rdc-prev").on("click", function() {
              var e = $(".rdc-table_has-events");
              for (X = 0; X < e.length; X++) {
                var t = $(e[X]);
                t.on("click", X, function(e) {
                  e.preventDefault(),
                    e.stopPropagation(),
                    $(this).toggleClass("opened");
                  var t = $(".rdc-table_events"),
                    a = t.outerHeight(),
                    r = $(this).children(".rdc-table_events"),
                    i = $("#calendarEvent" + e.data);
                  $(this).hasClass("opened")
                    ? ($(this)
                        .parent()
                        .after(
                          "<tr id='calendarEvent" +
                            e.data +
                            "' style='height: 0'><td colspan='7'></td></tr>"
                        ),
                      r.clone().appendTo($("#calendarEvent" + e.data + " td")),
                      $("#calendarEvent" + e.data + " .rdc-table_events").css(
                        "height",
                        "0"
                      ),
                      $(
                        "#calendarEvent" + e.data + " .rdc-table_events"
                      ).animate({ height: a + "px" }, 250))
                    : ($(
                        "#calendarEvent" + e.data + " .rdc-table_events"
                      ).animate({ height: "0" }, 250),
                      setTimeout(function() {
                        i.remove();
                      }, 250));
                });
              }
              $(window).on("resize", function() {
                if ($(".rdc-table_has-events").hasClass("active")) {
                  var e = $(".rdc-table_events"),
                    t = e.outerHeight(),
                    a = $(".rdc-table_events-count");
                  a.css({ height: t + "px" });
                }
              }),
                $('input[type="radio"]').on("click", function() {
                  "login" == $(this).attr("value") &&
                    ($(".register-form").hide(),
                    $(".login-form").fadeIn("slow")),
                    "register" == $(this).attr("value") &&
                      ($(".register-form").fadeIn("slow"),
                      $(".login-form").hide());
                });
            });
        }
      }
      if (v.bootstrapDateTimePicker.length) {
        var X;
        for (X = 0; X < v.bootstrapDateTimePicker.length; X++) {
          var Ge = $(v.bootstrapDateTimePicker[X]),
            de = {};
          (de.format = "dddd DD MMMM YYYY - HH:mm"),
            "date" === Ge.attr("data-time-picker")
              ? ((de.format = "dddd DD MMMM YYYY"), (de.minDate = new Date()))
              : "time" === Ge.attr("data-time-picker") && (de.format = "HH:mm"),
            (de.time = "date" !== Ge.attr("data-time-picker")),
            (de.date = "time" !== Ge.attr("data-time-picker")),
            (de.shortTime = !0),
            Ge.bootstrapMaterialDatePicker(de);
        }
      }
      var He = $(".calendar-box-list-view");
      if (
        (He.collapse({ toggle: !1 }),
        $("body").on("click", He, function() {
          He.collapse("hide");
        }),
        v.facebookWidget.length &&
          t(v.facebookWidget, function() {
            (function(e, t, a) {
              var r,
                i = e.getElementsByTagName(t)[0];
              e.getElementById(a) ||
                ((r = e.createElement(t)),
                (r.id = a),
                (r.src =
                  "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8"),
                i.parentNode.insertBefore(r, i));
            })(document, "script", "facebook-jssdk");
          }),
        v.twitterfeed.length &&
          (window.twttr = (function(e, a, r) {
            var i,
              s = e.getElementsByTagName(a)[0],
              l = window.twttr || {};
            return e.getElementById(r)
              ? l
              : ((i = e.createElement(a)),
                (i.id = r),
                (i.src = "//platform.twitter.com/widgets.js"),
                s.parentNode.insertBefore(i, s),
                (l._e = []),
                (l.ready = function(e) {
                  l._e.push(e);
                }),
                l);
          })(document, "script", "twitter-timeline")),
        v.rdRange.length && !f && v.rdRange.RDRange({}),
        v.stepper.length && v.stepper.stepper({ labels: { up: "", down: "" } }),
        v.countDown.length)
      ) {
        var X;
        for (X = 0; X < v.countDown.length; X++) {
          var Ze = v.countDown[X],
            We = new Date(),
            d = Ze.getAttribute("data-type"),
            me = Ze.getAttribute("data-time"),
            Qe = Ze.getAttribute("data-format"),
            Ye = [];
          We.setTime(Date.parse(me)).toLocaleString(),
            (Ye[d] = We),
            (Ye.format = Qe),
            $(Ze).countdown(Ye);
        }
      }
      if (v.customWaypoints.length && !f) {
        var X;
        for (X = 0; X < v.customWaypoints.length; X++) {
          var V = $(v.customWaypoints[X]);
          P(V);
        }
      }
      if (v.vide.length)
        for (var X = 0; X < v.vide.length; X++) {
          var Xe = $(v.vide[X]),
            Ue = Xe.data("vide").getVideoObject();
          (f || !e(Xe)) && Ue.pause(),
            document.addEventListener(
              "scroll",
              (function(t, a) {
                return function() {
                  !f && (e(t) || a.pause()) ? a.play() : a.pause();
                };
              })(Xe, Ue)
            );
        }
      if (v.materialParallax.length)
        if (!f && !h && !u) v.materialParallax.parallax();
        else
          for (var X = 0; X < v.materialParallax.length; X++) {
            var Je = $(v.materialParallax[X]),
              Ve = Je.data("parallax-img");
            Je.css({
              "background-image": "url(" + Ve + ")",
              "background-size": "cover"
            });
          }
      if (v.textRotator.length && !f) {
        var X;
        for (X = 0; X < v.textRotator.length; X++) {
          var Ke = v.textRotator[X];
          $(Ke).rotator();
        }
      }
      if (
        (v.particles.length &&
          particlesJS("particles-js", {
            particles: {
              number: { value: 160, density: { enable: !0, value_area: 5e3 } },
              color: { value: "#ffffff" },
              shape: {
                type: "circle",
                stroke: { width: 0, color: "#000000" },
                polygon: { nb_sides: 5 },
                image: { src: "img/github.svg", width: 100, height: 100 }
              },
              opacity: {
                value: 0.5,
                random: !1,
                anim: { enable: !1, speed: 1, opacity_min: 0.1, sync: !1 }
              },
              size: {
                value: 20,
                random: !0,
                anim: { enable: !1, speed: 100, size_min: 0.1, sync: !1 }
              },
              line_linked: {
                enable: !0,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1
              },
              move: {
                enable: !0,
                speed: 3,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "out",
                bounce: !1,
                attract: { enable: !1, rotateX: 600, rotateY: 1200 }
              }
            },
            interactivity: {
              detect_on: "canvas",
              events: {
                onhover: { enable: !0, mode: "grab" },
                onclick: { enable: !0, mode: "push" },
                resize: !0
              },
              modes: {
                grab: { distance: 140, line_linked: { opacity: 1 } },
                bubble: {
                  distance: 400,
                  size: 40,
                  duration: 2,
                  opacity: 8,
                  speed: 3
                },
                repulse: { distance: 200, duration: 0.4 },
                push: { particles_nb: 4 },
                remove: { particles_nb: 2 }
              }
            },
            retina_detect: !0
          }),
        v.customCarousel.length)
      )
        for (var X = 0; X < v.customCarousel.length; X++)
          initCarousel({
            node: v.customCarousel[X],
            speed: v.customCarousel[X].getAttribute("data-speed"),
            autoplay: v.customCarousel[X].getAttribute("data-autoplay")
          });
      if (
        (!$("[data-parallax-scroll]").length || f || u || ParallaxScroll.init(),
        v.scroller.length)
      ) {
        var X;
        for (X = 0; X < v.scroller.length; X++) {
          var et = $(v.scroller[X]);
          et.jScrollPane({ autoReinitialise: !0 });
        }
      }
    });
})();

