@extends('layouts.admin_app')
@section('title')
    Membership
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2" style="border: none">
                    <div class="card-title">
                        <h4>Membership List</h4>
                    </div>
                    <table id="membershipTable" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Professor Designation</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">NID Number</th>
                            <th scope="col">Transaction Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($memberships as $membership)
                            <tr>
                                <td class="serial-number">{{ $loop->iteration }}</td>
                                <td>{{$membership->full_name}}</td>
                                <td>{{$membership->professor_designation}}</td>
                                <td>{{$membership->mobile_no}}</td>
                                <td>{{$membership->nid}}</td>
                                <td>{{$membership->transaction_number}}</td>
                                <td>{{$membership->email}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#membershipModal{{$membership->id}}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger remove-membership" data-id="{{ $membership->id }}"><i class="bi bi-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.membership.show')
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
        new DataTable('#membershipTable',{
            "dom": 't<"d-flex"l<"ml-auto"ip>><"clear">',
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.remove-membership').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var url = '{{ route("membership.destroy", ":id") }}';
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
    <script>
        $('.actionBtn').click(function(e){
            var action = $(this).data("action");
            var dataId = $(this).attr("data-id");

            var data = {
                '_token': "{{ csrf_token() }}",
                'id': dataId,
                'action': action,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('membership.action') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.action === "approve") {
                        toastr.success('Membership Approved Successfully');
                    } else if (response.action === "deny") {
                        toastr.error('Membership Denied Successfully');
                    }
                    window.location.reload();
                },
                error: function (error) {
                    // Handle the error
                }
            });
        });
    </script>
@endsection
