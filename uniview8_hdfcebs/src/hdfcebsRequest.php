<?php

namespace Drupal\uniview8_hdfcebs;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\SafeMarkup;
class hdfcebsRequest extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }


public function buildForm(array $form, FormStateInterface $form_state) {
   

$hdfc_ebs_requesturl = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_requesturl');
$hdfc_ebs_return_url = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_return_url');
$hdfc_ebs_secretkey = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_secretkey');
$hdfc_ebs_channel = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_channel');
$hdfc_ebs_accountid = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_accountid');
$hdfc_ebs_mode = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_mode');
$hdfc_ebs_currency = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_currency');
$hdfc_ebs_pageid = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_pageid');
$hdfc_ebs_paymentoption = \Drupal::config('hdfcebs.settings')->get('hdfc_ebs_paymentoption');


$RequestUrl = 'https://secure.ebs.in/pg/ma/sale/pay'; 



$membername = 'rajes';
$membernumber = 'a123';
$billdate = '1-4-2017';
$billnumber = '0001002';
$member_amount='123';







$form['account_id'] = array(
      '#type' => 'hidden',
      '#default_value' => $hdfc_ebs_accountid,
);

$form['payment_channel'] = array(
      '#type' => 'hidden',
      '#default_value' => $hdfc_ebs_channel,
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
      '#default_value' => $hdfc_ebs_mode,
);

$description = 'active';

$form['description'] = array(
      '#type' => 'hidden',
      '#default_value' => $description,
);

$form['return_url'] = array(
      '#type' => 'hidden',
      '#default_value' => $hdfc_ebs_return_url,
);

$form['name'] = array(
      '#type' => 'hidden',
      '#default_value' => $membername,
);

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
$form['$hdfc_ebs_paymentoption'] = array(
      '#type' => 'hidden',
      '#default_value' => $hdfc_ebs_paymentoption,
);

$hash_data = $hdfc_ebs_secretkey;

  $hash_data .= "|" . $hdfc_ebs_accountid . "|" . $member_amount . "|" . $txnid . "|" . $hdfc_ebs_return_url . "|" . $hdfc_ebs_mode;

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



$form['#action'] = $hdfc_ebs_requesturl;

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

 
