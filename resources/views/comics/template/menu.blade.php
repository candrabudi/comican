<div class="th">
    <div class="centernav bound">
        <div class="shme"><i class="fa fa-bars" aria-hidden="true"></i></div>

        <header role="banner" itemscope itemtype="http://schema.org/WPHeader">
            <div class="site-branding logox">
                <span class="logos">
                    <a title="Seataku - Baca Komik Terlengkap dan Terbaru Hari Ini" itemprop="url"
                        href="https://seataku.com/">
                        <img src="https://seataku.com/wp-content/uploads/2023/11/seataku.png" 
                            width="195" 
                            height="50" 
                            alt="Seataku - Baca Komik Terlengkap dan Terbaru Hari Ini" />
                        <span class="hdl">Seataku</span>
                    </a>
                </span>
                <meta itemprop="name" content="Seataku" />
            </div>
        </header>

        <nav id="main-menu" class="mm">
            <span itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
                <ul id="menu-manga" class="menu">
                    <li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8">
                        <a href="/" itemprop="url"><span itemprop="name">Beranda</span></a>
                    </li>
                    <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9">
                        <a href="{{ route('reader.page.manga') }}" itemprop="url"><span itemprop="name">Manga</span></a>
                    </li>
                    <li id="menu-item-9" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-9">
                        <a href="{{ route('reader.page.manhwa') }}" itemprop="url"><span itemprop="name">Manhwa</span></a>
                    </li>
                </ul>
            </span>
            <div class="clear"></div>
        </nav>
        <div class="searchx minmb">
            <form action="{{ route('reader.search') }}" id="form" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
                <input id="s" itemprop="query-input" class="search-live" type="text" placeholder="Search" name="search" />
                <button type="submit" id="submit" aria-label="search"><i class="fas fa-search"
                        aria-hidden="true"></i></button>
                <div class="srcmob srccls"><i class="fas fa-times-circle"></i></div>
            </form>
        </div>
        <div class="srcmob">
            <i class="fas fa-search" aria-hidden="true"></i>
        </div>
    </div>
    <div class="clear"></div>
</div>
