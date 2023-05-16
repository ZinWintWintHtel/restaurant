@extends('home_master')

@section('sidebar')
<div>
                <a href="{{url('/home')}}" class=" text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-bookmark-check me-2"></i>Reservation</span>
                </a>
                <a href="{{route('profile_show')}}" class="activesidebar text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
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
    <h3 class="text-lobster mb-4">Profile Details</h3>
    <form action="{{route('profile_update_form')}}" method="get">
        @csrf
    <div class="row text-lora fs-5">
        <div class="col-2" >
            <p>Name</p>
        </div>
        <div class="col-10">
            <input disabled type="text" name="name" value="{{Auth::user()->name}}" class="form form-control mb-3" style="width:60%">
        </div>
    </div>
    <div class="row text-lora fs-5">
        <div class="col-2" >
            <p>Email</p>
        </div>
        <div class="col-10">
            <input disabled type="email" name="email" value="{{$user->email}}" class="form form-control mb-3" style="width:60%">
        </div>
    </div>
    <div class="row text-lora fs-5">
        <div class="col-2" >
            <p>Phone No.</p>
        </div>
        <div class="col-10">
            <input disabled type="text" name="phone" value="{{$user->phone}}" class="form form-control mb-3" style="width:60%">
        </div>
    </div>
    
        <input type="submit" value="Edit" class="btn btn-warning">
    </form>
</div>
</div>


@endsection