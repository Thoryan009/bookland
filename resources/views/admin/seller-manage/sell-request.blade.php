@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <caption class="p-2 text-center">All Seller Request waiting for approval.</caption>
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Seller Name</th>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$book->seller->name}}</td>
                                <td>{{$book->name}}</td>
                                <td><img width="100" src="{{asset($book->image)}}" alt=""></td>
                                <td>{{$book->selling_price}}</td>
                                <td>
                                  
                                    <a href="{{route('seller.request.detail', $book->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{route('seller.request.decline', ['id' =>$book->id])}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                 
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
