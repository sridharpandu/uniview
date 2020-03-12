<?php

namespace Drupal\uniview8_airpay\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\SafeMarkup;

class uniview8_airpayResponse extends FormBase {

  public function getFormId() {
    return 'uniview8_airpay';
  }


public function buildForm(array $form, FormStateInterface $form_state) {

//$RRN = \Drupal::request()->request->get('RRN');

$TRANSACTIONID = trim($_POST['TRANSACTIONID']);
$APTRANSACTIONID  = trim($_POST['APTRANSACTIONID']);
$AMOUNT  = trim($_POST['AMOUNT']);
$TRANSACTIONSTATUS  = trim($_POST['TRANSACTIONSTATUS']);
$MESSAGE  = trim($_POST['MESSAGE']);
$ap_SecureHash = trim($_POST['ap_SecureHash']);
$CUSTOMVAR  = trim($_POST['CUSTOMVAR']);

//drupal_set_message($TRANSACTIONID.' '.$APTRANSACTIONID.' '.$TRANSACTIONSTATUS.' '.$MESSAGE.' '.$ap_SecureHash.' '.$CUSTOMVAR);

$query = db_select('uniview8_airpay_response')
			->fields('uniview8_airpay_response')
			->condition('airpay_orderid', $TRANSACTIONID, '=')
			->execute()->FetchAssoc();

if ($TRANSACTIONSTATUS == '200') {
$sts = 'S';
}
else if($TRANSACTIONSTATUS == '502')
{
$sts = 'C';
}
else
{
$sts = 'F';
}

	$updatequery = db_update('uniview8_airpay_response')
		->fields(array(
		'airpay_txnid' => $TRANSACTIONID,
                'airpay_apitrnno' => $APTRANSACTIONID,
		'airpay_status' => $sts,
		'airpay_statusDesc' => $MESSAGE,
		))
		->condition('airpay_orderid',$TRANSACTIONID,'=')
		->execute();
/*
$form['details'] = array(
       '#type' => 'markup',
      '#markup' =>'
                    <table bgcolor="#FFF">
                        <b><h1>Transaction Details </h1></b>
                        <tr><td>Name</td><td>'.$query['airpay_firstname'] .' </td></tr>
                        <tr><td>Member Id</td><td>'.$query['airpay_memberid'] .' </td></tr>
                      */
if ($TRANSACTIONSTATUS == '200') {

           	drupal_set_message('Payment Done Successfully!');

$form['details'] = array(
       '#type' => 'markup',
      '#markup' =>
                    '<table>
			<tr><td>Name</td><td> '.$query["airpay_firstname"].' </td></tr>
			<tr><td>TRANSACTIONID:</td><td> '.$TRANSACTIONID.'</td></tr>
			<tr><td>AMOUNT:</td><td> '.$AMOUNT.'</td></tr>
			</table>'
    );
           }
           else if ($TRANSACTIONSTATUS == '502'){
           	drupal_set_message("Transaction Failed,  You've cancelled the Transaction", 'error');
           } else {
           	drupal_set_message('Transaction Failed', 'error');
           }

	 return $form;
	}

function submitForm(array &$form, FormStateInterface $form_state ){

return;
	}
	}





