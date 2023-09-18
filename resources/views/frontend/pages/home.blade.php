@extends('layouts.frontend_app')
@section('title')
    Home
@endsection
@section('content')
    <!-- Hero Area start -->
    <div class="hero-area bgs-cover overlay pt-155 pb-170" style="background-image: url({{asset($home->image ?? '')}});">
        <div class="container container-1370">
            <div class="hero-content text-center text-white">
                <h1>{{$home->title ?? ''}}</h1>
                <p>{{$home->sub_title ?? ''}}</p>
                <div class="hero-btns pt-30 rpt-10">
                    <a class="btn btn--yellow btn--style-two" href="{{route('contact.index')}}">Contact us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area end -->



    <!-- About area start -->
    <div class="about-area py-100" id="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="section-title mb-60">
                            <span class="section-title__subtitle mb-10">About us</span>
                            <h2>{{$about->title ?? ''}}</h2>
                        </div>
                        <p>{{$about->description ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About area end -->


    <!-- Our Event area start -->
    <div class="our-event-area pt-120 pb-95 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center mb-65">
                        <span class="section-title__subtitle mb-10">Our Event</span>
                        <h3>Our <span>Upcoming Event</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati
                            consectetur adipisicing</p>
                    </div>
                </div>
            </div>
            <div class="row events-active">
                <div class="col-xl-4 col-md-6 item">
                    <div class="event-item">
                        <img src="{{asset('frontendAsset')}}/img/events/event1.jpg" alt="Event">
                        <div class="event-item__hover">
                            <h4><a href="event-details.html">Free Medical Camping</a></h4>
                            <ul>
                                <li><i class="flaticon-time"></i> <span>Jan 18, 2013</span></li>
                                <li><i class="flaticon-map"></i> <span>melbourne City</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 item">
                    <div class="event-item">
                        <img src="{{asset('frontendAsset')}}/img/events/event2.jpg" alt="Event">
                        <div class="event-item__hover">
                            <h4><a href="event-details.html">Free Medical Camping</a></h4>
                            <ul>
                                <li><i class="flaticon-time"></i> <span>Jan 18, 2013</span></li>
                                <li><i class="flaticon-map"></i> <span>melbourne City</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 item">
                    <div class="event-item">
                        <img src="{{asset('frontendAsset')}}/img/events/event3.jpg" alt="Event">
                        <div class="event-item__hover">
                            <h4><a href="event-details.html">Free Medical Camping</a></h4>
                            <ul>
                                <li><i class="flaticon-time"></i> <span>Jan 18, 2013</span></li>
                                <li><i class="flaticon-map"></i> <span>melbourne City</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 item">
                    <div class="event-item">
                        <img src="{{asset('frontendAsset')}}/img/events/event5.jpg" alt="Event">
                        <div class="event-item__hover">
                            <h4><a href="event-details.html">Free Medical Camping</a></h4>
                            <ul>
                                <li><i class="flaticon-time"></i> <span>Jan 18, 2013</span></li>
                                <li><i class="flaticon-map"></i> <span>melbourne City</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 item">
                    <div class="event-item">
                        <img src="{{asset('frontendAsset')}}/img/events/event6.jpg" alt="Event">
                        <div class="event-item__hover">
                            <h4><a href="event-details.html">Free Medical Camping</a></h4>
                            <ul>
                                <li><i class="flaticon-time"></i> <span>Jan 18, 2013</span></li>
                                <li><i class="flaticon-map"></i> <span>melbourne City</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 item">
                    <div class="event-item">
                        <img src="{{asset('frontendAsset')}}/img/events/event4.jpg" alt="Event">
                        <div class="event-item__hover">
                            <h4><a href="event-details.html">Free Medical Camping</a></h4>
                            <ul>
                                <li><i class="flaticon-time"></i> <span>Jan 18, 2013</span></li>
                                <li><i class="flaticon-map"></i> <span>melbourne City</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Event area end -->


    <!-- Volunteer area start -->
    <div class="volunteer-area pt-120 pb-90 rel z-1">
        <div class="container container-1170">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center mb-60">
                        <span class="section-title__subtitle mb-10">Our Members</span>
                        <h3>Meet <span>With Member</span></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($members as $member)
                    @if($member !=null)
                    <div class="col-xl-4 col-sm-6">
                        <div class="valunteer-item valunteer-item--green">
                            <div class="valunteer-item__img">
                                <img src="{{asset($member->image ?? '')}}" alt="Valunteer">
                                <div class="share">
                                    <button><i class="flaticon-share"></i></button>
                                    <div class="share__socials">
                                        <a href="mailto:{{$member->email}}"><i class="flaticon-google-plus-logo"></i></a>
                                        <a href="tel:{{$member->mobile_no}}" class="phone"><i class="flaticon-phone-call"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="valunteer-item__designation">
                                <h5>{{$member->full_name}}</h5>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="valunteet-shapres">
            <img class="one top_image_bounce" src="{{asset('frontendAsset')}}/img/shapes/hand-glass.png" alt="Shape">
            <img class="two left_image_bounce" src="{{asset('frontendAsset')}}/img/shapes/circle-with-line-red.png" alt="Shape">
            <img class="three right_image_bounce" src="{{asset('frontendAsset')}}/img/shapes/heart.png" alt="Shape">
            <img class="four top_image_bounce" src="{{asset('frontendAsset')}}/img/shapes/house-heart.png" alt="Shape">
        </div>
    </div>
    <!-- Volunteer area end -->


    <!-- Blog area start -->
    <div class="blog-area pt-120 pb-90 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-x col-lg-8 col-md-10">
                    <div class="section-title text-center mb-60">
                        <span class="section-title__subtitle mb-10">Our Blog Post</span>
                        <h2>Our Latest <span>News & Update</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati
                            consectetur adipisicing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-item__img">
                            <img src="{{asset('frontendAsset')}}/img/blog/blog1.jpg" alt="Blog">
                            <div class="post-date">
                                <b>13</b>
                                <span>dec</span>
                            </div>
                        </div>
                        <div class="blog-item__content">
                            <ul class="blog-meta">
                                <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
                                <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
                            </ul>
                            <h4><a href="blog-details.html">tincidunt egeting semper</a></h4>
                            <p>Maximus a augue. Nullam ante nunc poraretra are oullam fringill sem ealiquam
                                suscipit.......</p>
                            <a href="blog-details.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-item__img">
                            <img src="{{asset('frontendAsset')}}/img/blog/blog2.jpg" alt="Blog">
                            <div class="post-date">
                                <b>20</b>
                                <span>dec</span>
                            </div>
                        </div>
                        <div class="blog-item__content">
                            <ul class="blog-meta">
                                <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
                                <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
                            </ul>
                            <h4><a href="blog-details.html">Aenean viverra rhoncus </a></h4>
                            <p>Maximus a augue. Nullam ante nunc poraretra are oullam fringill sem ealiquam
                                suscipit.......</p>
                            <a href="blog-details.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-item__img">
                            <img src="{{asset('frontendAsset')}}/img/blog/blog3.jpg" alt="Blog">
                            <div class="post-date">
                                <b>31</b>
                                <span>dec</span>
                            </div>
                        </div>
                        <div class="blog-item__content">
                            <ul class="blog-meta">
                                <li><i class="flaticon-user"></i> <a href="#">Wade Warren</a></li>
                                <li><i class="flaticon-bubble-chat"></i> <a href="#">05 Comment</a></li>
                            </ul>
                            <h4><a href="blog-details.html">Donec vitae sapien libero</a></h4>
                            <p>Maximus a augue. Nullam ante nunc poraretra are oullam fringill sem ealiquam
                                suscipit.......</p>
                            <a href="blog-details.html" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="blog-shape-one top_image_bounce" src="{{asset('frontendAsset')}}/img/shapes/three-round-yellow.png" alt="Shape">
    </div>
    <!-- Blog area end -->
@endsection
