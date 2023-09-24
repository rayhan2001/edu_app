@extends('layouts.admin_app')
@section('title')
    Edit Notice
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Edit Notice</div>
                    <form id="edit-notice" data-url="{{ route('notice.update', $notice->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" value="{{$notice->title}}" class="form-control" placeholder="Your Name">
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{$notice->status==1? 'selected': ''}}>Active</option>
                                        <option value="0" {{$notice->status==0? 'selected': ''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                    <img id="sliderImage" src="{{asset($notice->image)}}" alt="" width="100" class="img-thumbnail mt-2">
                                    <span id="image_error" class="text-danger"></span>
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
            $('#edit-notice').submit(function(e) {
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
                            toastr.success('Home Content Update Successfully.');
                            $(location).prop('href', '{{route('notice.index')}}');
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
                        if(error.responseJSON.errors.image){
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
                        $('#sliderImage').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
