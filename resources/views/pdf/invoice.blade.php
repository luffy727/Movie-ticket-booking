<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
     <title>Invoice</title>
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

          #mid{
               width: 20%
          }
     </style>
</head>
<body>
          <h2>Movie Date and time Shedule</h2>
     <table class="table" id ="moviedate">
          
          <thead>
               <tr>
                    <th id="mid">ID</th>
                    <th>Movie ID</th>
                    <th>Movie Date</th>
                    <th>Movie time</th>
               </tr>
          </thead>
          @if(count($moviedate))
               <tbody>
               @foreach ($moviedate as $item)
                    <tr>
                         <td >{{ $item->id }}</td>
                         <td>{{ $item->movie_id }}</td>
                         <td>{{ $item->movie_date }}</td>
                         <td>{{ $item->movie_time }}</td>

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