@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Seller ID</td>
                            <td>{{ $seller->id }}</td>
                        </tr>
                        <tr>
                            <td>Seller Name</td>
                            <td>{{ $seller->name }}</td>
                        </tr>
                        <tr>
                            <td>Seller Email</td>
                            <td>{{ $seller->email }}</td>
                        </tr>
                        <tr>
                            <td>Seller Image</td>
                            <td>
                                <img src="{{ asset($seller->image) }}" height="150" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Seller Mobile</td>
                            <td>{{ $seller->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Seller Address</td>
                            <td>{{ $seller->address }}</td>
                        </tr>
                        <tr>
                            <td>Seller Blood Group</td>
                            <td>{{ $seller->blood_group }}</td>
                        </tr>
                        <tr>
                            <td>Date Of Birth</td>
                            <td>{{ $seller->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td>Total Balance</td>
                            <td>{{ $mainBalance }}TK</td>
                        </tr>
                        <tr>
                            <td> Withdrawable Balance</td>
                            <td>{{ $totalBalance }}TK</td>
                        </tr>


                    </table>
                    <div class="text-center mt-5">
                        <button class=" btn btn-danger"><a
                                href="{{ route('seller.balance.reset', ['id' => $seller->id]) }}" onclick="confirm('Are you sure to reset the balance')">Balance
                                Reset</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-5 mt-5">
        <h4>Books On Sell</h4>
        <div class="card-datatable table-responsive pt-0">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Book Name</th>
                        <th>Book Price</th>
                        <th>Book Quantity</th>
                        <th>Status</th>
                       
                    </tr>
                </thead>

                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$book->name}}</td>
                            <td>{{ $book->selling_price }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->status == 1 ? 'Published' : 'Unpublished'}}</td>

                         

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
