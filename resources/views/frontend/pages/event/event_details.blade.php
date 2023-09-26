@extends('layouts.frontend_app')
@section('title')
    Event
@endsection
@section('content')
    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
         style="background-image: url({{asset('frontendAsset')}}/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Event Details</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('event')}}">Events</a></li>
                            <li>Event Details</li>
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
    <!-- Event Details area start -->
    <div class="event-details-area py-120">
        <div class="container">
            <div class="row gap-60">
                <div class="col-lg-8">
                    <div class="event-details-content mb-65">
                        <div class="details-image mb-30">
                            @if($event->image)
                            <img src="{{asset($event->image)}}" alt="Event details">
                            @else
                            <img src="{{asset('frontendAsset')}}/img/events/event-details.jpg" alt="Event details">
                            @endif
                        </div>
                        <h3>{{$event->title}}</h3>
                        <p>{{$event->description}}</p>
                    </div>
                </div>
                @php
                    $carbonDate = Carbon::parse($event->date);
                    $formattedDate = $carbonDate->format('d M, Y');
                @endphp
                <div class="col-lg-4">
                    <div class="main-sidebar event-sidebar rmt-75">
                        <div class="widget widget-event-info">
                            <h5 class="widget-title">Event Info</h5>
                            <ul>
                                <li>
                                    <div class="icon"><i class="fa fa-calendar-alt"></i></div>
                                    <div class="content">
                                        <h6>Event Date</h6>
                                        <span>{{$formattedDate}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                                    <div class="content">
                                        <h6>Event Venue</h6>
                                        <span>{{$event->event_venue}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-phone-alt"></i></div>
                                    <div class="content">
                                        <h6>Cantact Number</h6>
                                        <span>{{$event->contract_number}}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details area end -->
@endsection
