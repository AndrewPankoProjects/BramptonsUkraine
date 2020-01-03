$(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

       $.ajax({
           type: "GET",
           datatype: 'json',
           url: "getHistory",
           success : function(response){
             console.log(response);

             var len1 = 0;

              if(response != null){
                len1 = response.orders.length;
              }

              if(len1 > 0){
              for(var i=0; i<len1; i++){
                if (response.orders[i].username == document.getElementsByClassName("username")[0].id){
                  var tr_str1 = $("<tr/>").html(
                    "<td id='date'>" + response.orders[i].created_at + "</td>" +
                    "<td id='orderid'>" + response.orders[i].Current_order_id + "</td>" +
                    "<td id='total'>" + response.orders[i].Order_total + "</td>" +
                    "<td id='p'>" + response.orders[i].Perogies + "</td>" +
                    "<td id='b'>" + response.orders[i].BeetSoup + "</td>" +
                    "<td id='c'>" + response.orders[i].CabbageRolls + "</td>" +
                    "<td id='status'>" + response.orders[i].Order_status + "</td>");

                $('#requestHistory').append(tr_str1);
            }
          }
        }
          $('#userorder').DataTable();
        }
      });
    });
