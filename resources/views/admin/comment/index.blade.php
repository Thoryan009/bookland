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
                            <th>Customer Name</th>
                            <th>Customer Image</th>
                            <th>Book Name</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$comment->customer->name}}</td>
                                <td>
                                    <img src="{{asset($comment->customer->image)}}" height="50" alt="">
                                </td>
                                <td>{{$comment->book->name}}</td>
                                <td>{{$comment->comment}}</td>

                                <td>
                                    <form style="display: inline" action="{{route('admin-comment.destroy', $comment->id)}}" method="POST">
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
