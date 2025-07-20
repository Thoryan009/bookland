@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Customer ID</td>
                            <td>{{$customer->id}}</td>
                        </tr>
                        <tr>
                            <td>Customer Name</td>
                            <td>{{$customer->name}}</td>
                        </tr>
                        <tr>
                            <td>Customer Email</td>
                            <td>{{$customer->email}}</td>
                        </tr>
                        <tr>
                            <td>Customer Image</td>
                            <td>
                                <img src="{{asset($customer->image)}}" height="50" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>Customer Mobile</td>
                            <td>{{$customer->mobile}}</td>
                        </tr>
                        <tr>
                            <td>Customer Address</td>
                            <td>{{$customer->address}}</td>
                        </tr>
                        <tr>
                            <td>Blood Group</td>
                            <td>{{$customer->blood_group}}</td>
                        </tr>
                        <tr>
                            <td>Date Of Birth</td>
                            <td>{{$customer->date_of_birth}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
