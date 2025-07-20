@extends('admin.master')

@section('body')



    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Edit Courier Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('courier.update', $courier->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Courier Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="Courier Name" value="{{$courier->name}}" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Courier Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="basic-default-name" placeholder="Email Address" value="{{$courier->email}}" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Courier Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="mobile" id="basic-default-name" placeholder="Courier Mobile" value="{{$courier->mobile}}" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Courier Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="basic-default-phone" class="form-control mb-3" name="image" />
                                <img src="{{asset($courier->image)}}" height="100" alt="">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Courier Address</label>
                            <div class="col-sm-10">
                                <textarea id="basic-default-message" class="form-control" name="address" placeholder="Courier Address" >{{$courier->address}}</textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Courier Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
