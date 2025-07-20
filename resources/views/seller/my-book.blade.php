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
                                    <h5 class="text-uppercase">Add Book For Sell</h5>

                                </div>


                                <div class="card-datatable table-responsive pt-0">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Author</th>
                                                <th>Admin Comment</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $book->name }}</td>
                                                    <td>{{ $book->author_name }}</td>
                                                    <td class="text-danger">{{ $book->admin_comment }}</td>
                                                    <td>
                                                        <img src="{{ asset($book->image) }}" width="150" alt="jnh">
                                                    </td>
                                                    <td>{{ $book->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                                    <td>
                                                        <a href="{{ route('seller.my.book.detail', ['id' => $book->id]) }}"
                                                            class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('seller.edit.book', ['id' => $book->id]) }}"
                                                            class="btn btn-success"><i class="fa-regular fa-edit"></i></a>
                                                        <a href="{{ route('seller.request.decline', ['id' => $book->id]) }}"
                                                            onclick=" return confirm('Are you sure to delete this!')"
                                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
