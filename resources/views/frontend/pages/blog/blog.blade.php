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
    @php
        use Carbon\Carbon;
    @endphp
    <!-- Blog Slder area start -->
    <div class="blog-slider-page pt-120 pb-90 rel z-1">
        <div class="container">
            <div class="blog-page-slider">
                @foreach($blogs as $blog)
                    @php
                        $date = Carbon::parse($blog->date);
                        $day = $date->format('d');
                        $month = $date->format('M');
                    @endphp
                    <div class="blog-item">
                        <div class="blog-item__img">
                            @if($blog->image)
                            <img src="{{asset($blog->image)}}" alt="Blog">
                            @else
                            <img src="{{asset('frontendAsset')}}/img/blog/blog1.jpg" alt="Blog">
                            @endif
                            <div class="post-date">
                                <b>{{$day}}</b>
                                <span>{{$month}}</span>
                            </div>
                        </div>
                        <div class="blog-item__content">
                            <h5><a href="{{route('blog.details',$blog->id)}}">{{$blog->title}}</a></h5>
                            <p>{{substr($blog->description,0,80).'....'}}</p>
                            <a href="{{route('blog.details',$blog->id)}}" class="read-more">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Slder area end -->
@endsection
