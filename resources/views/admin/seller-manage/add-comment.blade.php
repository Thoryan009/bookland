@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <p class="text-center text-success">{{session('message')}}</p>
            <p class="text-center text-danger">{{session('delete-message')}}</p>
            <div class="card card-body">
                <form action="{{route('seller.request.store.comment', ['id' => $book->id])}}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Seller  Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$book->seller->name}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Book Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$book->name}}" readonly>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Book Image</label>
                        <div class="col-md-9">
                           <img width="150" src="{{asset($book->image)}}" alt="">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="" class="col-md-3">Add Comment</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="admin_comment"></textarea>
                        </div>
                    </div>
                   
                  
                    <div class="row mb-4">
                        <label class="col-md-3"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-danger">Decline Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

