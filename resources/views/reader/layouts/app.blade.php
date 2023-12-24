<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>{{ $siteTitle }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="theme-color" content="#342a78" />
    <meta name="msapplication-navbutton-color" content="#342a78" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#342a78" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <link rel="canonical" href="https://komiksea.com/" />
    <meta name="description" content="{{ $siteDescription }}">
    <meta name="keywords" content="{{ $siteKeywords }}">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Komiksea" />
	<meta property="og:url" content="https://komiksea.lol/" />
	<meta property="og:site_name" content="Komiksea" />
	<meta name="twitter:card" content="summary_large_image" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('reader.layouts.head')
</head>

<body class="darkmode" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <div class="mainholder">
        @include('reader.layouts.menu')
        @yield('slider')
        <div id="content">
            <div class="wrapper">
                @yield('content')

                @include('reader.layouts.sidebar')
            </div>
        </div>
        <div id="footer">
            <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter"
                role="contentinfo">
                <div class="footermenu">
                    <div class="menu-manga-container">
                        <ul id="menu-manga-1" class="menu">
                            <li
                                class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-8">
                                <a href="/" aria-current="page" itemprop="url">Home</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9"><a
                                    href="/manga" itemprop="url">Manga List</a></li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10"><a
                                    href="/bookmark" itemprop="url">Bookmark</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footercopyright">
                    <div class="sosmedmrgn"></div>
                    <div class="copyright">
                        <div class="txt">
                            <p>All the comics on this website are only previews of the original comics, there may be
                                many language
                                errors, character names, and story lines. For the original version, please buy the comic
                                if it's
                                available in your city.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <span class="scrollToTop"><span class="fas fa-angle-up"></span></span>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('mangareader/js/swipper.min.js') }}"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>

</html>
