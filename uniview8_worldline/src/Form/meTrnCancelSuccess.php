<?php
	/**
	 * This Is the Kit File To Be Included For Transaction Request/Response
	 */
	include 'AWLMEAPI.php';

	//create an Object of the above included class
	$obj = new AWLMEAPI();
	
	//This is the Merchant Key that is used for decryption also
	$enc_key = $_REQUEST['encKey'];
	
	/* This is the request Object */
	$reqMsgDTO = new ReqMsgDTO();

	/* Populate the mandatory fields for the request*/
	// Merchant unique order id
	$reqMsgDTO->setOrderId($_REQUEST['orderId']);
	// PG MID
	$reqMsgDTO->setMid($_REQUEST['mId']);
	// PG transaction reference number
	$reqMsgDTO->setPgMeTrnRefNo($_REQUEST['txnRefNo']);
	// Merchant encryption key
	$reqMsgDTO->setEnckey($enc_key);
	// Optional additional fields for merchant
	$reqMsgDTO->setAddField1($_REQUEST['addField1']);
	$reqMsgDTO->setAddField2($_REQUEST['addField2']);
	//$reqMsgDTO->setAddField3($_REQUEST['addField3']);
	//$reqMsgDTO->setAddField4($_REQUEST['addField4']);
	//$reqMsgDTO->setAddField5($_REQUEST['addField5']);
	//$reqMsgDTO->setAddField6($_REQUEST['addField6']);
	//$reqMsgDTO->setAddField7($_REQUEST['addField7']);
	//$reqMsgDTO->setAddField8($_REQUEST['addField8']);
	
	
	/* Make the corresponding request for cancel transaction */
	// Call canellation method 
	$resMsgDTO = $obj->cancelTransaction($reqMsgDTO);	
	// Read cancellation response
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
<center> <H3> Cancel Transaction Status </H3></center>
<table>
	<tr><!-- PG Transaction reference number-->
		<td><label for="txnRefNo">Transaction Ref No. :</label></td>
		<td><?php echo $resMsgDTO->getPgMeTrnRefNo();?></td>
		<!-- Merchant unique order id-->
		<td><label for="orderId">Order No. :</label></td>
		<td><?php echo $resMsgDTO->getOrderId();?></td>
	</tr>
	<tr><!-- Cancellation request id-->
		<td><label for="cancelReqID">Cancel Request Id :</label></td>
		<td><?php echo $resMsgDTO->getPgRefCancelReqId();?></td>
		<!-- Cancellation status code-->
		<td><label for="statusCode">Status Code :</label></td>
		<td><?php echo $resMsgDTO->getStatusCode();?></td>
		
		<!-- Cancellation status description-->
		<td><label for="statusDesc">Status Desc :</label></td>
		<td><?php echo $resMsgDTO->getStatusDesc();?></td>
	</tr>
	
	<tr>	<!-- Optional additional fields for merchant-->
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