<div class='serieslist pop wpop wpop-monthly'>
    <ul>
        @php
            $numTopMonth = 1;
        @endphp
        @foreach (getTopComicsMonth() as $comicTopMonth)
            <li>
                <div class="ctr">{{ $numTopMonth++ }}</div>
                <div class="imgseries">
                    <a class="series" href="/storage/{{ $comicTopMonth->thumb }}"
                        rel="116">
                        <img data-lazyloaded="1" data-placeholder-resp="214x307"
                            src="/storage/{{ $comicTopMonth->thumb }}"
                            data-src="/storage/{{ $comicTopMonth->thumb }}"
                            class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                            title="{{ $comicTopMonth->title }}" alt="{{ $comicTopMonth->title }}"
                            width="214" height="307" /> </a>
                </div>
                <div class="leftseries">
                    <h2>
                        <a class="series" href="/storage/{{ $comicTopMonth->thumb }}" rel="116">{{ $comicTopMonth->title }}</a>
                    </h2>
                    <span><b>Genres</b>: <a href="https://seataku.com/genres/action/"
                            rel="tag">Action</a>, <a href="https://seataku.com/genres/fantasy/"
                            rel="tag">Fantasy</a></span>
                    <div class="rt">
                        <div class="rating">
                            <div class="rating-prc">
                                <div class="rtp">
                                    <div class="rtb"><span style="width: {{ formatNumber(round($comicTopMonth->rating, 2)) }}%"></span></div>
                                </div>
                            </div>
                            <div class="numscore">{{ $comicTopMonth->rating }}</div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>