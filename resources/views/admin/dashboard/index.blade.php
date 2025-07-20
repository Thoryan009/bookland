@extends('admin.master')

@section('body')
    <div class="row gy-6">
        <!-- Total Order card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-secondary">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Total Order</h5>
                    <h4 class="text-white mb-0 "> {{$totalOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ Total Order card -->
        <!-- todayOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-secondary">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Today Orders</h5>
                    <h4 class="text-white mb-0 "> {{$todayOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ todayOrders card -->
        <!-- pendingOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-secondary">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Pending Orders</h5>
                    <h4 class="text-white mb-0 "> {{$pendingOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ pendingOrders card -->


        <!-- cancelledOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-danger">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Cancelled Orders</h5>
                    <h4 class="text-white mb-0 "> {{$cancelledOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ pendingOrders card -->
        <!-- confirmedOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-success">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Confirmed Orders</h5>
                    <h4 class="text-white mb-0 "> {{$confirmedOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ confirmedOrders card -->
   
  <!-- todayCancelledOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-danger">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Today Cancelled Orders</h5>
                    <h4 class="text-white mb-0 "> {{$todayCancelledOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ todayCancelledOrders card -->
        <!-- todayDeliveredOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-info">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white"> Today Delivered Orders</h5>
                    <h4 class="text-white mb-0 "> {{$todayDeliveredOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ todayDeliveredOrders card -->
        <!-- deliveredOrders card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-info">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Delivered Orders</h5>
                    <h4 class=" mb-0 text-white"> {{$deliveredOrders}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ deliveredOrders card -->

        <!-- todayTotalDeliveredPieces card -->
        <div class="col-md-12 col-lg-4">
            <div class="card bg-info">
                <div class="card-body text-nowrap text-center">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap text-white">Today Total Delivered Pieces</h5>
                    <h4 class="text-white mb-0 "> {{$todayTotalDeliveredPieces}}</h4>
                    <a href="{{route('admin.all-order')}}" class="btn btn-sm btn-primary">View Sales</a>
                </div>
               
            </div>
        </div>
        <!--/ todayTotalDeliveredPieces card -->

        
     
        <!--/ Sales by Countries -->
        <!-- Customer Tables -->
        <div class="col-xl-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-truncate">Customer</th>
                                <th class="text-truncate">Email</th>
                                <th class="text-truncate">Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <a href="{{ route('customer.show', $customer->id) }}">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-4">
                                                    <img src="{{ asset($customer->image) }}" alt="Avatar"
                                                        class="rounded-circle">
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-truncate">{{ $customer->name }}</h6>

                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="text-truncate">{{ $customer->email }}</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">

                                            <span>{{ $customer->mobile }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Customer Tables -->
        <!-- Seller Tables -->
        <div class="col-xl-12 col-md-6">
            <div class="card overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-truncate">Seller</th>
                                <th class="text-truncate">Email</th>
                                <th class="text-truncate">Address</th>
                                <th class="text-truncate">Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $seller)
                                <tr>
                                    <td>
                                        <a href="{{route('seller.detail', ['id' => $seller->id])}}">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="{{ asset($seller->image) }}" alt="Avatar"
                                                    class="rounded-circle">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-truncate">{{ $seller->name }}</h6>

                                            </div>
                                        </div>
                                        </a>
                                    </td>
                                    <td class="text-truncate">{{ $seller->email }}</td>
                                    <td class="text-truncate">{{ $seller->address }}</td>
                                    <td class="text-truncate">
                                        <div class="d-flex align-items-center">

                                            <span>{{ $seller->mobile }}</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Seller Tables -->
    </div>
@endsection
