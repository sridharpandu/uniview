<?php
	/**
	 * This Is the Kit File To Be included For Transaction Request/Response
	 */
	include 'AWLMEAPI.php';
	
	//create an Object of the above included class
	$obj = new AWLMEAPI();
	
	/* This is the response Object */
	$resMsgDTO = new ResMsgDTO();

	/* This is the request Object */
	$reqMsgDTO = new ReqMsgDTO();
	
	//This is the Merchant Key that is used for decryption also
	$enc_key = "6375b97b954b37f956966977e5753ee6";
	
	/* Get the Response from the WorldLine */
	$responseMerchant = $_REQUEST['merchantResponse'];
	//$responseMerchant = '617078423BEAEFE45B6E493A07869308CECA2AE4612FEBBE2FF43E319B74A3B7F8A1C9CDE452A0196024B87A7B6B2723FA3CD4561AFE7B3091873F6271D3EC28A5E12ED94D90FBD996871BB24A7CAAB5A7789EC23F2EFC1806162E8AD91C9C60EBEBC928F6FB90CBD6A0303E218A27A4D29F056C7E407063349D6DCD84E27500E4A74A9ABD4242BE2E4C2263FE59C6ED6B25521445F8847AE6203585A169F1714AA255433E1A06CE9D1E6C969A0A272A0CA11F834CBCDA5E77A27581CECA80EF456352898E928C8A955F4062E0F605B9';
	
	$response = $obj->parseTrnResMsg($responseMerchant , $enc_key);
	$s = $response->getAddField10();
	$a = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $s);
	$carddetails = json_decode($a);

?>
<!DOCTYPE html>
<html>
<head>
</head>
<style>
	body{
	font-family:Verdana, sans-serif	;
	font-size::12px;
	background-color: #FFF;
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

/*
form {
	height: 100%;
	width: 900px;
	margin-left: 190px;
	margin-top: 10px;
	border: 1px solid #d5d5d5;
	box-shadow: 0 0 2px #d5d5d5; 
	background-color: #fffcfc;
	border-radius: 3px;
}

.labels{
	font-size: 1.5em;
	font-family:Arial;
	color: #343a35;
	margin-left: 200px;
	line-height: 60px;
}

.labeld{
	font-size: 1.5em;
	font-family: GillSans, Calibri, Trebuchet, sans-serif;
	color: #343a35;
	margin-left: 40px;
	line-height: 60px;
	font-weight: bold;
}

table{
	margin-top: 60px;
}*/
.header{
	font-family: GillSans, Calibri, Trebuchet, sans-serif;
	line-height: 50px;
	text-align: center;
	color: #1960c4;
	text-shadow: 1px 1px 1px #0069ff;
}

.msg{
	color: #d82929;
	text-shadow: 1px 1px 1px #ff0000	;
}

img {
	height: 100px;
	width: 100px;
	box-shadow: 0 0 4px #d5d5d5;
	border-radius: 50px;
	margin-top: 40px;
}

</style>

<form action="/worldline/response" method="POST" name="txnresSubmitFrm" >
<div class="header">
	<h2 class="<?php echo $result; ?>">Redirecting To Site Please Wait</h2>
	<h2 class="msg">Please Do Not Press Back Button OR Refresh Page</h2>
	<!--input type="submit" name="submit" class ="button" value="Go Back"-->
</div>

	<table>
			<tr>
			<input type="hidden" name="trnrefno" value = "<?php echo $response->getPgMeTrnRefNo();?>" >
			</tr>
			<tr>
			<tr>
			<input type="hidden" name="OrderId" value = "<?php echo $response->getOrderId();?> ">
			</tr>
			</tr>
			</div>
			<tr>
			<input type="hidden" name="amount" value = "<?php echo $response->getTrnAmt();?>">
			</tr>
		  <tr>
			<!--<td><label for="statusCode">Status Code :</label></td-->
			<input type="hidden" name="statuscode" value = "<?php echo $response->getStatusCode();?>">
			
			
			<!--<td><label for="statusDesc">Status Desc :</label></td-->
			<input type="hidden" name="statusDesc" value = "<?php echo $response->getStatusDesc();?>">
			
			<td><input type="hidden" name="TrnReqDate" value = "<?php echo $response->getTrnReqDate();?>"></td>
		  </tr>
		  <tr>
			
			<!--<td><label for="responseCode">Response Code :</label></td-->
			<td><input type="hidden" name="Respcode" value = "<?php echo $response->getResponseCode();?>"></td>
			
			
			<!--<td><label for="statusDesc">RRN :</label></td-->
			<td><input type="hidden" name="RRN" value = "<?php echo $response->getRrn();?>"></td>
			
			<!--<td><label for="authZStatus">AuthZCode :</label></td-->	
			<td><input type="hidden" name="AuthZcode" value = "<?php echo $response->getAuthZCode();?>"></td>
			<td><input type="hidden" name="AuthZstatus" value = "<?php echo $response->getAuthNStatus();?>"></td>
			<td><input type="hidden" name="AuthNstatus" value = "<?php echo $response->getAuthZStatus();?>"></td>
		</tr>
		<tr>
			<!--<td><label for="addField1">Add Field 1 :</label></td-->
			<td><input type="hidden" name="addField1" value = "<?php echo $response->getAddField1();?>"></td>

			<!--<td><label for="addField2">Add Field 2 :</label></td-->
			<td><input type="hidden" name="addField2" value = "<?php echo $response->getAddField2();?>"></td>
			
			<!--<td><label for="addField3">Add Field 3 :</label></td-->
			<td><input type="hidden" name="addField3" value = "<?php echo $response->getAddField3();?>"></td>
		</tr>
		<tr>	
<!--				<td><label for="addField4">Add Field 4 :</label></td-->
				<td><input type="hidden" name="addField4" value = "<?php echo $response->getAddField4();?>"></td>
				
	<!--			<td><label for="addField5">Add Field 5 :</label></td-->
				<td><input type="hidden" name="addField5" value = "<?php echo $response->getAddField5();?>"></td>
				
				<!--<td><label for="addField6">Add Field 6 :</label></td-->
				<td><input type="hidden" name="addField6" value = "<?php echo $response->getAddField6();?>"></td>	
			</tr>
			<tr>	
				<!--<td><label for="addField7">Add Field 7 :</label></td-->
				<td><input type="hidden" name="addField7" value = "<?php echo $response->getAddField7();?>"></td>
				
				<!--<td><label for="addField8">Add Field 8 :</label></td-->
				<td><input type="hidden" name="addField8" value = "<?php echo $response->getAddField8();?>"></td>
				<td><input type="hidden" name="trntype" value = "<?php echo $response->getAddField9();?>"></td>
				<td><input type="hidden" name="cardno" value = '<?php echo $carddetails->card;?>'></td>
				<td><input type="hidden" name="scheme" value = '<?php echo $carddetails->scheme;?>'></td>
			</tr>
	
	</table>
</form>
<script type="text/javascript">
document.txnresSubmitFrm.submit();
    </script>
</html>
