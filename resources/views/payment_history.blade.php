@extends('home_master')

@section('sidebar')
<div>
                <a href="{{url('/home')}}" class="activesidebar text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-bookmark-check me-2"></i>Reservation</span>
                </a>
                <a href="{{route('profile_show')}}" class="text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-person-lines-fill me-2"></i>Update Profile</span>
                </a>
                <a href="{{route('password_update_form')}}" class="text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-key-fill me-2"></i>Change Password</span>
                </a>
                <a href="{{route('user.feedback')}}" class="text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-blockquote-left me-2"></i>Feedback</span>
                </a>
                <a href="{{route('logout')}}" class="text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav border border-bottom border-dark">
                    <span><i class="bi bi-box-arrow-right me-2"></i>Log Out</span>
                </a>
                </div>

@endsection

@section('content')

<div class="bg-white p-3">
    <h3 class="text-lobster p-3">Payment History</h3>
    <div class="row ps-3 text-lora fs-5">
        <div class="col-3">
            <p>Payment Method</p>
        </div>
        <div class="col-9">
            <p>{{$payment_method->method_name}}</p>
        </div>
    </div>
    <div class="row ps-3 text-lora fs-5">
        <div class="col-3">
            <p>Payment Date</p>
        </div>
        <div class="col-9">
            <p>{{$payment->date}}</p>
        </div>
    </div>
    <div class="row ps-3 text-lora fs-5 mb-2">
        <div class="col-3">
            <p>Payment Screenshot</p>
        </div>
        <div class="col-9 ">
        <form action="{{route('view_payment_screenshot')}}" method="get">
                <button class="btn btn-warning fw-bold">View</button>
                <input type="hidden" name="id" value="{{$payment->id}}">
            </form>
        </div>
    </div>
    @if($payment_confirm == NULL)
    <div class="row ps-3 text-lora fs-5">
        <div class="col-3">
            <p>Payment Confirm</p>
        </div>
        <div class="col-9">
            <button class="btn btn-warning fw-bold">Pending</button>
        </div>
    </div>
    @else
    @if($payment_confirm->is_confirm == 1)
    <div class="row ps-3 text-lora fs-5">
        <div class="col-3">
            <p>Payment Confirm</p>
        </div>
        <div class="col-9">
            <button class="btn btn-warning fw-bold">Confirmed</button>
        </div>
    </div>

    @else
    <div class="row ps-3 text-lora fs-5">
        <div class="col-3">
            <p>Payment Confirm</p>
        </div>
        <div class="col-9">
            <button class="btn btn-warning fw-bold">Rejected</button>
        </div>
    </div>

    @endif
    @endif
    <div class="ps-3">
        <a href="{{route('home')}}">
            <button class="btn btn-dark mt-3 text-white fw-bold">Back</button>
        </a>
    </div>

</div>


@endsection