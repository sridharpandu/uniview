<?php

namespace Drupal\uniview8_worldline\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\SafeMarkup;
use \Drupal\Core\Url;

class uniview8_worldline_process extends FormBase {

  public function getFormId() {
    return 'uniview8_worldline';
  }


public function buildForm(array $form, FormStateInterface $form_state) {

$worldline_amount = \Drupal::request()->query->get('amount');
$worldline_username = \Drupal::request()->query->get('name');
$worldline_email = \Drupal::request()->query->get('email');
$worldline_phone = \Drupal::request()->query->get('mobilenumber');
$worldline_billdate = \Drupal::request()->query->get('billdate');
$worldline_userid = \Drupal::request()->query->get('userid');
$worldline_orderid = \Drupal::request()->query->get('OrderId');
$worldline_billnumber = \Drupal::request()->query->get('billnumber');

$mid= \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.M_key');
$meTransReqType='S';
$enckey= \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.Enc_key');
//$responseUrl="http://mytesting.com/modules/uniview8/uniview8_worldline/src/Form/uniview8_worldline.php";
$responseUrl = \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.Success_URL');
$currencyName     = 'INR';

worldlineStorage::insert(SafeMarkup::checkPlain($worldline_amount), SafeMarkup::checkPlain($worldline_username),SafeMarkup::checkPlain($worldline_email),SafeMarkup::checkPlain($worldline_phone),SafeMarkup::checkPlain($worldline_billdate),SafeMarkup::checkPlain($worldline_billnumber),SafeMarkup::checkPlain($worldline_userid),SafeMarkup::checkPlain($worldline_orderid));

/*
  $form['#action']= '/worldline';
        $form['#method']= 'GET';

   	$form['submit']= array(
	      '#type' => 'submit',
	      '#value' => t('Proceed To Pay'),
	    );        
  */

	 return $form;
	}


function submitForm(array &$form, FormStateInterface $form_state ){
/**
 $request= Request::createFromGlobals();
	   
  $parameters =['OrderId' => $form_state->getValue('OrderId'),'amount' => $form_state->getValue('amount'),];
 
   
  
 $redirect_method='POST';

  $form_state->setRedirectUrl(Url::fromUri('internal:' . '/request', $parameters,$redirect_method));


**/

   	$request= Request::createFromGlobals();
	 
	 $mid= \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.M_key');
$meTransReqType='S';
$enckey= \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.Enc_key');
//$responseUrl="http://mytesting.com/modules/uniview8/uniview8_worldline/src/Form/uniview8_worldline.php";
$responseUrl = \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.Success_URL');
$currencyName     = 'INR';
$worldline_orderid = \Drupal::request()->query->get('OrderId');
$worldline_amount = \Drupal::request()->query->get('amount');

  $parameters = ['enckey' => $enckey,'currencyName' => $currencyName,'responseUrl' => $responseUrl,'mid' => $mid,'OrderId' => $worldline_orderid,'meTransReqType' => $meTransReqType,'amount' => $worldline_amount,];
 
   
  
 $redirect_method='get';

  $form_state->setRedirectUrl(Url::fromUri('internal:' . '/modules/uniview8_worldline/src/Form/WorldlinePay.php', $parameters,$redirect_method));
return;
	}
	
	}





