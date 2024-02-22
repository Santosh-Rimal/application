<aside class="layout-menu menu-vertical menu bg-menu-theme" id="layout-menu">
    <div class="app-brand demo d-flex justify-content-center">
        <a class="app-brand-link" href="{{ route('dashboard') }}">
            <img class=""
                src="{{ $settings['site_main_logo'] ? asset('admin/images/setting/' . $settings['site_main_logo']) : asset('admin/images/logo.png') }}"
                alt="logo" height="100">
        </a>
        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" href="javascript:void(0);">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-2">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- CMS -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">CMS</span></li>
        <!-- Cards -->
        <li class="menu-item {{ Request::segment(2) == 'countries' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.countries.index') }}">
                <i class="menu-icon tf-icons bx bx-world"></i>
                <div data-i18n="Basic">Country</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'courses' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.courses.index') }}">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Basic">Courses</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'services' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.services.index') }}">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Basic">Services</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'blogs' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.blogs.index') }}">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Basic">Blogs</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'testimonials' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.testimonials.index') }}">
                <i class="menu-icon tf-icons bx bx bxs-chat"></i>
                <div data-i18n="Basic">Testimonials</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'partners' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.partners.index') }}">
                <i class="menu-icon tf-icons bx bxs-layer-plus"></i>
                <div data-i18n="Basic">Partners University</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'teams' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.teams.index') }}">
                <i class="menu-icon tf-icons bx bxs-user-plus"></i>
                <div data-i18n="Basic">Our Teams</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'faqs' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.faqs.index') }}">
                <i class="menu-icon tf-icons bx bx-question-mark"></i>
                <div data-i18n="Basic">Faqs</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'successstories' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.successstories.index') }}">
                <i class="menu-icon tf-icons bx bx-medal"></i>
                <div data-i18n="Basic">Success Stories</div>
            </a>
        </li>

        <li class="menu-item {{ Request::segment(2) == 'inquirypersons' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.inquirypersons.index') }}">
                <i class="menu-icon tf-icons bx bx-user-voice"></i>
                <div data-i18n="Basic">Inquiry Persons</div>
            </a>
        </li>

        <!-- General Settings  -->
        <li class="menu-item @if (Request::segment(2) == 'pages' ||
                Request::segment(2) == 'socialmedias' ||
                Request::segment(2) == 'sliders' ||
                Request::segment(2) == 'settings') {{ 'active open' }} @endif">
            <a class="menu-link menu-toggle" href="javascript:void(0)">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="General Setting">Settings</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'sliders' ? 'active' : '' }}"
                        href="{{ route('admin.sliders.index') }}">
                        <div data-i18n="Accordion">Sliders</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'pages' ? 'active' : '' }}"
                        href="{{ route('admin.pages.index') }}">
                        <div data-i18n="Accordion">Pages</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'socialmedias' ? 'active' : '' }}"
                        href="{{ route('admin.socialmedias.index') }}">
                        <div data-i18n="Accordion">Social Medias</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link {{ Request::segment(2) == 'settings' ? 'active' : '' }}"
                        href="{{ route('admin.settings.index') }}">
                        <div data-i18n="Accordion">Global Settings</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
