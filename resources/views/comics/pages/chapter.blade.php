@extends('comics.template.app')
@section('content')
    <div id="content" class="readercontent">
        <div class="wrapper">
            <div class="chapterbody">
                <div class="blox mlb kln"><noscript><img
                            src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                            alt="sample placement" /></noscript><img class=" lazyloaded"
                        src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                        data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                        alt="sample placement"></div>
                <div class="postarea">
                    <article id="post-358" class="post-358 hentry" itemscope="itemscope"
                        itemtype="http://schema.org/CreativeWork">
                        <div class="headpost">
                            <h1 class="entry-title" itemprop="name">Komik {{ $chapter->chapter_title }}</h1>
                            <div class="allc">All chapters are in
                                <a
                                    href="{{ route('reader.comic.detail', [strtolower($comic->type), $comic->slug]) }}">{{ $comic->title }}</a>
                            </div>
                        </div>
                        <div class="ts-breadcrumb bixbox">
                            <div itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="https://seataku.com/"><span itemprop="name">Seataku</span></a>
                                    <meta itemprop="position" content="1">
                                </span>
                                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item"
                                        href="{{ route('reader.comic.detail', [strtolower($comic->type), $comic->slug]) }}"
                                        itemprop="name">{{ $comic->title }}</a>
                                    <meta itemprop="position" content="2">
                                </span>
                                ›
                                <span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="{{ route('reader.chapter', $chapter->chapter_slug) }}"><span
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
                                        <select name="chapter" id="chapter" onchange="redirectToChapter(this)"
                                            aria-label="select chapter">
                                            <option value="">Select Chapter</option>
                                            @foreach ($allChapters as $ch)
                                                <option value="{{ route('reader.chapter', $ch->chapter_slug) }}"
                                                    {{ $ch->chapter_number == $chapter->chapter_number ? 'selected' : '' }}>
                                                    {{ $ch->chapter_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </span>
                                <span class="navlef">
                                    <span class="npv r">
                                        <div class="nextprev">
                                            @if ($previousChapter)
                                                <a class="ch-prev-btn"
                                                    href="{{ route('reader.chapter', $previousChapter->chapter_slug) }}"
                                                    rel="prev">
                                                    <i class="fas fa-angle-left"></i> Prev
                                                </a>
                                            @endif
                                            @if ($nextChapter)
                                                <a class="ch-next-btn"
                                                    href="{{ route('reader.chapter', $nextChapter->chapter_slug) }}"
                                                    rel="next">Next <i class="fas fa-angle-right"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </span>
                                </span>
                            </div>
                            <div id="readerarea" class="rdminimal">
                                <div id="chimg-auh">
                                    <div class="blox mlb kln" style="margin-bottom: 30px;"><noscript><img
                                                src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                                                alt="sample placement" /></noscript><img class=" lazyloaded"
                                            src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                                            data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                                            alt="sample placement"></div>
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
                                            @foreach ($allChapters as $ch)
                                                <option value="{{ route('reader.chapter', $ch->chapter_slug) }}"
                                                    {{ $ch->chapter_number == $chapter->chapter_number ? 'selected' : '' }}>
                                                    {{ $ch->chapter_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </span>
                                <span class="amob"><span class="npv r">
                                        <div class="nextprev">
                                            @if ($previousChapter)
                                                <a class="ch-prev-btn"
                                                    href="{{ route('reader.chapter', $previousChapter->chapter_slug) }}"
                                                    rel="prev">
                                                    <i class="fas fa-angle-left"></i> Prev
                                                </a>
                                            @endif
                                            @if ($nextChapter)
                                                <a class="ch-next-btn"
                                                    href="{{ route('reader.chapter', $nextChapter->chapter_slug) }}"
                                                    rel="next">Next <i class="fas fa-angle-right"></i>
                                                </a>
                                            @endif
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
                            <p>Tags: baca manga Komik {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }}, komik
                                Komik {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }}, baca Komik
                                {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }} online, Komik
                                {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }} bab, Komik
                                {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }}, Komik
                                {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }} kualitas tinggi, Komik
                                {{ $chapter->chapter_title . ' ' . $chapter->chapter_number }} manga <time
                                    class="entry-date" datetime="{{ $formattedDateTime }}" itemprop="datePublished"
                                    pubdate>{{ $formattedDate }}</time>, <span itemprop="author">seabreeze</span></p>
                        </div>
                    </article>
                    <div class="blox mlb kln" style="margin-bottom: 10px;"><noscript><img
                                src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                                alt="sample placement" /></noscript><img class=" lazyloaded"
                            src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                            data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png"
                            alt="sample placement"></div>
                    @include('comics.components.related')
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
@endsection
@section('scripts')
    <script>
        function redirectToChapter(select) {
            var selectedOption = select.options[select.selectedIndex];
            var url = selectedOption.value;
            window.location.href = url;
        }
    </script>
@endsection
