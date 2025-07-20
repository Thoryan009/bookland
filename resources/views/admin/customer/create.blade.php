@extends('admin.master')
@section('body')
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Add Customer Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" placeholder="Customer Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="basic-default-name" placeholder="Customer Email" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="mobile" id="basic-default-name" placeholder="Customer Mobile" />
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="basic-default-name" />
                                @error('password')
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
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Customer Blood Group</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="blood_group" id="">
                                    <option value="">--Select Blood Group--</option>
                                    <option value="A-">A-</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                @error('blood_group')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Date of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date_of_birth" placeholder="">
                                @error('date_of_birth')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Customer Address</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" name="address" placeholder="Customer Address"></textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create New Customer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
