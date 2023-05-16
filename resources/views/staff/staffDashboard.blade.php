@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class="active list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('staff.view_customers')}}" class=" list-group-item list-group-item-action bg-transparent  fw-bold" >
                    <i class="bi bi-people-fill me-2 fs-5"></i>
                    Customers</a>
                <a href="{{route('staff.table_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-box-seam me-2 fs-5 fw-bold"></i>
                                   Tables</a>
                <a href="{{route('staff.reservation_index')}}" class="list-group-item list-group-item-action bg-transparent  fw-bold" >
                <i class="bi bi-bookmark-check me-2 fs-5 fw-bold"></i>
                                  Reservation</a>
                
            
            </div>

@endsection

@section('content')

<div class="container-fluid px-4 text-lora bg-gray" style="min-height : 84vh;">
<h2 class="text-lora fw-bold py-3">Today Reservation</h2>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$reservations}}</h3>
                                <p class="fs-5">Reservations</p>
                            </div>
                            <i class="bi bi-bookmark-star-fill fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">{{$customers}}</h3>
                                <p class="fs-5">Customers</p>
                            </div>
                            <i class="bi bi-person-fill-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>


                    

                <div class="row mt-4">
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Table Name</th>
                                    <th scope="col">Guest Number</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($today_reservations as $today_reservation)
                                <tr>
                                <span style="display:none;">{{$time = date('g:i A', strtotime($today_reservation->start_time));}}</span>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>Table - 00{{$today_reservation->table_id}}</td>
                                    <td class="ps-5">{{$today_reservation->guest_number}}</td>
                                    <td>{{$time}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    <td>
                                    <form action="{{route('staff.reservation_view')}}" method="get">
                                        <input type="hidden" name="id" value="{{$today_reservation->id}}">
                                        <button type="submit" class="btn btn-warning">View</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{$today_reservations->links()}}
                            </tbody>
                        </table>
                        
                    </div>
                </div>

</div>


@endsection