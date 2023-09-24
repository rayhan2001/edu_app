@extends('layouts.admin_app')
@section('title')
    Add Notice
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Add Notice</div>
                    <form method="post" id="noticeForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Your Title">
                                    <span id="title_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
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

            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('title', document.getElementById("title").value);
            data.append('image', $('input[type=file]')[0].files[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('notice.store')}}",
                data: data,
                mimeType: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    toastr.success('Notice Add Successfully');
                    $(location).prop('href', '{{route('notice.index')}}');
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
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
                    $('#submit-button').attr("disabled", false);
                    $('#submit-button').html("Submit");
                }
            });
        });
    </script>
@endsection
