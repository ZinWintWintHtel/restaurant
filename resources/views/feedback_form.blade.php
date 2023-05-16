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
    <h3 class="text-lobster mb-4">Give Your Feedback</h3>
    <form action="{{route('feedback.store')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <div class="row text-lora fs-5">
        <div class="col-2" >
            <p>Rating</p>
        </div>
        <div class="col-10">
            <select name="rating" id="" class="selectInput">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="row text-lora fs-5 mt-3">
        <div class="col-2" >
            <p>Review</p>
        </div>
        <div class="col-10">
            <textarea name="review" id="" placeholder="Write a review" class="text-lora reviewInput"></textarea>
        </div>
    </div>

    <input type="submit" value="Submit" class="btn btn-warning my-3" style="width:15%">

    </form>
</div>
</div>


@endsection