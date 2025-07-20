@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Book Id</td>
                            <td>{{$book->id}}</td>
                        </tr>
                        <tr>
                            <td>Book Name</td>
                            <td>{{$book->name}}</td>
                        </tr>
                        <tr>
                            <td>Book Code</td>
                            <td>{{$book->code}}</td>
                        </tr>
                        <tr>
                            <td>Book Category</td>
                            <td>{{isset($book->category->name) ? $book->category->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Book Sub Category</td>
                            <td>{{isset($book->subCategory->name) ? $book->subCategory->name : ''}}</td>
                        </tr>
                        <tr>
                            <td>Book Brand</td>
                            <td>{{isset($book->publisher->name) ? $book->publisher->name : ''}}</td>
                        </tr>

                        <tr>
                            <td>Book Regular Price</td>
                            <td>{{$book->regular_price}}</td>
                        </tr>
                        <tr>
                            <td>Book Selling Price</td>
                            <td>{{$book->selling_price}}</td>
                        </tr>
                        <tr>
                            <td>Book Discount</td>
                            <td>{{$book->discount}}%</td>
                        </tr>
                        <tr>
                            <td>Book Stock Amount</td>
                            <td>{{$book->stock}}</td>
                        </tr>
                        <tr>
                            <td>Book Short Description</td>
                            <td>{{$book->short_description}}</td>
                        </tr>
                        <tr>
                            <td>Book Long Description</td>
                            <td>{!! $book->long_description !!}</td>
                        </tr>
                        <tr>
                            <td>Book Image</td>
                            <td>
                                <img src="{{asset($book->image)}}" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Book Other Image</td>
                            <td>
                                @foreach($book->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="">
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Book Meta Title</td>
                            <td>{{$book->meta_title}}</td>
                        </tr>
                        <tr>
                            <td>Book Meta Description</td>
                            <td>{{$book->meta_description}}</td>
                        </tr>
                        <tr>
                            <td>Book Tags</td>
                            <td>
                                <ul>
                                    @if (isset($book->tags) && is_array(json_decode($book->tags, true)))
                                        @foreach (json_decode($book->tags, true) as $tag)
                                            <li>{{ $tag }}</li>
                                        @endforeach
                                    @endif
                                </ul>

                            </td>
                        </tr>
                        <tr>
                            <td>Book Pages</td>
                            <td>{{$book->pages}}</td>
                        </tr>
                        <tr>
                            <td>Book Published Date</td>
                            <td>{{$book->published_date}}</td>
                        </tr>
                        <tr>
                            <td>Book Format</td>
                            <td>{{$book->format == 1 ? 'Paperback' : 'Hardcover'}}</td>
                        </tr>
                        <tr>
                            <td>Book ISBN</td>
                            <td>{{$book->isbn}}</td>
                        </tr>
                        <tr>
                            <td>Book Total View</td>
                            <td>{{$book->hit_count}}</td>
                        </tr>
                        <tr>
                            <td>Book Total Sale</td>
                            <td>{{$book->sales_count}}</td>
                        </tr>
                        <tr>
                            <td>Book Featured Status</td>
                            <td>{{$book->feature_status}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
