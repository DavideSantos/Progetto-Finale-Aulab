<nav class="navbar navbar-expand-lg sticky-top nav navbar-light">
    <div class="container-fluid">
        <div class="div"></div>
        <a class="navbar-brand a-navbar" href="{{ route('welcome') }}"><i class="fa-solid fa-basket-shopping"></i>
            PrestoShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link a-navbar " aria-current="page"
                        href="{{ route('indexAnnouncement') }}">{{ __('ui.announcements') }}</a>
                </li>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle a-navbar" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu nav-drop" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item a-navbar"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <form action="{{ route('searchAnnouncements') }}" method="GET" class="d-flex">
                    <input class="form-control width-search me-2" type="search" placeholder="{{ __('ui.search') }}"
                        aria-label="Search" name="searched">
                    <button class="btn btn-navbar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </ul>
            <ul class="ul ul-margin">

                <x-_locale lang='it' nation="it" />
            </ul>


            <ul class="ul">

                <x-_locale lang='gb' nation="gb" />
            </ul>


            <ul class="ul">

                <x-_locale lang='de' nation="de" />
            </ul>

        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
                <ul class="navbar-nav ms-auto  mb-2 mb-lg-0">
                    <li class="nav-item me-5">
                        <a class="nav-link my-nav-link a-navbar" href="{{ route('login') }}" role="button"
                            aria-expanded="false">
                            {{ __('ui.login') }} | {{ __('ui.sign up') }}
                        </a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto ">
                    <li><a class="nav-link a-navbar " href="{{ route('createAnnouncement') }}"><span><i
                                    class="fa-solid fa-pen-to-square"></i></span>{{ __('ui.addannouncement') }}</a>
                    </li>
                    <li class="nav-item dropdown btn">
                        <a class="dropdown-toggle a-navbar pe-5 position-relative" href="#" id="navbarDropdown1"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <span
                                class=" translate-middle badge rounded-pill bg-notfica">{{ App\Models\Announcement::toBeRevisionedCount() }}
                            </span>
                        </a>
                        <ul class="dropdown-menu nav-drop" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->is_revisor)
                                <li class="nav-item">
                                    <a class="dropdown-item a-navbar btn btn-ouline-success position-relative"
                                        href="{{ route('indexDashboard') }}">
                                        {{ __('ui.dashboard') }}
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-presto">{{ App\Models\Announcement::toBeRevisionedCount() }}
                                        </span>
                                    </a>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item a-navbar" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span>
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </span> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>

            @endguest
        </div>

    </div>
</nav>
