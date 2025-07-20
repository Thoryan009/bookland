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
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($couriers as $courier)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$courier->name}}</td>
                                <td>{{$courier->email}}</td>
                                <td>{{$courier->mobile}}</td>
                                <td>{{$courier->address}}</td>
                                <td>
                                    <img src="{{asset($courier->image)}}" width="70" height="70" alt="">
                                </td>
                                <td>
                                    <a href="{{route('courier.edit', $courier->id)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form style="display: inline" action="{{route('courier.destroy', $courier->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick=" return confirm('Are you sure to delete this!')">
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
