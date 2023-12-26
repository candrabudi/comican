@extends('comics.template.app')
@section('content')
    @include('comics.components.slider')
    <div id="content">
        <div class="wrapper">
            {{-- @include('comics.components.popular-today') --}}
            <div class="postbody">
                <div class="bixbox"></div>
                <div class="bixbox">
                    <div class="releases">
                        <h2>Terakhir Update</h2><a class="vl" href="{{ route('reader.comic.page', 1) }}">Lihat Semua</a>
                    </div>
                    <div class="listupd stsven">
                        @foreach ($comics as $comic)
                            <div class="utao styletwo stylegg">
                                <div class="uta">
                                    <div class="imgu">
                                        <a rel="382" class="series"
                                            href="{{ route('reader.comic.detail', [strtolower($comic->type), $comic->slug]) }}"
                                            title="{{ $comic->alternative }}"><img data-lazyloaded="1"
                                                data-placeholder-resp="214x305" src="/storage/{{ $comic->thumb }}?width=214&height=305"
                                                data-src="/storage/{{ $comic->thumb }}"
                                                class="ts-post-image wp-post-image attachment-medium size-medium"
                                                loading="lazy" title="{{ $comic->alternative }}"
                                                alt="{{ $comic->alternative }}" width="214" height="305" />
                                            <span class="type {{ $comic->type }}"></span>
                                        </a>
                                    </div>
                                    <div class="luf">
                                        <a class="series"
                                            href="{{ route('reader.comic.detail', [strtolower($comic->type), $comic->slug]) }}"
                                            title="{{ $comic->title }}">
                                            <span>{{ $comic->title }}</span>
                                        </a>
                                       

                                        <ul class="{{ $comic->type }}">
                                            @foreach ($comic->comicChapter as $ch)
                                                <li>
                                                    <a href="{{ route('reader.chapter', $ch['chapter_slug']) }}">
                                                        <span class="eggchap">{{ $ch->chapter_number }}</span>
                                                        <span
                                                            class="eggtime">{{ formatTime($ch->chapter_realease) }}</span>
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
                            <a href="{{ route('reader.comic.page', 2) }}" class="r">Next <i
                                    class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                @include('comics.components.recomendation')
            </div>
            @include('comics.components.sidebar')
        </div>
    </div>
@endsection
