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
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->author->name}}</td>
                            <td>{{$book->publisher->name}}</td>
                            <td>
                                <img src="{{asset($book->image)}}" height="100" alt="">
                            </td>
                            <td>{{$book->status== 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('book.detail', ['id' => $book->id])}}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{route('book.edit', ['id' => $book->id])}}" class="btn btn-success"><i class="fa-regular fa-edit"></i></a>
                                <a href="{{route('book.delete', ['id' => $book->id])}}" onclick=" return confirm('Are you sure to delete this!')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
