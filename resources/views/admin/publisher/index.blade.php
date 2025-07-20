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
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($publishers as $publisher)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$publisher->name}}</td>
                                <td>{!! $publisher->description !!}</td>
                                <td>
                                    <img src="{{asset($publisher->image)}}" height="70" width="70" alt="">
                                </td>
                                <td>{{$publisher->status == 0 ? 'Unpublished' : 'Published'}}</td>
                                <td>
                                    <a href="{{route('publisher.edit', ['id' => $publisher->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('publisher.delete', ['id' => $publisher->id])}}" onclick=" return confirm('Are you sure to delete this!')" class="btn btn-danger">
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
