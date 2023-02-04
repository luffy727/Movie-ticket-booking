$(document).ready(function () {
     $('.add_movie').click(function (e) { 
          e.preventDefault();
          
          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
               });
               
              var mname = $('.mname').val();
              var mtype = $('.mtype').val();
              var mdescription = $('.mdescription').val();
              var hall = $('.hall').val();
              var chticket_price = $('.chticket_price').val();
              var adticket_price = $('.adticket_price').val();
              var seat_qty = $('.seat_qty').val();
              var date = $('.date').val();
              var time = $('.time').val();
              var trending = $('.trending').val();
              var image = $('.image').val();

              if (!mname) {
               mname_error = "Movie name is required";
               $('#mname_error').html('');
               $('#mname_error').html('mname_error'); 
  
               }
               else{
                    mname_error = "";
                    $('#mname_error').html('');
               }

               if (!mtype) {
                    mtype_error = "Movie type is required";
                    $('#mtype_error').html('');
                    $('#mtype_error').html('mtype_error'); 
       
               }
               else{
                     mtype_error = "";
                    $('#mtype_error').html('');
               }

               if (!mdescription) {
                    mdescription_error = "Movie Description is required";
                    $('#mdescription_error').html('');
                    $('#mdescription_error').html('mdescription_error'); 
       
               }
               else{
                    mdescription_error = "";
                    $('#mdescription_error').html('');
               }

               if (!hall) {
                    hall_error = "Hall name is required";
                    $('#hall_error').html('');
                    $('#hall_error').html('hall_error'); 
            
               }
               else{
                    hall_error = "";
                    $('#hall_error').html('');
               }

               if (!chticket_price) {
                    chticket_price_error = "Children ticket price is required";
                    $('#chticket_price_error').html('');
                    $('#chticket_price_error').html('chticket_price_error'); 
                 
               }
               else{
                    chticket_price_error = "";
                    $('#chticket_price_error').html('');
               }

               if (!adticket_price) {
                    adticket_price_error= "Adult ticket price is required";
                    $('#adticket_price_error').html('');
                    $('#adticket_price_error').html('adticket_price_error'); 
                      
               }
               else{
                    adticket_price_error = "";
                    $('#adticket_price_error').html('');
               }
                    
               if (!seat_qty) {
                    seat_qty_error = "Number of seats is required";
                    $('#seat_qty_error').html('');
                    $('#seat_qty_error').html('seat_qty_error'); 
                           
               }
               else{
                    seat_qty_error = "";
                     $('#seat_qty_error').html('');
               }

               if (!date) {
                    date_error = "Date is required";
                    $('#date_error').html('');
                    $('#date_error').html('date_error'); 
                           
               }
               else{
                    date_error = "";
                    $('#date_error').html('');
               }

               if (!time) {
                    time_error = "Time is required";
                    $('#time_error').html('');
                    $('#time_error').html('time_error'); 
                           
               }
               else{
                    time_error = "";
                     $('#time_error').html('');
               }
               
               if (!trending) {
                    trending_error = "trending is required";
                    $('#trending_error').html('');
                    $('#trending_error').html('trending_error'); 
                           
               }
               else{
                    trending_error = "";
                     $('#trending_error').html('');
               }
               
               if (!image) {
                    image_error = "Image is required";
                    $('#image_error').html('');
                    $('#image_error').html('image_error'); 
                           
               }
               else{
                    image_error = "";
                    $('#image_error').html('');
               }

     });
});