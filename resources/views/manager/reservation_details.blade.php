@extends('manager_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('manager.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('manager.customer_feedback')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Customer Feedback</a>
                <a href="{{route('manager.info')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-project-diagram me-2"></i>Information</a>
                <a href="{{route('manager.staff')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-people-fill me-2 fs-5"></i>
                Staff</a>
                <a href="{{route('manager.paymentmethod')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" ><i
                        class="fas fa-paperclip me-2"></i>Payment Methods</a>
                <a href="{{route('manager.fee')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-currency-dollar me-2 fs-5"></i>Fees</a>

                
            
            </div>

@endsection

@section('content')
<div class="row ps-5 pb-5 mx-4  bg-white text-lora" style="min-height:80vh;">

    <div class="row mt-4 mb-3">
        <h3 class="text-warning fw-bold">
            Reservation Details
        </h3>
    </div>


    <div class="col-lg-6 col-12">
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Customer Name</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->user->name}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Customer Email</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->user->email}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Start Time</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{date('h:i A', strtotime($reservation->start_time))}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Guest Number</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->guest_number}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Table</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->table->table_name}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Payment</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$payment->payment_method->method_name}}</div>
    </div>
    @if(isset($msg))
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Payment</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span><span class="fw-bold">{{$msg}}</span></div>
    </div>
    @endif
    @if(isset($payment_confirm))
    @if($payment_confirm->is_confirm == 1)
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Payment</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span><span class="fw-bold">Confirmed by {{$payment_confirm->staff->name}}</span></div>
    </div>
    @endif
    @if($payment_confirm->is_confirm == 0)
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Payment</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span><span class="fw-bold">Denied by {{$payment_confirm->staff->name}}</span></div>
    </div>
    @endif
    @endif
    </div>


    <div class="col-lg-6 col-12">
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Phone</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->user->phone}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Date</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->date}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">End Time</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{date('h:i A', strtotime($reservation->end_time))}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Paid Fee</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->guest_number * $reservation->fee->amount}}</div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Status</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span><span class="fw-bold">{{$reservation->status}}</span></div>
    </div>
    <div class="row fs-5 mb-3">
        <div class="col-lg-4 col-12">Payment Date</div>
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$payment->date}}</div>
    </div>
    </div>

    <div class="row mb-5">
            <form action="{{route('manager.view_reservation')}}" method="get">
            @csrf
              <button type="submit" class="btn btn-dark">Back</button>
            </form>
    </div>
      
</div>

@endsection