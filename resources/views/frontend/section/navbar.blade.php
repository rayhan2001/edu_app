<nav class="navbar py-30 navbar--one navbar-area navbar-expand-lg">
    <div class="container nav-container navbar-bg">
        <div class="responsive-mobile-menu">
            <button class="menu toggle-btn d-block d-lg-none" data-target="#Iitechie_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>
        <div class="logo">
            <a href="{{route('home')}}"><img src="{{asset('frontendAsset')}}/img/logos/logo.png" alt="img"></a>
        </div>
        <div class="nav-right-part nav-right-part-mobile">
            <a class="search-bar-btn" href="#">
                <i class="flaticon-magnifying-glass"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="Iitechie_main_menu">
            <ul class="navbar-nav menu-open text-lg-end">
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Event & Programmer</a>
                </li>
                <li>
                    <a href="{{ route('membership.create') }}">Membership</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Resource</a>
                    <ul class="sub-menu">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Notice</a></li>
                        <li><a href="#">Upcoming Event</a></li>
                        <li><a href="#">Previous Event</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Gallery</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop">
            <a class="search-bar-btn" href="#">
                <i class="flaticon-magnifying-glass"></i>
            </a>
            <div class="dropdown">
                <a class="dropdown-toggle" href="#">
                    <i class="flaticon-user-1"></i>
                </a>
            </div>
            <a class="btn btn--style-two" href="donate.html">Donate Now</a>
        </div>
    </div>
</nav>
