@extends('layouts.admin_app')
@section('title')
    Dashboard
@endsection
@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
        $member = \App\Models\Membership::orderBy('id','desc')->count();
    @endphp
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="card card-congratulation-medal">
                            <div class="card-body">
                                <h5>Congratulations 🎉 {{$user->name}}!</h5>
{{--                                <p class="card-text font-small-3">You have won gold medal</p>--}}
                                <img src="{{asset('adminAsset')}}/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                            </div>
                        </div>
                    </div>
                    <!--/ Medal Card -->

                    <!-- Statistics Card -->
                    <div class="col-xl-6 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Membership</h4>
                                <div class="d-flex align-items-center">
{{--                                    <p class="card-text font-small-2 mr-25 mb-0">Updated 1 month ago</p>--}}
                                </div>
                            </div>
                            <div class="card-body statistics-body">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                        <div class="media">
                                            <div class="avatar bg-light-info mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="user" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4>{{$member}}</h4>
                                                <p>Total Member</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Card -->
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
@endsection
