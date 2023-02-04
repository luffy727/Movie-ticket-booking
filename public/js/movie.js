$(document).ready(function () {
     $('.deleteBtn').click(function (e) { 
          e.preventDefault();

          var movie_id = $(this).val();
          $('#movie_id').val(movie_id);

          $('#deleteModel').modal('show');
          
     });
});

$(document).ready(function () {
     $('.deleteProdBtn').click(function (e) { 
          e.preventDefault();

          var product_id = $(this).val();
          $('#product_id').val(product_id);

          $('#deleteModel').modal('show');
          
     });
});

$(document).ready(function () {
     $('.deleteUserBtn').click(function (e) { 
          e.preventDefault();

          var user_id = $(this).val();
          $('#user_id').val(user_id);

          $('#deleteModel').modal('show');
          
     });
});

$(document).ready(function () {
     $('.deleteCatagoryBtn').click(function (e) { 
          e.preventDefault();

          var catagory_id = $(this).val();
          $('#catagory_id').val(catagory_id);

          $('#deleteModel').modal('show');
          
     });
});


$(document).ready(function () {
     $('.deleteMdateBtn').click(function (e) { 
          e.preventDefault();

          var mdate_id = $(this).val();
          $('#mdate_id').val(mdate_id);

          $('#deleteModel').modal('show');
          
     });
});

$(document).ready(function () {
     $('.deleteUpBtn').click(function (e) { 
          e.preventDefault();

          var upm_id = $(this).val();
          $('#upm_id').val(upm_id);

          $('#deleteModel').modal('show');
          
     });
});
/* $(document).ready(function () {
     $(selector).on('click', '.add_movie', function () {
          e.preventDefault();
          
           var data = {
               'mname':$('.mname').val(),
               'mtype':$('.mtype').val(),
               'mdescription':$('.mdescription').val(),
               'hall':$('.hall').val(),
               'chticket_price':$('.chticket_price').val(),
               'adticket_price':$('.adticket_price').val(),
               'seat_qty':$('.seat_qty').val(),
               'date':$('.date').val(),
               'time':$('.time').val(),
               'trending':$('.trending').val(),
               'image':$('.image').val(),

          }
          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
          });

          $.ajax({
               method: "POST",
               url: "insert-movie",
               data: data,
               dataType: "json",
               success: function (response) {
                    if (response.status == 400) {
                         let error = '<span class="alert alert-danger">'+response.message+'</span>';
                         $("#res").html(error);
                    }
                    else{
                         $('#Success_message').alert(response.message);
                    }
               }
          });

     }); 
});  */

function myFunction() {
     var qty = document.getElementById("admun").value;
     var adprice = document.getElementById("adprice").value;
     var fee = document.getElementById("afee").value;
     var adtotal = qty*adprice+ +fee*qty;
     document.getElementById("adtotalPrice").value = adtotal;

     var chqty = document.getElementById("chnum").value;
     var chprice = document.getElementById("chprice").value;
     var chfee = document.getElementById("cfee").value;
     var chtotal = chqty*chprice+ +chfee*chqty;
     document.getElementById("chtotalPrice").value = chtotal;


     var adtotalPrice = document.getElementById("adtotalPrice").value;
     var chtotalPrice = document.getElementById("chtotalPrice").value;

    
      var total =+ adtotalPrice+ +chtotalPrice;
      var seatqty =+ qty+ +chqty;
      document.getElementById("seatqty").value = seatqty;

      document.getElementById("total_price").value = total;
     
}

function mydate() {
     var modate = new Date(document.getElementById("mdate").value)
     var now = new Date();
     if (modate < now) {
          document.getElementById("mitem").style.display = "none";
     } 
}
 



