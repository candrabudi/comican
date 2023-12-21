<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-semibold ms-2">KOMIKSEA</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('sea.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('sea.comic') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-file"></i>
                <div data-i18n="Komik">Komik</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('sea.setting') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-cog"></i>
                <div data-i18n="Pengaturan">Pengaturan</div>
            </a>
        </li>
    </ul>
</aside>
