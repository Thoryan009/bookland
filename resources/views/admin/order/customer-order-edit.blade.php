@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card card-body">
               <form action="{{ route('admin.customer.order-update', ['id' => $order->id]) }}" method="POST">
                                    @csrf
                                    <div class="row mb-4">
                                        <label for="" class="col-md-3">Book Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{ $order->product_name }}"
                                                readonly>
                                        </div>
                                    </div>
                                
                                    <div class="row mb-4">
                                        <label class="col-md-3">Delivery Status For Seller</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="delivery_status_seller">
                                                <option value="{{$order->delivery_status_seller}}"> {{$order->delivery_status_seller}} </option>
                                                <option value="Complete"> Complete </option>
                                               
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

