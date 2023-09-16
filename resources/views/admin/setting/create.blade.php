@extends('layouts.admin_app')
@section('title')
    Settings
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Add Settings</div>
                    <form method="post" action="{{route('settings.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customFile">Logo</label>
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Location</label>
                                    <input type="text" id="location" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Your Location">
                                    @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook_link">Facebook Link</label>
                                    <div class="form-group">
                                        <input type="url" name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" placeholder="https://www.example.com/">
                                        @error('facebook_link')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">Twitter Link</label>
                                    <div class="form-group">
                                        <input type="url" name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" id="video_link" placeholder="https://www.example.com/">
                                        @error('twitter_link')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin_link">Linkedin Link</label>
                                    <div class="form-group">
                                        <input type="url" name="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" id="linkedin_link" placeholder="https://www.example.com/">
                                        @error('linkedin_link')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-10 mb-0">
                                    <button type="submit" id="submit-button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
