$(document).ready(function () {
     $('.razorpay_mbtn').click(function (e) { 
          e.preventDefault();

          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
               });
          
         var cmail = $('.cmail').val();
         var cname = $('.cname').val();
         var cphone = $('.cphone').val();
         var seatqty = $('.seatqty').val();
         var m_name = $('.m_name').val();
         var m_hall = $('.m_hall').val();
         var mdate = $('.mdate').val();
         var mtime = $('.mtime').val();
         var total_price = $('.total_price').val();

         if(!cname)
         {
          cname_error = "Customer name required";
          $('#cname_error').html('');
          $('#cname_error').html(cname_error);

         }
         else{
          cname_error = "";
          $('#cname_error').html('');
         }

         if(!cmail)
         {
          cmail_error = "Customer Email required";
          $('#cmail_error').html('');
          $('#cmail_error').html(cmail_error);

         }
         else{
          cmail_error = "";
          $('#cmail_error').html('');
         }

         if(!cphone)
         {
          cphone_error = "Customer Phone Number required";
          $('#cphone_error').html('');
          $('#cphone_error').html(cphone_error);

         }
         else{
          cphone_error = "";
          $('#cphone_error').html('');
         }

         if(!seatqty)
         {
          seatqty_error = "Number of seats required";
          $('#seatqty_error').html('');
          $('#seatqty_error').html(seatqty_error);

         }
         else{
          seatqty_error = "";
          $('#seatqty_error').html('');
         }

         if(!m_name)
         {
          m_name_error = "Movie name required";
          $('#m_name_error').html('');
          $('#m_name_error').html(m_name_error);

         }
         else{
          m_name_error = "";
          $('#m_name_error').html('');
         }

         if(!m_hall)
         {
          m_hall_error = "Movie hall required";
          $('#m_hall_error').html('');
          $('#m_hall_error').html(m_hall_error);

         }
         else{
          m_hall_error = "";
          $('#m_hall_error').html('');
         }

         if(!mdate)
         {
          mdate_error = "Movie date required";
          $('#mdate_error').html('');
          $('#mdate_error').html(mdate_error);

         }
         else{
          mdate_error = "";
          $('#mdate_error').html('');
         }

         if(!mtime)
         {
          mtime_error = "Movie time required";
          $('#mtime_error').html('');
          $('#mtime_error').html(mtime_error);

         }
         else{
          mtime_error = "";
          $('#mtime_error').html('');
         }

         if(!total_price)
         {
          total_price_error = "total price required";
          $('#total_price_error').html('');
          $('#total_price_error').html(total_price_error);

         }
         else{
          total_price_error = "";
          $('#total_price_error').html('');
         }

         if (cname_error != '' || cmail_error != '' || cphone_error != '' || seatqty_error != '' || m_name_error != '' || m_hall_error != '' || mdate_error != '' || mtime_error != '' || total_price_error != '') {
          return false;
         }

         else{

               var data = {
                    'cmail':cmail,
                    'cname':cname,
                    'cphone':cphone,
                    'seatqty':seatqty,
                    'm_name':m_name,
                    'm_hall':m_hall,
                    'mdate':mdate,
                    'mtime':mtime,
                    'total_price':total_price,
               }

               $.ajax({
                    method:"post",
                    url: "/pay-with-razorpay",
                    data: data,
                    success: function (response) {
                         /* alert(response.total_price); */
                         var options = {
                              "key": "rzp_test_5XRQjfAi3ji2xj", // Enter the Key ID generated from the Dashboard
                              "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                              "currency": "LKR",
                              "name": response.cname,
                              "description": "Thank you for choosing Us",
                              "image": "https://example.com/your_logo",
                              //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                              //"callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
                              //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                              "handler": function (responsea){
                                   //alert(responsea.razorpay_payment_id);
                                   $.ajax({
                                   method: "POST",
                                   url: "/place-booking",
                                   data: {
                                        'cmail':response.cmail,
                                        'cname':response.cname,
                                        'cphone':response.cphone,
                                        'seatqty':response.seatqty,
                                        'm_name':response.m_name,
                                        'm_hall':response.m_hall,
                                        'mdate':response.mdate,
                                        'mtime':response.mtime,
                                        'total_price':response.total_price,
                                        'payment_mode':"Paid by Razorpay",
                                        'payment_id':responsea.razorpay_payment_id,



                                   },
                                   success: function (responseb) {
                                        alert(responseb.status);
                                        window.location.href = "/my-booking"
                                   }
                                   });
                                   
                              },

                              "prefill": {
                              "name": response.cname,
                              "email": response.cmail,
                              "contact": response.cphone,
                              },
                              "theme": {
                              "color": "#3399cc"
                              }
                         };

                         var rzp1 = new Razorpay(options);
                              rzp1.open();
                              
                    }
                    
               });
          }
     });
});
