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




<div class="row mx-4 pb-5 px-4 bg-white  text-lora ">
    <h3 class="text-success py-3">Today Reservation</h3>
                    <div class="col">
                        <table class="table table-hover">
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
                                @foreach($reservations as $reservation)
                                <tr>
                                <span style="display:none;">{{$time = date('g:i A', strtotime($reservation->start_time));}}</span>
                                    
                                    <th scope="row">{{$no}}</th>
                                    <td>Table - 00{{$reservation->table_id}}</td>
                                    <td class="ps-5">{{$reservation->guest_number}}</td>
                                    <td>{{$time}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                    <td>
                                    <form action="{{route('manager.view_reservation_details')}}" method="get">
                                        <input type="hidden" name="id" value="{{$reservation->id}}">
                                        <button type="submit" class="btn btn-warning">View</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                {{$reservations->links()}}
                            </tbody>
                        </table>
                        
                    </div>
                </div>
</div>



@endsection