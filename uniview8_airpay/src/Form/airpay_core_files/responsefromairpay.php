<?php
date_default_timezone_set('Asia/Kolkata');

header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );

include('config.php');

// This is landing page where you will receive response from airpay. 
// The name of the page should be as per you have configured in airpay system
// All columns are mandatory

$TRANSACTIONID = trim($_POST['TRANSACTIONID']);
$APTRANSACTIONID  = trim($_POST['APTRANSACTIONID']);
$AMOUNT  = trim($_POST['AMOUNT']);
$TRANSACTIONSTATUS  = trim($_POST['TRANSACTIONSTATUS']);
$MESSAGE  = trim($_POST['MESSAGE']);
$ap_SecureHash = trim($_POST['ap_SecureHash']);
$CUSTOMVAR  = trim($_POST['CUSTOMVAR']);



$error_msg = '';
if(empty($TRANSACTIONID) || empty($APTRANSACTIONID) || empty($AMOUNT) || empty($TRANSACTIONSTATUS) || empty($ap_SecureHash)){
// Reponse has been compromised. So treat this transaction as failed.
if(empty($TRANSACTIONID)){ $error_msg = 'TRANSACTIONID '; } 
if(empty($APTRANSACTIONID)){ $error_msg .=  ' APTRANSACTIONID'; }
if(empty($AMOUNT)){ $error_msg .=  ' AMOUNT'; }
if(empty($TRANSACTIONSTATUS)){ $error_msg .=  ' TRANSACTIONSTATUS'; }
if(empty($ap_SecureHash)){ $error_msg .=  ' ap_SecureHash'; }
$error_msg .= '<tr><td>Variable(s) '. $error_msg.' is/are empty.</td></tr>';

//exit();
}

//THIS IS ADDITIONAL VALIDATION, YOU MAY USE IT.
//$SYSTEM_AMOUNT is amount you will fetch from your database/system against $TRANSACTIONID
//if( $AMOUNT != $SYSTEM_AMOUNT){
// Reponse has been compromised. So treat this transaction as failed.
//$error_msg .= '<tr><td>Amount mismatch in the system.</td></tr>';
//exit();
//}

// Generating Secure Hash
// $mercid = 	Merchant Id, $username = username
// You will find above two keys on the settings page, which we have defined here in config.php
$merchant_secure_hash = sprintf("%u", crc32 ($TRANSACTIONID.':'.$APTRANSACTIONID.':'.$AMOUNT.':'.$TRANSACTIONSTATUS.':'.$MESSAGE.':'.$mercid.':'.$username));

//comparing Secure Hash with Hash sent by Airpay
if($ap_SecureHash != $merchant_secure_hash){
// Reponse has been compromised. So treat this transaction as failed.
$error_msg .= '<tr><td>Secure Hash mismatch.</td></tr>';
//exit();
}

if($error_msg){
echo '<table><font color="red"><b>ERROR:</b> '.$error_msg.'</font></table>';
echo '<table>
<tr><td>Variable Name</td><td> Value</td></tr>
<tr><td>TRANSACTIONID:</td><td> '.$TRANSACTIONID.'</td></tr>
<tr><td>APTRANSACTIONID:</td><td> '.$APTRANSACTIONID.'</td></tr>
<tr><td>AMOUNT:</td><td> '.$AMOUNT.'</td></tr>
<tr><td>TRANSACTIONSTATUS:</td><td> '.$TRANSACTIONSTATUS.'</td></tr>
<tr><td>CUSTOMVAR:</td><td> '.$CUSTOMVAR.'</td></tr>

</table>';

exit();
}//if($error_msg)


if($TRANSACTIONSTATUS == 200){
echo '<table><tr><td>Success Transaction</td></tr></table>
<table>
<tr><td>Variable Name</td><td> Value</td></tr>
<tr><td>TRANSACTIONID:</td><td> '.$TRANSACTIONID.'</td></tr>
<tr><td>APTRANSACTIONID:</td><td> '.$APTRANSACTIONID.'</td></tr>
<tr><td>AMOUNT:</td><td> '.$AMOUNT.'</td></tr>
<tr><td>TRANSACTIONSTATUS:</td><td> '.$TRANSACTIONSTATUS.'</td></tr>
<tr><td>MESSAGE:</td><td> '.$MESSAGE.'</td></tr>
<tr><td>CUSTOMVAR:</td><td> '.$CUSTOMVAR.'</td></tr>

</table>';
// Process Successfull transaction
}else{
echo '<table><tr><td>Failed Transaction</td></tr></table>
<table>
<tr><td>Variable Name</td><td> Value</td></tr>
<tr><td>TRANSACTIONID:</td><td> '.$TRANSACTIONID.'</td></tr>
<tr><td>APTRANSACTIONID:</td><td> '.$APTRANSACTIONID.'</td></tr>
<tr><td>AMOUNT:</td><td> '.$AMOUNT.'</td></tr>
<tr><td>TRANSACTIONSTATUS:</td><td> '.$TRANSACTIONSTATUS.'</td></tr>
<tr><td>MESSAGE:</td><td> '.$MESSAGE.'</td></tr>
<tr><td>CUSTOMVAR:</td><td> '.$CUSTOMVAR.'</td></tr>

</table>';
// Process Failed Transaction
}


?>