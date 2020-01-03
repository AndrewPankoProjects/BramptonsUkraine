<script type="text/javascript">

    $('#paynow').click(function(e){
    //  console.log(hi);
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var pQty = $('#1').val();
      var bQty = $('#2').val();
      var cQty = $('#3').val();
      var total = $("#total").val();
      var username = $("#username").val();

    $.ajax({
      url: "createOrder",
      method: "post",
      datatype:'json',
      data: { pQty:pQty,
              bQty:bQty,
              cQty:cQty,
              total:total,
              username:username
            },
      success: function(response){
        console.log(response);
        window.location.href = "http://bramptonsukraine.herokuapp.com/thankyou";
        $('success').append("Order has been sent!");
       }
    });
  });


</script>
