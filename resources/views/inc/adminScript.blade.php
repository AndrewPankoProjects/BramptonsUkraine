<script type="text/javascript">

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
             console.log(response);
             var len1 = 0;
             var len2 = 0;
             var len3 = 0;

              if(response != null){
                len1 = response.records.length;
                len2 = response.issues.length;
                len3 = response.survey.length;
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

              if(len2 > 0){
              for(var i=0; i<len2; i++){
                  var tr_str2 = $("<tr/>").html(
                    "<td><button class = 'btn btn-danger' type='button'  onclick='deleteFunctionIssue("+response.issues[i].Issue_id+")' id ='delete'>Delete</button></td>" +
                    "<td id='issueid'>" + response.issues[i].Issue_id + "</td>" +
                    "<td id='subject'>" + response.issues[i].Issue_subject + "</td>" +
                    "<td id='message'>" + response.issues[i].Issue_message + "</td>" +
                    "<td id='created'>" + response.issues[i].created_at + "</td>" +
                    "<td id='email'>" + response.issues[i].Issue_email + "</td>");

                      $('#requestIssues').append(tr_str2);
                  }
                }

                if(len3 > 0){
                for(var i=0; i<len3; i++){
                    var tr_str3 = $("<tr/>").html(
                      "<td><button class = 'btn btn-danger' type='button'  onclick='deleteFunctionSurvey("+response.survey[i].survey_id+")' id ='delete'>Delete</button></td>" +
                      "<td id='surveyid'>" + response.survey[i].survey_id + "</td>" +
                      "<td id='subject'>" + response.survey[i].Answer1 + "</td>" +
                      "<td id='message'>" + response.survey[i].Answer2 + "</td>" +
                      "<td id='created'>" + response.survey[i].feedback + "</td>" +
                      "<td id='message'>" + response.survey[i].username + "</td>");

                      $('#requestSurvey').append(tr_str3);
                    }
                  }
                }
              });
});

           function deleteFunctionUser($id){
                     var token = $("meta[name='csrf-token']").attr("content");
                     var id = $id;
                     console.log(id);

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
                             //$('#dogTable tbody').empty(); // Empty <tbody>
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
                            }
                        });
                     }

                     function deleteFunctionIssue($id){
                               var token = $("meta[name='csrf-token']").attr("content");
                               var id = $id;
                               console.log(id);

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
                                             "<td><button class = 'btn btn-danger' type='button'  onclick='deleteFunctionIssue("+response.issues[i].Issue_id+")' id ='delete'>Delete</button></td>" +
                                             "<td id='issueid'>" + response.issues[i].Issue_id + "</td>" +
                                             "<td id='subject'>" + response.issues[i].Issue_subject + "</td>" +
                                             "<td id='message'>" + response.issues[i].Issue_message + "</td>" +
                                             "<td id='created'>" + response.issues[i].created_at + "</td>" +
                                             "<td id='email'>" + response.issues[i].Issue_email + "</td>");

                                               $('#requestIssues').append(tr_str2);
                                           }
                                         }
                                      }
                                  });
                               }

                               function deleteFunctionSurvey($id){
                                         var token = $("meta[name='csrf-token']").attr("content");
                                         var id = $id;
                                         console.log(id);

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
                                                       "<td><button class = 'btn btn-danger' type='button' onclick='deleteFunctionSurvey("+response.survey[i].survey_id+")' id ='delete'>Delete</button></td>" +
                                                       "<td id='surveyid'>" + response.survey[i].survey_id + "</td>" +
                                                       "<td id='subject'>" + response.survey[i].Answer1 + "</td>" +
                                                       "<td id='message'>" + response.survey[i].Answer2 + "</td>" +
                                                       "<td id='created'>" + response.survey[i].feedback + "</td>" +
                                                       "<td id='message'>" + response.survey[i].username + "</td>");

                                                       $('#requestSurvey').append(tr_str3);
                                                     }
                                                   }
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
               "<td id='userid"+response.records[i].id+"'>" + response.records[i].user_id + "</td>" +
               "<td id='username'>" + response.records[i].username + "</td>" +
               "<td id='email'>" + response.records[i].email + "</td>" +
               "<td id='status'>" + response.records[i].status + "</td>");

             $('#requestData').append(tr_str1);
           }
          }
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
         }
      });
      }

  </script>
