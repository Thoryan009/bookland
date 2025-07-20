@extends('admin.master')

@section('body')



    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom">
                    <h5 class="mb-0">Edit Language Form</h5> <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body pt-5">
                    <form action="{{route('language.update', ['id' => $language->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Language Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="basic-default-name" value="{{$language->name}}" placeholder="Language Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2" for="basic-default-company">Publication Status</label>
                            <div class="col-sm-10">
                                <label for=""><input type="radio" name="status" {{$language->status == 1 ? 'checked' : ''}} value="1" /> Published</label>
                                <label for=""><input type="radio" name="status" {{$language->status == 0 ? 'checked' : ''}} value="0" /> Unpublished</label>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Language</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
