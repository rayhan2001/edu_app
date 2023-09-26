@extends('layouts.frontend_app')
@section('title')
    Upcoming Event
@endsection
@section('content')
    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
         style="background-image: url({{asset('frontendAsset')}}/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Event</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Upcoming Event</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->
    @php
    use Carbon\Carbon;
    @endphp
    <!-- Our events area start -->
    <div class="our-events-slider pt-120 pb-80 rel z-1">
        <div class="container">
            <div class="events-slider-active">
                @foreach($events as $event)
                    @php
                        $carbonDate = Carbon::parse($event->date);
                        $formattedDate = $carbonDate->format('d M, Y');
                    @endphp
                <div class="event-item-three">
                    <div class="image">
                        @if($event->image)
                        <img src="{{asset($event->image)}}" alt="Event">
                        @else
                        <img src="{{asset('frontendAsset')}}/img/events/event-three1.jpg" alt="Event">
                        @endif
                    </div>
                    <div class="content">
                        <h4><a href="{{route('event.details',$event->id)}}">{{$event->title}}</a></h4>
                        <ul class="blog-meta">
                            <li><i class="flaticon-time"></i> <a href="#">{{$formattedDate}}</a></li>
                            <li><i class="flaticon-map"></i> <a href="#">{{$event->event_venue}}</a></li>
                        </ul>
                        <p>{{substr($event->description,0,80)}}</p>
                        <a class="event-btn" href="{{route('event.details',$event->id)}}">Read more <i class="flaticon-chevron"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Our events area end -->
@endsection
