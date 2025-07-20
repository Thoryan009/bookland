@extends('admin.master')

@section('body')



    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Edit Book Series Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <form action="{{route('book-series.update', ['id' => $book_series->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Author Name</label>
                            <div class="col-sm-10">
                                <select name="author_id" class="form-control" id="">
                                    <option value="">--Select Author Name--</option>
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}" @selected($author->id == $book_series->author_id)>{{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Book Series Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" value="{{$book_series->name}}" placeholder="Book Series Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2" for="basic-default-company">Publication Status</label>
                            <div class="col-sm-10">
                                <label for=""><input type="radio" name="status" {{$book_series->status == 1 ? 'checked' : ''}} value="1" /> Published</label>
                                <label for=""><input type="radio" name="status" {{$book_series->status == 0 ? 'checked' : ''}} value="0" /> Unpublished</label>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Book Series Description</label>
                            <div class="col-sm-10">
                                <textarea id="summernote" class="form-control" name="description" placeholder="Book Series Description" >{{$book_series->description}}</textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Book Series</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
