@extends('layouts.admin_app')
@section('title')
    Home
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
                            <h4>Item List</h4>
                            <a href="{{route('home.create')}}" class="btn btn-primary" type="button">
                                <i data-feather='plus'></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                    <table id="homeTable" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Title</th>
                            <th scope="col">Sub Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($home as $item)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td>{{$item->title}}</td>
                                <td>{{substr($item->sub_title,0,50)}}</td>
                                <td>
                                    @if($item->image !=null)
                                        <img src="{{asset($item->image)}}" alt="" class="rounded-circle" width="50" height="50">
                                    @else
                                        <img src="{{asset('adminAsset')}}/images/avatars/00.png" alt="" class="rounded-circle" width="50" height="50">
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('home.edit',$item->id)}}" class="btn btn-sm btn-primary mx-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger remove-home-content" data-id="{{ $item->id }}"><i class="bi bi-trash"></i></a>
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
        new DataTable('#homeTable',{
            "dom": 't<"d-flex"l<"ml-auto"ip>><"clear">',
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.remove-home-content').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{ route("home.destroy", ":id") }}';
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