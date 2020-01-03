
$(document).ready(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

       $.ajax({
           type: "GET",
           datatype: 'json',
           url: "getRequest",
           success : function(response){
             //console.log(response);
             var len1 = 0;
             var len2 = 0;
             var len3 = 0;
             var len4 = 0;
             var len5 = 0;

              if(response != null){
                len1 = response.records.length;
                len2 = response.issues.length;
                len3 = response.survey.length;
                len4 = response.orders.length;
                len5 = response.tracker.length;
              }

              if(len1 > 0){
              for(var i=0; i<len1; i++){
                var tr_str1 = $("<tr/>").html(
                  "<td><button class = 'btn btn-primary' type='button' onclick='dumpAdminFunction("+response.records[i].user_id+")'id ='removeadmin'>Remove Admin</button></td>" +
                  "<td><button class = 'btn btn-success' type='button' onclick='giveAdminFunction("+response.records[i].user_id+")'id ='giveadmin'>Give Admin</button></td>" +
                  "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionUser("+response.records[i].user_id+")' id ='delete'>Delete</button></td>" +
                  "<td id='userid"+response.records[i].id+"'>" + response.records[i].user_id + "</td>" +
                  "<td id='username'>" + response.records[i].username + "</td>" +
                  "<td id='email'>" + response.records[i].email + "</td>" +
                  "<td id='status'>" + response.records[i].status + "</td>");

              $('#requestData').append(tr_str1);
            }
          }
            $('#data').DataTable();

              if(len2 > 0){
              for(var i=0; i<len2; i++){
                  var tr_str2 = $("<tr/>").html(
                    "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionIssue("+response.issues[i].Issue_id+")' id ='delete2'>Delete</button></td>" +
                    "<td id='issueid'>" + response.issues[i].Issue_id + "</td>" +
                    "<td id='subject'>" + response.issues[i].Issue_subject + "</td>" +
                    "<td id='message'>" + response.issues[i].Issue_message + "</td>" +
                    "<td id='created'>" + response.issues[i].created_at + "</td>" +
                    "<td id='email'>" + response.issues[i].Issue_email + "</td>");

                      $('#requestIssues').append(tr_str2);
                  }
                }
                $('#issues').DataTable();

                if(len3 > 0){
                for(var i=0; i<len3; i++){
                    var tr_str3 = $("<tr/>").html(
                      "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionSurvey("+response.survey[i].survey_id+")' id ='delete3'>Delete</button></td>" +
                      "<td id='surveyid'>" + response.survey[i].survey_id + "</td>" +
                      "<td id='subject'>" + response.survey[i].Answer1 + "</td>" +
                      "<td id='message'>" + response.survey[i].Answer2 + "</td>" +
                      "<td id='created'>" + response.survey[i].feedback + "</td>" +
                      "<td id='message'>" + response.survey[i].username + "</td>");

                      $('#requestSurvey').append(tr_str3);
                    }
                  }
                  $('#surveys').DataTable();

                  if(len4 > 0){
                  for(var i=0; i<len4; i++){
                      var tr_str4 = $("<tr/>").html(
                        "<td><button class = 'btn btn-success' type='button' onclick='completeOrder("+response.orders[i].Current_order_id+")' id ='update4'>Complete</button></td>" +
                        "<td id='date'>" + response.orders[i].created_at  + "</td>" +
                        "<td id='orderid'>" + response.orders[i].Current_order_id + "</td>" +
                        "<td id='username1'>" + response.orders[i].username + "</td>" +
                        "<td id='pqty'>" + response.orders[i].Perogies  + "</td>" +
                        "<td id='bqty'>" + response.orders[i].BeetSoup  + "</td>" +
                        "<td id='cqty'>" + response.orders[i].CabbageRolls + "</td>" +
                        "<td id='total'>" + response.orders[i].Order_total + "</td>" +
                        "<td id='status'>" + response.orders[i].Order_status + "</td>");

                        $('#requestOrders').append(tr_str4);
                      }
                    }
                    $('#orders').DataTable();

                    if(len5 > 0){
                    for(var i=0; i<len5; i++){
                        var tr_str5 = $("<tr/>").html(
                          "<td id='oid'>" + response.tracker[i].order_id  + "</td>" +
                          "<td id='tid'>" + response.tracker[i].ingredientTracker_id + "</td>" +
                          "<td id='ricebag'>" + response.tracker[i].rice + "</td>" +
                          "<td id='cab'>" + response.tracker[i].cabbage  + "</td>" +
                          "<td id='beet'>" + response.tracker[i].beet  + "</td>" +
                          "<td id='pot'>" + response.tracker[i].potato + "</td>" +
                          "<td id='flour'>" + response.tracker[i].flour + "</td>" +
                          "<td id='beef'>" + response.tracker[i].beef + "</td>" +
                          "<td id='juice'>" + response.tracker[i].tomatojuice + "</td>" +
                          "<td id='water'>" + response.tracker[i].water + "</td>" +
                          "<td id='cheese'>" + response.tracker[i].cheese + "</td>");

                          $('#requestTracker').append(tr_str5);
                        }
                      }
                      $('#tracked').DataTable();

                }
              });
});


           function deleteFunctionUser($id){
                     var token = $("meta[name='csrf-token']").attr("content");
                     var id = $id;
                     //console.log(id);

                      $.ajax({
                          type: 'DELETE',
                          datatype: 'json',
                          data: {
                            "id": id,
                            "_token": token,
                          },
                          url: "userdelete/"+id,
                          success : function(response){
                            $('#requestData').empty();
                            //console.log(response.records[0].id);
                            var len1 = 0;
                             if(response != null){
                               len1 = response.records.length;
                             }

                             if(len1 > 0){
                             for(var i=0; i<len1; i++){
                               var tr_str1 = $("<tr/>").html(
                                 "<td><button class = 'btn btn-primary' type='button' onclick='dumpAdminFunction("+response.records[i].user_id+")'id ='removeadmin'>Remove Admin</button></td>" +
                                 "<td><button class = 'btn btn-success' type='button' onclick='giveAdminFunction("+response.records[i].user_id+")'id ='giveadmin'>Give Admin</button></td>" +
                                 "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionUser("+response.records[i].user_id+")' id ='delete'>Delete</button></td>" +
                                 "<td id='userid"+response.records[i].id+"'>" + response.records[i].user_id + "</td>" +
                                 "<td id='username'>" + response.records[i].username + "</td>" +
                                 "<td id='email'>" + response.records[i].email + "</td>" +
                                 "<td id='status'>" + response.records[i].status + "</td>");

                             $('#requestData').append(tr_str1);
                           }
                         }
                         $('#data').DataTable();
                        }
                      });
                     }

                     function deleteFunctionIssue($id){
                               var token = $("meta[name='csrf-token']").attr("content");
                               var id = $id;
                               //console.log(id);

                                $.ajax({
                                    type: 'DELETE',
                                    datatype: 'json',
                                    data: {
                                      "id": id,
                                      "_token": token,
                                    },
                                    url: "issuesdelete/"+id,
                                    success : function(response){
                                      $('#requestIssues').empty();
                                      //console.log(response.records[0].id);
                                      var len2 = 0;
                                       //$('#dogTable tbody').empty(); // Empty <tbody>
                                       if(response != null){
                                         len2 = response.issues.length;
                                       }

                                       if(len2 > 0){
                                       for(var i=0; i<len2; i++){
                                           var tr_str2 = $("<tr/>").html(
                                             "<td><button class = 'btn btn-danger' type='button'  onclick='deleteFunctionIssue("+response.issues[i].Issue_id+")' id ='delete1'>Delete</button></td>" +
                                             "<td id='issueid'>" + response.issues[i].Issue_id + "</td>" +
                                             "<td id='subject'>" + response.issues[i].Issue_subject + "</td>" +
                                             "<td id='message'>" + response.issues[i].Issue_message + "</td>" +
                                             "<td id='created'>" + response.issues[i].created_at + "</td>" +
                                             "<td id='email'>" + response.issues[i].Issue_email + "</td>");

                                               $('#requestIssues').append(tr_str2);
                                           }
                                         }
                                           $('#issues').DataTable();
                                      }
                                  });
                               }

                               function deleteFunctionSurvey($id){
                                         var token = $("meta[name='csrf-token']").attr("content");
                                         var id = $id;
                                      //   console.log(id);

                                          $.ajax({
                                              type: 'DELETE',
                                              datatype: 'json',
                                              data: {
                                                "id": id,
                                                "_token": token,
                                              },
                                              url: "surveydelete/"+id,
                                              success : function(response){
                                                $('#requestSurvey').empty();
                                                //console.log(response.records[0].id);
                                                var len3 = 0;
                                                 //$('#dogTable tbody').empty(); // Empty <tbody>
                                                 if(response != null){
                                                   len3 = response.survey.length;
                                                 }

                                                 if(len3 > 0){
                                                 for(var i=0; i<len3; i++){
                                                     var tr_str3 = $("<tr/>").html(
                                                       "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionSurvey("+response.survey[i].survey_id+")' id ='delete2'>Delete</button></td>" +
                                                       "<td id='surveyid'>" + response.survey[i].survey_id + "</td>" +
                                                       "<td id='subject'>" + response.survey[i].Answer1 + "</td>" +
                                                       "<td id='message'>" + response.survey[i].Answer2 + "</td>" +
                                                       "<td id='created'>" + response.survey[i].feedback + "</td>" +
                                                       "<td id='message'>" + response.survey[i].username + "</td>");

                                                       $('#requestSurvey').append(tr_str3);
                                                     }
                                                   }
                                                   $('#surveys').DataTable();
                                                }
                                            });
                                         }

      function giveAdminFunction($id){
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $id;

        var username = $('#username').val();
        var email = $('#email').val();
        var status = $('#status').val();

      $.ajax({
        url: "giveadmin/"+id,
        method: "post",
        datatype:'json',
        data: { "username":username,
                "email":email,
                "status":status,
                "token": token,
                 "id": id
              },
        success: function(response){
          //console.log(response.records);
          var len = 0;
          $('#requestData').empty();
           //$('#dogTable tbody').empty(); // Empty <tbody>
           if(response != null){
             len = response.records.length;
           }

           if(len > 0){
           for(var i=0; i<len; i++){
             var tr_str1 = $("<tr/>").html(
               "<td><button class = 'btn btn-primary' type='button' onclick='dumpAdminFunction("+response.records[i].user_id+")'id ='removeadmin'>Remove Admin</button></td>" +
               "<td><button class = 'btn btn-success' type='button' onclick='giveAdminFunction("+response.records[i].user_id+")'id ='giveadmin'>Give Admin</button></td>" +
               "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionUser("+response.records[i].user_id+")' id ='delete'>Delete</button></td>" +
               "<td id='userid"+response.records[i].id+"'>" + response.records[i].user_id + "</td>" +
               "<td id='username'>" + response.records[i].username + "</td>" +
               "<td id='email'>" + response.records[i].email + "</td>" +
               "<td id='status'>" + response.records[i].status + "</td>");

             $('#requestData').append(tr_str1);
           }
          }
          $('#data').DataTable();
         }
      });
      }

      function completeOrder($id){
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $id;

        var username1 = $('#username1').val();
        var date = $('#date').val();
        var orderid = $('#orderid').val();
        var pqty = $('#pqty').val();
        var bqty = $('#pqty').val();
        var cqty = $('#pqty').val();
        var total = $('#pqty').val();
        var status = $('#status').val();

      $.ajax({
        url: "completeorder/"+id,
        method: "post",
        datatype:'json',
        data: { "username1":username1,
                "date":date,
                "pqty":pqty,
                "bqty":bqty,
                "cqty":pqty,
                "total":total,
                "status":status,
                "token": token,
                 "id": id
              },
        success: function(response){
          //console.log(response.orders);
          var len4 = 0;
          $('#requestOrders').empty();
           //$('#dogTable tbody').empty(); // Empty <tbody>
           if(response != null){
             len4 = response.orders.length;
           }

           if(len4 > 0){
           for(var i=0; i<len4; i++){
               var tr_str4 = $("<tr/>").html(
                 "<td><button class = 'btn btn-success' type='button' onclick='completeOrder("+response.orders[i].Current_order_id+")' id ='update4'>Complete</button></td>" +
                 "<td id='date'>" + response.orders[i].created_at  + "</td>" +
                 "<td id='orderid'>" + response.orders[i].Current_order_id + "</td>" +
                 "<td id='username1'>" + response.orders[i].username + "</td>" +
                 "<td id='pqty'>" + response.orders[i].Perogies  + "</td>" +
                 "<td id='bqty'>" + response.orders[i].BeetSoup  + "</td>" +
                 "<td id='cqty'>" + response.orders[i].CabbageRolls + "</td>" +
                 "<td id='total'>" + response.orders[i].Order_total + "</td>" +
                 "<td id='status'>" + response.orders[i].Order_status + "</td>");

                 $('#requestOrders').append(tr_str4);
               }
             }
             $('#orders').DataTable();
         }
      });
      }

      function dumpAdminFunction($id){
        var token = $("meta[name='csrf-token']").attr("content");
        var id = $id;

        var username = $('#username').val();
        var email = $('#email').val();
        var status = $('#status').val();

      $.ajax({
        url: "dumpadmin/"+id,
        method: "post",
        datatype:'json',
        data: { "username":username,
                "email":email,
                "status":status,
                "token": token,
                 "id": id
              },
        success: function(response){
          console.log(response.records);
          var len = 0;
          $('#requestData').empty();
           //$('#dogTable tbody').empty(); // Empty <tbody>
           if(response != null){
             len = response.records.length;
           }

           if(len > 0){
           for(var i=0; i<len; i++){
             var tr_str1 = $("<tr/>").html(
               "<td><button class = 'btn btn-primary' type='button' onclick='dumpAdminFunction("+response.records[i].user_id+")'id ='removeadmin'>Remove Admin</button></td>" +
               "<td><button class = 'btn btn-success' type='button' onclick='giveAdminFunction("+response.records[i].user_id+")'id ='giveadmin'>Give Admin</button></td>" +
               "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionUser("+response.records[i].user_id+")' id ='delete'>Delete</button></td>" +
               "<td id='id"+response.records[i].id+"'>" + response.records[i].user_id + "</td>" +
               "<td id='username'>" + response.records[i].username + "</td>" +
               "<td id='email'>" + response.records[i].email + "</td>" +
               "<td id='status'>" + response.records[i].status + "</td>");

             $('#requestData').append(tr_str1);
           }
          }
          $('#data').DataTable();
         }
      });
      }
