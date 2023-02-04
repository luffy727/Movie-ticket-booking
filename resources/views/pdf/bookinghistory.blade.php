<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
     <title>Booking History</title>
     <style>
          #moviedate {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          }

          #moviedate td, #moviedate th {
          border: 1px solid #ddd;
          padding: 8px;
          }

          #moviedate tr:nth-child(even){background-color: #f2f2f2;}

          #moviedate tr:hover {background-color: #ddd;}

          #moviedate th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
          }

          /* #mid{
               width: 20%
          } */
     </style>
</head>
<body>
          <h2>Movie Details</h2>
     <table class="table" id ="moviedate">
          
          <thead>
               <tr>
                    <th id="mid">ID</th>
                    <th>Customer Name</th>
                    <th>Customer Mail</th>
                    <th>Customer Phone number</th>
                    <th>Seats </th>
                    <th>Movie Name</th>
                    <th>Hall</th>
                    <th>Total Price</th>
                    <th>Status</th>
               </tr>
          </thead>
          @if(count($booking))
               <tbody>
               @foreach ($booking as $item)
                    <tr>
                         <td>{{ $item->id }}</td>
                         <td>{{ $item->cname }}</td>
                         <td>{{ $item->cmail }}</td>
                         <td>{{ $item->cphone }}</td>
                         <td>{{ $item->seatqty }}</td>
                         <td>{{ $item->m_name }}</td>
                         <td>{{ $item->mhall }}</td>
                         <td>{{ $item->total_price }}</td>
                         <td>{{ $item->status == '0' ?'pending' : 'completed' }}</td>
                    </tr>
               @endforeach
               </tbody>
          @else
          <tr>
               <td colspan="1">No User Found</td>
          </tr>
          @endif
          
     </table>
</body>
</html>