<div class="slider-wrapper wrapernum3">

    <div class="big-slider swiper-container slidernom3">
        <div class="swiper-wrapper">
            @foreach ($comicSlider as $slider)
                <div class="swiper-slide">
                    <div class="mainslider">
                        <div class="limit">
                            <div class="sliderinfo">
                                <div class="sliderinfolimit">
                                    <div class="slidlc">
                                        Chapter:
                                        {{ str_replace('Chapter ', '', $slider->comicChapterLast->chapter_number) }}
                                    </div>
                                    <a href="{{ $slider->slug }}">
                                        <span class="name">{{ $slider->title }}</span>
                                        <div class="desc">
                                            <p>{{ substr($slider->description, 0, 100) }}</p>
                                        </div>
                                    </a>
                                    <div class="meta">
                                        <div class="metas-slider-genres">
                                            <span class="metas-genres-values">
                                                @foreach ($slider->comicGenres as $genre)
                                                    <a href="/genre/{{ $genre->slug }}"
                                                        rel="genre">{{ $genre->name }}</a>
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <div class="start-reading">
                                        <a href="{{ route('reader.manhwa.detail', $slider->slug) }}">
                                            <span>Mulai Baca <i class="fas fa-long-arrow-alt-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="slidtrithumb">
                                <img data-lazyloaded="1" data-placeholder-resp="214x310"
                                    src="storage/{{ $slider->thumb }}" width="214" height="310"
                                    data-src="storage/{{ $slider->thumb }}"
                                    class="attachment-full size-full wp-post-image"
                                    alt="The Genius Assassin Who Takes it All Bahasa Indonesia"
                                    title="The Genius Assassin Who Takes it All Bahasa Indonesia" decoding="async"
                                    fetchpriority="high" />
                            </div>
                            <div class="bigbanner" style="background-image: url('storage/{{ $slider->thumb }}');">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paging">
            <div class="centerpaging">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <div class="home-genres gennom3">
        <span class="genre-listx">
            @foreach (getRandomGenres() as $genre)
                <a href="{{ route('reader.genre.page', ['slug' => $genre->slug, 'page' => 1]) }}" title="Lihat semua komik genre {{ $genre->name }}">{{ $genre->name }}</a>
            @endforeach
        </span>
        <span class="alman">
            <a href="{{ route('reader.comic.page', 1) }}" style="color: #FFF;">Semua Komik</a>
        </span>
    </div>
</div>
