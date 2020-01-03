<script type="text/javascript">

  $(document).ready(function(){

    $('#create').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var potato = $('#potato').val();
      var beet = $('#beet').val();
      var cabbage = $('#cabbage').val();
      var beef = $('#beef').val();
      var tomatojuice = $('#tomatojuice').val();
      var rice = $('#rice').val();
      var flour = $('#flour').val();
      var cheese = $('#cheese').val();
      var water = $('#water').val();

    $.ajax({
      url: "createTracker",
      method: "post",
      datatype:'json',
      data: { potato:potato,
              beet:beet,
              cabbage:cabbage,
              beef:beef,
              tomatojuice:tomatojuice,
              rice:rice,
              flour:flour,
              cheese:cheese,
              water:water
            },
      success: function(response){
        console.log(response);
        $('trackerId').append(response.records.ingredientTracker_id);
       }
    });
  });
});

function updateOrder($orderid){
  var token = $("meta[name='csrf-token']").attr("content");
  var id = $orderid;
  var trackerId = $('#trackerId').val();

$.ajax({
  url: "updateOrder/"+id,
  method: "post",
  datatype:'json',
  data: { "id": id,
          "token":token,
          "trackerId":trackerId
        },
  success: function(response){
    console.log(response.records);
      $('success').append("Order has been tracked");
   }
});
}


</script>
