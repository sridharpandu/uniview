<?php

namespace Drupal\uniview8_airpay\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\SafeMarkup;
use \Drupal\Core\Url;

class uniview8_airpay_process extends FormBase {

  public function getFormId() {
    return 'uniview8_airpay';
  }


public function buildForm(array $form, FormStateInterface $form_state) {

$airpay_amount = \Drupal::request()->query->get('amount');
$airpay_username = \Drupal::request()->query->get('name');
$airpay_email = \Drupal::request()->query->get('email');
$airpay_phone = \Drupal::request()->query->get('mobilenumber');
$airpay_billdate = \Drupal::request()->query->get('billdate');
$airpay_userid = \Drupal::request()->query->get('userid');
$airpay_orderid = \Drupal::request()->query->get('OrderId');
$airpay_billnumber = \Drupal::request()->query->get('billnumber');

$mid= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.M_key');
$meTransReqType='S';
$enckey= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.Enc_key');
$responseUrl = \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.Success_URL');
$currencyName     = 'INR';

airpayStorage::insert(SafeMarkup::checkPlain($airpay_amount), SafeMarkup::checkPlain($airpay_username),SafeMarkup::checkPlain($airpay_email),SafeMarkup::checkPlain($airpay_phone),SafeMarkup::checkPlain($airpay_billdate),SafeMarkup::checkPlain($airpay_billnumber),SafeMarkup::checkPlain($airpay_userid),SafeMarkup::checkPlain($airpay_orderid));

	 return $form;
	}


function submitForm(array &$form, FormStateInterface $form_state ){
   	$request= Request::createFromGlobals();
	 
	 $mid= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.M_key');
$meTransReqType='S';
$enckey= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.Enc_key');

$responseUrl = \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.Success_URL');
$currencyName     = 'INR';
$airpay_orderid = \Drupal::request()->query->get('OrderId');
$airpay_amount = \Drupal::request()->query->get('amount');

  $parameters = ['enckey' => $enckey,'currencyName' => $currencyName,'responseUrl' => $responseUrl,'mid' => $mid,'OrderId' => $airpay_orderid,'meTransReqType' => $meTransReqType,'amount' => $airpay_amount,];
 
   
  
 $redirect_method='get';

  $form_state->setRedirectUrl(Url::fromUri('internal:' . '/modules/uniview8_airpay/src/Form/airpayPay.php', $parameters,$redirect_method));
return;
	}
	
	}





