<!DOCTYPE html>
<html lang="en-US">
    <title></title>
    <link rel="canonical" href="https://komiksea.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Komiksea" />
	<meta property="og:url" content="https://komiksea.lol/" />
	<meta property="og:site_name" content="Komiksea" />
	<meta name="twitter:card" content="summary_large_image" />
<head>
    @include('reader.layouts.head')
</head>

<body class="darkmode black" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <div class="mainholder">
        @include('reader.layouts.menu')
        <div id="content" class="readercontent">
            <div class="wrapper">
                <div class="chapterbody">
                    <div class="blox mlb kln"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
                    <div class="postarea">
                        <article id="post-358" class="post-358 hentry" itemscope="itemscope"
                            itemtype="http://schema.org/CreativeWork">
                            <div class="headpost">
                                <h1 class="entry-title" itemprop="name">Komik {{ $chapter->chapter_title }}</h1>
                                <div class="allc">All chapters are in 
                                    @if ($comic->type == "Manhwa")
                                        <a href="{{ route('reader.manhwa.detail', $comic->slug) }}">{{ $comic->title }}</a>
                                    @elseif($comic->type == "Manhua")
                                        <a href="{{ route('reader.manhwa.detail', $comic->slug) }}">{{ $comic->title }}</a>
                                    @else
                                        <a href="{{ route('reader.manhwa.detail', $comic->slug) }}">{{ $comic->title }}</a>
                                    @endif
                                </div>
                            </div>
                            <div class="ts-breadcrumb bixbox">
                                <div itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                    <span itemprop="itemListElement" itemscope=""
                                        itemtype="http://schema.org/ListItem">
                                        <a itemprop="item" href="https://seataku.com/"><span
                                                itemprop="name">Seataku</span></a>
                                        <meta itemprop="position" content="1">
                                    </span>
                                    ›
                                    <span itemprop="itemListElement" itemscope=""
                                        itemtype="http://schema.org/ListItem">
                                        @if ($comic->type == "Manhwa")
                                            <a itemprop="item" href="{{ route('reader.manhwa.detail', $comic->slug) }}" itemprop="name">{{ $comic->title }}</a>
                                        @elseif($comic->type == "Manhua")
                                            <a itemprop="item" href="{{ route('reader.manhwa.detail', $comic->slug) }}" itemprop="name">{{ $comic->title }}</a>
                                        @else
                                            <a itemprop="item" href="{{ route('reader.manhwa.detail', $comic->slug) }}" itemprop="name">{{ $comic->title }}</a>
                                        @endif
                                        <meta itemprop="position" content="2">
                                    </span>
                                    ›
                                    <span itemprop="itemListElement" itemscope=""
                                        itemtype="http://schema.org/ListItem">
                                        <a itemprop="item"
                                            href="{{ route('reader.chapter', $chapter->chapter_slug) }}"><span
                                                itemprop="name">Komik {{ $chapter->chapter_title }}</span></a>
                                        <meta itemprop="position" content="3">
                                    </span>
                                </div>
                            </div>
                            <div class="entry-content entry-content-single maincontent" itemprop="description">
                                <div class="chdesc">
                                    <p>
                                        Baca manga terbaru <b> Komik {{ $chapter->chapter_title }} </b>
                                        di <b> Seataku </b>. Manga <b> {{ $chapter->chapter_title }} Bahasa Indonesia
                                        </b> selalu diperbarui di <b> Seataku </b>. Jangan lupa baca manga lainnya
                                        pembaruan. Daftar koleksi manga <b> Seataku </b> ada di menu Daftar Manga.
                                    </p>
                                </div>
                                <div class="chnav ctop">
                                    <span class="selector slc l">
                                        <div class="nvx">
                                            <select name="chapter" id="chapter"
                                                onchange="redirectToChapter(this)"
                                                aria-label="select chapter">
                                                <option value="">Select Chapter</option>
                                                @foreach ($allChapters as $ch)
                                                    <option value="{{ route('reader.chapter', $ch->chapter_slug) }}" {{ $ch->chapter_number == $chapter->chapter_number ? 'selected' : '' }}>{{ $ch->chapter_number }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </span>
                                    <span class="navlef">
                                        <span class="npv r">
                                            <div class="nextprev">
                                                @if($previousChapter)
                                                    <a class="ch-prev-btn" href="{{ route('reader.chapter', $previousChapter->chapter_slug) }}" rel="prev">
                                                        <i class="fas fa-angle-left"></i> Prev 
                                                    </a>
                                                @else
                                                    <a class="ch-prev-btn disabled" href="#/prev/" rel="prev">
                                                        <i class="fas fa-angle-left"></i> Prev		
                                                    </a>
                                                @endif
                                                @if($nextChapter)
                                                    <a class="ch-next-btn" href="{{ route('reader.chapter', $nextChapter->chapter_slug) }}" rel="next">
                                                        Next <i class="fas fa-angle-right"></i>
                                                    </a>
                                                @else
                                                    <a class="ch-next-btn disabled" href="#/next/" rel="next">
                                                        Next <i class="fas fa-angle-right"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </span>
                                    </span>
                                </div>
                                <div id="readerarea" class="rdminimal">
                                    <div id="chimg-auh">
                                        <div class="blox mlb kln" style="margin-bottom: 30px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
                                        @foreach (json_decode($chapter->chapter_content) as $content)
                                            <img src="{{ $content }}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="chnav cbot">
                                    <span class="selector slc l">
                                        <div class="nvx">
                                            <select name="chapter" id="chapter"
                                                onchange="this.options[this.selectedIndex].value&&window.location.assign(this.options[this.selectedIndex].value)"
                                                aria-label="select chapter">
                                                <option value="">Select Chapter</option>
                                            </select>
                                        </div>
                                    </span>
                                    <span class="amob"><span class="npv r">
                                            <div class="nextprev">
                                                <a class="ch-prev-btn" href="#/prev/" rel="prev">
                                                    <i class="fas fa-angle-left"></i> Prev </a>
                                                <a class="ch-next-btn" href="#/next/" rel="next">
                                                    Next <i class="fas fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="chaptertags">
                                @php
                                    $dateString = $chapter->chapter_realease;
                                    $dateTime = \Carbon\Carbon::parse($dateString);

                                    $formattedDateTime = $dateTime->isoFormat('YYYY-MM-DD\\G\\M\\TZZHH:mm:ssZ');
                                    $formattedDate = $dateTime->translatedFormat('d F Y');
                                @endphp
                                <p>Tags: baca manga Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }}, komik Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }}, baca Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }} online, Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }} bab, Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }}, Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }} kualitas tinggi, Komik {{ $chapter->chapter_title.' '.$chapter->chapter_number }} manga <time class="entry-date" datetime="{{ $formattedDateTime }}" itemprop="datePublished" pubdate>{{ $formattedDate }}</time>, <span itemprop="author">seabreeze</span></p>
                            </div>
                        </article>
                        <div class="blox mlb kln" style="margin-bottom: 10px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
                        @include('reader.home.related')
                        <div id="comments" class="bixbox comments-area">
                            <div class="releases">
                                <h2><span>Comment</span></h2>
                            </div>
                            <div class="cmt commentx">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter"
                role="contentinfo">
                <div class="footermenu">
                    <div class="menu-manga-container">
                        <ul id="menu-manga-1" class="menu">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8"><a
                                    href="/" itemprop="url">Home</a></li>
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
                                many language errors, character names, and story lines. For the original version, please
                                buy the comic if it's available in your city.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <span class="scrollToTop"><span class="fas fa-angle-up"></span></span>
    <script>
        function redirectToChapter(select) {
            var selectedOption = select.options[select.selectedIndex];
            var url = selectedOption.value;
            window.location.href = url;
        }
    </script>
</body>

</html>
<!-- Page optimized by LiteSpeed Cache @2023-12-04 17:03:05 -->

<!-- Page cached by LiteSpeed Cache 5.7.0.1 on 2023-12-04 17:03:01 -->
<!-- QUIC.cloud UCSS in queue -->
