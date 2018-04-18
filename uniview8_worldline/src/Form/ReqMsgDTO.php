<?php


class ReqMsgDTO { 

	private $mid;
	private $orderId;
   	private $trnAmt;
	private $trnCurrency;
	private $trnRemarks;
	private $meTransReqType;
	private $recurrPeriod; 
	private $recurrDay;
	private $noOfRecurring;
	private $responseUrl;
	private $addField1;
	private $addField2;
	private $addField3;
	private $addField4;
	private $addField5;
	private $addField6;
	private $addField7;
	private $addField8;
	private $addField9;
	private $addField10;
	private $reqMsg;
	private $statusDesc;
	private $enckey;
	private $shippingCharges;
	private $taxAmount;
	private $grossTrnAmt;
	private $payTypeCode;
	private $cardNumber;
	private $expiryDate;
	private $nameOnCard;
	private $cvv;
	private $pgMeTrnRefNo;
	private $cancelRefundFlag;
	private $refundAmt;
	private $netBankCode;
		
public function getMid() {
	return $this->mid;
}


public function setMid($mid) {
	$this->mid = $mid;
}
		
	
public function getOrderId() {
	return $this->orderId;
}

public function setOrderId($orderId) {
	$this->orderId = $orderId;
}

public function getTrnAmt() {
	return $this->trnAmt;
}

public function setTrnAmt($trnAmt) {
	$this->trnAmt = $trnAmt;
}

public function getTrnCurrency() {
	return $this->trnCurrency;
}

public function setTrnCurrency($trnCurrency) {
	$this->trnCurrency = $trnCurrency;
}

public function getTrnRemarks() {
	return $this->trnRemarks;
}

public function setTrnRemarks($trnRemarks) {
	$this->trnRemarks = $trnRemarks;
}

public function getMeTransReqType() {
	return $this->meTransReqType;
}

public function setMeTransReqType($meTransReqType) {
	$this->meTransReqType = $meTransReqType;
}

public function getRecurrPeriod() {
	return $this->recurrPeriod;
}

public function setRecurrPeriod($recurrPeriod) {
	$this->recurrPeriod = $recurrPeriod;
}

public function getRecurrDay() {
	return $this->recurrDay;
}

public function setRecurrDay($recurrDay) {
	$this->recurrDay = $recurrDay;
}

public function getNoOfRecurring() {
	return $this->noOfRecurring;
}

public function setNoOfRecurring($noOfRecurring) {
	$this->noOfRecurring = $noOfRecurring;
}

public function getResponseUrl() {
	return $this->responseUrl;
}

public function setResponseUrl($responseUrl) {
	$this->responseUrl = $responseUrl;
}

public function getAddField1() {
	return $this->addField1;
}

public function setAddField1($addField1) {
	$this->addField1 = $addField1;
}

public function getAddField2() {
	return $this->addField2;
}

public function setAddField2($addField2) {
	$this->addField2 = $addField2;
}

public function getAddField3() {
	return $this->addField3;
}

public function setAddField3($addField3) {
	$this->addField3 = $addField3;
}

public function getAddField4() {
	return $this->addField4;
}

public function setAddField4($addField4) {
	$this->addField4 = $addField4;
}
public function getAddField5() {
	return $this->addField5;
}

public function setAddField5($addField5) {
	$this->addField5 = $addField5;
}

public function getAddField6() {
	return $this->addField6;
}

public function setAddField6($addField6) {
	$this->addField6 = $addField6;
}

public function getAddField7() {
	return $this->addField7;
}

public function setAddField7($addField7) {
	$this->addField7 = $addField7;
}

public function getAddField8() {
	return $this->addField8;
}

public function setAddField8($addField8) {
	$this->addField8 = $addField8;
}

public function getAddField9() {
	return $this->addField9;
}

public function setAddField9($addField9) {
	$this->addField9 = $addField9;
}

public function getAddField10() {
	return $this->addField10;
}

public function setAddField10($addField10) {
	$this->addField10 = $addField10;
}

public function getReqMsg() {
	return $this->reqMsg;
}

public function setReqMsg($reqMsg) {
	$this->reqMsg = $reqMsg;
}

public function getStatusDesc() {
	return $this->statusDesc;
}

public function setStatusDesc($statusDesc) {
	$this->statusDesc = $statusDesc;
}

public function getEnckey() {
	return $this->enckey;
}

public function setEnckey($enckey) {
	$this->enckey = $enckey;
}

public function getShippingCharges() {
	return $this->shippingCharges;
}

public function setShippingCharges($shippingCharges) {
	$this->shippingCharges = $shippingCharges;
}

public function getTaxAmount() {
	return $this->taxAmount;
}

public function setTaxAmount($taxAmount) {
	$this->taxAmount = $taxAmount;
}

public function getGrossTrnAmt() {
	return $this->grossTrnAmt;
}

public function setGrossTrnAmt($grossTrnAmt) {
	$this->grossTrnAmt = $grossTrnAmt;
}

public function getPayTypeCode() {
	return $this->payTypeCode;
}

public function setPayTypeCode($payTypeCode) {
	$this->payTypeCode = $payTypeCode;
}

public function getCardNumber() {
	return $this->cardNumber;
}

public function setCardNumber($cardNumber) {
	$this->cardNumber = $cardNumber;
}

public function getExpiryDate() {
	return $this->expiryDate;
}

public function setExpiryDate($expiryDate) {
	$this->expiryDate = $expiryDate;
}

public function getNameOnCard() {
	return $this->nameOnCard;
}

public function setNameOnCard($nameOnCard) {
	$this->nameOnCard = $nameOnCard;
}

public function getCvv() {
	return $this->cvv;
}

public function setCvv($cvv) {
	$this->cvv = $cvv;
}

public function getPgMeTrnRefNo() {
	return $this->pgMeTrnRefNo;
}

public function setPgMeTrnRefNo($pgMeTrnRefNo) {
	$this->pgMeTrnRefNo = $pgMeTrnRefNo;
}

public function getCancelRefundFlag() {
	return $this->cancelRefundFlag;
}

public function setCancelRefundFlag($cancelRefundFlag) {
	$this->cancelRefundFlag = $cancelRefundFlag;
}

public function getRefundAmt() {
	return $this->refundAmt;
}

public function setRefundAmt($refundAmt) {
	$this->refundAmt = $refundAmt;
}

public function getNetBankCode() {
	return $this->netBankCode;
}

public function setNetBankCode($netBankCode) {
	$this->netBankCode = $netBankCode;
}

}



?>
