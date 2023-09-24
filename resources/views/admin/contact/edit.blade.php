@extends('layouts.admin_app')
@section('title')
    Edit Contact
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Edit Contact</div>
                    <form id="edit-contact" data-url="{{ route('contact.update', $contact->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{$contact->name}}" class="form-control" placeholder="Your Name">
                                    <span id="name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{$contact->email}}" class="form-control" placeholder="asd@gmail.com">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Date Of Birth</label>
                                    <input type="date" id="birth_day" name="birth_day" value="{{$contact->birth_day}}" class="form-control" placeholder="Date Of Birth">
                                    <span id="birthday_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nid">Phone Number</label>
                                    <input type="number" id="phone_number" name="phone_number" value="{{$contact->phone_number}}" class="form-control" placeholder="Phone Number">
                                    <span id="phone_number_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="2" placeholder="Write Your Messages">{!! $contact->message !!}</textarea>
                                    <span id="message_error" class="text-danger"></span>
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
            $('#edit-contact').submit(function(e) {
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
                    dataType: "json",
                    success: function(response) {
                        if (response.status==200){
                            toastr.success('Contact update successfully.');
                            $(location).prop('href', '{{route('contact.index')}}');
                            $('#update-button').attr("disabled", false);
                            $('#update-button').html("Update");
                        }
                    },
                    error: function(error) {
                        if(error.responseJSON.errors.name){
                            $('#name_error').text(error.responseJSON.errors.name);
                        }else{
                            $('#name_error').text('');
                        }if(error.responseJSON.errors.email){
                            $('#email_error').text(error.responseJSON.errors.email);
                        }else{
                            $('#email_error').text('');
                        }if(error.responseJSON.errors.birth_day){
                            $('#birth_day_error').text(error.responseJSON.errors.birth_day);
                        }else{
                            $('#birth_day_error').text('');
                        }if(error.responseJSON.errors.phone_number){
                            $('#phone_number_error').text(error.responseJSON.errors.phone_number);
                        }else{
                            $('#phone_number_error').text('');
                        }if(error.responseJSON.errors.message){
                            $('#message_error').text(error.responseJSON.errors.message);
                        }else{
                            $('#message_error').text('');
                        }
                        $('#update-button').attr("disabled", false);
                        $('#update-button').html("Update");
                    }
                });

            });
        });
    </script>
@endsection
