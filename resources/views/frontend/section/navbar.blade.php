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
            <a href="index.html"><img src="{{asset('frontendAsset')}}/img/logos/logo.png" alt="img"></a>
        </div>
        <div class="nav-right-part nav-right-part-mobile">
            <a class="search-bar-btn" href="#">
                <i class="flaticon-magnifying-glass"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="Iitechie_main_menu">
            <ul class="navbar-nav menu-open text-lg-end">
                <li class="menu-item-has-children">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home One</a></li>
                        <li><a href="index2.html">Home Two</a></li>
                        <li><a href="index3.html">Home Three</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Causes</a>
                    <ul class="sub-menu">
                        <li><a href="causes.html">Causes</a></li>
                        <li><a href="causes-slider.html">Causes Slider</a></li>
                        <li><a href="cause-details.html">Causes Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Events</a>
                    <ul class="sub-menu">
                        <li><a href="events.html">Events</a></li>
                        <li><a href="events-slider.html">Event Slider</a></li>
                        <li><a href="event-details.html">Event Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Portfolio</a>
                    <ul class="sub-menu">
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                        <li><a href="donate.html">Donate</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="volunteers.html">Volunteers</a></li>
                        <li><a href="become-volunteers.html">Become Volunteer</a></li>
                        <li><a href="faqs.html">FAQ Page</a></li>
                        <li><a href="404.html">404 Error</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-clasic.html">Blog Clasic</a></li>
                        <li><a href="blog-slider.html">Blog Slider</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
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
