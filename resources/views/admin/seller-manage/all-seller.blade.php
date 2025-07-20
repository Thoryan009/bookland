@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <caption class="p-2 text-center">All Seller Information</caption>
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Seller</th>
                            <th>Image</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($sellers as $seller)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$seller->name}}</td>
                                <td><img width="100" src="{{asset($seller->image)}}" alt=""></td>
                                <td>{{$seller->mobile}}</td>
                                <td>
                                    
                                    <a href="{{route('seller.detail', $seller->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form style="display: inline" action="{{route('customer.destroy', $seller->id)}}" method="POST">
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
