@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card card-body">
                <form action="{{route('admin.order-update', ['id' => $order->id])}}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Order Total</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" value="{{$order->order_total}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Customer Info</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$order->customer->name.'('.$order->customer->mobile.')'}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Delivery Address</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3">Order Status</label>
                        <div class="col-md-9">
                            <select class="form-control" name="order_status">
                                <option value=""> -- Select Order Status -- </option>
                                <option {{$order->order_status == 'Pending' ? 'selected' : ''}} value="Pending"> Pending </option>
                                <option {{$order->order_status == 'Processing' ? 'selected' : ''}} value="Processing"> Processing </option>
                                <option {{$order->order_status == 'Complete' ? 'selected' : ''}} value="Complete"> Complete </option>
                                <option {{$order->order_status == 'Cancel' ? 'selected' : ''}} value="Cancel"> Cancel </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3">Courier Info</label>
                        <div class="col-md-9">
                            <select class="form-control" name="courier_id">
                                <option value=""> -- Select Courier Info -- </option>
                                @foreach($couriers as $courier)
                                <option value="{{$courier->id}}" @selected($courier->id==$order->courier_id) > {{$courier->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-primary">Update Order Status</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

