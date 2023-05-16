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

<div class="container-fluid text-lora bg-gray" style="min-height:85vh;">
<div class="row p-4">
                    <div class="col-4">
                        <h2 class="text-lora fw-bold">Reservation</h2>
                    </div>
                    <div class="col-8">
                        <form action="{{route('staff.reservation_search')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-6 ">
                                    <input type="date" required name="date" class="form form-control">
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if(isset($msg))
                        <h4 class="text-lora text-danger">{{$msg}}</h4>
                    @endif

@if(isset($reservations_by_date))
<div class="row p-4">
       @foreach($reservations_by_date as $reservation_by_date)
        <div class=" col-6">
          <div class="row bg-white mb-3 p-3 me-3">
            <div class="col-4">
                <img src="{{asset('images/logo.png')}}" alt="logo-photo" class="img img-fluid">
            </div>
            <div class="col-6 lh-1">
                <p class="fw-bold fs-5 text-lora">{{$reservation_by_date->date}}</p>
                <p class=" fs-5 text-lora">Guest - {{$reservation_by_date->guest_number}}</p>
                <p class=" fs-5 text-lora">
                    <span>{{date('h:i A', strtotime($reservation_by_date->start_time))}}</span> 
                    <span>{{date('h:i A', strtotime($reservation_by_date->end_time))}}</span>
                </p>
                <p class="fw-bold fs-5 text-lora">{{$reservation_by_date->status}}</p>
                <p>
                <form action="{{route('staff.reservation_details')}}" method="get">
                
                <button type="submit" class="btn btn-warning text-lora">View Details</button>
                <input type="hidden" name="id" value="{{$reservation_by_date->id}}">
                </form>
                </p>
            </div>
            <div class="col-2 d-flex flex-column align-items-center">

                <form action="{{route('staff.reservation_delete')}}" method="get" onclick="confirmation(event)">
                  @csrf
                  <input type="hidden" name="id" value="{{$reservation_by_date->id}}">
                  <button type="submit" style="background-color:transparent; border:none;"><i class="bi bi-trash3-fill fs-4 text-orange"></i></button>
                </form>
            
            </div>
          </div>
        </div>

        <script type="text/javascript">
                function confirmation(ev)
                {
                  var flag = confirm("Are you sure to delete?");
                  if(flag == false)
                  {
                      ev.preventDefault();
                  }
                  
                }
            </script>


       @endforeach
       </div>
       

@endif

@if(isset($reservations))
<div class="row p-4">
       @foreach($reservations as $reservation)
        <div class=" col-6">
          <div class="row bg-white mb-3 p-3 me-3">
            <div class="col-4">
                <img src="{{asset('images/logo.png')}}" alt="logo-photo" class="img img-fluid">
            </div>
            <div class="col-6 lh-1">
                <p class="fw-bold fs-5 text-lora">{{$reservation->date}}</p>
                <p class=" fs-5 text-lora">Guest - {{$reservation->guest_number}}</p>
                <p class=" fs-5 text-lora">
                    <span>{{date('h:i A', strtotime($reservation->start_time))}}</span> 
                    <span>{{date('h:i A', strtotime($reservation->end_time))}}</span>
                </p>
                <p class="fw-bold fs-5 text-lora">{{$reservation->status}}</p>
                <p>
                <form action="{{route('staff.reservation_details')}}" method="get">
                
                <button type="submit" class="btn btn-warning text-lora">View Details</button>
                <input type="hidden" name="id" value="{{$reservation->id}}">
                </form>
                </p>
            </div>
            <div class="col-2 d-flex flex-column align-items-center">

                <form action="{{route('staff.reservation_delete')}}" method="get" onclick="confirmation(event)">
                  @csrf
                  <input type="hidden" name="id" value="{{$reservation->id}}">
                  <button type="submit" style="background-color:transparent; border:none;"><i class="bi bi-trash3-fill fs-4 text-orange"></i></button>
                </form>
            
            </div>
          </div>
        </div>

        <script type="text/javascript">
                function confirmation(ev)
                {
                  var flag = confirm("Are you sure to delete?");
                  if(flag == false)
                  {
                      ev.preventDefault();
                  }
                  
                }
            </script>


       @endforeach
       {{$reservations->links()}}
       </div>

@endif



@endsection