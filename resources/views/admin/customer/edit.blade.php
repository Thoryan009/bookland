@extends('admin.master')
@section('body')
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Edit Customer Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('customer.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{$customer->name}}" id="basic-default-name" placeholder="Customer Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="{{$customer->email}}" id="basic-default-name" placeholder="Customer Email" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="mobile" value="{{$customer->mobile}}" id="basic-default-name" placeholder="Customer Mobile" />
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Customer Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="basic-default-phone" class="form-control" name="image" />
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone"></label>
                            <div class="col-sm-10">
                                <img src="{{asset($customer->image)}}" height="50" alt="">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Blood Group</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="blood_group" id="">
                                    <option value="">--Select Blood Group--</option>
                                    <option value="A-" @selected($customer->blood_group=="A-") >A-</option>
                                    <option value="A+" @selected($customer->blood_group=="A+")>A+</option>
                                    <option value="B+" @selected($customer->blood_group=="B+")>B+</option>
                                    <option value="B-" @selected($customer->blood_group=="B-")>B-</option>
                                    <option value="AB-" @selected($customer->blood_group=="AB-")>AB-</option>
                                    <option value="AB+" @selected($customer->blood_group=="AB+")>AB+</option>
                                    <option value="O+" @selected($customer->blood_group=="O+")>O+</option>
                                    <option value="O-" @selected($customer->blood_group=="O-")>O-</option>
                                </select>
                                @error('blood_group')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Date of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" value="{{$customer->date_of_birth}}" class="form-control" name="date_of_birth" placeholder="">
                                @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Customer Address</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" name="address" placeholder="Customer Address">{{$customer->address}}</textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Customer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
