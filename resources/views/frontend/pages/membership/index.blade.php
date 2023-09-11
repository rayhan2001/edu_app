@extends('layouts.frontend_app')
@section('title')
    Membership
@endsection
@section('content')
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
                    <div class="form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                                    <span id="name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Your Full Name">
                                    <span id="full_name_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ssc_passing_year">SSC Passing Year</label>
                                    <input type="number" id="ssc_passing_year" name="ssc_passing_year" class="form-control" placeholder="SSC Passing Year">
                                    <span id="ssc_passing_year_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="professor_designation">Professor Designation</label>
                                    <input type="text" id="professor_designation" name="professor_designation" class="form-control" placeholder="Professor Designation">
                                    <span id="professor_designation_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_work">Place Of Work</label>
                                    <input type="text" id="place_work" name="place_work" class="form-control" placeholder="Place Of Work">
                                    <span id="place_work_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_no">Mobile No/What's App</label>
                                    <input type="number" id="mobile_no" name="mobile_no" class="form-control" placeholder="Your Mobile No Or What's App No">
                                    <span id="mobile_no_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="present_address">Present Address</label>
                                    <textarea name="present_address" id="present_address" class="form-control" rows="3" placeholder="Describe Here..."></textarea>
                                    <span id="present_address_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3" placeholder="Describe Here..."></textarea>
                                    <span id="permanent_address_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Date Of Birth</label>
                                    <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Date Of Birth">
                                    <span id="birthday_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nid">NID Number</label>
                                    <input type="number" id="nid" name="nid" class="form-control" placeholder="NID Number">
                                    <span id="nid_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="transaction_id">Transaction Id</label>
                                    <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="Transaction Id">
                                    <span id="transaction_id_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="transaction_number">Transaction Number</label>
                                    <input type="number" id="transaction_number" name="transaction_number" class="form-control" placeholder="Transaction Number">
                                    <span id="transaction_number_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <input type="text" id="blood_group" name="blood_group" class="form-control" placeholder="Blood Group">
                                    <span id="blood_group_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">Bkash/Nagad/Rocket Number</label>
                                    <input type="number" id="account_number" name="account_number" class="form-control" placeholder="Bkash/Nagad/Rocket Number">
                                    <span id="account_number_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="info@gmail.com">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0">
                                    <button type="submit" id="submit-button" class="btn ml-5">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('frontendAsset')}}/js/jquery.min.js"></script>
    <script>
        $('#submit-button').click(function(e){
            e.preventDefault();
            $('#submit-button').attr("disabled", true);
            $('#submit-button').html("Processing...");
            var data= {
                '_token': "{{ csrf_token() }}",
                'name': document.getElementById("name").value,
                'full_name': document.getElementById("full_name").value,
                'ssc_passing_year': document.getElementById("ssc_passing_year").value,
                'professor_designation': document.getElementById("professor_designation").value,
                'place_work': document.getElementById("place_work").value,
                'mobile_no': document.getElementById("mobile_no").value,
                'present_address': document.getElementById("present_address").value,
                'permanent_address': document.getElementById("permanent_address").value,
                'birthday': document.getElementById("birthday").value,
                'nid': document.getElementById("nid").value,
                'transaction_id': document.getElementById("transaction_id").value,
                'transaction_number': document.getElementById("transaction_number").value,
                'blood_group': document.getElementById("blood_group").value,
                'account_number': document.getElementById("account_number").value,
                'email': document.getElementById("email").value,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('membership.store')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    toastr.success('Membership Request Send Successfully');
                    window.location.reload();
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
                },
                error: function(error) {
                    // console.log(response);
                    if(error.responseJSON.errors.name){
                        $('#name_error').text(error.responseJSON.errors.name);
                    }else{
                        $('#name_error').text('');
                    }if(error.responseJSON.errors.full_name){
                        $('#full_name_error').text(error.responseJSON.errors.full_name);
                    }else{
                        $('#full_name_error').text('');
                    }if(error.responseJSON.errors.ssc_passing_year){
                        $('#ssc_passing_year_error').text(error.responseJSON.errors.ssc_passing_year);
                    }else{
                        $('#ssc_passing_year_error').text('');
                    }if(error.responseJSON.errors.professor_designation){
                        $('#professor_designation_error').text(error.responseJSON.errors.professor_designation);
                    }else{
                        $('#professor_designation_error').text('');
                    }if(error.responseJSON.errors.place_work){
                        $('#place_work_error').text(error.responseJSON.errors.place_work);
                    }else{
                        $('#place_work_error').text('');
                    }if(error.responseJSON.errors.mobile_no){
                        $('#mobile_no_error').text(error.responseJSON.errors.mobile_no);
                    }else{
                        $('#mobile_no_error').text('');
                    }if(error.responseJSON.errors.present_address){
                        $('#present_address_error').text(error.responseJSON.errors.present_address);
                    }else{
                        $('#present_address_error').text('');
                    }if(error.responseJSON.errors.permanent_address){
                        $('#permanent_address_error').text(error.responseJSON.errors.permanent_address);
                    }else{
                        $('#permanent_address_error').text('');
                    }if(error.responseJSON.errors.birthday){
                        $('#birthday_error').text(error.responseJSON.errors.birthday);
                    }else{
                        $('#birthday_error').text('');
                    }if(error.responseJSON.errors.nid){
                        $('#nid_error').text(error.responseJSON.errors.nid);
                    }else{
                        $('#nid_error').text('');
                    }if(error.responseJSON.errors.transaction_id){
                        $('#transaction_id_error').text(error.responseJSON.errors.transaction_id);
                    }else{
                        $('#transaction_id_error').text('');
                    }if(error.responseJSON.errors.transaction_number){
                        $('#transaction_number_error').text(error.responseJSON.errors.transaction_number);
                    }else{
                        $('#transaction_number_error').text('');
                    }if(error.responseJSON.errors.blood_group){
                        $('#blood_group_error').text(error.responseJSON.errors.blood_group);
                    }else{
                        $('#blood_group_error').text('');
                    }if(error.responseJSON.errors.account_number){
                        $('#account_number_error').text(error.responseJSON.errors.account_number);
                    }else{
                        $('#account_number_error').text('');
                    }if(error.responseJSON.errors.email){
                        $('#email_error').text(error.responseJSON.errors.email);
                    }else{
                        $('#email_error').text('');
                    }
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
                }
            });
        });

    </script>
@endsection
