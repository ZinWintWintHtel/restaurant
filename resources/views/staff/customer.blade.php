@extends('staff_master')

@section('sidebar')

<div class="list-group list-group-flush my-3">
                <a href="{{ route('staff.dashboard') }}" class=" list-group-item list-group-item-action bg-transparent fw-bold" onclick="addClass(this);">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{route('staff.view_customers')}}" class="active list-group-item list-group-item-action bg-transparent  fw-bold" >
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

<div class="container-fluid px-4 text-lora bg-gray" style="min-height:85vh;">

                <div class="row py-4">
                    <div class="col-4">
                        <h2 class="text-lora fw-bold">Registered Customers</h2>
                    </div>
                    <div class="col-8">
                        <form action="{{route('staff.search_customer')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-6 ">
                                    <input type="email" name="email" class="form form-control @error('email') is-invalid @enderror">
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($msg))
                    <h4 class="text-lora text-danger mb-3">{{$msg }}</h4>
                @endif

                @if(isset($search_user))
                <div class="row">
                    <h3 class="text-warning">Found Customer</h3>
                    <div class="col">
                        <table class="table bg-white  rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$search_user->name}}</td>
                                    <td>{{$search_user->phone}}</td>
                                    <td>{{$search_user->email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <div class="row">
                    <div class="col">
                        <table class="table bg-white  rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            <span style="display:none;">{{$no = 1;}}</span>
                                @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$no}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <span style="display:none;">{{$no += 1;}}</span>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>


</div>


@endsection