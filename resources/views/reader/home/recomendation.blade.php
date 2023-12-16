@php
    $comicRecommendations = getComicRecommendations();
@endphp

<div class="bixbox">
    <div class="releases">
        <h2>Recommendation</h2>
    </div>
    <div class="series-gen">
        <ul class="nav-tabs">
            @foreach ($comicRecommendations as $key => $genre)
                <li class="{{ $key === 0 ? 'active' : '' }}">
                    <a href="#{{ $genre['slug'] }}">{{ $genre['genre'] }}</a>
                </li>
            @endforeach
        </ul>
        <div class="listupd">
            @foreach ($comicRecommendations as $key => $comics)
                <div id="{{ $comics['slug'] }}" class="tab-pane {{ $key === 0 ? 'active' : '' }}">
                    @foreach ($comics['comics'] as $comic)
                        @if($comic['comic_chapter_last'])
                            <div class="bs">
                                <div class="bsx">
                                    <a href="{{ route('reader.manhua.detail', $comic['slug']) }}"
                                        title="{{ $comic['title'] }}">
                                        <div class="limit">
                                            <div class="ply"></div>
                                            <span class="type {{ $comic['type'] }}"></span>
                                            <img data-lazyloaded="1" data-placeholder-resp="214x305"
                                                src="/storage/{{ $comic['thumb'] }}"
                                                data-src="/storage/{{ $comic['thumb'] }}"
                                                class="ts-post-image wp-post-image attachment-medium size-medium"
                                                loading="lazy" title="{{ $comic['title'] }}" alt="{{ $comic['title'] }}"
                                                width="214" height="305" />
                                        </div>
                                        <div class="bigor">
                                            <div class="tt">
                                                {{ $comic['title'] }} </div>
                                            <div class="adds">
                                                <div class="epxs">{{ $comic['comic_chapter_last']['chapter_number'] }}</div>
                                                <div class="rt">
                                                    <div class="rating">
                                                        <div class="rating-prc">
                                                            <div class="rtp">
                                                                <div class="rtb"><span
                                                                        style="width:{{ formatNumber(round($comic['rating'], 2)) }}%"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="numscore">{{ $comic['rating'] }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
