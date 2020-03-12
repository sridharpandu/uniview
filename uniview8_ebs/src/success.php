<?php

  
         $insurl 	= "https://www.instamojo.com/api/1.1/";
         $apikey	="14fccd7af1e152f47db1b0e7125cb389";
         $authtoken	="7483812d14af9ba2aa10fbc1b2d0c957";

 
    
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

<form action= "<?php echo $long_url   ?>" name="payuForm">
<input type="submit" value="Submit" /></td>   
</form>



 
