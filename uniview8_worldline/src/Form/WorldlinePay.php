<?php
	/**
	 * This Is the Kit File To Be Included For Transaction Request
	 */
	include 'AWLMEAPI.php';
	
	//create an Object of the above included class
	$obj = new AWLMEAPI();

	//create an object of Request Message
	$reqMsgDTO = new ReqMsgDTO();

	/* Populate the above DTO Object On the Basis Of The Received Values */
	// PG MID
	$reqMsgDTO->setMid($_REQUEST['mid']);
	// Merchant Unique order id
	$reqMsgDTO->setOrderId($_REQUEST['OrderId']);
	//Transaction amount in paisa format
	$reqMsgDTO->setTrnAmt($_REQUEST['amount']);
	//Transaction remarks
	$reqMsgDTO->setTrnRemarks("This txn has to be done ");
	// Merchant transaction type (S/P/R)
	$reqMsgDTO->setMeTransReqType($_REQUEST['meTransReqType']);
	// Merchant encryption key
	$reqMsgDTO->setEnckey($_REQUEST['enckey']);
	// Merchant transaction currency
	$reqMsgDTO->setTrnCurrency($_REQUEST['currencyName']);
	
	// Merchant response URl
	$reqMsgDTO->setResponseUrl($_REQUEST['responseUrl']);
	
	/* 
	 * After Making Request Message Send It To Generate Request 
	 * The variable `$urlParameter` contains encrypted request message
	 */
	 //Generate transaction request message
	$merchantRequest = "";
	
	$reqMsgDTO = $obj->generateTrnReqMsg($reqMsgDTO);
	
	if ($reqMsgDTO->getStatusDesc() == "Success"){
		$merchantRequest = $reqMsgDTO->getReqMsg();
	}
?>


<form action="https://cgt.in.worldline.com/ipg/doMEPayRequest" method="POST" name="txnSubmitFrm">
	<h3 align="center" style="color: Blue">Redirecting To Payment Please Wait..</h3>
	<h4 align="center" style="color: Red">Please Do Not Press Back Button OR Refresh Page</h4>
	<input type="hidden" size="200" name="merchantRequest" id="merchantRequest" value="<?php echo $merchantRequest; ?>"  />
	<input type="hidden" name="MID" id="MID" value="<?php echo $reqMsgDTO->getMid(); ?>"/>
	<!--input type="text" name="test" value="<?php echo $_REQUEST['mid']; ?> ">
	<input type="text" name="test" value="<?php echo $_REQUEST['OrderId']; ?> ">
	<input type="text" name="test" value="<?php echo $_REQUEST['amount']; ?> ">
	<input type="text" name="test" value="<?php echo $_REQUEST['meTransReqType']; ?> ">
	<input type="text" name="test" value="<?php echo $_REQUEST['enckey']; ?> ">
	<input type="text" name="test" value="<?php echo $_REQUEST['currencyName']; ?> ">
	<input type="text" name="test" value="<?php echo $_REQUEST['responseUrl']; ?> ">
	<input type="submit"-->
	</form>
<script  type="text/javascript">
	//submit the form to the worldline
	document.txnSubmitFrm.submit();
</script>
