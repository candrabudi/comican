@extends('reader.layouts.app')
@section('slider')
    @include('reader.home.slider')
@endsection
@section('content')
    {{-- <div class="hotslid">
        <div class="bixbox hothome full">
            <div class="releases">
                <h2>Popular Today</h2>
            </div>
            <div class="listupd popularslider">
                <div class="popconslide">
                    <div class="bs">
                        <div class="bsx">

                            <a href="https://seataku.com/manga/ghoul-ga-sekai-wo-sukutta-koto-wo-watashi-dake-ga-shitteiru/"
                                title="Ghoul ga Sekai wo Sukutta Koto wo Watashi dake ga shitteiru">
                                <div class="limit">
                                    <div class="ply"></div>
                                    <span class="type Manga"></span>
                                    <img data-lazyloaded="1" data-placeholder-resp="214x305"
                                        src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMTQiIGhlaWdodD0iMzA1IiB2aWV3Qm94PSIwIDAgMjE0IDMwNSI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2NmZDRkYjtmaWxsLW9wYWNpdHk6IDAuMTsiLz48L3N2Zz4="
                                        data-src="https://seataku.com/wp-content/uploads/2023/11/Komik-Ghoul-ga-Sekai-wo-Sukutta-Koto-wo-Watashi-dake-ga-shitteiru.webp"
                                        class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                        title="Ghoul ga Sekai wo Sukutta Koto wo Watashi dake ga shitteiru"
                                        alt="Ghoul ga Sekai wo Sukutta Koto wo Watashi dake ga shitteiru" width="214"
                                        height="305" />
                                </div>
                                <div class="bigor">
                                    <div class="tt">
                                        Ghoul ga Sekai wo Sukutta Koto wo Watashi dake ga shitteiru </div>
                                    <div class="adds">
                                        <div class="epxs">Chapter 6</div>
                                        <div class="rt">
                                            <div class="rating">
                                                <div class="rating-prc">
                                                    <div class="rtp">
                                                        <div class="rtb"><span style="width:75%"></span></div>
                                                    </div>
                                                </div>
                                                <div class="numscore">7.5</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="kln" style="margin-bottom: 30px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" ls-is-cached lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
    <div class="postbody">
        <div class="bixbox">
            <div class="releases">
                <h2>Terakhir Update</h2><a class="vl" href="{{ route('reader.comic.page', 1) }}">Lihat Semua</a>
            </div>
            <div class="listupd stsven">
                @foreach ($comics as $comic)
                    <div class="utao styletwo stylegg">
                        <div class="uta">
                            <div class="imgu">

                                @if ($comic->type == 'Manhwa')
                                    <a rel="382" class="series" href="{{ route('reader.manhwa.detail', $comic->slug) }}"
                                        title="{{ $comic->alternative }}"><img data-lazyloaded="1"
                                            data-placeholder-resp="214x305" src="/storage/{{ $comic->thumb }}"
                                            data-src="/storage/{{ $comic->thumb }}"
                                            class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                            title="{{ $comic->alternative }}" alt="{{ $comic->alternative }}" width="214"
                                            height="305" />
                                        <span class="type {{ $comic->type }}"></span>
                                    </a>
                                @elseif($comic->type == 'Manhua')
                                    <a rel="382" class="series"
                                        href="{{ route('reader.manhua.detail', $comic->slug) }}"
                                        title="{{ $comic->alternative }}"><img data-lazyloaded="1"
                                            data-placeholder-resp="214x305" src="/storage/{{ $comic->thumb }}"
                                            data-src="/storage/{{ $comic->thumb }}"
                                            class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                            title="{{ $comic->alternative }}" alt="{{ $comic->alternative }}"
                                            width="214" height="305" />
                                        <span class="type {{ $comic->type }}"></span>
                                    </a>
                                @else
                                    <a rel="382" class="series"
                                        href="{{ route('reader.manga.detail', $comic->slug) }}"
                                        title="{{ $comic->alternative }}"><img data-lazyloaded="1"
                                            data-placeholder-resp="214x305" src="/storage/{{ $comic->thumb }}"
                                            data-src="/storage/{{ $comic->thumb }}"
                                            class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                            title="{{ $comic->alternative }}" alt="{{ $comic->alternative }}"
                                            width="214" height="305" />
                                        <span class="type {{ $comic->type }}"></span>
                                    </a>
                                @endif
                            </div>
                            <div class="luf">
                                @if ($comic->type == 'Manhwa')
                                    <a class="series" href="{{ route('reader.manhwa.detail', $comic->slug) }}"
                                        title="{{ $comic->title }}">
                                        <span>{{ $comic->title }}</span>
                                    </a>
                                @elseif($comic->type == 'Manhua')
                                    <a class="series" href="{{ route('reader.manhua.detail', $comic->slug) }}"
                                        title="{{ $comic->title }}">
                                        <span>{{ $comic->title }}</span>
                                    </a>
                                @else
                                    <a class="series" href="{{ route('reader.manga.detail', $comic->slug) }}"
                                        title="{{ $comic->title }}">
                                        <span>{{ $comic->title }}</span>
                                    </a>
                                @endif

                                <ul class="{{ $comic->type }}">
                                    @foreach ($comic->comicChapter as $ch)
                                        <li>
                                            <a href="{{ route('reader.chapter', $ch['chapter_slug']) }}">
                                                <span
                                                    class="eggchap">{{ $ch->chapter_number }}</span>
                                                <span class="eggtime">{{ formatTime($ch->chapter_realease) }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul> <span class="statusind {{ $comic->status }}"><i class="fas fa-circle"></i>
                                    {{ $comic->status }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="hpage">
                    <a href="{{ route('reader.comic.page', 2) }}" class="r">Next <i class="fa fa-chevron-right"
                            aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="kln" style="margin-bottom: 10px;"><noscript><img src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"/></noscript><img class=" ls-is-cached lazyloaded" src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" data-src="https://mangareader.themesia.com/wp-content/uploads/2020/12/rn728.png" alt="sample placement"></div>
        @include('reader.home.recomendation')
        {{-- recomendation include --}}
    </div>
@endsection
