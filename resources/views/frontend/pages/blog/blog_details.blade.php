@extends('layouts.frontend_app')
@section('title')
    Blog
@endsection
@section('content')
    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
         style="background-image: url({{asset('frontendAsset')}}/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Blog</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->
    <!-- Blog Details area start -->
    <div class="blog-details-area py-120">
        <div class="container">
            <div class="row gap-60">
                <div class="col-lg-8">
                    <div class="blog-details-content mb-55">
                        <div class="details-image rel mb-35">
                            @if($blog->image)
                            <img src="{{asset($blog->image)}}" alt="Blog Clasic">
                            @else
                            <img src="{{asset('frontendAsset')}}/img/blog/blog-clasic1.jpg" alt="Blog Clasic">
                            @endif
                            @php
                                use Carbon\Carbon;
                                $date = Carbon::parse($blog->date);
                                $day = $date->format('d');
                                $month = $date->format('M');
                            @endphp
                            <div class="post-date">
                                <b>{{$day}}</b>
                                <span>{{$month}}</span>
                            </div>
                        </div>
                        <ul class="blog-meta">
                            <h5>{{$blog->title}}</h5>
                        </ul>
                        <p>{{$blog->description}}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-sidebar rmt-75">
                        <div class="widget widget-recent-post">
                            <h4 class="widget-title">Recent News</h4>
                            <ul>
                                @foreach($blogs as $index => $item)
                                    @php
                                        $carbonDate = Carbon::parse($item->date);
                                        $formattedDate = $carbonDate->format('d M, Y');
                                    @endphp
                                    @if($index < 6)
                                    <li>
                                        <div class="media">
                                            <div class="media-left">
                                                @if($item->image)
                                                <img src="{{asset($item->image)}}" alt="Post">
                                                @else
                                                <img src="{{asset('frontendAsset')}}/img/widgets/post1.jpg" alt="Post">
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h6 class="title">{{$item->title}}</h6>
                                                <ul class="post-info">
                                                    <li><i class="flaticon-time"></i> <a href="#">{{$formattedDate}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details area end -->
@endsection
