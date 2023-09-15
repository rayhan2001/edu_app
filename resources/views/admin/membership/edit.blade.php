@extends('layouts.admin_app')
@section('title')
    Edit Membership
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Edit Membership</div>
                    <form id="edit-member" data-url="{{ route('membership.update', $membership->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{$membership->name}}" class="form-control" placeholder="Your Name">
                                    <span id="name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" value="{{$membership->full_name}}" class="form-control" placeholder="Your Full Name">
                                    <span id="full_name_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ssc_passing_year">SSC Passing Year</label>
                                    <input type="number" id="ssc_passing_year" name="ssc_passing_year" value="{{$membership->ssc_passing_year}}" class="form-control" placeholder="SSC Passing Year">
                                    <span id="ssc_passing_year_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="professor_designation">Professor Designation</label>
                                    <input type="text" id="professor_designation" name="professor_designation" value="{{$membership->professor_designation}}" class="form-control" placeholder="Professor Designation">
                                    <span id="professor_designation_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_work">Place Of Work</label>
                                    <input type="text" id="place_work" name="place_work" value="{{$membership->place_work}}" class="form-control" placeholder="Place Of Work">
                                    <span id="place_work_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile_no">Mobile No/What's App</label>
                                    <input type="number" id="mobile_no" name="mobile_no" value="{{$membership->mobile_no}}" class="form-control" placeholder="Your Mobile No Or What's App No">
                                    <span id="mobile_no_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="present_address">Present Address</label>
                                    <textarea name="present_address" id="present_address" class="form-control" rows="3" placeholder="Describe Here...">{!! $membership->present_address!!}</textarea>
                                    <span id="present_address_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <textarea name="permanent_address" id="permanent_address" class="form-control" rows="3" placeholder="Describe Here...">{!! $membership->permanent_address !!}</textarea>
                                    <span id="permanent_address_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Date Of Birth</label>
                                    <input type="date" id="birthday" name="birthday" value="{{$membership->birthday}}" class="form-control" placeholder="Date Of Birth">
                                    <span id="birthday_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nid">NID Number</label>
                                    <input type="number" id="nid" name="nid" value="{{$membership->nid}}" class="form-control" placeholder="NID Number">
                                    <span id="nid_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transaction_id">Transaction Id</label>
                                    <input type="text" id="transaction_id" name="transaction_id" value="{{$membership->transaction_id}}" class="form-control" placeholder="Transaction Id">
                                    <span id="transaction_id_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="transaction_number">Transaction Number</label>
                                    <input type="number" id="transaction_number" name="transaction_number" value="{{$membership->transaction_number}}" class="form-control" placeholder="Transaction Number">
                                    <span id="transaction_number_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" id="image" name="image" class="form-control" required/>
                                    <img id="memberImage" src="{{asset($membership->image)}}" alt="" width="100" class="img-thumbnail mt-2">
                                    <span id="image_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="blood_group">Blood Group</label>
                                    <input type="text" id="blood_group" name="blood_group" value="{{$membership->blood_group}}" class="form-control" placeholder="Blood Group">
                                    <span id="blood_group_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">Bkash/Nagad/Rocket Number</label>
                                    <input type="number" id="account_number" name="account_number" value="{{$membership->account_number}}" class="form-control" placeholder="Bkash/Nagad/Rocket Number">
                                    <span id="account_number_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{$membership->email}}" class="form-control" placeholder="info@gmail.com">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0">
                                    <button type="submit" id="update-button" class="btn btn-primary mt-1">Update</button>
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
        $(document).ready(function() {
            $('#edit-member').submit(function(e) {
                e.preventDefault();
                $('#update-button').attr("disabled", true);
                $('#update-button').html("Processing...");
                var url = $(this).data('url');
                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status==200){
                            toastr.success('Member update successfully.');
                            $(location).prop('href', '{{route('membership.index')}}');
                            $('#update-button').attr("disabled", false);
                            $('#update-button').html("Update");
                        }
                    },
                    error: function(error) {
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
                        }if(error.responseJSON.errors.image){
                            $('#image_error').text(error.responseJSON.errors.image);
                        }else{
                            $('#image_error').text('');
                        }
                        $('#update-button').attr("disabled", false);
                        $('#update-button').html("Submit");
                    }
                });

                // Update the image URL
                var fileInput = document.getElementById('image');
                var file = fileInput.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $('#memberImage').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
