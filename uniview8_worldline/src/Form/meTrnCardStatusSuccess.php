<?php
	/**
	 * This Is the Kit File To Be Included For Transaction Request/Response
	 */
	include 'AWLMEAPI.php';
	
	//create an Object of the above included class
	$obj = new AWLMEAPI();
	
	/* This is the response Object */
	$resMsgDTO = new ResMsgDTO();

	/* This is the request Object */
	$reqMsgDTO = new ReqMsgDTO();
	
	//This is the Merchant Key that is used for decryption also
	$enc_key = "4d5390bef3ef1ee3d4a7e77fd42238cb";
	
	/* Get the Response from the WorldLine */
	$responseMerchant = $_REQUEST['merchantResponse'];
	
	$response = $obj->parseTrnResMsg( $responseMerchant , $enc_key );
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
				<tr><!-- PG transaction reference number-->
					<td><label for="txnRefNo">Transaction Ref No.</label></td>
					<td><?php echo $response->getPgMeTrnRefNo();?></td>
					<!-- Merchant Order ID-->
					<td><label for="orderId">Order No.</label></td>
					<td><?php echo $response->getOrderId();?></td>
		
				</tr>

				<tr>	
					<!-- Transaction Amount-->
					<td><label for="txnAmt">Txn Amt</label></td>
					<td><?php echo $response->getTrnAmt();?></td>
					<!-- Transaction status code-->
					<td><label for="txnAmt">Status Code</label></td>
					<td><?php echo $response->getStatusCode();?></td>
					<!-- Transaction status description-->
					<td><label for="txnAmt">Status Desc</label></td>
					<td><?php echo $response->getStatusDesc();?></td>
					
				</tr>
				<tr>	
					<td><label for="addField1">Add Field 1 :</label></td>
					<td><?php echo $response->getAddField1();?></td>

					<td><label for="addField2">Add Field 2 :</label></td>
					<td><?php echo $response->getAddField2();?></td>
					
					<td><label for="addField3">Add Field 3 :</label></td>
					<td><?php echo $response->getAddField3();?></td>
				</tr>
				<tr>	
					<td><label for="addField4">Add Field 4 :</label></td>
					<td><?php echo $response->getAddField4();?></td>
					
					<td><label for="addField5">Add Field 5 :</label></td>
					<td><?php echo $response->getAddField5();?></td>
					
					<td><label for="addField6">Add Field 6 :</label></td>
					<td><?php echo $response->getAddField6();?></td>	
				</tr>
				<tr>	
					<td><label for="addField7">Add Field 7 :</label></td>
					<td><?php echo $response->getAddField7();?></td>
					
					<td><label for="addField8">Add Field 8 :</label></td>
					<td><?php echo $response->getAddField8();?></td>

				</tr>

		</table>