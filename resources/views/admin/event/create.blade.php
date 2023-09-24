@extends('layouts.admin_app')
@section('title')
    Add Event
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Add Event</div>
                    <form method="post" id="eventForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile" required>
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        <span id="image_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Your Title">
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Event Date</label>
                                    <input type="date" id="date" name="date" class="form-control" placeholder="Event Date">
                                    <span id="date_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_venue">Event Venue</label>
                                    <input type="event_venue" id="event_venue" name="event_venue" class="form-control" placeholder="Event Venue">
                                    <span id="event_venue_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Contract Number</label>
                                    <input type="number" id="contract_number" name="contract_number" class="form-control" placeholder="Contract Number">
                                    <span id="contract_number_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Describe Here..."></textarea>
                                    <span id="description_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="upcoming_event" value="1">
                                        <label class="custom-control-label" for="customCheck1">Is Upcoming Event</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0">
                                    <button type="submit" id="submit-button" class="btn btn-primary" disabled>Submit</button>
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
                $('#submit-button').prop("disabled", false);
            } else {
                $('#submit-button').prop("disabled", true);
            }
        });
        $('#submit-button').click(function(e){
            e.preventDefault();
            $('#submit-button').attr("disabled", true);
            $('#submit-button').html("Processing...");

            var upcoming_event = $('input[name="upcoming_event"]:checked').val();
            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('image', $('input[type=file]')[0].files[0]);
            data.append('title', document.getElementById("title").value);
            data.append('date', document.getElementById("date").value);
            data.append('event_venue', document.getElementById("event_venue").value);
            data.append('contract_number', document.getElementById("contract_number").value);
            data.append('description', document.getElementById("description").value);
            data.append('upcoming_event', upcoming_event);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('event.store')}}",
                data: data,
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    toastr.success('Event Add Successfully');
                    $(location).prop('href', '{{route('event.index')}}');
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
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
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
                }
            });
        });
    </script>
@endsection
