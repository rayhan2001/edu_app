<div class="navbar-top pt-15 pb-10 bgc-black navtop--one">
    <div class="container">
        <div class="navtop-inner">
            <ul class="topbar-left">
                <li><i class="flaticon-pin"></i> {{$setting->location ?? ''}}</li>
            </ul>
            <ul class="topbar-right">
                <li class="social-area">
                    <span>Follow Us - </span>
                    @if($setting !=null)
                    <a href="{{$setting->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$setting->twitter_link}}"><i class="fab fa-twitter"></i></a>
                    <a href="{{$setting->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
