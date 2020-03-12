<?php

namespace Drupal\uniview8_ebs;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\SafeMarkup;
class ebsRequest extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }


public function buildForm(array $form, FormStateInterface $form_state) {
   

$ebs_requesturl = \Drupal::config('ebs.settings')->get('ebs_requesturl');
$ebs_return_url = \Drupal::config('ebs.settings')->get('ebs_return_url');
$ebs_secretkey = \Drupal::config('ebs.settings')->get('ebs_secretkey');
$ebs_channel = \Drupal::config('ebs.settings')->get('ebs_channel');
$ebs_accountid = \Drupal::config('ebs.settings')->get('ebs_accountid');
$ebs_mode = \Drupal::config('ebs.settings')->get('ebs_mode');
$ebs_currency = \Drupal::config('ebs.settings')->get('ebs_currency');
$ebs_currencycode = \Drupal::config('ebs.settings')->get('ebs_currencycode');
$ebs_pageid = \Drupal::config('ebs.settings')->get('ebs_pageid');
$ebs_paymentoption = \Drupal::config('ebs.settings')->get('ebs_paymentoption');


$RequestUrl = 'https://secure.ebs.in/pg/ma/sale/pay'; 



$membername = 'rajes';
$membernumber = 'a123';
$billdate = '1-4-2017';
$billnumber = '0001002';
$member_amount='123';





$form['key'] = array(
      '#type' => 'hidden',
      '#default_value' => $ebs_secretkey,
);


$form['account_id'] = array(
      '#type' => 'hidden',
      '#default_value' => $ebs_accountid,
);

$form['payment_channel'] = array(
      '#type' => 'hidden',
      '#default_value' => $ebs_channel,
);

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);


$form['reference_no'] = array(
      '#type' => 'hidden',
      '#default_value' => $txnid,
);

$form['amount'] = array(
      '#type'=> 'hidden',
      '#default_value' => $member_amount,
);

$form['mode'] = array(
      '#type' => 'hidden',
      '#default_value' => $ebs_mode,
);

$description = 'active';

$form['description'] = array(
      '#type' => 'hidden',
      '#default_value' => $description,
);

$form['return_url'] = array(
      '#type' => 'hidden',
      '#default_value' => $ebs_return_url,
);

$form['name'] = array(
      '#type' => 'hidden',
      '#default_value' => $membername,
);

$form['id'] = array(
      '#type' => 'hidden',
      '#default_value' => $membernumber,
);


$address ='dsds';
$city ='chennai';
$state='tn';
$phone='1234';
$email='raj@gmail.com';
$postalcode='12345';
$country='india';
$form['address'] = array(
      '#type' => 'hidden',
      '#default_value' => $address,
);

$form['city'] = array(
      '#type' => 'hidden',
      '#default_value' => $city,
);

$form['state'] = array(
      '#type' => 'hidden',
      '#default_value' => $state,
);
$form['country'] = array(
      '#type' => 'hidden',
      '#default_value' => $country,
);
$form['postal_code'] = array(
      '#type' => 'hidden',
      '#default_value' => $postalcode,
);
$form['phone'] = array(
      '#type' => 'hidden',
      '#default_value' => $phone,
);
$form['email'] = array(
      '#type' => 'hidden',
      '#default_value' => $email,
);
$form['payment_option'] = array(
      '#type' => 'hidden',
      '#default_value' => $ebs_paymentoption,
);

$hash_data = $ebs_secretkey;

  $hash_data .= "|" . $ebs_accountid . "|" . $member_amount . "|" . $txnid . "|" . $ebs_return_url . "|" . $ebs_mode;

  if (strlen($hash_data) > 0) {
//drupal_set_message($hash_data);

      $secure_hash=md5($hash_data);
  }
else
{

drupal_set_message('invalid hashing');
}


$form['secure_hash'] = array(
      '#type' => 'hidden',
      '#default_value' => $secure_hash,
);


$form['#action'] = '/modules/custom/uniview8_instamojo/src/success.php';
//$form['#action'] = $ebs_requesturl;

$form['#method'] = 'POST';
 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('proceed to pay'),
    );
return $form;
 }


 function submitForm(array &$form, FormStateInterface $form_state) {


return;


}

}

 
