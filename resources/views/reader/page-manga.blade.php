@extends('reader.layouts.app')
@section('content')
    <div class="postbody">
        <div class="bixbox">
            <div class="releases">
                <h2>Terakhir Update Komik</h2><a class="vl" href="{{ route('reader.comic.page', 1) }}">Lihat Semua</a>
            </div>
            <div class="listupd stsven">
                @foreach ($comics as $comic)
                    <div class="utao styletwo stylegg">
                        <div class="uta">
                            <div class="imgu">
                                <a rel="382" class="series" href="{{ route('reader.manhwa.detail', $comic->slug) }}"
                                    title="{{ $comic->alternative }}"><img data-lazyloaded="1"
                                        data-placeholder-resp="214x305" src="/storage/{{ $comic->thumb }}"
                                        data-src="/storage/{{ $comic->thumb }}"
                                        class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                        title="{{ $comic->alternative }}" alt="{{ $comic->alternative }}" width="214"
                                        height="305" />
                                    <span class="type {{ $comic->type }}"></span>
                                </a>
                            </div>
                            <div class="luf">
                                <a class="series" href="{{ route('reader.manhwa.detail', $comic->slug) }}"
                                    title="{{ $comic->title }}">
                                    <span>{{ $comic->title }}</span>
                                </a>
                                <ul class="{{ $comic->type }}">
                                    @foreach ($comic->comicChapter as $ch)
                                        <li>
                                            <a href="{{ $ch['chapter_slug'] }}">
                                                <span class="eggchap">{{ $ch->chapter_number }}</span>
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
                @if ($totalComics > 20)
                    <div class="hpage">
                        <a href="{{ route('reader.comic.page', 1) }}" class="r">Lanjut <i
                                class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
