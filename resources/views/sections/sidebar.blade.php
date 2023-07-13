<!-- BEGIN: Side Menu -->
<nav class="side-nav">
    <ul>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="" class="side-menu side-menu{{ request()->is("/") ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('apartments') }}" class="side-menu side-menu{{ request()->is("apartments") || request()->is('/apartments/*') ? "--active" : "" }}">
                <div class="side-menu__icon">
                    <i data-lucide="home"></i>
                </div>
                <div class="side-menu__title">Квартиры</div>
            </a>
        </li>
        <li>
            <a href="{{ route('dairy') }}" class="side-menu side-menu{{ request()->is("dairy") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="edit"></i></div>
                <div class="side-menu__title">Отчеты</div>
            </a>
        </li>
        <li>
            <a href="{{ route('clients') }}" class="side-menu side-menu{{ request()->is("clients") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="users"></i></div>
                <div class="side-menu__title">Клиенты</div>
            </a>
        </li>
        <li>
            <a href="{{ route('safe.index') }}" class="side-menu side-menu{{ request()->is("safe") ? "--active" : "" }}">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title">Сейф</div>
            </a>
        </li>
        {{--<li>
            <a href="" class="side-menu">
                <div class="side-menu__icon"><i class="bi bi-tools" style="font-size: 23px"></i></div>
                <div class="side-menu__title"> Services</div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-inbox.html" class="side-menu">
                <div class="side-menu__icon"><i data-lucide="inbox"></i></div>
                <div class="side-menu__title"> Clients</div>
            </a>
        </li>--}}

    </ul>
</nav>
<!-- END: Side Menu -->
