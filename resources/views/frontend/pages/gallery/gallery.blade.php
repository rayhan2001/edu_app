@extends('layouts.frontend_app')
@section('title')
    Gallery
@endsection
@section('content')
    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
         style="background-image: url({{asset('frontendAsset')}}/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Gallery</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->
    <!-- Portfolio Area start -->
    <div class="portfolio-page-area pt-120 pb-90 rel z-1">
        <div class="container">
            <ul class="portfolio-filter pb-35">
                <li data-filter="*" class="current">All</li>
                <li data-filter=".homeless">Homeless</li>
                <li data-filter=".cleanWater">Clean Water</li>
                <li data-filter=".education">Education</li>
                <li data-filter=".foodHealth">Food & Health</li>
            </ul>
            <div class="row portfolio-active justify-content-center">
                @foreach($galleries as $gallery)
                <div class="col-xl-4 col-md-6 item cleanWater foodHealth">
                    <div class="portfolio-item">
                        <img src="{{asset($gallery->image)}}" alt="Portfolio">
                        <div class="portfolio-item__over">
                            <h5 style="color: white">{{$gallery->title}}</h5>
{{--                            <span class="category">Homeless</span>--}}
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-xl-4 col-md-6 item homeless foodHealth">--}}
{{--                    <div class="portfolio-item">--}}
{{--                        <img src="{{asset('frontendAsset')}}/img/portfolio/portfolio2.jpg" alt="Portfolio">--}}
{{--                        <div class="portfolio-item__over">--}}
{{--                            <a class="details-btn" href="portfolio-details.html"><i class="flaticon-chevron"></i></a>--}}
{{--                            <h5><a href="portfolio-details.html">Helping Homeless People</a></h5>--}}
{{--                            <span class="category">Homeless</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6 item cleanWater education">--}}
{{--                    <div class="portfolio-item">--}}
{{--                        <img src="{{asset('frontendAsset')}}/img/portfolio/portfolio3.jpg" alt="Portfolio">--}}
{{--                        <div class="portfolio-item__over">--}}
{{--                            <a class="details-btn" href="portfolio-details.html"><i class="flaticon-chevron"></i></a>--}}
{{--                            <h5><a href="portfolio-details.html">Helping Homeless People</a></h5>--}}
{{--                            <span class="category">Homeless</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6 item homeless cleanWater foodHealth">--}}
{{--                    <div class="portfolio-item">--}}
{{--                        <img src="{{asset('frontendAsset')}}/img/portfolio/portfolio4.jpg" alt="Portfolio">--}}
{{--                        <div class="portfolio-item__over">--}}
{{--                            <a class="details-btn" href="portfolio-details.html"><i class="flaticon-chevron"></i></a>--}}
{{--                            <h5><a href="portfolio-details.html">Helping Homeless People</a></h5>--}}
{{--                            <span class="category">Homeless</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6 item homeless education">--}}
{{--                    <div class="portfolio-item">--}}
{{--                        <img src="{{asset('frontendAsset')}}/img/portfolio/portfolio5.jpg" alt="Portfolio">--}}
{{--                        <div class="portfolio-item__over">--}}
{{--                            <a class="details-btn" href="portfolio-details.html"><i class="flaticon-chevron"></i></a>--}}
{{--                            <h5><a href="portfolio-details.html">Helping Homeless People</a></h5>--}}
{{--                            <span class="category">Homeless</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6 item cleanWater education foodHealth">--}}
{{--                    <div class="portfolio-item">--}}
{{--                        <img src="{{asset('frontendAsset')}}/img/portfolio/portfolio6.jpg" alt="Portfolio">--}}
{{--                        <div class="portfolio-item__over">--}}
{{--                            <a class="details-btn" href="portfolio-details.html"><i class="flaticon-chevron"></i></a>--}}
{{--                            <h5><a href="portfolio-details.html">Helping Homeless People</a></h5>--}}
{{--                            <span class="category">Homeless</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- Portfolio Area end -->


    <!-- Why Choose Us area start -->
    <div class="why-choose-area overlay py-120">
        <div class="container">
            <div class="row gap-100 align-items-center">
                <div class="col-lg-6">
                    <div class="why-choose-content text-white rmb-65">
                        <div class="section-title mb-60">
                            <span class="section-title__subtitle mb-10">Why Choose Us</span>
                            <h2>Trusted non profit donation <span>center</span></h2>
                        </div>
                        <div class="vission-mission-tab">
                            <ul class="nav mb-25" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#mission">Mission</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#vission">Vission</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#velu">Company
                                        Velu</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="mission">Our Mission: There are many
                                    variations of passages of Lorem Ipsum available, but the majority have suffered
                                    alteration in some form, by injected humour, or random aset words which don't look
                                    even slightly believable.</div>
                                <div class="tab-pane fade" id="vission">Our Vission: There are many variations of
                                    passages of Lorem Ipsum available, but the majority have suffered alteration in some
                                    form, by injected humour, or random aset words which don't look even slightly
                                    believable.</div>
                                <div class="tab-pane fade" id="velu">Our Company Velu: There are many variations of
                                    passages of Lorem Ipsum available, but the majority have suffered alteration in some
                                    form, by injected humour, or random aset words which don't look even slightly.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-video">
                        <div class="video rel">
                            <img src="{{asset('frontendAsset')}}/img/video/video-bg.jpg" alt="Video">
                            <a class="video-play video-play--one" href="https://www.youtube.com/embed/Wimkqo8gDZ0"
                               data-effect="mfp-zoom-in"><i class="fa fa-play"></i></a>
                        </div>
                        <img class="leaf-shape top_image_bounce" src="{{asset('frontendAsset')}}/img/shapes/three-round-green.png"
                             alt="Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us area end -->
@endsection
