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


    <div class="our-events-slider pt-120 pb-80 rel z-1">
        <div class="container">
            <div class="events-slider-active">
                @foreach($galleries as $gallery)
                <div class="event-item-three">
                    <iframe width="560" height="315" src="{{ $gallery->video_link }}?privacy=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
