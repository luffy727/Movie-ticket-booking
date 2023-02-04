<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice {{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
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
            font-family: sans-serif;
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
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
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
            font-family: sans-serif;
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
                    <h2 class="text-start">FIlmzo</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{ $order->id }}</span> <br>
                    <span>Date:{{ $todayDate }}</span> <br>
                    <span>Email : Filmzo@gmail.com</span> <br>
                    <span>Address: No.23/2 Daladha Street, Kandy</span> <br>
                    <span>Phone Number: +94754794144</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Customer Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{ $order->id }}</td>

                <td>Customer Name:</td>
                <td>{{ $order->fname }} </td>
            </tr>
            <tr>
                <td>Customer mail</td>
                <td>{{ $order->email}}</td>

                <td>Customer Phone number :</td>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <td>Booking Date:</td>
                <td>{{ $order->created_at}}</td>

                <td>Payment Mode:</td>
                <td>{{ $order->payment_mode}}</td>
            </tr>
            
            <tr>
                <td>Payment Address:</td>
                <td>{{ $order->address1 }}</td>
                <td>{{ $order->address2 }}</td>
                <td>{{ $order->city }}</td>


                
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Details
                </th>
            </tr>
            
            <tr class="bg-blue">
                <th>Order Id</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
            
            </tr>
        </thead>
        <tbody>
        @foreach ($order->orderitems as $item)
            <tr>
                <td width="10%">{{ $order->id }}</td>
                <td width="10%"> {{ $item->product->name }}</td>
                <td width="10%"> {{ $item->qty }}</td>
                <td width="10%"> {{ $item->price }}</td>  
                
            </tr>
            
        @endforeach    
        </tbody>
    </table>
    <h4>Grand Total: Rs{{ $order->total_price }}</h4>
    <br>
    <p class="text-center">
        Thank your for Booking Tickets with Filmzo
    </p>
    <p>&copy; Copyright 2022 - Filzo. All rights reserved. 
                
     </p>

</body>
</html>