<?php

namespace Drupal\uniview8_airpay\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\SafeMarkup;

class uniview8_airpay extends FormBase {

  public function getFormId() {
    return 'uniview8_airpay';
  }


public function buildForm(array $form, FormStateInterface $form_state) {

$i = 0;
$OrderId = mt_rand(1,9);
do {
    $OrderId .= mt_rand(0, 9);
} while(++$i < 14);


$amount = \Drupal::request()->request->get('amounts'); 
$name       = \Drupal::request()->request->get('firstname');
$buyer_name       = \Drupal::request()->request->get('firstname');
$mobilenumber     = \Drupal::request()->request->get('phone');
$member_id        = \Drupal::request()->request->get('memberid');
$email            = \Drupal::request()->request->get('email');
$billdate         = \Drupal::request()->request->get('billdate');
$billnumber       = \Drupal::request()->request->get('billnumber');
$currencyName     = 'INR';

//drupal_set_message($_GET["firstname"]);

$mid= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.M_key');
$secret= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.secret');
$pwd= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.pwd');
$uname= \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.uname');

//$responseUrl = \Drupal::config('uniview8_airpay.settings')->get('uniview8_airpay.Success_URL');
//$responseUrl = "https://uniview.co.in/modules/uniview8_Airpay/src/Form/airpay_core_files/responsefromairpay.php";


        $form['mercid'] = array(
	      '#type' => 'hidden',
//	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$mid,
	    );

        $form['buyerFirstName'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$buyer_name,
         // '#default_value' =>'Tester',
	    );

    $form['buyerLastName'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$buyer_name,
//          '#default_value' =>'Tester',
	    );

	 	$form['buyerPhone'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$mobilenumber,
	    );


		$form['userid'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$member_id,
	    );

		$form['billnumber'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$billnumber,
	    );

		$form['billdate'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$billdate,
	    );
      
	$form['orderid'] = array(
	      '#type' => 'hidden',
	      '#title' => t('REFERENCE ID:'),
	      '#required' => TRUE,
          '#default_value' =>$OrderId,
	    );

        $form['amount'] = array(
	      '#type' => 'hidden',
	      '#title' => t('TRANSACTION AMOUNT:'),
	      '#required' => TRUE,
//airpay accepts amount only with deciamls
          '#default_value' => (string)intval($amount) .".00",
	    );

//drupal_set_message((string)intval($amount));

        $form['username'] = array(
	      '#type' => 'hidden',
	      '#title' => t('TRANSACTION TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$uname,
	    );

        $form['password'] = array(
	      '#type' => 'hidden',
	      '#title' => t('ENCRYPTION TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$pwd,
	    );
  
        $form['currencyName'] = array(
	      '#type' => 'hidden',
	      '#title' => t('CURRENCY TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$currencyName,
	    );
      
        $form['secret'] = array(
	      '#type' => 'hidden',
	      '#title' => t('CURRENCY TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$secret,
	    );
      

airpayStorage::insert(SafeMarkup::checkPlain($amount), SafeMarkup::checkPlain($buyer_name),SafeMarkup::checkPlain($email),SafeMarkup::checkPlain($mobilenumber),SafeMarkup::checkPlain($billdate),SafeMarkup::checkPlain($billnumber),SafeMarkup::checkPlain($member_id),SafeMarkup::checkPlain($OrderId));


  		
	$form['details'] = array(
       '#type' => 'markup',
      '#markup' =>'
                    <table bgcolor="#FFF">
                     	  <tr><th>Confirmation Details </th><th></th></tr>
                     	  <tr><td>Name</td><td>'.$buyer_name .' </td></tr>
                     	  
                     	  <tr><td>E-Mail</td><td>'.$email .' </td></tr>
                     	 
                          <tr><td>Transaction ID</td><td>'. $OrderId  .' </td></tr>
                          <tr><td>Transaction Currency</td><td>'.$currencyName .' </td></tr>
                          <tr><td><b>Transaction Amount</td></b><td><b>'. $amount .'</b> Rupees</td></tr>
                  	</table>'
    );

$form['br'] = [
	'#type' => 'markup',
	'#markup' => '<br />',
];

   $form['buyerEmail'] = array(
              '#type' => 'hidden',
              '#title' => t('Email:'),
              '#required' => TRUE,
          '#default_value' =>$email,
//          '#default_value' =>'test@est.com',
            );         

$form['br2'] = [
        '#type' => 'markup',
        '#markup' => '<br />',
];


        $form['#action']= '/modules/uniview8_Airpay/src/Form/airpay_core_files/sendtoairpay.php';
        $form['#method']= 'POST';

	$form['submit']= array(
	      '#type' => 'submit',
	      '#value' => t('Proceed To Pay'),
             
	    );
  
           
	 return $form;
	}


function submitForm(array &$form, FormStateInterface $form_state ){
/**
 $request= Request::createFromGlobals();
	   
  $parameters =['OrderId' => $form_state->getValue('OrderId'),'amount' => $form_state->getValue('amount'),];
 
   
  
 $redirect_method='POST';

  $form_state->setRedirectUrl(Url::fromUri('internal:' . '/request', $parameters,$redirect_method));


**/
return;
	}
	}





