<footer class="footer-area overlay text-white pt-120 bgs-cover">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-3 col-md-4 col-sm-8">
                <div class="widget widget_about">
                    <div class="logo_footer mb-25">
                        <a href="{{route('home')}}">
                            <img src="{{asset($setting->logo)}}" alt="Logo">
                        </a>
                    </div>
                    <div class="social-style-one pt-20">
                        <a href="{{$setting->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$setting->twitter_link}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{$setting->linkedin_link}}"><i class="flaticon-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="widget widget_nav_menu">
                    <h5 class="widget-title">Quick links</h5>
                    <div class="d-flex">
                        <ul style="margin-right: 30px">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Event & Programmer</a></li>
                            <li><a href="#">Membership</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                        <ul style="margin-left: 50px">
                            <li><a href="#">Notice</a></li>
                            <li><a href="#">Upcoming Event</a></li>
                            <li><a href="#">Previous Event</a></li>
                            <li><a href="{{route('gallery')}}">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-8">
                <div class="widget widget_gallery">
                    <h4 class="widget-title">Photo Gallery</h4>
                    <div class="gallery-photos">
                        @foreach($galleries as $index => $gallery)
                            @if($index < 6)
                                <img src="{{asset($gallery->image)}}" alt="Gallery" width="80" height="80" class="border m-1">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
