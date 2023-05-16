@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class="list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
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


<div class="row text-lora mx-4">
    <h3 class="mb-4">My Reservation</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Table Name</th>
                                    <th scope="col">Guest Number</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($paginatedData->items() as $item)
                                <tr>
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$item->table->table_name}}</td>
                                    <td class="ps-5">{{$item->guest_number}}</td>
                                    <td>{{$item->date}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$paginatedData->links()}}
                        
                    </div>
                </div>

@endsection
