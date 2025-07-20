@extends('website.master')

@section('title')
    My Profile Page
@endsection

@section('body')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <section class="content-inner bg-white">
                <div class="container">
                    <div class="row">
                        @include('seller.includes')
                        <div class="col-xl-9 col-lg-8 m-b30">
                            <p class="text-success text-center">{{ session('message') }}</p>
                            <div class="shop-bx shop-profile">
                                <div class="shop-bx-title clearfix">
                                    <h5 class="text-uppercase">Edit Book For Sell</h5>

                                </div>
                                <form action="{{ route('seller.update.book', ['id' =>$book->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row m-b30">
                                        <div class="col-lg-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput1" class="form-label">Select Category</label>
                                                <select class="form-control" id="formcontrolinput1" name="category_id"
                                                    id="" onchange="getSubCategoryByCategory(this.value)">
                                                    <option value="">-- Select Category --</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @selected($category->id == $book->category_id)>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput2" class="form-label">Select Sub
                                                    Category</label>
                                                <select class="form-control" name="sub_category_id" id="subCategory">
                                                    <option value="">--Select Sub Category--</option>
                                                    @foreach ($sub_categories as $sub_category)
                                                        <option value="{{ $sub_category->id }}"
                                                            @selected($sub_category->id == $book->sub_category_id)>{{ $sub_category->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput4" class="form-label">Language Name</label>
                                                <select class="form-control" id="formcontrolinpu4" name="language_id"
                                                    id="">
                                                    <option value="">--Select Language Group--</option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}" @selected($language->id == $book->language_id)>
                                                            {{ $language->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput3" class="form-label"> Publisher Name</label>
                                                <input type="text" name="publisher_name" class="form-control"
                                                    id="formcontrolinput3" placeholder="Enter Publisher Name"
                                                    value="{{ $book->publisher_name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="formcontrolinput18" class="form-label">Author Name</label>
                                                <input type="text" name="author_name" class="form-control"
                                                    id="formcontrolinput18" placeholder="Enter Author Name"
                                                    value="{{ $book->author_name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12
                                                    col-md-6">
                                                <div class="mb-3">
                                                    <label for="formcontrolinput5" class="form-label">Book Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="formcontrolinput5" placeholder="Enter Book Name"
                                                        value="{{ $book->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12
                                                        col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formcontrolinput6" class="form-label">Book Code</label>
                                                        <input type="text" name="code" class="form-control"
                                                            id="formcontrolinput6" placeholder="Enter Book Code"
                                                            value="{{ $book->code }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12
                                                            col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput7" class="form-label">Book
                                                                Price</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control"
                                                                    name="original_price" placeholder="Original Price"
                                                                    value="{{ $book->original_price }}" />
                                                                <input type="number" class="form-control"
                                                                    name="selling_price" placeholder="Selling Price"
                                                                    value="{{ $book->selling_price }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput8" class="form-label">Stock
                                                                Amount</label>
                                                            <input type="number" name="stock" class="form-control"
                                                                value="1" id="formcontrolinput8"
                                                                placeholder="Enter Stock Amount"
                                                                value="{{ $book->stock }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput9" class="form-label">Book
                                                                Image</label>
                                                            <input type="file" name="image" class="form-control"
                                                                id="formcontrolinput9">
                                                            <img src="{{ asset($book->image) }}" class="mt-4"
                                                                width="100" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput9" class="form-label">Book Other
                                                                Image
                                                                (Minimum 4)</label>
                                                            <input type="file" name="other_image[]"
                                                                class="form-control" id="formcontrolinput9" multiple>
                                                            @foreach ($otherImages as $otherImage)
                                                                <img src="{{ asset($otherImage->image) }}" class="mt-4"
                                                                    width="100" alt="">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput10" class="form-label">Short
                                                                Description</label>
                                                            <textarea name="short_description" class="form-control" id="formcontrolinput10" cols="30" rows="2"
                                                                placeholder="Short Description">{{ $book->short_description }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput11" class="form-label">Long
                                                                Description</label>
                                                            <textarea name="long_description" class="form-control" id="summernote" cols="30" rows="2">{{ $book->long_description }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput12" class="form-label">Meta
                                                                Title</label>
                                                            <textarea name="meta_title" class="form-control" id="formcontrolinput12" cols="30" rows="2"
                                                                placeholder="Meta Title">{{ $book->meta_title }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput13" class="form-label">Meta
                                                                Description</label>
                                                            <textarea name="meta_description" class="form-control" id="formcontrolinput13" cols="30" rows="2"
                                                                placeholder="Meta Description">{{ $book->meta_description }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput14"
                                                                class="form-label">Tags</label>
                                                            @php
                                                                if (
                                                                    isset($book->tags) &&
                                                                    is_array(json_decode($book->tags, true))
                                                                ) {
                                                                    $tags = implode(
                                                                        ',',
                                                                        json_decode($book->tags, true),
                                                                    );
                                                                } else {
                                                                    $tags = '';
                                                                }
                                                            @endphp
                                                            <input type="text" name="tags" class="form-control"
                                                                id="formcontrolinput14"
                                                                placeholder="Enter Tags Seperated by comma"
                                                                value="{{ $tags }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput15"
                                                                class="form-label">Pages</label>

                                                            <input type="number" name="pages" class="form-control"
                                                                id="formcontrolinput15" placeholder="Enter Pages number"
                                                                value="{{ $book->pages }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput19" class="form-label">Book
                                                                Published
                                                                Date:</label>
                                                            <input type="date" name="published_date"
                                                                class="form-control" id="formcontrolinput19"
                                                                placeholder="Date Of Birth"
                                                                value="{{ $book->published_date }}">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput16" class="form-label">Book
                                                                Format</label>
                                                            <select name="book_format" class="form-control"
                                                                id="">
                                                                <option value="">--Select Book Format--</option>
                                                                <option value="0" @selected($book->format == 0)>
                                                                    Hardcover</option>
                                                                <option value="1" @selected($book->format == 1)>
                                                                    Paperback</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="formcontrolinput17" class="form-label">Book
                                                                ISBN</label>
                                                            <input type="text" name="isbn" class="form-control"
                                                                id="formcontrolinput17" placeholder="Enter ISBN number"
                                                                value="{{ $book->isbn }}">
                                                        </div>
                                                    </div>


                                                </div>
                                                <button type="submit" class="btn btn-primary btnhover">Update Book For
                                                    Approval</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Browse Jobs END -->
        </div>
    </div>
    <!-- Content END-->
@endsection
