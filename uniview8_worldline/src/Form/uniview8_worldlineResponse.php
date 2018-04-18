<?php

namespace Drupal\uniview8_worldline\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\SafeMarkup;

class uniview8_worldlineResponse extends FormBase {

  public function getFormId() {
    return 'uniview8_worldline';
  }


public function buildForm(array $form, FormStateInterface $form_state) {


$trntype = \Drupal::request()->request->get('trntype');
$trnrefno = \Drupal::request()->request->get('trnrefno');
$AuthZcode = \Drupal::request()->request->get('AuthZcode');
$AuthZstatus = \Drupal::request()->request->get('AuthZstatus');
$AuthNstatus = \Drupal::request()->request->get('AuthNstatus');
$Respcode = \Drupal::request()->request->get('Respcode');
$statuscode = \Drupal::request()->request->get('statuscode');
$statusDesc = \Drupal::request()->request->get('statusDesc');
$trntime = \Drupal::request()->request->get('TrnReqDate');
$orderid = \Drupal::request()->request->get('OrderId');
$Card = \Drupal::request()->request->get('cardno');
$scheme = \Drupal::request()->request->get('scheme');
$trntype = \Drupal::request()->request->get('trntype');
$RRN = \Drupal::request()->request->get('RRN');

$query = db_select('uniview8_worldline_response')
			->fields('uniview8_worldline_response')
			->condition('worldline_orderid', $orderid, '=')
			->execute()->FetchAssoc();


	$updatequery = db_update('uniview8_worldline_response')
		->fields(array(
		'worldline_trntype' => $trntype,
		'worldline_txnid' => $trnrefno,
		'worldline_AuthZcode' => $AuthZcode,
    'worldline_AuthZstatus' => $AuthZstatus,
    'worldline_AuthNstatus' => $AuthNstatus,
		'worldline_Respcode' => $Respcode,
		'worldline_status' => $statuscode,
		'worldline_statusDesc' => $statusDesc,
		'worldline_trntime' => $trntime,
    'worldline_trntype' => $trntype,
    'worldline_RRN' => $RRN,
    'worldline_cardno' => $Card,
    'worldline_scheme' => $scheme,
		))
		->condition('worldline_orderid',$orderid,'=')
		->execute();

/*$form['details'] = array(
       '#type' => 'markup',
      '#markup' =>'
                    <table bgcolor="#FFF">
                        <b><h1>Transaction Details </h1></b>
                        <tr><td>Name</td><td>'.$query['worldline_firstname'] .' </td></tr>
                        <tr><td>Member Id</td><td>'.$query['worldline_memberid'] .' </td></tr>
                        <tr><td>Mobile Number</td><td>'.$query['worldline_phone'] .' </td></tr>
                        <tr><td>E-Mail</td><td>'.$query['worldline_email'] .' </td></tr>
                        <tr><td>Bill Date</td><td>'.$query['worldline_billdate'] .' </td></tr>
                        <tr><td>Bill Number</td><td>'.$query['worldline_billnumber'] .' </td></tr>
                        <tr><td>Order ID</td><td>'. $query['worldline_orderid']  .' </td></tr>
                        <tr><td>Transaction Reference No.</td><td>'. $trnrefno  .' </td></tr>
                        <tr><td>Card No.</td><td>'. $Card  .' </td></tr>
                        <tr><td>Transaction Type</td><td>'. $trntype  .' </td></tr>
                        <tr><td>Transaction Scheme</td><td>'. $scheme  .' </td></tr>
                        <tr><td>Transaction DateTime</td><td>'. $trntime  .' </td></tr>
                        <tr><td><b>Transaction Amount</td></b><td><b>'. $query['worldline_amount'] .'</b> Rupees</td></tr>
                    </table>'
    );*/

if ($statuscode == 'S' && $updatequery) {

           	drupal_set_message('Payment Done Successfully!');



           }           
           else if ($statuscode == 'F' && $statusDesc == "Transaction cancelled by user"){
           	drupal_set_message("Transaction Failed,  You've cancelled the Transaction", 'error');
           	
           	
           } else {
           	drupal_set_message('Transaction Failed', 'error');
           	drupal_set_message($statuscode);
           }

	 return $form;
	}

function submitForm(array &$form, FormStateInterface $form_state ){

return;
	}
	}





