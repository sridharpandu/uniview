<html>
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>


  <style>
    body { font-family: "Trebuchet MS", "Myriad Pro", "Bitstream Vera Sans", FreeSans, sans-serif;}
    .onlytext { display : block; width : 100%; text-align : center; font-family: 'Open Sans', sans-serif; font-size : 2em; font-weight: 300; margin-top : 10%; 
color : #00adef; }
    .colour1 {color: #1c3f95; }
    td { display : none;}
  </style>


<script>
  function submitinstamojoForm() {
      var instamojo = document.forms.instamojo;
      instamojo.submit();
    }
  </script>


<body onload="submitinstamojoForm();" >
    <div class="onlytext"><span class="colour1">Connecting to Payment Gateway,</span> Please wait.</div>
    <br/>
</body>

</html>

<?php
  /*
         $insurl 	= "https://www.instamojo.com/api/1.1/";
         $apikey	="14fccd7af1e152f47db1b0e7125cb389";
         $authtoken	="7483812d14af9ba2aa10fbc1b2d0c957";
*/
 

  $insurl 	= $_POST['insurl'];
  $apikey	= $_POST['apikey'];
  $authtoken	= $_POST['authtoken'];

    
  $purpose          = $_POST['purpose'];
  $amount           = $_POST['insgustamt'];
  $mobilenumber     = $_POST['insmobno'];
  $email            = $_POST['insemail'];
  $buyer_name       = $_POST['insbuyname']; 
  
  
  $postData = array(
    'purpose' => $purpose,
    'amount' => $amount,
    'phone' => $mobilenumber,
    'email' => $email,
    'send_sms' => "True",
    'send_email' => "True",
    'buyer_name' => $buyer_name,
    'allow_repeated_payments' => "false",
    
   );
  
  $url = $insurl . 'payment-requests/';
  $ch  = curl_init();
  curl_setopt_array( $ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERPWD => 'bipinpg4me:startpg4me',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData 
   ));
  
  $headers   = array();
  $headers[] = 'X-Api-Key:' . $apikey;
  $headers[] = 'X-Auth-Token:' . $authtoken;
  
  curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
  $output = curl_exec( $ch );
  
  if ( curl_errno( $ch ) ) {
    echo 'error:' . curl_error( $ch );
  }
  curl_close( $ch );
  
  $pay_req = json_decode( $output, true );
  

  
  $long_url = $pay_req['payment_request']['longurl'];
  $long_url .= '?embed=form';



?>

<form action= "<?php echo $long_url   ?>" name="instamojo">
</form>



 
