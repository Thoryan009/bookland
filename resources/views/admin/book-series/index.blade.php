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
                            <th>Author Name</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($book_seriess as $book_series)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$book_series->author->name}}</td>
                                <td>{{$book_series->name}}</td>
                                <td>{!! $book_series->description !!}</td>
                                <td>{{$book_series->status == 0 ? 'Unpublished' : 'Published'}}</td>
                                <td>
                                    <a href="{{route('book-series.edit', ['id' => $book_series->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('book-series.delete', ['id' => $book_series->id])}}" onclick=" return confirm('Are you sure to delete this!')" class="btn btn-danger">
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
