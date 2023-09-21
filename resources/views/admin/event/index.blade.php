@extends('layouts.admin_app')
@section('title')
    Event
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
                            <h4>Event List</h4>
                            <a href="{{route('event.create')}}" class="btn btn-primary" type="button">
                                <i data-feather='plus'></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                    <table id="eventTable" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Event Venue</th>
                            <th scope="col">Date</th>
                            <th scope="col">Contract Number</th>
                            <th scope="col">Upcoming Event</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td>{{$event->title}}</td>
                                <td>
                                    @if($event->image !=null)
                                        <img src="{{asset($event->image)}}" alt="" class="rounded-circle" width="50" height="50">
                                    @else
                                        <img src="{{asset('adminAsset')}}/images/avatars/00.png" alt="" class="rounded-circle" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{$event->event_venue}}</td>
                                <td>{{$event->date}}</td>
                                <td>{{$event->contract_number}}</td>
                                <td>
                                    @if($event->upcoming_event ==1)
                                    <span class="badge badge-success">Yes</span>
                                    @else
                                    <span class="badge badge-primary">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('event.edit',$event->id)}}" class="btn btn-sm btn-primary mx-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger remove-event" data-id="{{ $event->id }}"><i class="bi bi-trash"></i></a>
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
        new DataTable('#eventTable',{
            "dom": 't<"d-flex"l<"ml-auto"ip>><"clear">',
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.remove-event').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{ route("event.destroy", ":id") }}';
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
