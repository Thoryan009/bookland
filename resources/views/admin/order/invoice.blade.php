@extends('admin.master')

@section('body')
    <style>
        .invoice-box {
            width: 90%;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
    <div class="row">
        <div class="col">
            <div class="card card-body">
                <div class="invoice-box">
                    <table cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td class="title">
                                            <img
                                                src="https://admission.univadmin.info/assets/img/shniyd_logo.jpg"
                                                style="width: 100%; max-width: 50px"
                                            /> NIYD
                                        </td>

                                        <td>
                                            Invoice #: 00{{$order->id}}<br />
                                            Order Date: {{$order->order_date}}<br />
                                            Delivery Date: {{date('Y-m-d')}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="information">
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td>
                                            <h4>Customer Info</h4>
                                            <hr>
                                            {{$order->customer->name}}.<br>
                                            {{$order->customer->mobile}}.<br>
                                            {{$order->delivery_address}}.
                                        </td>

                                        <td>
                                            <h4>Company Info</h4>
                                            <hr>
                                            NIYD.<br />
                                            Savar, Dhaka.<br />
                                            niyd.gov.bd
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="heading">
                            <td colspan="3">Payment Method</td>

                            <td>{{$order->payment_method}}</td>
                        </tr>

                        <tr class="details">
                            <td colspan="3">{{$order->payment_method}}</td>

                            <td>{{$order->order_total}}</td>
                        </tr>

                        <tr class="heading">
                            <td >Item Info</td>
                            <td >Unit Price (BDT)</td>
                            <td align="center">Quantity</td>
                            <td align="right">Total Price (BDT)</td>
                        </tr>
                        @php($total = 0)
                        @foreach($order->orderDetail as $orderDetail)
                        <tr class="item">
                            <td >{{$orderDetail->product_name}}</td>
                            <td >{{$orderDetail->product_price}}</td>
                            <td align="center">{{$orderDetail->product_qty}}</td>
                            <td align="right">BDT {{$orderDetail->product_qty * $orderDetail->product_price}}</td>
                        </tr>
                            @php($total = $total + ($orderDetail->product_qty * $orderDetail->product_price))
                        @endforeach

                        <tr class="total">
                            <td colspan="3"></td>

                            <td>Item Total: BDT {{$total}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>

                            <td>Tax Amount: BDT {{$order->tax_total}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>

                            <td>Shipping Cost: BDT {{$order->shipping_total}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>

                            <td>Total Payable: BDT {{$order->order_total}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
