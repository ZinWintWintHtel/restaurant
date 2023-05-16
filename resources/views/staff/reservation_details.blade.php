@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('staff.view_customers')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                    <i class="bi bi-people-fill me-2 fs-5"></i>
                    Customers</a>
                <a href="{{route('staff.table_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-box-seam me-2 fs-5 fw-bold"></i>
                                   Tables</a>
                <a href="{{route('staff.reservation_index')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-bookmark-check me-2 fs-5 fw-bold"></i>
                                  Reservation</a>
                
            
            </div>

@endsection

@section('content')

<div class="row ps-5 py-5 mx-4  bg-white text-lora" style="min-height:80vh;">

    <div class="row">
        <h3 class="text-warning fw-bold">
            Reservation Details
            <form action="{{route('staff.reservation_update_form')}}" style="display:inline-block;">
              <input type="hidden" name="id" value="{{$reservation->id}}">
              <button type="submit" style="background-color:transparent; border:none; "><i class="bi bi-pen-fill fs-5 text-warning"></i></button>
            </form>
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
        <div class="col-lg-8 col-12">
            <form action="{{route('staff.payment_view')}}" method="get">
                <input type="hidden" name="id" value="{{$reservation->id}}">
                <button type="submit" class="btn btn-warning">View</button>
            </form>
        </div>
    </div>
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
        <div class="col-lg-8 col-12"><span class="me-2">:</span>{{$reservation->status}}</div>
    </div>
    </div>

    <div class="row mb-5">
            <form action="{{route('staff.reservation_index')}}" method="get">
            @csrf
              <button type="submit" class="btn btn-dark">Back</button>
            </form>
    </div>
      
</div>


@endsection