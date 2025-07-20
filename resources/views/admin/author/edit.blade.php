@extends('admin.master')

@section('body')



    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Edit Author Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <form action="{{route('author.update', ['id' => $author->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Author Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" value="{{$author->name}}" placeholder="Enter Brand Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2" for="basic-default-company">Publication Status</label>
                            <div class="col-sm-10">
                                <label for=""><input type="radio" name="status" {{$author->status == 1 ? 'checked' : ''}} value="1" /> Published</label>
                                <label for=""><input type="radio" name="status" {{$author->status == 0 ? 'checked' : ''}} value="0" /> Unpublished</label>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Author Image</label>
                            <div class="col-sm-10">
                                <input type="file" id="basic-default-phone" class="form-control" name="image" />
                                <img src="{{asset($author->image)}}" width="70" height="70" class="mt-3" alt="">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Author Description</label>
                            <div class="col-sm-10">
                                <textarea id="summernote" class="form-control" name="description" placeholder="Author Description" >{{$author->description}}</textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Author</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
