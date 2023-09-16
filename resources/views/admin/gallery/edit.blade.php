@extends('layouts.admin_app')
@section('title')
    Edit Gallery
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Edit Gallery</div>
                    <form method="post" action="{{route('gallery.update',$gallery->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        <img src="{{asset($gallery->image)}}" alt="" class="mt-1 mb-5 img-fluid" height="50" width="50">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video_link">Upload Video Link</label>
                                    <div class="form-group">
                                        <input type="url" name="video_link" value="{{$gallery->video_link}}" class="form-control @error('video_link') is-invalid @enderror" id="video_link" placeholder="https://www.example.com/">
                                        @error('video_link')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" id="title" name="title" value="{{$gallery->title}}" class="form-control @error('title') is-invalid @enderror" placeholder="Your Title">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0">
                                    <button type="submit"  class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
