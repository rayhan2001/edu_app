@extends('layouts.admin_app')
@section('title')
    Gallery
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2" style="border: none">
                    <div class="card-title">
                        <div class="d-flex justify-content-between">
                            <h4>Gallery List</h4>
                            <a href="{{route('gallery.create')}}" class="btn btn-primary" type="button">
                                <i data-feather='plus'></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                    <table id="galleryTable" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Why Choose Us</th>
                            <th scope="col">Mission</th>
                            <th scope="col">Vission</th>
                            <th scope="col">Company Velu</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td>
                                    @if($gallery->image !=null)
                                        <img src="{{asset($gallery->image)}}" alt="" class="rounded-circle" width="50" height="50">
                                    @else
                                        <img src="{{asset('adminAsset')}}/images/avatars/00.png" alt="" class="rounded-circle" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{$gallery->title}}</td>
                                <td>
                                    @if($gallery->status==1)
                                        <p>Homeless</p>
                                    @endif
                                    @if($gallery->status==2)
                                        <p>Clean Water</p>
                                    @endif
                                    @if($gallery->status==3)
                                        <p>Education</p>
                                    @endif
                                    @if($gallery->status==4)
                                        <p>Food & Health</p>
                                    @endif
                                </td>
                                <td>{{ substr($gallery->choose_us,0,50)}}</td>
                                <td>{{ substr($gallery->mission,0,50)}}</td>
                                <td>{{ substr($gallery->vission,0,50)}}</td>
                                <td>{{ substr($gallery->company_velu,0,50)}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('gallery.edit',$gallery->id)}}" class="btn btn-sm btn-primary mr-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger remove-gallery" data-id="{{ $gallery->id }}"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('frontendAsset')}}/js/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        new DataTable('#galleryTable',{
            "dom": 't<"d-flex"l<"ml-auto"ip>><"clear">',
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.remove-gallery').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{ route("gallery.destroy", ":id") }}';
                url = url.replace(':id', id);
                var rowToRemove = $(this).closest('tr');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to delete this member!",
                    icon: 'warning',
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            dataType: 'JSON',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'id': id,
                            },
                            success: function(response) {
                                if (response.status == 200) {
                                    swal.fire({
                                        title: 'Deleted!',
                                        text: 'The item has been deleted successfully.',
                                        icon: 'success',
                                    }).then(function () {
                                        rowToRemove.remove();
                                        updateSerialNumbers();
                                    });
                                }
                            },
                            error: function(response) {
                                swal.fire({
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the item.',
                                    icon: 'error',
                                });
                            }
                        });
                    }
                });
            });
            function updateSerialNumbers() {
                $('.serial-number').each(function(index) {
                    $(this).text(index + 1);
                });
            }
        });
    </script>
@endsection
