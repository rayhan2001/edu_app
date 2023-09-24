@extends('layouts.frontend_app')
@section('title')
    Notice
@endsection
@section('content')
    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
         style="background-image: url({{asset('frontendAsset')}}/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Notice</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Notice</li>
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
                        <h3>Our <span> Notice</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border: none">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">Sl</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($notices as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    <a href="{{route('notices.download', ['notice' => $item]) }}" class="btn btn-primary">Download</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Event area end -->
@endsection
