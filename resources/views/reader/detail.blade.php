<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>{{ SEOMeta::getTitle() }}</title>
    <meta name="description" content="{{ SEOMeta::getDescription() }}">
    <meta name="keywords" content="{{ implode(', ', SEOMeta::getKeywords()) }}">
    <link rel="canonical" href="https://komiksea.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Komiksea" />
	<meta property="og:description" content="{{ SEOMeta::getDescription() }}" />
	<meta property="og:url" content="https://komiksea.lol/" />
	<meta property="og:site_name" content="Komiksea" />
	<meta name="twitter:card" content="summary_large_image" />
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
    <link rel='stylesheet' id='style-css' href='{{ asset('reader/css/style.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' id='lightstyle-css' href='{{ asset('reader/css/lightmode.css') }}' type='text/css'
        media='all' />
    <link rel='stylesheet' id='swiper-css' href='{{ asset('reader/css/swipper.min.css') }}' type='text/css'
        media='all' />
    <script type="text/javascript" src="{{ asset('reader/js/jquery.min.js') }}" id="jquery-js"></script>
    <script type="text/javascript" src="{{ asset('reader/js/function.js') }}" id="tsfn_scripts-js"></script>
    <script type="text/javascript" src="{{ asset('reader/js/tab.js') }}" id="tabs-js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('reader/css/main.css') }}">
    <script type="text/javascript" src="{{ asset('reader/js/owl.carousel.min.js') }}" id="owl-carousel-js"></script>
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
</head>

<body class="darkmode" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <div class="mainholder">
        @include('reader.layouts.menu')
        <div id="content" class="manga-info mangatere">
            <div class="wrapper">
                <div class="bigcover">
                    <div class="bigbanner"
                        style="
                                background-image: url('/storage/{{ $comic->thumb }}');
                                background-size: cover;
                                background-position: top center;
                            ">
                    </div>
                </div>
                <div class="terebody">
                    <div class="postbody seriestu seriestere">
                        <article id="post-232" class="post-232 hentry" itemscope="itemscope"
                            itemtype="http://schema.org/CreativeWorkSeries">
                            <div class="seriestucon">
                                <div class="seriestuheader">
                                    <h1 class="entry-title" itemprop="name">
                                        {{ $comic->title }}
                                    </h1>
                                    <div class="seriestualt">
                                        {{ $comic->alternative }}
                                    </div>
                                </div>
                                <div class="seriestucontent">
                                    <div class="seriestucontl">
                                        <div class="thumb">
                                            <img data-lazyloaded="1" data-placeholder-resp="214x310"
                                                src="/storage/{{ $comic->thumb }}" width="214" height="310"
                                                data-src="/storage/{{ $comic->thumb }}"
                                                class="attachment- size- wp-post-image" alt="{{ $comic->title }}"
                                                title="{{ $comic->title }}" itemprop="image" decoding="async"
                                                fetchpriority="high" />
                                            @if ($comic->color == 'Yes')
                                                <span class="colored"><i class="fas fa-palette"></i>Color</span>
                                            @endif
                                        </div>
                                        {{-- <div data-id="232" class="bookmark">
                                            <i class="far fa-bookmark" aria-hidden="true"></i>
                                            Bookmark
                                        </div> --}}
                                        <div class="rating bixbox">
                                            <div class="rating-prc" itemscope="itemscope" itemprop="aggregateRating"
                                                itemtype="//schema.org/AggregateRating">
                                                <meta itemprop="worstRating" content="1" />
                                                <meta itemprop="bestRating" content="10" />
                                                <meta itemprop="ratingCount" content="10" />
                                                <div class="rtp">
                                                    <div class="rtb">
                                                        <span
                                                            style="width: {{ $widthRating }}%;"></span>
                                                    </div>
                                                </div>
                                                <div class="num" itemprop="ratingValue"
                                                    content="{{ $comic->rating }}">
                                                    {{ $comic->rating }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="seriestucontentr">
                                        <div class="seriestuhead">
                                            <div class="entry-content entry-content-single" itemprop="description">
                                                <p>
                                                    {{ substr($comic->description, 0, 300) }}
                                                </p>
                                            </div>
                                            <div class="lastend">
                                                <div class="inepcx">
                                                    <a href="{{ route('reader.chapter', $comic->comicChapterFirst->chapter_slug) }}">
                                                        <span>First:</span>
                                                        <span class="epcur epcurfirst">{{ $comic->comicChapterFirst->chapter_number }}</span>
                                                    </a>
                                                </div>
                                                <div class="inepcx">
                                                    <a href="{{ route('reader.chapter',$comic->comicChapterLast->chapter_slug) }}">
                                                        <span>Latest:</span>
                                                        <span class="epcur epcurlast">{{ $comic->comicChapterLast->chapter_number }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="seriestucont">
                                            <div class="seriestucontr">
                                                @php
                                                    $postedOnString = $comic->posted_on;
                                                    $dateTimePostedOn = \Carbon\Carbon::parse($postedOnString);
                                                    $formatPostedOn = $dateTimePostedOn->translatedFormat('d F, Y');

                                                    $updatedOnString = $comic->updated_on;
                                                    $dateTimeUpdatedOn = \Carbon\Carbon::parse($updatedOnString);
                                                    $formatUpdatedOn = $dateTimeUpdatedOn->translatedFormat('d F, Y');
                                                @endphp
                                                <table class="infotable">
                                                    <tbody>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>{{ $comic->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Type</td>
                                                            <td>{{ $comic->type }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Author</td>
                                                            <td>
                                                                {{ $comic->author }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Posted By
                                                            </td>
                                                            <td>
                                                                <span itemprop="author" itemscope
                                                                    itemtype="https://schema.org/Person"
                                                                    class="author vcard">
                                                                    <i itemprop="name">Seabreeze</i>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Posted On
                                                            </td>
                                                            <td>
                                                                <time itemprop="datePublished"
                                                                    datetime="2023-11-27T10:28:03+00:00">
                                                                    {{-- November 27, 2023 --}}
                                                                    {{ $formatPostedOn }}
                                                                </time>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Updated On
                                                            </td>
                                                            <td>
                                                                <time itemprop="dateModified"
                                                                    datetime="2023-11-27T10:28:49+00:00">
                                                                    {{-- November 27, 2023 --}}
                                                                    {{ $formatUpdatedOn }}
                                                                </time>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="seriestugenre">
                                                    @foreach ($comic->comicGenres as $genre)
                                                        <a href="{{ route('reader.genre.page', ['slug' => $genre->slug, 'page' => 1]) }}"
                                                            rel="genre">{{ $genre->name }}</a>
                                                    @endforeach
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kln" style="margin-bottom: 10px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" ls-is-cached lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
                            <div class="bixbox bxcl epcheck">
                                <div class="releases">
                                    <h2>
                                        Chapter {{ $comic->title }}
                                        Bahasa Indonesia
                                    </h2>
                                </div>
                                <div class="search-chapter">
                                    <input id="searchchapter" type="text" placeholder="Search Chapter. Example: 25 or 178" autocomplete="off" />
                                </div>
                                <div class="eplister" id="chapterlist">
                                    <ul class="clstyle">
                                        @foreach ($comic->comicChapterAll as $chapter)
                                            <li data-num="{{ str_replace('Chapter ', '', $chapter->chapter_number) }}" class="first-chapter">
                                                <div class="chbox">
                                                    <div class="eph-num">
                                                        <a href="{{ route('reader.chapter', $chapter->chapter_slug) }}">
                                                            <span class="chapternum">{{ $chapter->chapter_number }}</span>
                                                            <span class="chapterdate">{{ formatTime($chapter->chapter_realease) }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>                                
                            </div>
                            <div class="kln" style="margin-bottom: 10px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" ls-is-cached lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
                            @include('reader.home.related')
                            <div id="comments" class="bixbox comments-area">

                            </div>
                        </article>
                    </div>
                    @include('reader.layouts.sidebar')
                </div>
            </div>
        </div>
        <div id="footer">
            <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter"
                role="contentinfo">
                <div class="footermenu">
                    <div class="menu-manga-container">
                        <ul id="menu-manga-1" class="menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8">
                                <a href="/" itemprop="url">Home</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9">
                                <a href="/manga" itemprop="url">Manga List</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-10">
                                <a href="/bookmark" itemprop="url">Bookmark</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footercopyright">
                    <div class="sosmedmrgn"></div>
                    <div class="copyright">
                        <div class="txt">
                            <p>
                                All the comics on this website are only
                                previews of the original comics, there may
                                be many language errors, character names,
                                and story lines. For the original version,
                                please buy the comic if it's available in
                                your city.
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <span class="scrollToTop"><span class="fas fa-angle-up"></span></span>
    <script>
        $('#searchchapter').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('#chapterlist ul li').each(function() {
                var chapterNumber = $(this).data('num').toString();
                if (chapterNumber.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    </script>
</body>

</html>
