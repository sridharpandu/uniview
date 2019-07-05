(function ($, Drupal) {

$(document).ready(function() {

  var temp = Number($("#edit-advance-value").val());
  //var gym = Number($('input:radio[name=gymnasium_radio]:checked').val());
  var gym = 0;
  
  $("form").ready(function() {
      $("#edit-amounts").val(Number($("#edit-outstanding-value").val()) + Number($("#edit-advance-value").val()));
      $('input[name="amounts"]').val($("#edit-amounts").val());
      $('#edit-advance-value').focus();
    //$("input:checkbox:checked").attr("checked",false);
    //alert(temp);
  });

  $("#edit-billiards").click(function() {
    //alert($("#edit-outstanding-value").val());
    var s = Number($("#edit-amounts").val());	
       //alert(temp);
    if($("#edit-billiards").is(':checked')) {
      s = $("#edit-amounts").val();
      s = Number(s) + Number($("#edit-billiards").val());
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
    }
    else {
      s = $("#edit-amounts").val();
      s-= $("#edit-billiards").val();
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input["amount"]').val($("#edit-amounts").val());
    }
  
  });


//edit gym starts
  $("#gymnasium-value").click(function() {
    //alert($("#edit-outstanding-value").val());
    var s = Number($("#edit-amounts").val());	
       //alert(temp);
    if($("#gymnasium-value").is(':checked')) {
      s = $("#edit-amounts").val();
      s = Number(s) + Number($("#gymnasium-value").val());
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
    }
    else {
      s = $("#edit-amounts").val();
      s-= $("#gymnasium-value").val();
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
    }
    $('input[name="amount"]').val($("#edit-amounts").val());
  });

 //edit gym ends 

  $("#edit-swimming").click(function() {
    //alert($("#edit-outstanding-value").val());
    var s = Number($("#edit-amounts").val());	
       
    if($("#edit-swimming").is(':checked')) {
      s = $("#edit-amounts").val();
      s = Number(s) + Number($("#edit-swimming").val());
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
    }
    else {
      s = $("#edit-amounts").val();
      s-= $("#edit-swimming").val();
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
    }
  });

  $("#edit-shuttle").click(function() {
    //alert($("#edit-outstanding-value").val());
    var s = Number($("#edit-amounts").val());

    if($("#edit-shuttle").is(':checked')) {
      s = $("#edit-amounts").val();
      s = Number(s) + Number($("#edit-shuttle").val());
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
    }
    else {
      s = $("#edit-amounts").val();
      s-= $("#edit-shuttle").val();
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
    }
  });


  $("#edit-advance-value").blur(function() {
    //alert($("#edit-advance-value").val());

    if (isNaN($("#edit-advance-value").val())) {
      alert("Please enter a valid amount");
      $("#edit-advance-value").val("");
      //$('#edit-advance-value').focus();      
      history.go(0);
    }

    else {
      var flag = Math.abs(Number($("#edit-advance-value").val()));
      var s = (Number($("#edit-amounts").val()) + flag) - temp;
      temp = flag;
      s=s.toFixed(2);
      $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
    }
  });

  $("input[type='radio']").change(function() {
    var s = $("#edit-amounts").val();
    var flag = $('input:radio[name=gymnasium_radio]:checked').val();
    s = Number(s) - Number(gym) + Number(flag);
    gym = flag;
      s=s.toFixed(2);
    $("#edit-amounts").val(s);
      //$('input[name="amount"]').val($("#edit-amounts").val());
        $('input[name="amount"]').val($("#edit-amounts").val());
  });
  
});

})(jQuery);
