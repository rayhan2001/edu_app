@extends('layouts.admin_app')
@section('title')
    Add Gallery
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm rounded" style="border: none;">
                    <div class="card-title">Add Gallery</div>
                    <form method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose image</label>
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customFile">Upload Video</label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input @error('video') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose video</label>
                                        @error('video')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Your Title">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">--</option>
                                        <option value="1">Homeless</option>
                                        <option value="2">Clean Water</option>
                                        <option value="3">Education</option>
                                        <option value="4">Food & Health</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="choose_us">Why Choose Us</label>
                                    <textarea name="choose_us" id="choose_us" class="form-control @error('choose_us') is-invalid @enderror" rows="3" placeholder="Describe Here..."></textarea>
                                    @error('choose_us')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mission">Mission</label>
                                    <textarea name="mission" id="mission" class="form-control @error('mission') is-invalid @enderror" rows="3" placeholder="Describe Here..."></textarea>
                                    @error('mission')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vission">Vission</label>
                                    <textarea name="vission" id="vission" class="form-control @error('vission') is-invalid @enderror" rows="3" placeholder="Describe Here..."></textarea>
                                    @error('vission')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_velu">Company Velu</label>
                                    <textarea name="company_velu" id="company_velu" class="form-control @error('company_velu') is-invalid @enderror" rows="3" placeholder="Describe Here..."></textarea>
                                    @error('company_velu')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
