@extends('home_master')

@section('sidebar')
<div>
                <a href="{{url('/home')}}" class=" text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-bookmark-check me-2"></i>Reservation</span>
                </a>
                <a href="{{route('profile_show')}}" class=" text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-person-lines-fill me-2"></i>Update Profile</span>
                </a>
                <a href="{{route('password_update_form')}}" class=" text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-key-fill me-2"></i>Change Password</span>
                </a>
                <a href="{{route('user.feedback')}}" class="activesidebar text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
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
      <h3 class="text-lobster" style="display:inline-block; width:30%">Your Feedback</h3>
      <div class="text-end" style="display:inline-block; width:50%">
        <a href="{{route('feedback_form')}}">
            <button class="btn btn-warning text-lora">Give Feedback</button>
        </a>
      </div>
    </div>
    <div class="p-3 text-lora">
    @foreach($customer_feedbacks as $customer_feedback)
        <div class="lh-1 mb-3  p-3 border border-secondary-subtle shadow">
        <p>
        @for ($i = 0; $i < $customer_feedback->rating; $i++)
            <i class="bi bi-star-fill text-orange"></i>
        @endfor
        </p>
        <p>
            {{$customer_feedback->review}}
        </p>
        <p>{{$customer_feedback->date}}</p>
        </div>
    @endforeach
    </div>


</div>


@endsection