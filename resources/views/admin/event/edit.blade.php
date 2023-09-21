@extends('layouts.admin_app')
@section('title')
    Edit Event
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Edit Event</div>
                    <form id="edit-event" data-url="{{ route('event.update', $event->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile" required>
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        <img id="eventImage" src="{{asset($event->image)}}" alt="" width="100" class="img-thumbnail mt-2">
                                        <span id="image_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" value="{{$event->title}}" class="form-control" placeholder="Your Title">
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Event Date</label>
                                    <input type="date" id="date" name="date" value="{{$event->date}}" class="form-control" placeholder="Event Date">
                                    <span id="date_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_venue">Event Venue</label>
                                    <input type="event_venue" id="event_venue" name="event_venue" value="{{$event->event_venue}}" class="form-control" placeholder="Event Venue">
                                    <span id="event_venue_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Contract Number</label>
                                    <input type="number" id="contract_number" name="contract_number" value="{{$event->contract_number}}" class="form-control" placeholder="Contract Number">
                                    <span id="contract_number_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Describe Here...">{!! $event->description !!}</textarea>
                                    <span id="description_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="upcoming_event" value="1" {{ $event->upcoming_event ==1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck1">Is Upcoming Event</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0 d-flex justify-content-end">
                                    <button type="submit" id="update-button" class="btn btn-primary mt-1" disabled>Update</button>
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
        $('#customFile').change(function() {
            if (this.files.length > 0) {
                $('#update-button').prop("disabled", false);
            } else {
                $('#update-button').prop("disabled", true);
            }
        });
        $(document).ready(function() {
            $('#edit-event').submit(function(e) {
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
                        if (response.status==200){
                            toastr.success('Event Update Successfully.');
                            $(location).prop('href', '{{route('event.index')}}');
                            $('#update-button').attr("disabled", false);
                            $('#update-button').html("Update");
                        }
                    },
                    error: function(error) {
                        if(error.responseJSON.errors.title){
                            $('#title_error').text(error.responseJSON.errors.title);
                        }else{
                            $('#title_error').text('');
                        }
                        if(error.responseJSON.errors.date){
                            $('#date_error').text(error.responseJSON.errors.date);
                        }else{
                            $('#date_error').text('');
                        }
                        if(error.responseJSON.errors.event_venue){
                            $('#event_venue_error').text(error.responseJSON.errors.event_venue);
                        }else{
                            $('#event_venue_error').text('');
                        }
                        if(error.responseJSON.errors.contract_number){
                            $('#contract_number_error').text(error.responseJSON.errors.contract_number);
                        }else{
                            $('#contract_number_error').text('');
                        }
                        if(error.responseJSON.errors.description){
                            $('#description_error').text(error.responseJSON.errors.description);
                        }else{
                            $('#description_error').text('');
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
                        $('#eventImage').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
