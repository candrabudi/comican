<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="theme-color" content="#342a78" />
    <meta name="msapplication-navbutton-color" content="#342a78" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#342a78" />
    <title>Seataku &#8211; Baca Komik Terlengkap dan Terbaru Hari Ini</title>
    <meta name="robots" content="max-image-preview:large" />
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com" />
    <script src="{{ asset('comics/js/script.js') }}"></script>
    <style id="wp-emoji-styles-inline-css" type="text/css">
      
    </style>
    <style id="classic-theme-styles-inline-css" type="text/css">
     
    </style>
    <link
      rel="stylesheet"
      id="style-css"
      href="{{ asset('comics/css/style-reader.css') }}"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="lightstyle-css"
      href="{{ asset('comics/css/lightmode.css') }}"
      type="text/css"
      media="all"
    />
    <link
      rel="stylesheet"
      id="swiper-css"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css?ver=4.5.1"
      type="text/css"
      media="all"
    />
    <script
      type="text/javascript"
      src="{{ asset('comics/js/jquery.min.js') }}"
      id="jquery-js"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset('comics/js/function.js') }}"
      id="tsfn_scripts-js"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset('comics/js/tab.js') }}"
      id="tabs-js"
    ></script>
    <meta name="theme-color" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <script>
      $(document).ready(function () {
        $(".shme").click(function () {
          $(".mm").toggleClass("shwx");
        });
        $(".srcmob").click(function () {
          $(".minmb").toggleClass("minmbx");
        });
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
        //Check to see if the window is top if not then display button
        $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
            $(".scrollToTop").fadeIn();
          } else {
            $(".scrollToTop").fadeOut();
          }
        });

        //Click event to scroll to top
        $(".scrollToTop").click(function () {
          $("html, body").animate({ scrollTop: 0 }, 800);
          return false;
        });
      });
    </script>
    <script type="text/javascript">
      
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body
    class="darkmode"
    itemscope="itemscope"
    itemtype="http://schema.org/WebPage"
  >
    {{-- <script>
      ts_darkmode.init();
    </script> --}}

    <div class="mainholder">
      @include('comics.template.menu')
      
      <div id="content">
        @yield('content')
      </div>
      <div id="footer">
        <footer
          id="colophon"
          class="site-footer"
          itemscope="itemscope"
          itemtype="http://schema.org/WPFooter"
          role="contentinfo"
        >
          @include('comics.template.footer-menu')
          <div class="footercopyright">
            <div class="sosmedmrgn"></div>
            <div class="copyright">
              <div class="txt">
                <p>
                  All the comics on this website are only previews of the
                  original comics, there may be many language errors, character
                  names, and story lines. For the original version, please buy
                  the comic if it's available in your city.
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <span class="scrollToTop"><span class="fas fa-angle-up"></span></span>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script>
      var swiper = new Swiper(".swiper-container", {
        centeredSlides: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>

    <link
      rel="stylesheet"
      id="owl-carousel-css"
      href="{{ asset('comics/css/owl.carousel.css') }}"
      type="text/css"
      media="all"
    />
    <script
      type="text/javascript"
      src="{{ asset('comics/js/owl.carousel.js') }}"
      id="owl-carousel-js"
    ></script>
    <script>
      console.clear();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
