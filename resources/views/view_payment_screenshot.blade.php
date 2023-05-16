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
    <div class="p-3">
    <h3 class="text-lobster ">Payment Screenshot</h3>
    <img src="{{asset('images/'.$payment->payment_screenshot)}}" alt="payment-screenshot" style="width:400px; height:auto;">
    <form action="{{route('payment_history')}}" method="get">
        <input type="hidden" value="{{$payment->reservation_id}}" name="reservation_id">
        <button class="btn btn-warning fw-bold my-3">Back</button>
    </form>
    </div>

</div>


@endsection