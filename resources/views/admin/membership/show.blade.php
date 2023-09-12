<!-- Modal -->
<div class="modal fade" id="membershipModal{{$membership->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Member Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @php
                $member = App\Models\Membership::find($membership->id);
            @endphp
            <form method="post" id="memberAuthForm">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Name :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->name}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Full Name :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->full_name}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">SSC Passing Year :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->ssc_passing_year}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Professor Designation :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->professor_designation}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Place Of Work :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->place_work}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Mobile No/What's App :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->mobile_no}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Present Address :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->present_address}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Permanent Address :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->permanent_address}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Date Of Birth :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->birthday}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">NID Number :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->nid}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Transaction Id :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->transaction_id}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Transaction Number :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->transaction_number}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Blood Group :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->blood_group}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Bkash/Nagad/Rocket Number :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->account_number}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right">
                            <h5 class="mr-2">Email :</h5>
                        </div>
                        <div class="col-md-7">
                            <h5>{{$member->email}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                @if($member->status==0)
                    <button type="button" class="btn btn-success actionBtn" data-action="approve" data-id="{{$member->id}}">Approve</button>
                    <button type="button" class="btn btn-danger actionBtn" data-action="deny" data-id="{{$member->id}}">Deny</button>
                @endif
            </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('frontendAsset')}}/js/jquery.min.js"></script>

