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
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->mobile}}</td>
                                <td>
                                    <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('customer.show', $customer->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form style="display: inline" action="{{route('customer.destroy', $customer->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
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
