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
    <div class="our-event-area pt-120 pb-95 rel z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center mb-65">
                        <h3>Our <span> Gallery</span></h3>
                    </div>
                </div>
            </div>
            <div class="row events-active">
                @foreach($galleries as $index => $gallery)
                    @if($index < 6)
                        <div class="col-xl-4 col-md-6 item">
                            <div class="event-item">
                                <img src="{{asset($gallery->image)}}" alt="Event">
                                <div class="event-item__hover">
                                    <h4>{{$gallery->title}}</h4>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Our Event area end -->


    <!-- About us area start -->
    <div class="about-us-two">
        <div class="container">
            <div class="col-xl-12">
                <div class="about-us-content-part mb-50">
                    <hr class="mt-40">
                    <div class="about-middle-images">
                        @foreach($galleries as $gallery)
                            <div class="video rel mx-3" style="position: relative;">
                                <img src="{{asset($gallery->image)}}" alt="Video">
                                <a class="video-play video-play--one" target="_blank"
                                   href="{{asset($gallery->video_link)}}"
                                   data-effect="mfp-zoom-in"
                                   style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%);">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- About us area end -->
@endsection
