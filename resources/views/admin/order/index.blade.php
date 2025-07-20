@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Customer Info</th>
                            <th>Order Date</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{isset($order->customer->name) ? $order->customer->name : ''}} <br/> {{isset($order->customer->mobile) ? $order->customer->mobile : ''}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail', ['id' => $order->id])}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.order-edit', ['id' => $order->id])}}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-file-lines me-2"></i> Invoice
                                    </a>
                                    <a href="{{route('admin.order-invoice-print', ['id' => $order->id])}}" target="_blank" class="btn btn-info btn-sm">
                                        <i class="fa fa-print me-2"></i> Print
                                    </a>
                                    <a href="{{route('admin.order-delete', ['id' => $order->id])}}" class="btn btn-danger btn-sm {{$order->order_status == 'Cancel' ? ' ' : 'disabled'}}" onclick=" return confirm('Are you sure to delete this!')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
