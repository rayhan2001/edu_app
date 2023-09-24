@extends('layouts.frontend_app')
@section('title')
    Contact
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- page banner start -->
    <div class="page-banner-area bgs-cover overlay text-white py-165 rpy-125 rmt-65"
         style="background-image: url({{asset('frontendAsset')}}/img/background/page-banner.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="page-title">Contact</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->

    <!-- Contact page area start -->
    <div class="contact-page-area overflow-hidden py-120 rpt-100">
        <div class="container">
            <div class="row gap-60 align-items-center">
                <div class="col-lg-12" style="background: #FEF2F1">
                    <div class="contact-page-form form-style-two py-110 rpy-85">
                        <div class="section-title mb-10">
                            <span class="section-title__subtitle mb-10">Need help</span>
                            <h3>Get In touch</h3>
                        </div>
                        <form action="#" method="post" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                                        <span id="name_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Your Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                                        <span id="email_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone Number">
                                        <span id="phone_number_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone_number">Date Of Birth</label>
                                        <input type="date" id="birth_day" name="birth_day" class="form-control">
                                        <span id="birth_day_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="2" placeholder="Write Your Messages"></textarea>
                                        <span id="message_error" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group pt-10 mb-0">
                                        <button type="submit" id="contactBtn" class="btn ml-5">Send us a message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact page area end -->


    <!-- Contact Info area start -->
    <div class="contact-info-area pb-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <div class="contact-info-item contact-info-item--green">
                        <div class="contact-info__icon"><i class="flaticon-phone-call"></i></div>
                        <h5>Phone Number</h5>
                        <div class="contact-info__text">
                            <a href="callto:+(321)984754">+ (321) 984 754</a><br>
                            <a href="callto:+1-212-9876543">+1-212-9876543</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-info-item contact-info-item--yellow">
                        <div class="contact-info__icon"><i class="fas fa-paper-plane"></i></div>
                        <h5>Email Address</h5>
                        <div class="contact-info__text">
                            <a href="mailto:info1234@gmail.com">info1234@gmail.com</a><br>
                            <a href="mailto:test1234@gmail.com">test1234@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contact-info-item">
                        <div class="contact-info__icon"><i class="flaticon-pin"></i></div>
                        <h5>Offce address</h5>
                        <div class="contact-info__text">
                            Dhaka <br>Bangladesh
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info area end -->


    <!-- Location Map Area Start -->
    <div class="contact-page-map wow fadeInUp delay-0-2s">
        <div class="our-location">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d136834.1519573059!2d-74.0154445224086!3d40.7260256534837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1639991650837!5m2!1sen!2sbd"
                style="border:0; width: 100%;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <!-- Location Map Area End -->

    <script src="{{asset('frontendAsset')}}/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('#contactBtn').click(function(e){
            e.preventDefault();
            $('#contactBtn').attr("disabled", true);
            $('#contactBtn').html("Processing...");
            var data= {
                '_token': "{{ csrf_token() }}",
                'name': document.getElementById("name").value,
                'email': document.getElementById("email").value,
                'phone_number': document.getElementById("phone_number").value,
                'birth_day': document.getElementById("birth_day").value,
                'message': document.getElementById("message").value,
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('contact.store')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#contactForm').trigger("reset");
                    window.location.reload();
                    toastr.success('Contact Form Submit Successfully');
                    $('#contactBtn').attr("disabled", false);
                    $('#contactBtn').html("Send us a message");
                },
                error: function(error) {
                    // console.log(response);
                    if(error.responseJSON.errors.name){
                        $('#name_error').text(error.responseJSON.errors.name);
                    }else{
                        $('#name_error').text('');
                    }
                    if(error.responseJSON.errors.email){
                        $('#email_error').text(error.responseJSON.errors.email);
                    }else{
                        $('#email_error').text('');
                    }
                    if(error.responseJSON.errors.phone_number){
                        $('#phone_number_error').text(error.responseJSON.errors.phone_number);
                    }else{
                        $('#phone_number_error').text('');
                    }
                    if(error.responseJSON.errors.birth_day){
                        $('#birth_day_error').text(error.responseJSON.errors.birth_day);
                    }else{
                        $('#birth_day_error').text('');
                    }
                    if(error.responseJSON.errors.message){
                        $('#message_error').text(error.responseJSON.errors.message);
                    }else{
                        $('#message_error').text('');
                    }
                    $('#contactBtn').attr("disabled", false);
                    $('#contactBtn').html("Send us a message");
                }
            });
        });

    </script>
@endsection
