@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>
                                <img src="{{asset($product->image)}}" height="100" alt="">
                            </td>
                            <td>{{$product->status== 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success"><i class="fa-regular fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
