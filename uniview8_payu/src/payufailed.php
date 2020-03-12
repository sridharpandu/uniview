<?php

namespace Drupal\uniview8_payu;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class payufailed extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }
function uniview8_payu_page_attachments(array &$attachments) {
  $attachments['#attached']['library'][] = 
        'uniview8_payu/payu-library';
}
//public function buildForm(array $form, FormStateInterface $form
public function buildForm(array $form, FormStateInterface $form_state) {
$form['#attached']['library'][] = 'uniview8_payu/drupal.payu';

/*
  $payu_status = $_POST['status'];
  $payu_key = $_POST['key'];
  $payu_txnid = $_POST['txnid'];
  $payu_amount = $_POST['amount'];
  $payu_discount = $_POST['discount'];
  $payu_offer = $_POST['offer'];
  $payu_product_info = $_POST['product_info'];
  $payu_firstname = $_POST['firstname'];
  $payu_lastname = $_POST['lastname'];
  $payu_address1 = $_POST['address1'];
  $payu_address2 = $_POST['address2'];
  $payu_city = $_POST['city'];
  $payu_state = $_POST['state'];
  $payu_country = $_POST['country'];
  $payu_zip_code = $_POST['zip_code'];
  $payu_email = $_POST['email'];
  $payu_phone = $_POST['phone'];
  $payu_udf1 = $_POST['udf1'];
  $payu_udf2 = $_POST['udf2'];
  $payu_udf3 = $_POST['udf3'];
  $payu_udf4 = $_POST['udf4'];
  $payu_udf5 = $_POST['udf5'];
  $payu_hash = $_POST['hash'];
  $payu_error = $_POST['error'];
  $payu_pg_type = $_POST['pg_type'];
  $payu_bank_ref_num = $_POST['bank_ref_num'];
  $payu_shipping_firstname = $_POST['field1'];
  $payu_shipping_lastname = $_POST['field2'];
  $payu_shipping_address1 = $_POST['field3'];
  $payu_shipping_address2 = $_POST['field4'];
  $payu_shipping_city = $_POST['field5'];
  $payu_shipping_state = $_POST['field6'];
  $payu_shipping_country = $_POST['field7'];
  $payu_shipping_zipcode = $_POST['field8'];
  $payu_shipping_phone = $_POST['field9'];
  $payu_shipping_phoneverified = $_POST['addedon'];
  $payu_unmappedstatus = $_POST['unmappedstatus'];
//  $insert_cancel = db_query("INSERT INTO {cnc_uv_payu_response}(payu_mihpayid, payu_mode, payu_status, payu_key, payu_txnid, payu_amount, payu_discount, payu_offer, payu_product_info, payu_firstname, payu_lastname, payu_address1, payu_address2, payu_city, payu_state, payu_country, payu_zip_code, payu_email, payu_phone, payu_udf1, payu_udf2, payu_udf3, payu_udf4, payu_udf5, payu_hash, payu_error, payu_pg_type, payu_bank_ref_num, payu_shipping_firstname, payu_shipping_lastname, payu_shipping_address1, payu_shipping_address2, payu_shipping_city, payu_shipping_state, payu_shipping_country, payu_shipping_zipcode, payu_shipping_phone, payu_shipping_phoneverified, payu_unmappedstatus) VALUES('%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $payu_mihpayid, $payu_mode, $payu_status, $payu_key, $payu_txnid, $payu_amount, $payu_discount, $payu_offer, $payu_product_info, $payu_firstname, $payu_lastname, $payu_address1, $payu_address2, $payu_city, $payu_state, $payu_country, $payu_zip_code, $payu_email, $payu_phone, $payu_udf1, $payu_udf2, $payu_udf3, $payu_udf4, $payu_udf5, $payu_hash, $payu_error, $payu_pg_type, $payu_bank_ref_num, $payu_shipping_firstname, $payu_shipping_lastname, $payu_shipping_address1, $payu_shipping_address2, $payu_shipping_city, $payu_shipping_state, $payu_shipping_country, $payu_shipping_zipcode, $payu_shipping_phone, $payu_shipping_phoneverified, $payu_unmappedstatus);
  $insert_cancel = db_query("INSERT INTO {cnc_uv_payu_response} (payu_mihpayid, payu_mode, payu_status, payu_key, payu_txnid, payu_amount, payu_discount, payu_offer, payu_product_info, payu_firstname, payu_lastname, payu_address1, payu_address2, payu_city, payu_state, payu_country, payu_zip_code, payu_email, payu_phone, payu_udf1, payu_udf2, payu_udf3, payu_udf4, payu_udf5, payu_hash, payu_error, payu_pg_type, payu_bank_ref_num, payu_shipping_firstname, payu_shipping_lastname, payu_shipping_address1, payu_shipping_address2, payu_shipping_city, payu_shipping_state, payu_shipping_country, payu_shipping_zipcode, payu_shipping_phone, payu_shipping_phoneverified, payu_unmappedstatus) VALUES(:payu_mihpayid, :payu_mode, :payu_status, :payu_key, :payu_txnid, :payu_amount, :payu_discount, :payu_offer, :payu_product_info, :payu_firstname, :payu_lastname, :payu_address1, :payu_address2, :payu_city, :payu_state, :payu_country, :payu_zip_code, :payu_email, :payu_phone, :payu_udf1, :payu_udf2, :payu_udf3, :payu_udf4, :payu_udf5, :payu_hash, :payu_error, :payu_pg_type, :payu_bank_ref_num, :payu_shipping_firstname, :payu_shipping_lastname, :payu_shipping_address1, :payu_shipping_address2, :payu_shipping_city, :payu_shipping_state, :payu_shipping_country, :payu_shipping_zipcode, :payu_shipping_phone, :payu_shipping_phoneverified, :payu_unmappedstatus)", array(':payu_mihpayid' => $payu_mihpayid, ':payu_mode' => $payu_mode, ':payu_status' => $payu_status, ':payu_key' => $payu_key, ':payu_txnid' => $payu_txnid, ':payu_amount' => $payu_amount, ':payu_discount' => $payu_discount, ':payu_offer' => $payu_offer, ':payu_product_info' => $payu_product_info, ':payu_firstname' => $payu_firstname, ':payu_lastname' => $payu_lastname, ':payu_address1' => $payu_address1, ':payu_address2' => $payu_address2, ':payu_city' => $payu_city, ':payu_state' => $payu_state, ':payu_country' => $payu_country, ':payu_zip_code' => $payu_zip_code, ':payu_email' => $payu_email, ':payu_phone' => $payu_phone, ':payu_udf1' => $payu_udf1, ':payu_udf2' => $payu_udf2, ':payu_udf3' => $payu_udf3, ':payu_udf4' => $payu_udf4, ':payu_udf5' => $payu_udf5, ':payu_hash' => $payu_hash, ':payu_error' => $payu_error, ':payu_pg_type' => $payu_pg_type, ':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_shipping_firstname' => $payu_shipping_firstname, ':payu_shipping_lastname' => $payu_shipping_lastname, ':payu_shipping_address1' => $payu_shipping_address1, ':payu_shipping_address2' => $payu_shipping_address2, ':payu_shipping_city' => $payu_shipping_city, ':payu_shipping_state' => $payu_shipping_state, ':payu_shipping_country' => $payu_shipping_country, ':payu_shipping_zipcode' => $payu_shipping_zipcode, ':payu_shipping_phone' => $payu_shipping_phone, ':payu_shipping_phoneverified' => $payu_shipping_phoneverified, ':payu_unmappedstatus' => $payu_unmappedstatus));
  $update_cancel = db_query("UPDATE cnc_facility_payments SET receipt_number = :payu_bank_ref_num WHERE bank_reference = :payu_txnid", array(':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_txnid' => $payu_txnid));
    $cancelMode = $_POST['mode'];
    $cancelModeText = '';
    switch ($cancelMode) {
     case 'CC': $cancelModeText = 'Credit Card'; break;
     case 'DC': $cancelModeText = 'Debit Card'; break;
     case 'NB': $cancelModeText = 'Net Banking'; break;
     default: $cancelModeText = 'N/A';
    }
    $form['cancel_title'] = array(
      '#type' => 'markup',
      '#prefix' => '<table><tr><th colspan="2">',
      '#markup' => 'Transaction Cancelled',
      '#suffix' => '</th></tr>',
    );
    
    $form['cancel_status'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Transaction Status</td><td>',
      '#markup' => $_POST['status'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_firstname'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Name</td><td>',
      '#markup' => $_POST['firstname'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_membernumber'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Member Number</td><td>',
      '#markup' => $_POST['udf2'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_txnid'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Transaction Id</td><td>',
      '#markup' => $_POST['txnid'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_amount'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Amount</td><td>',
      '#markup' => $_POST['amount'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_mode'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Mode</td><td>',
      '#markup' => $cancelModeText,
      '#suffix' => '</td></tr>',
    );

    $form['cancel_pgtype'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>PG TYPE</td><td>',
      '#markup' => $_POST['PG_TYPE'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_bankrefno'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Bank Reference Number</td><td>',
      '#markup' => $_POST['bank_ref_num'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_addedon'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Date & Time</td><td>',
      '#markup' => $_POST['addedon'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_error'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Error Number</td><td>',
      '#markup' => $_POST['error'],
      '#suffix' => '</td></tr>',
    );

    $form['cancel_errorMessage'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Error Message</td><td>',
      '#markup' => $_POST['error_Message'],
      '#suffix' => '</td></tr>',
    );
    
    $form['cancel_preface'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td colspan="2">',
      '#markup' => 'Please quote the Transaction ID for any queries relating to this request.',
      '#suffix' => '</td></tr></table>',
    );
*/
 $payu_mihpayid = $_POST['mihpayid'];
  $payu_mode = $_POST['mode'];
  $payu_status = $_POST['status'];
  $payu_key = $_POST['key'];
  $payu_txnid = $_POST['txnid'];
  $payu_amount = $_POST['amount'];
  $payu_discount = $_POST['discount'];
  $payu_offer = $_POST['offer'];
  $payu_product_info = $_POST['product_info'];
  $payu_firstname = $_POST['firstname'];
  $payu_lastname = $_POST['lastname'];
  $payu_address1 = $_POST['address1'];
  $payu_address2 = $_POST['address2'];
  $payu_city = $_POST['city'];
  $payu_state = $_POST['state'];
  $payu_country = $_POST['country'];
  $payu_zip_code = $_POST['zip_code'];
  $payu_email = $_POST['email'];
  $payu_phone = $_POST['phone'];
  $payu_udf1 = $_POST['udf1'];
  $payu_udf2 = $_POST['udf2'];
  $payu_udf3 = $_POST['udf3'];
  $payu_udf4 = $_POST['udf4'];
  $payu_udf5 = $_POST['udf5'];
  $payu_hash = $_POST['hash'];
  $payu_error = $_POST['error'];
  $payu_pg_type = $_POST['pg_type'];
  $payu_bank_ref_num = $_POST['bank_ref_num'];
  $payu_shipping_firstname = $_POST['field1'];
  $payu_shipping_lastname = $_POST['field2'];
  $payu_shipping_address1 = $_POST['field3'];
  $payu_shipping_address2 = $_POST['field4'];
  $payu_shipping_city = $_POST['field5'];
  $payu_shipping_state = $_POST['field6'];
  $payu_shipping_country = $_POST['field7'];
  $payu_shipping_zipcode = $_POST['field8'];
  $payu_shipping_phone = $_POST['field9'];
  $payu_shipping_phoneverified = $_POST['addedon'];
  $payu_unmappedstatus = $_POST['unmappedstatus'];
//  $insert_fail = db_query("INSERT INTO {cnc_uv_payu_response}(payu_mihpayid, payu_mode, payu_status, payu_key, payu_txnid, payu_amount, payu_discount, payu_offer, payu_product_info, payu_firstname, payu_lastname, payu_address1, payu_address2, payu_city, payu_state, payu_country, payu_zip_code, payu_email, payu_phone, payu_udf1, payu_udf2, payu_udf3, payu_udf4, payu_udf5, payu_hash, payu_error, payu_pg_type, payu_bank_ref_num, payu_shipping_firstname, payu_shipping_lastname, payu_shipping_address1, payu_shipping_address2, payu_shipping_city, payu_shipping_state, payu_shipping_country, payu_shipping_zipcode, payu_shipping_phone, payu_shipping_phoneverified, payu_unmappedstatus) VALUES('%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $payu_mihpayid, $payu_mode, $payu_status, $payu_key, $payu_txnid, $payu_amount, $payu_discount, $payu_offer, $payu_product_info, $payu_firstname, $payu_lastname, $payu_address1, $payu_address2, $payu_city, $payu_state, $payu_country, $payu_zip_code, $payu_email, $payu_phone, $payu_udf1, $payu_udf2, $payu_udf3, $payu_udf4, $payu_udf5, $payu_hash, $payu_error, $payu_pg_type, $payu_bank_ref_num, $payu_shipping_firstname, $payu_shipping_lastname, $payu_shipping_address1, $payu_shipping_address2, $payu_shipping_city, $payu_shipping_state, $payu_shipping_country, $payu_shipping_zipcode, $payu_shipping_phone, $payu_shipping_phoneverified, $payu_unmappedstatus);
//  $insert_fail = db_query("INSERT INTO {cnc_uv_payu_response} (payu_mihpayid, payu_mode, payu_status, payu_key, payu_txnid, payu_amount, payu_discount, payu_offer, payu_product_info, payu_firstname, payu_lastname, payu_address1, payu_address2, payu_city, payu_state, payu_country, payu_zip_code, payu_email, payu_phone, payu_udf1, payu_udf2, payu_udf3, payu_udf4, payu_udf5, payu_hash, payu_error, payu_pg_type, payu_bank_ref_num, payu_shipping_firstname, payu_shipping_lastname, payu_shipping_address1, payu_shipping_address2, payu_shipping_city, payu_shipping_state, payu_shipping_country, payu_shipping_zipcode, payu_shipping_phone, payu_shipping_phoneverified, payu_unmappedstatus) VALUES(:payu_mihpayid, :payu_mode, :payu_status, :payu_key, :payu_txnid, :payu_amount, :payu_discount, :payu_offer, :payu_product_info, :payu_firstname, :payu_lastname, :payu_address1, :payu_address2, :payu_city, :payu_state, :payu_country, :payu_zip_code, :payu_email, :payu_phone, :payu_udf1, :payu_udf2, :payu_udf3, :payu_udf4, :payu_udf5, :payu_hash, :payu_error, :payu_pg_type, :payu_bank_ref_num, :payu_shipping_firstname, :payu_shipping_lastname, :payu_shipping_address1, :payu_shipping_address2, :payu_shipping_city, :payu_shipping_state, :payu_shipping_country, :payu_shipping_zipcode, :payu_shipping_phone, :payu_shipping_phoneverified, :payu_unmappedstatus)", array(':payu_mihpayid' => $payu_mihpayid, ':payu_mode' => $payu_mode, ':payu_status' => $payu_status, ':payu_key' => $payu_key, ':payu_txnid' => $payu_txnid, ':payu_amount' => $payu_amount, ':payu_discount' => $payu_discount, ':payu_offer' => $payu_offer, ':payu_product_info' => $payu_product_info, ':payu_firstname' => $payu_firstname, ':payu_lastname' => $payu_lastname, ':payu_address1' => $payu_address1, ':payu_address2' => $payu_address2, ':payu_city' => $payu_city, ':payu_state' => $payu_state, ':payu_country' => $payu_country, ':payu_zip_code' => $payu_zip_code, ':payu_email' => $payu_email, ':payu_phone' => $payu_phone, ':payu_udf1' => $payu_udf1, ':payu_udf2' => $payu_udf2, ':payu_udf3' => $payu_udf3, ':payu_udf4' => $payu_udf4, ':payu_udf5' => $payu_udf5, ':payu_hash' => $payu_hash, ':payu_error' => $payu_error, ':payu_pg_type' => $payu_pg_type, ':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_shipping_firstname' => $payu_shipping_firstname, ':payu_shipping_lastname' => $payu_shipping_lastname, ':payu_shipping_address1' => $payu_shipping_address1, ':payu_shipping_address2' => $payu_shipping_address2, ':payu_shipping_city' => $payu_shipping_city, ':payu_shipping_state' => $payu_shipping_state, ':payu_shipping_country' => $payu_shipping_country, ':payu_shipping_zipcode' => $payu_shipping_zipcode, ':payu_shipping_phone' => $payu_shipping_phone, ':payu_shipping_phoneverified' => $payu_shipping_phoneverified, ':payu_unmappedstatus' => $payu_unmappedstatus));
//  $update_fail = db_query("UPDATE edu_uniview8_payu_response SET receipt_number = :payu_bank_ref_num WHERE bank_reference = :payu_txnid", array(':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_txnid' => $payu_txnid));
// $update_success = db_query("UPDATE edu_uniview8_payu_response SET payu_mode = :payu_mode, payu_hash = :payu_hash, payu_bank_ref_num = :payu_bank_ref_num, payu_s$
 $update_success = db_query("UPDATE edu_uniview8_payu_response SET payu_mode = :payu_mode, payu_hash = :payu_hash, payu_bank_ref_num = :payu_bank_ref_num, payu_status = :payu_status WHERE payu_txnid = :payu_txnid ", array(':payu_mode' => $payu_mode, ':payu_hash' => $payu_hash, ':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_status' => $payu_status, ':payu_txnid' => $payu_txnid));

//    print_r($_POST);
    $failMode = $_POST['mode'];
    $failModeText = '';
    switch ($failMode) {
      case 'CC': $failModeText = 'Credit Card'; break;
      case 'DC': $failModeText = 'Debit Card'; break;
      case 'NB': $failModeText = 'Net Banking'; break;
      default: $failModeText = 'N/A';
    }

//drupal_set_message("Transaction Failed!", "error");

    $form['fail_title'] = array(
      '#type' => 'markup',
      '#prefix' => '<div id="tabdiv"><table border="0"><tr><th colspan="2">',
      '#markup' => '<span class="msg">TRANSACTION FAILED!</span>',
      '#suffix' => '</th></tr>',
    );
    
    $form['fail_status'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Transaction Status</td><td>',
      '#markup' => $_POST['status'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_firstname'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Name</td><td>',
      '#markup' => $_POST['firstname'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_membernumber'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Member Number</td><td>',
      '#markup' => $_POST['udf2'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_txnid'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Transaction Id</td><td>',
      '#markup' => $_POST['txnid'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_amount'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Amount</td><td>',
      '#markup' => $_POST['amount'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_mode'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Mode</td><td>',
      '#markup' => $failModeText,
      '#suffix' => '</td></tr>',
    );

    $form['fail_pgtype'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>PG TYPE</td><td>',
      '#markup' => $_POST['PG_TYPE'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_bankrefno'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Bank Reference Number</td><td>',
      '#markup' => $_POST['bank_ref_num'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_addedon'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Date & Time</td><td>',
      '#markup' => $_POST['addedon'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_error'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Error Number</td><td>',
      '#markup' => $_POST['error'],
      '#suffix' => '</td></tr>',
    );

    $form['fail_errorMessage'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Error Message</td><td>',
      '#markup' => $_POST['error_Message'],
      '#suffix' => '</td></tr>',
    );

   $form['fail_preface'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td colspan="2">',
      '#markup' => 'Please quote the Transaction ID for any queries relating to this request.',
      '#suffix' => '</td></tr></table></div>',
    );

return $form;

 }

function submitForm(array &$form, FormStateInterface $form_state) {


  /*drupal_set_message(t('success'));

$payu_key = $form_state->getValue('key');
$payu_txnid = $form_state->getValue('txnid');
$payu_amount = $form_state->getValue('amount');
$payu_firstname = $form_state->getValue('firstname');
$payu_email = $form_state->getValue('email');
$payu_phone = $form_state->getValue('phone');
$payu_product_info = $form_state->getValue('productinfo');
$payu_serviceprovider = $form_state->getValue('service_provider');
$payu_billdate = $form_state->getValue('bill_date');
$payu_memberid = $form_state->getValue('member_id');
$payu_transactiondesc = $form_state->getValue('Transaction_Desc');
$payu_city = $form_state->getValue('city');
$payu_state = $form_state->getValue('state');
$payu_country = $form_state->getValue('country');
$payu_zip_code = $form_state->getValue('zipcode');
$payu_pg = $form_state->getValue('pg');

payuStorage::insert(SafeMarkup::checkPlain($payu_key),SafeMarkup::checkPlain($payu_txnid),SafeMarkup::checkPlain($payu_amount), SafeMarkup::checkPlain($payu_firstname),SafeMarkup::checkPlain($payu_email),SafeMarkup::checkPlain($payu_phone),SafeMarkup::checkPlain($payu_serviceprovider),SafeMarkup::checkPlain($payu_product_info), SafeMarkup::checkPlain($payu_serviceprovider),SafeMarkup::checkPlain($payu_billdate),SafeMarkup::checkPlain($$payu_memberid),SafeMarkup::checkPlain($payu_transactiondesc),SafeMarkup::checkPlain($payu_city), SafeMarkup::checkPlain($payu_country), SafeMarkup::checkPlain($payu_zip_code),SafeMarkup::checkPlain($payu_pg));

*/

return;


}

}

 
