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
                    <h3 class="text-lobster  p-3">Your Reservation</h3>
                    @foreach($reservations as $reservation)
                    <div class="d-flex mx-auto mb-3  p-3 border border-secondary-subtle shadow">
                        <div>
                            <img src="{{asset('images/logo.png')}}" alt="payment-method-image" class="reservedLogoImg me-2">
                        </div>
                        <div class="align-items-center text-lora  ms-3">
                            <p class="lh-1 fw-bold fs-5 text-orange">Taste & Enjoy the moment</p>
                            <p class="lh-1"><i class="bi bi-check-circle-fill me-1 text-success"></i>Reservation {{$reservation->status}}</p>
                            <p class="lh-1 fw-bold">
                                <span class="me-2"><i class="bi bi-people-fill me-1"></i>{{$reservation->guest_number}}</span>
                                <span class="me-2"><i class="bi bi-calendar2-check-fill me-1"></i>{{$reservation->date}}</span>
                                <span class="me-2"><i class="bi bi-clock me-1"></i>{{date('h:i A', strtotime($reservation->start_time))}} - {{date('h:i A', strtotime($reservation->end_time))}}</span>
                            </p>
                            <form action="{{route('payment_history')}}" method="get">
                              <button class="btn btn-warning">Payment History</button>
                              <input type="hidden" name="reservation_id" value="{{$reservation->id}}">
                            </form>
                        </div>
                    </div>


                    @endforeach




                </div>

@endsection