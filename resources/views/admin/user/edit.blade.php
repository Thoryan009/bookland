@extends('admin.master')
@section('body')
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Edit User Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">User Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$user->name}}" name="name" id="basic-default-name" placeholder="User Name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">User Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" value="{{$user->email}}" name="email" id="basic-default-name" placeholder="User Email" />
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">User Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="User Password" id="basic-default-name" />
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">User Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="basic-default-phone" class="form-control" name="image" />
                                <img class="mt-4" src="{{asset($user->profile_photo_path)}}" height="100" alt="">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">User Mobile</label>
                            <div class="col-sm-10">
                                <input type="number" value="{{$user->mobile}}" class="form-control" name="mobile" placeholder="User Mobile">
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update User Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
