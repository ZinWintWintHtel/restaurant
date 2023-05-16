@extends('home_master')

@section('sidebar')
<div>
                <a href="{{url('/home')}}" class=" text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-bookmark-check me-2"></i>Reservation</span>
                </a>
                <a href="{{route('profile_show')}}" class=" text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
                    <span><i class="bi bi-person-lines-fill me-2"></i>Update Profile</span>
                </a>
                <a href="{{route('password_update_form')}}" class="activesidebar text-decoration-none ps-4 py-2 text-lora text-black userDashboardNav">
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
    <h3 class="text-lobster mb-4">Change Password</h3>
    @if(Session::has('msg'))
        <div class="col-12 mb-3 text-sm text-lora text-danger fw-bold">
            <span>{{ session::get('msg') }}</span>
        </div>
    @endif
    <form action="{{route('change_password')}}" method="post">
        @csrf
    <div class="row text-lora fs-5">
        <div class="col-3" >
            <p>Old Password</p>
        </div>
        <div class="col-9">
            <input type="password" name="old_password" value="" class="form form-control mb-3 @error('old_password') is-invalid @enderror" style="width:60%">
            @error('old_password')
              <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row text-lora fs-5">
        <div class="col-3" >
            <p>New Password</p>
        </div>
        <div class="col-9">
            <input type="password" name="new_password" value="" class="form form-control mb-3 @error('new_password') is-invalid @enderror" style="width:60%">
            @error('new_password')
              <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row text-lora fs-5">
        <div class="col-3" >
            <p>Confirm Password</p>
        </div>
        <div class="col-9">
            <input type="password" name="confirm_password" value="" class="form form-control mb-3 @error('confirm_password') is-invalid @enderror" style="width:60%">
            @error('confirm_password')
              <p class="text text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
        <input type="submit" value="Submit" class="btn btn-warning">
    </form>
</div>
</div>


@endsection