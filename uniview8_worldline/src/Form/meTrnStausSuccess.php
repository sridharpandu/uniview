<?php
	/**
	 * This Is the Kit File To Be Included For Transaction Request/Reponse
	 */
	include 'AWLMEAPI.php';

	//create an Object of the above included class
	$obj = new AWLMEAPI();
	
	$orderId = $_REQUEST['hdnOrderID'];
	$pgMeTrnRefNo = $_REQUEST['trnRefNo'];

	//This is the Unique Merchant Id
	$mId = $_REQUEST['mid'];

	//This is the Merchant Key that is used for decryption also
	$enc_key = $_REQUEST['encKey'];
	
	//create a request for generate transaction status
	$resMsgDTO = $obj->getTransactionStatus( $mId , $orderId , $pgMeTrnRefNo , $enc_key);
	
?>
<style>
body{
font-family:Verdana, sans-serif	;
font-size::12px;
}
.wrapper{
width:980px;
margin:0 auto;	
}
table{

}
tr{
	padding:5px
}
td{
padding:5px;	
}
input{
padding:5px;	
}
</style>
<table>
<center> <H3> Transaction Status </H3></center>
	<table>
		<tr>
			<td><label for="txnRefNo">Transaction Ref No. :</label></td>
			<td><?php echo $resMsgDTO->getPgMeTrnRefNo();?></td>
			
			<td><label for="orderId">Order No. :</label></td>
			<td><?php echo $resMsgDTO->getOrderId();?></td>
			
			<td><label for="amount">Amount :</label></td>
			<td><?php echo $resMsgDTO->getTrnAmt();?></td>
		</tr>
		<tr>
			<td><label for="statusCode">Status Code :</label></td>
			<td><?php echo $resMsgDTO->getStatusCode();?></td>
			
			<td><label for="statusDesc">Status Desc :</label></td>
			<td><?php echo $resMsgDTO->getStatusDesc();?></td>
			
			<td><label for="txnReqDate">Transaction Request Date :</label></td>
			<td><?php echo $resMsgDTO->getTrnReqDate();?></td>
		</tr>
		<tr>
			<td><label for="responseCode">Response Code :</label></td>
			<td><?php echo $resMsgDTO->getResponseCode();?></td>
			
			<td><label for="statusDesc">RRN :</label></td>
			<td><?php echo $resMsgDTO->getRrn();?></td>
			
			<td><label for="authZStatus">AuthZCode :</label></td>	
			<td><?php echo $resMsgDTO->getAuthZCode();?></td>
		</tr>
		<tr>	
			<td><label for="addField1">Add Field 1 :</label></td>
			<td><?php echo $resMsgDTO->getAddField1();?></td>

			<td><label for="addField2">Add Field 2 :</label></td>
			<td><?php echo $resMsgDTO->getAddField2();?></td>
			
			<td><label for="addField3">Add Field 3 :</label></td>
			<td><?php echo $resMsgDTO->getAddField3();?></td>
		</tr>
		<tr>	
			<td><label for="addField4">Add Field 4 :</label></td>
			<td><?php echo $resMsgDTO->getAddField4();?></td>
			
			<td><label for="addField5">Add Field 5 :</label></td>
			<td><?php echo $resMsgDTO->getAddField5();?></td>
			
			<td><label for="addField6">Add Field 6 :</label></td>
			<td><?php echo $resMsgDTO->getAddField6();?></td>	
		</tr>
		<tr>	
			<td><label for="addField7">Add Field 7 :</label></td>
			<td><?php echo $resMsgDTO->getAddField7();?></td>
			
			<td><label for="addField8">Add Field 8 :</label></td>
			<td><?php echo $resMsgDTO->getAddField8();?></td>
		</tr>

	</table>
</table>
