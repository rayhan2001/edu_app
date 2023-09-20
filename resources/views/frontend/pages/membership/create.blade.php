@extends('layouts.frontend_app')
@section('title')
    Membership
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
                        <h2 class="page-title">Membership</h2>
                        <ul class="page-list">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li>Membership</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page banner end -->
    <div class="container py-120">
        <div class="row">
            <div class="col-lg-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <form method="post" id="membershipForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                                    <div class="name_error text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Your Full Name">
                                    <div id="" class="full_name_error text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ssc_passing_year">SSC Passing Year</label>
                                    <input type="number" id="ssc_passing_year" name="ssc_passing_year" class="form-control" placeholder="SSC Passing Year">
                                    <div id="ssc_passing_year_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="professor_designation">Professor Designation</label>
                                    <input type="text" id="professor_designation" name="professor_designation" class="form-control" placeholder="Professor Designation">
                                    <div id="professor_designation_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_work">Place Of Work</label>
                                    <input type="text" id="place_work" name="place_work" class="form-control" placeholder="Place Of Work">
                                    <div id="place_work_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_no">Mobile No/What's App</label>
                                    <input type="number" id="mobile_no" name="mobile_no" class="form-control" placeholder="Your Mobile No Or What's App No">
                                    <div id="mobile_no_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="present_address">Present Address</label>
                                    <textarea name="present_address" id="present_address" class="form-control" rows="3" placeholder="Describe Here..."></textarea>
                                    <div id="present_address_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3" placeholder="Describe Here..."></textarea>
                                    <div id="permanent_address_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Date Of Birth</label>
                                    <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Date Of Birth">
                                    <div id="birthday_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nid">NID Number</label>
                                    <input type="number" id="nid" name="nid" class="form-control" placeholder="NID Number">
                                    <div id="nid_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transaction_id">Transaction Id</label>
                                    <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="Transaction Id">
                                    <div id="transaction_id_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transaction_number">Transaction Number</label>
                                    <input type="number" id="transaction_number" name="transaction_number" class="form-control" placeholder="Transaction Number">
                                    <div id="transaction_number_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blood_group">Image</label>
                                    <input type="file" id="image" name="image" class="form-control" required>
                                    <div id="image_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <input type="text" id="blood_group" name="blood_group" class="form-control" placeholder="Blood Group">
                                    <div id="blood_group_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">Bkash/Nagad/Rocket Number</label>
                                    <input type="number" id="account_number" name="account_number" class="form-control" placeholder="Bkash/Nagad/Rocket Number">
                                    <div id="account_number_error" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="info@gmail.com">
                                    <div id="email_error" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0">
                                    <button type="submit" id="submit-button" class="btn ml-5" disabled>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('frontendAsset')}}/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('#image').change(function() {
            if (this.files.length > 0) {
                $('#submit-button').prop("disabled", false);
            } else {
                $('#submit-button').prop("disabled", true);
            }
        });
        $('#submit-button').click(function(e){
            e.preventDefault();
            $('#submit-button').attr("disabled", true);
            $('#submit-button').html("Processing...");

            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('name', document.getElementById("name").value);
            data.append('full_name', document.getElementById("full_name").value);
            data.append('image', $('input[type=file]')[0].files[0]);
            data.append('full_name', document.getElementById("full_name").value);
            data.append('ssc_passing_year', document.getElementById("ssc_passing_year").value);
            data.append('professor_designation', document.getElementById("professor_designation").value);
            data.append('place_work', document.getElementById("place_work").value);
            data.append('mobile_no', document.getElementById("mobile_no").value);
            data.append('present_address', document.getElementById("present_address").value);
            data.append('permanent_address', document.getElementById("permanent_address").value);
            data.append('birthday', document.getElementById("birthday").value);
            data.append('nid', document.getElementById("nid").value);
            data.append('transaction_id', document.getElementById("transaction_id").value);
            data.append('transaction_number', document.getElementById("transaction_number").value);
            data.append('blood_group', document.getElementById("blood_group").value);
            data.append('account_number', document.getElementById("account_number").value);
            data.append('email', document.getElementById("email").value);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('membership.store')}}",
                data: data,
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    toastr.success('Membership Request Send Successfully');
                    $('membershipForm')[0].reset()
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
                },
                error: function(error) {
                    if(error.responseJSON.errors.name){
                        $('#name_error').text(error.responseJSON.errors.name);
                    }else{
                        $('#name_error').text('');
                    }
                    if(error.responseJSON.errors.full_name){
                        $('#full_name_error').text(error.responseJSON.errors.full_name);
                    }else{
                        $('#full_name_error').text('');
                    }
                    if(error.responseJSON.errors.ssc_passing_year){
                        $('#ssc_passing_year_error').text(error.responseJSON.errors.ssc_passing_year);
                    }else{
                        $('#ssc_passing_year_error').text('');
                    }
                    if(error.responseJSON.errors.professor_designation){
                        $('#professor_designation_error').text(error.responseJSON.errors.professor_designation);
                    }else{
                        $('#professor_designation_error').text('');
                    }
                    if(error.responseJSON.errors.place_work){
                        $('#place_work_error').text(error.responseJSON.errors.place_work);
                    }else{
                        $('#place_work_error').text('');
                    }
                    if(error.responseJSON.errors.mobile_no){
                        $('#mobile_no_error').text(error.responseJSON.errors.mobile_no);
                    }else{
                        $('#mobile_no_error').text('');
                    }
                    if(error.responseJSON.errors.present_address){
                        $('#present_address_error').text(error.responseJSON.errors.present_address);
                    }else{
                        $('#present_address_error').text('');
                    }
                    if(error.responseJSON.errors.permanent_address){
                        $('#permanent_address_error').text(error.responseJSON.errors.permanent_address);
                    }else{
                        $('#permanent_address_error').text('');
                    }
                    if(error.responseJSON.errors.birthday){
                        $('#birthday_error').text(error.responseJSON.errors.birthday);
                    }else{
                        $('#birthday_error').text('');
                    }
                    if(error.responseJSON.errors.nid){
                        $('#nid_error').text(error.responseJSON.errors.nid);
                    }else{
                        $('#nid_error').text('');
                    }
                    if(error.responseJSON.errors.transaction_id){
                        $('#transaction_id_error').text(error.responseJSON.errors.transaction_id);
                    }else{
                        $('#transaction_id_error').text('');
                    }
                    if(error.responseJSON.errors.transaction_number){
                        $('#transaction_number_error').text(error.responseJSON.errors.transaction_number);
                    }else{
                        $('#transaction_number_error').text('');
                    }
                    if(error.responseJSON.errors.blood_group){
                        $('#blood_group_error').text(error.responseJSON.errors.blood_group);
                    }else{
                        $('#blood_group_error').text('');
                    }
                    if(error.responseJSON.errors.account_number){
                        $('#account_number_error').text(error.responseJSON.errors.account_number);
                    }else{
                        $('#account_number_error').text('');
                    }
                    if(error.responseJSON.errors.email){
                        $('#email_error').text(error.responseJSON.errors.email);
                    }else{
                        $('#email_error').text('');
                    }
                    if(error.responseJSON.errors.image){
                        $('#image_error').text(error.responseJSON.errors.image);
                    }else{
                        $('#image_error').text('');
                    }
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
                }
            });
        });
    </script>
@endsection
