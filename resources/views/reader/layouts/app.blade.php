<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Title</title>
    <link rel="canonical" href="https://komiksea.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Komiksea" />
	<meta property="og:url" content="https://komiksea.lol/" />
	<meta property="og:site_name" content="Komiksea" />
	<meta name="twitter:card" content="summary_large_image" />
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

    <script src="{{ asset('reader/js/swipper.min.js') }}"></script>
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
