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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$author->name}}</td>
                                <td>{{$author->description}}</td>
                                <td>
                                    <img src="{{asset($author->image)}}" height="70" width="70" alt="">
                                </td>
                                <td>{{$author->status == 0 ? 'Unpublished' : 'Published'}}</td>
                                <td>
                                    <a href="{{route('author.edit', ['id' => $author->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('author.delete', ['id' => $author->id])}}" onclick=" return confirm('Are you sure to delete this!')" class="btn btn-danger">
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
