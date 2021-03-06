<?php

namespace Drupal\uniview8_worldline\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\SafeMarkup;

class uniview8_worldline extends FormBase {

  public function getFormId() {
    return 'uniview8_worldline';
  }


public function buildForm(array $form, FormStateInterface $form_state) {

//$OrderId='1501737416712345';
$i = 0;
$OrderId = mt_rand(1,9);
do {
    $OrderId .= mt_rand(0, 9);
} while(++$i < 14);


$amount = \Drupal::request()->request->get('amounts'); 
$name       = \Drupal::request()->request->get('name');
$buyer_name       = \Drupal::request()->request->get('name');
$mobilenumber     = \Drupal::request()->request->get('phone');
$member_id        = \Drupal::request()->request->get('memberid');
$email            = \Drupal::request()->request->get('email');
$billdate         = \Drupal::request()->request->get('billdate');
$billnumber       = \Drupal::request()->request->get('billnumber');
$currencyName     = 'INR';

//$trnRemarks='This txn has to be done';
$mid= \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.M_key');
$meTransReqType='S';
$enckey= \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.Enc_key');
//$responseUrl="http://mytesting.com/modules/uniview8/uniview8_worldline/src/Form/uniview8_worldline.php";
$responseUrl = \Drupal::config('uniview8_worldline.settings')->get('uniview8_worldline.Success_URL');

/*  $form['message1'] = array(
      '#markup' => $this->t('Current Details'),
    );*/
 
        $form['mid'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$mid,
	    );
      
        $form['name'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$buyer_name,
	    );

	 	$form['mobilenumber'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$mobilenumber,
	    );

		$form['email'] = array(
	      '#type' => 'hidden',
	      '#title' => t('MERCHANT ID:'),
	      '#required' => TRUE,
          '#default_value' =>$email,
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
      
	$form['OrderId'] = array(
	      '#type' => 'hidden',
	      '#title' => t('REFERENCE ID:'),
	      '#required' => TRUE,
          '#default_value' =>$OrderId,
	    );

        $form['amount'] = array(
	      '#type' => 'hidden',
	      '#title' => t('TRANSACTION AMOUNT:'),
	      '#required' => TRUE,
          '#default_value' =>$amount*100,
	    );
//POsted Amount multiplied by 100 beacause worldline gets amount is paise

        $form['meTransReqType'] = array(
	      '#type' => 'hidden',
	      '#title' => t('TRANSACTION TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$meTransReqType,
	    );

        $form['enckey'] = array(
	      '#type' => 'hidden',
	      '#title' => t('ENCRYPTION TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$enckey,
	    );
  
        $form['currencyName'] = array(
	      '#type' => 'hidden',
	      '#title' => t('CURRENCY TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$currencyName,
	    );
      
        $form['responseUrl'] = array(
	      '#type' => 'hidden',
	      '#title' => t('CURRENCY TYPE:'),
	      '#required' => TRUE,
              '#default_value' =>$responseUrl,
	    );
      

worldlineStorage::insert(SafeMarkup::checkPlain($amount), SafeMarkup::checkPlain($buyer_name),SafeMarkup::checkPlain($email),SafeMarkup::checkPlain($mobilenumber),SafeMarkup::checkPlain($billdate),SafeMarkup::checkPlain($billnumber),SafeMarkup::checkPlain($member_id),SafeMarkup::checkPlain($OrderId));


  		
	$form['details'] = array(
       '#type' => 'markup',
      '#markup' =>'<h3>Proceed to Payment</h3>
                    <table bgcolor="#FFF" align="center">
                     	  <tr><th>Proceed to Payment </th><th></th></tr>
                     	  <tr><td>Name</td><td>'.$buyer_name .' </td></tr>
                     	  
                     	  <tr><td>E-Mail</td><td>'.$email .' </td></tr>
                     	 
                          <tr><td>Transaction ID</td><td>'. $OrderId  .' </td></tr>
                          <tr><td>Transaction Currency</td><td>'.$currencyName .' </td></tr>
                          <tr><td><b>Transaction Amount</td></b><td><b>'. $amount .'</b> Rupees</td></tr>
                  	</table>'
    );
         

        $form['#action']= '/modules/uniview8_worldline/src/Form/WorldlinePay.php';
	   //$form['#action']= '/worldline/process';
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





