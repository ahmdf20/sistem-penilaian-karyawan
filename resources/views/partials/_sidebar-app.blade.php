<aside
    class="sidebar sidebar-offcanvas"
    id="sidebar"
>
    <ul class="nav">
        <li class="nav-item">
            @guest
            <div class="d-flex justify-content-center my-3">
                <a
                    href="#"
                    class="btn btn-sm btn-success"
                >Login</a>
            </div>
            @endguest
            @auth
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img
                        src="{{ auth()?->user()?->foto ? asset('storage/' . auth()?->user?->foto) : asset('icon/default-avatar.jpg') }}"
                        alt="image"
                    >
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        {{ auth()?->user()?->nama }}
                    </p>
                    <p class="sidebar-designation">
                        Welcome
                    </p>
                </div>
            </div>
            @endauth
            <p class="sidebar-menu-title">Menu</p>
        </li>
        @foreach ($sidebar_menu as $menu)
        <li
            class="nav-item {{ request()->route()->getName() == $menu['url'] || in_array($menu['url'], explode('.', request()->route()->getName())) ? 'active' : '' }} mb-1">
            <a
                class="nav-link"
                href="{{ route($menu['url']) }}"
            >
                {!! $menu['icon'] !!}
                <span class="menu-title">{{ $menu['name'] }}</span>
            </a>
        </li>
        @endforeach
        {{-- <li class="nav-item">
            <a
                class="nav-link"
                data-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
            >
                <i class="typcn typcn-briefcase menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div
                class="collapse"
                id="ui-basic"
            >
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a
                            class="nav-link"
                            href="{{ asset('celestial/template') }}/pages/ui-features/buttons.html"
        >Buttons</a></li>
        <li class="nav-item"> <a
                class="nav-link"
                href="{{ asset('celestial/template') }}/pages/ui-features/dropdowns.html"
            >Dropdowns</a></li>
        <li class="nav-item"> <a
                class="nav-link"
                href="{{ asset('celestial/template') }}/pages/ui-features/typography.html"
            >Typography</a></li>
    </ul>
    </div>
    </li> --}}
    </ul>
</aside>
