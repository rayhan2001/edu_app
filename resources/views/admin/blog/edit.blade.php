@extends('layouts.admin_app')
@section('title')
    Edit Blog
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Edit Blog</div>
                    <form id="edit-blog" data-url="{{ route('blog.update', $blog->id) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        <img id="blogImage" src="{{asset($blog->image)}}" alt="" width="100" class="img-thumbnail mt-2">
                                        <span id="image_error" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" value="{{$blog->title}}" class="form-control" placeholder="Your Title">
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" id="date" name="date" value="{{$blog->date}}" class="form-control" placeholder="Your Title">
                                    <span id="date_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="3" placeholder="Describe Here...">{!! $blog->description !!}</textarea>
                                    <span id="description_error" class="text-danger"></span>
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
            $('#edit-blog').submit(function(e) {
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
                            toastr.success('HBlog Update Successfully.');
                            $(location).prop('href', '{{route('blog.index')}}');
                            $('#update-button').attr("disabled", false);
                            $('#update-button').html("Update");
                        }
                    },
                    error: function(error) {
                        if(error.responseJSON.errors.title){
                            $('#title_error').text(error.responseJSON.errors.title);
                        }else{
                            $('#title_error').text('');
                        }if(error.responseJSON.errors.date){
                            $('#date_error').text(error.responseJSON.errors.date);
                        }else{
                            $('#date_error').text('');
                        }if(error.responseJSON.errors.description){
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
                        $('#blogImage').attr('src', event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
