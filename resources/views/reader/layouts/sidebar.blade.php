<div id="sidebar">
    {{-- <div class="section">
    
        <div class="clear"></div>
        <script>
            var ts_sf_exclusion = 0;
        </script>
    </div> --}}
    <div class="section">
        <ul class='genre'>
            @foreach (genres() as $genre)
                <li>
                    <a href="{{ route('reader.genre.page', ['slug'=>lcfirst($genre->slug), 'page' => 1]) }}" title="Lihat semua komik di genre {{ $genre->name }}">{{ $genre->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="section">
        <div class="ts-wpop-series-gen">
            <ul class="ts-wpop-nav-tabs">
                <li class="active"><span class="ts-wpop-tab" data-range="weekly">Weekly</span></li>
                <li><span class="ts-wpop-tab" data-range="monthly">Monthly</span></li>
                <li><span class="ts-wpop-tab" data-range="alltime">All</span></li>
            </ul>
        </div>

        <div id="wpop-items">
            <div class='serieslist pop wpop wpop-weekly'>
                <ul>
                    @php
                        $numTopWeek = 1;
                    @endphp
                    @foreach (getTopComicsWeek() as $comicTopWeek)
                        <li>
                            <div class="ctr">{{ $numTopWeek++ }}</div>
                            <div class="imgseries">
                                <a class="series" href="/storage/{{ $comicTopWeek->thumb }}"
                                    rel="116">
                                    <img data-lazyloaded="1" data-placeholder-resp="214x307"
                                        src="/storage/{{ $comicTopWeek->thumb }}"
                                        data-src="/storage/{{ $comicTopWeek->thumb }}"
                                        class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy"
                                        title="{{ $comicTopWeek->title }}" alt="{{ $comicTopWeek->title }}"
                                        width="214" height="307" /> </a>
                            </div>
                            <div class="leftseries">
                                <h2>
                                    <a class="series" href="/storage/{{ $comicTopWeek->thumb }}" rel="116">{{ $comicTopWeek->title }}</a>
                                </h2>
                                <span><b>Genres</b>: <a href="https://seataku.com/genres/action/"
                                        rel="tag">Action</a>, <a href="https://seataku.com/genres/fantasy/"
                                        rel="tag">Fantasy</a></span>
                                <div class="rt">
                                    <div class="rating">
                                        <div class="rating-prc">
                                            <div class="rtp">
                                                <div class="rtb"><span style="width: {{ formatNumber(round($comicTopWeek->rating, 2)) }}%"></span></div>
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
        </div>
    </div>
    <script>
        ts_popular_widget.run(1701648983);
    </script>

</div>
