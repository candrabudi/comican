<div class='serieslist pop wpop wpop-weekly'>
    <ul>
        @php
            $numTopWeek = 1;
        @endphp
        @foreach (getTopComicsWeek() as $comicTopWeek)
            <li>
                <div class="ctr">{{ $numTopWeek++ }}</div>
                <div class="imgseries">
                    <a class="series" href="/storage/{{ $comicTopWeek->thumb }}" rel="116">
                        <img data-lazyloaded="1" data-placeholder-resp="214x307" src="/storage/{{ $comicTopWeek->thumb }}"
                            data-src="/storage/{{ $comicTopWeek->thumb }}"
                            class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                            title="{{ $comicTopWeek->title }}" alt="{{ $comicTopWeek->title }}" width="214"
                            height="307" /> </a>
                </div>
                <div class="leftseries">
                    <h2>
                        <a class="series" href="/storage/{{ $comicTopWeek->thumb }}"
                            rel="116">{{ $comicTopWeek->title }}</a>
                    </h2>
                    <span><b>Genres</b>: <a href="https://seataku.com/genres/action/" rel="tag">Action</a>, <a
                            href="https://seataku.com/genres/fantasy/" rel="tag">Fantasy</a></span>
                    <div class="rt">
                        <div class="rating">
                            <div class="rating-prc">
                                <div class="rtp">
                                    <div class="rtb"><span
                                            style="width: {{ formatNumber(round($comicTopWeek->rating, 2)) }}%"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="numscore">{{ $comicTopWeek->rating }}</div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
