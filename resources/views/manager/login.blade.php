@extends('layouts.app')


@section('head')
    <link rel="stylesheet" href="{{asset('css/manager_login.css')}}">
@endsection

@section('content')

<div class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left d-flex m-auto">
				<img src="{{asset('images/logo.png')}}" alt="form">
			</div>
			<form class="form-detail d-flex flex-column m-auto" action="{{route('manager.login')}}" method="get">
			@csrf
			@if(Session::has('msg'))
                <h2 style="color:red;">{{ session::get('msg') }}</h2>
            @endif
				<h2 class="h2" style="font-family: 'Lobster', cursive;">Login To Manager Dashboard</h2>
				<div class="form-row">
					<input type="email" name="email" id="your-email" class="input-text" placeholder="Email Address" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-row">
					<input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
				</div>
				<div class="form-row-last">
					<input type="submit" name="login" class="register" value="Login">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection