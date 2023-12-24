@extends('comics.template.app')
@section('content')
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
                                        data-src="/storage/{{ $comic->thumb }}" class="attachment- size- wp-post-image"
                                        alt="{{ $comic->title }}" title="{{ $comic->title }}" itemprop="image"
                                        decoding="async" fetchpriority="high" />
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
                                                <span style="width: {{ $widthRating }}%;"></span>
                                            </div>
                                        </div>
                                        <div class="num" itemprop="ratingValue" content="{{ $comic->rating }}">
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
                                            <a
                                                href="{{ route('reader.chapter', $comic->comicChapterFirst->chapter_slug) }}">
                                                <span>First:</span>
                                                <span
                                                    class="epcur epcurfirst">{{ $comic->comicChapterFirst->chapter_number }}</span>
                                            </a>
                                        </div>
                                        <div class="inepcx">
                                            <a href="{{ route('reader.chapter', $comic->comicChapterLast->chapter_slug) }}">
                                                <span>Latest:</span>
                                                <span
                                                    class="epcur epcurlast">{{ $comic->comicChapterLast->chapter_number }}</span>
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
                                                            itemtype="https://schema.org/Person" class="author vcard">
                                                            <i itemprop="name">Seabreeze</i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Posted On
                                                    </td>
                                                    <td>
                                                        <time itemprop="datePublished" datetime="2023-11-27T10:28:03+00:00">
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
                                                        <time itemprop="dateModified" datetime="2023-11-27T10:28:49+00:00">
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
                    {{-- <div class="kln" style="margin-bottom: 10px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" ls-is-cached lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div> --}}
                    <div class="bixbox bxcl epcheck">
                        <div class="releases">
                            <h2>
                                Chapter {{ $comic->title }}
                                Bahasa Indonesia
                            </h2>
                        </div>
                        <div class="search-chapter">
                            <input id="searchchapter" type="text" placeholder="Search Chapter. Example: 25 or 178"
                                autocomplete="off" />
                        </div>
                        <div class="eplister" id="chapterlist">
                            <ul class="clstyle">
                                @foreach ($comic->comicChapterAll as $chapter)
                                    <li data-num="{{ str_replace('Chapter ', '', $chapter->chapter_number) }}"
                                        class="first-chapter">
                                        <div class="chbox">
                                            <div class="eph-num">
                                                <a href="{{ route('reader.chapter', $chapter->chapter_slug) }}">
                                                    <span class="chapternum">{{ $chapter->chapter_number }}</span>
                                                    <span
                                                        class="chapterdate">{{ formatTime($chapter->chapter_realease) }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="kln" style="margin-bottom: 10px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" ls-is-cached lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div> --}}
                    @include('comics.components.related')
                    <div id="comments" class="bixbox comments-area">

                    </div>
                </article>
            </div>
            @include('comics.components.sidebar')
        </div>
    </div>
</div>
@endsection
