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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <img src="{{asset($user->profile_photo_path)}}" height="50" alt="">
                                </td>
                                <td>{{$user->mobile}}</td>
                                <td>
                                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form style="display: inline" action="{{route('user.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm {{$user->id==1 ? 'disabled' : '' }}" onclick=" return confirm('Are you sure to delete this!')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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
