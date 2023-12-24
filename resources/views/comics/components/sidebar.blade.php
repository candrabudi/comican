<div id="sidebar">
    @include('comics.components.genre')
    <div class="section">
        <div class="ts-wpop-series-gen">
            <ul class="ts-wpop-nav-tabs">
                <li class="active">
                    <span class="ts-wpop-tab" data-range="weekly">Weekly</span>
                </li>
                <li>
                    <span class="ts-wpop-tab" data-range="monthly">Monthly</span>
                </li>
                <li>
                    <span class="ts-wpop-tab" data-range="alltime">All</span>
                </li>
            </ul>
        </div>
        <div id="wpop-items">
            @include('comics.components.tab-weekly')
            @include('comics.components.tab-monthly')
            @include('comics.components.tab-alltime')
        </div>
    </div>
</div>