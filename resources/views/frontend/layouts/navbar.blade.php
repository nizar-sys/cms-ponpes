<nav class="site-nav dark mb-5 site-navbar-target">
    <div class="container">
        <div class="site-navigation">
            <a href="{{ url('/', []) }}" class="logo m-0" title="{{ @$seoSetting->title }}" alt="{{ @$seoSetting->title }}">
                <img src="{{ asset('frontend/assets/images/logodw.png') }}" class="lazyload img-fluid" alt="Images" />
            </a>

            <ul class="js-clone-nav d-none d-lg-inline-none site-menu float-right site-nav-wrap">
                @foreach ($footerUsefulLinks as $nav)
                    <li><a href="{{ $nav->url }}" class="nav-link">{{ $nav->name }}</a></li>
                @endforeach
            </ul>

            <a href="#"
                class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-inline-block"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>

        </div>
    </div>
</nav>
