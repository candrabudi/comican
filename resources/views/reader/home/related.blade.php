<div class="bixbox">
    <div class="releases">
        <h2><span>Rekomendasi Komik Yang Sama</span></h2>
    </div>
    <div class="listupd">
        @foreach (RelatedComic($comic->id) as $related)
            <div class="bs">
                <div class="bsx">
                    <a href="https://seataku.com/manga/insanely-talented-player-bahasa-indonesia/"
                        title="{{ $related->title }}">
                        <div class="limit">
                            <div class="ply"></div>
                            <span class="type Manhwa"></span>
                            <span class="colored"><i class="fas fa-palette"></i>Color</span>
                            <span class="hotx"><i class="fab fa-hotjar"></i></span>
                            <img data-lazyloaded="1" data-placeholder-resp="165x225"
                                src="/storage/{{ $related->thumb }}"
                                data-src="/storage/{{ $comic->related }}"
                                class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                title="{{ $related->title }}"
                                alt="{{ $related->title }}" width="165" height="225" />
                        </div>
                        <div class="bigor">
                            <div class="tt">
                                {{ $related->title }}
                            </div>
                            <div class="adds">
                                <div class="epxs">
                                    Chapter 17
                                </div>
                                <div class="rt">
                                    <div class="rating">
                                        <div class="rating-prc">
                                            <div class="rtp">
                                                <div class="rtb">
                                                    <span style="width: 80%;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="numscore">
                                            {{ $related->rating }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
