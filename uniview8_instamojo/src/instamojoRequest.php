<?php

namespace Drupal\uniview8_instamojo;
 use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\SafeMarkup;

class instamojoRequest extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }


public function buildForm(array $form, FormStateInterface $form_state) {
   

$instamojo_apikey = \Drupal::config('instamojo.settings')->get('instamojo_apikey');
$instamojo_authtoken = \Drupal::config('instamojo.settings')->get('instamojo_authtoken');
$instamojo_salt = \Drupal::config('instamojo.settings')->get('instamojo_salt');
$instamojo_url = \Drupal::config('instamojo.settings')->get('instamojo_url');


$purpose          = 'Bill Pay';
$amounts          = \Drupal::request()->query->get('amounts');
$mobilenumber     = \Drupal::request()->query->get('phone');
$email            = \Drupal::request()->query->get('email');
$buyer_name       = \Drupal::request()->query->get('firstname');
$billdate          = \Drupal::request()->query->get('billdate');
$member_id     = \Drupal::request()->query->get('memberid');
$city       = \Drupal::request()->query->get('city');
$postalcode            = \Drupal::request()->query->get('postalcode');
$billnumber      = \Drupal::request()->query->get('billnumber');

$amount = (integer)$amounts;


//drupal_set_message($amount.$buyer_name);

$form['apikey'] = array(
      '#type' => 'hidden',
      '#default_value' => $instamojo_apikey,
);

$form['authtoken'] = array(
      '#type' => 'hidden',
      '#default_value' => $instamojo_authtoken,
);

$form['inssalt'] = array(
      '#type'=> 'hidden',
      '#default_value' => $instamojo_salt,
);

$form['insurl'] = array(
      '#type' => 'hidden',
      '#default_value' => $instamojo_url,
);

/*
$purpose          = 'advice';
$amount           = '100';
$mobilenumber     = '1234543212';
$email            = 'abc@gmail.com';
$buyer_name       = 'john';
*/

$form['insbuyname'] = array(
      '#type' => 'textfield',
      '#title' => 'Member Name',
      '#size' => 30,
      '#attributes' => array('readonly' => 'readonly'),
      '#default_value' => $buyer_name,
);

$form['purpose'] = array(
      '#type' => 'textfield',
      '#title' => 'Purpose',
      '#size' => 30,
      '#attributes' => array('readonly' => 'readonly'),
      '#default_value' => $purpose,
);

$form['insgustamt'] = array(
      '#type' => 'textfield',
      '#title' => 'Amount',
      '#size' => 30,
      '#attributes' => array('readonly' => 'readonly'),
      '#default_value' => $amount,
);

$form['insmobno'] = array(
      '#type' => 'textfield',
      '#title' => 'Mobile Number',
      '#size' => 30,
      '#attributes' => array('readonly' => 'readonly'),
      '#default_value' => $mobilenumber,
);

$form['insemail'] = array(
      '#type' => 'textfield',
      '#title' => 'E-mail',
      '#size' => 30,
      '#attributes' => array('readonly' => 'readonly'),
      '#default_value' => $email,

);

$form['billnumber'] = array(
      '#type' => 'textfield',
      '#title' => 'Order Number',
      '#size' => 30,
      '#attributes' => array('readonly' => 'readonly'),
      '#default_value' => $billnumber,
);


/*
$form['amount'] = array(
      '#type' => 'hidden',
      '#default_value' => $member_amount,
);
*/

$instamojo_amount = $amount;
$instamojo_firstname = $buyer_name;
$instamojo_email = $email;
$instamojo_phone = $mobilenumber;
$instamojo_purpose = $purpose;
$instamojo_billdate = $billdate;
$instamojo_memberid = $member_id;
$instamojo_city = $city;
$instamojo_pin_code = $postalcode;
$instamojo_billnumber = $billnumber;

/*
instamojoStorage::insert(SafeMarkup::checkPlain($instamojo_amount), SafeMarkup::checkPlain($instamojo_firstname),SafeMarkup::checkPlain($instamojo_email),SafeMarkup::checkPlain($instamojo_phone),SafeMarkup::checkPlain($instamojo_purpose),SafeMarkup::checkPlain($instamojo_billdate),SafeMarkup::checkPlain($instamojo_billnumber),SafeMarkup::checkPlain($instamojo_memberid),SafeMarkup::checkPlain($instamojo_city),SafeMarkup::checkPlain($instamojo_pin_code));*/

 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('proceed to pay'),
    );

$form['#action'] = '/modules/uniview8_instamojo/src/success.php';
$form['#method'] = 'POST';

return $form;
 }

function submitForm(array &$form, FormStateInterface $form_state) {

return;


}

}

 
