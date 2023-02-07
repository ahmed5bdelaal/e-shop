<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice #{{$order->tracking_no}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: "DejaVu Sans", sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: DejaVu Sans, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: DejaVu Sans, sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: DejaVu Sans, sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: DejaVu Sans, sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: DejaVu Sans, sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">E-Shop</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{$order->tracking_no}}</span> <br>
                    <span>Date: {{$order->created_at}}</span> <br>
                    <span>Zip code : {{$order->code}}</span> <br>
                    <span>Address: {{$order->country}}, {{$order->state}},{{$order->country}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{$order->id}}</td>

                <td>Full Name:</td>
                <td>{{$order->fname}} {{$order->lname}}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{$order->tracking_no}}</td>

                <td>Email Id:</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{$order->created_at}}</td>

                <td>Phone:</td>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>stripe</td>

                <td>Address:</td>
                <td>{{$order->city}}
                    {{$order->state}}
                    {{$order->country}}</td>
                </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$order->status == '0' ? 'Pending':'completed'}}</td>

                <td>Pin code:</td>
                <td>{{$order->code}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td width="10%">{{$item->id}}</td>
                <td>
                    {{$item->product->name}}
                </td>
                <td width="10%">${{$item->price}}</td>
                <td width="10%">{{$item->qty}}</td>
                <td width="15%" class="fw-bold">${{$item->price * $item->qty}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">${{$order->total}}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with E-Shop
    </p>

</body>
</html>