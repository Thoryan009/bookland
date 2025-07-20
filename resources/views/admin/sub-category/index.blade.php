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
                            <th>SL NO</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{isset($sub_category->category->name) ? $sub_category->category->name : 'Category Not Found'}}</td>
                                <td>{{$sub_category->name}}</td>
                                <td>{{$sub_category->description}}</td>
                                <td>
                                    <img src="{{asset($sub_category->image)}}" height="70" width="70" alt="">
                                </td>
                                <td>{{$sub_category->status == 0 ? 'Unpublished' : 'Published'}}</td>
                                <td>
                                    <a href="{{route('sub-category.edit', ['id' => $sub_category->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('sub-category.delete', ['id' => $sub_category->id])}}" onclick=" return confirm('Are you sure to delete this!')" class="btn btn-danger">
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
