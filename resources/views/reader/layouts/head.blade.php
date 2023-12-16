<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css"
    integrity="sha512-6c4nX2tn5KbzeBJo9Ywpa0Gkt+mzCzJBrE1RB6fmpcsoN+b/w/euwIMuQKNyUoU/nToKN3a8SgNOtPrbW12fug=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/js/all.min.js"
    integrity="sha512-3dlGoFoY39YEcetqKPULIqryjeClQkr2KXshhYxFXNZAgRFZElUW9UQmYkmQE1bvB8tssj3uSKDzsj8rA04Meg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style id='admin-bar-inline-css' type='text/css'>
    @media screen and (max-width: 782px) {
        html {
            margin-top: 46px !important;
        }
    }

    @media print {
        #wpadminbar {
            display: none;
        }
    }
</style>
<style id='wp-emoji-styles-inline-css' type='text/css'>
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 0.07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>
<style id='classic-theme-styles-inline-css' type='text/css'>
    /*! This file is auto-generated */
    .wp-block-button__link {
        color: #fff;
        background-color: #32373c;
        border-radius: 9999px;
        box-shadow: none;
        text-decoration: none;
        padding: calc(.667em + 2px) calc(1.333em + 2px);
        font-size: 1.125em
    }

    .wp-block-file__button {
        background: #32373c;
        color: #fff;
        text-decoration: none
    }
</style>
<link rel='stylesheet' id='style-css' href='{{ asset('mangareader/css/style.css') }}' type='text/css' media='all' />
<link rel='stylesheet' id='lightstyle-css' href='{{ asset('mangareader/css/lightmode.css') }}' type='text/css'
    media='all' />
<link rel='stylesheet' id='swiper-css' href='{{ asset('mangareader/css/swipper.min.css') }}' type='text/css'
    media='all' />
<script type="text/javascript" src="{{ asset('mangareader/js/jquery.min.js') }}" id="jquery-js"></script>
<script type="text/javascript" src="{{ asset('mangareader/js/function.js') }}" id="tsfn_scripts-js"></script>
<script type="text/javascript" src="{{ asset('mangareader/js/tab.js') }}" id="tabs-js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{ asset('mangareader/css/main.css') }}">
<script type="text/javascript" src="{{ asset('mangareader/js/owl.carousel.min.js') }}" id="owl-carousel-js"></script>
<script>
    $(document).ready(function() {
        $(".shme").click(function() {
            $(".mm").toggleClass("shwx");
        });
        $(".srcmob").click(function() {
            $(".minmb").toggleClass("minmbx");
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        //Click event to scroll to top
        $('.scrollToTop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

    });
</script>
