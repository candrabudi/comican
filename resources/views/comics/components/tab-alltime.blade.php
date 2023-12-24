<div class='serieslist pop wpop wpop-alltime'>
    <ul>
        @php
            $numTopAll = 1;
        @endphp
        @foreach (getTopComicsAllTime() as $comicTopAll)
            <li>
                <div class="ctr">{{ $numTopAll++ }}</div>
                <div class="imgseries">
                    <a class="series" href="/storage/{{ $comicTopAll->thumb }}"
                        rel="116">
                        <img data-lazyloaded="1" data-placeholder-resp="214x307"
                            src="/storage/{{ $comicTopAll->thumb }}"
                            data-src="/storage/{{ $comicTopAll->thumb }}"
                            class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                            title="{{ $comicTopAll->title }}" alt="{{ $comicTopAll->title }}"
                            width="214" height="307" /> </a>
                </div>
                <div class="leftseries">
                    <h2>
                        <a class="series" href="/storage/{{ $comicTopAll->thumb }}" rel="116">{{ $comicTopAll->title }}</a>
                    </h2>
                    <span><b>Genres</b>: <a href="https://seataku.com/genres/action/"
                            rel="tag">Action</a>, <a href="https://seataku.com/genres/fantasy/"
                            rel="tag">Fantasy</a></span>
                    <div class="rt">
                        <div class="rating">
                            <div class="rating-prc">
                                <div class="rtp">
                                    <div class="rtb"><span style="width: {{ formatNumber(round($comicTopAll->rating, 2)) }}%"></span></div>
                                </div>
                            </div>
                            <div class="numscore">{{ $comicTopAll->rating }}</div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>