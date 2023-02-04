<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice {{ $booking->id }}</title>

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
                    <span>Invoice Id: #{{ $booking->id }}</span> <br>
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
                <td>Booking Id:</td>
                <td>{{ $booking->id }}</td>

                <td>Customer Name:</td>
                <td>{{ $booking->cname }} </td>
            </tr>
            <tr>
                <td>Customer mail</td>
                <td>{{ $booking->cmail}}</td>

                <td>Customer Phone number :</td>
                <td>{{ $booking->cphone }}</td>
            </tr>
            <tr>
                <td>Booking Date:</td>
                <td>{{ $booking->created_at}}</td>

                <td>Payment Mode:</td>
                <td>{{ $booking->payment_mode}}</td>
            </tr>
            
            <tr>
                <td>Payment Id:</td>
                <td>{{ $booking->payment_id }}</td>

                
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Ticket Details
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Booking ID</th>
                <th>Movie Name</th>
                <th>Hall</th>
                <th>Number of Seats</th>
                <th>Movie Date</th>
                <th>Movie Time</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="10%">{{$booking->id}}</td>
                <td>
                {{$booking->m_name}}
                </td>
                <td width="10%">{{$booking->m_hall}}</td>
                <td width="10%">{{$booking->seatqty}}</td>
                <td width="10%">{{$booking->mdate}}</td>
                <td width="10%">{{$booking->mtime}}</td>

                <td width="15%" class="fw-bold">LKR.{{$booking->total_price}}</td>
                
            </tr>
            
            
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Adult ticket price - Rs.1000
        Children ticket price - Rs.550
        Online fee - Rs.50
    </p>
    <p class="text-center">
        Thank your for Booking Tickets with Filmzo
    </p>
    <p>&copy; Copyright 2022 - Filzo. All rights reserved. 
                
     </p>

</body>
</html>