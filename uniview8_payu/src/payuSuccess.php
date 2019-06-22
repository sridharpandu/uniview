<?php

namespace Drupal\uniview8_payu;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class payuSuccess extends FormBase {


  public function getFormId() {


 return 'uniview';
  }
function uniview8_payu_page_attachments(array &$attachments) {
  $attachments['#attached']['library'][] = 
        'uniview8_payu/payu-library';
}
public function buildForm(array $form, FormStateInterface $form_state) {
$form['#attached']['library'][] = 'uniview8_payu/drupal.payu';

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
//  $insert_success = db_query("INSERT INTO {cnc_uv_payu_response}(payu_mihpayid, payu_mode, payu_status, payu_key, payu_txnid, payu_amount, payu_discount, payu_offer, payu_product_info, payu_firstname, payu_lastname, payu_address1, payu_address2, payu_city, payu_state, payu_country, payu_zip_code, payu_email, payu_phone, payu_udf1, payu_udf2, payu_udf3, payu_udf4, payu_udf5, payu_hash, payu_error, payu_pg_type, payu_bank_ref_num, payu_shipping_firstname, payu_shipping_lastname, payu_shipping_address1, payu_shipping_address2, payu_shipping_city, payu_shipping_state, payu_shipping_country, payu_shipping_zipcode, payu_shipping_phone, payu_shipping_phoneverified, payu_unmappedstatus) VALUES('%s', '%s', '%s', '%s', '%s', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $payu_mihpayid, $payu_mode, $payu_status, $payu_key, $payu_txnid, $payu_amount, $payu_discount, $payu_offer, $payu_product_info, $payu_firstname, $payu_lastname, $payu_address1, $payu_address2, $payu_city, $payu_state, $payu_country, $payu_zip_code, $payu_email, $payu_phone, $payu_udf1, $payu_udf2, $payu_udf3, $payu_udf4, $payu_udf5, $payu_hash, $payu_error, $payu_pg_type, $payu_bank_ref_num, $payu_shipping_firstname, $payu_shipping_lastname, $payu_shipping_address1, $payu_shipping_address2, $payu_shipping_city, $payu_shipping_state, $payu_shipping_country, $payu_shipping_zipcode, $payu_shipping_phone, $payu_shipping_phoneverified, $payu_unmappedstatus);
//  $insert_success = db_query("INSERT INTO uniview8_payu_response (payu_mihpayid, payu_mode, payu_status, payu_key, payu_txnid, payu_amount, payu_discount, payu_offer, payu_product_info, payu_firstname, payu_lastname, payu_address1, payu_address2, payu_city, payu_state, payu_country, payu_zip_code, payu_email, payu_phone, payu_udf1, payu_udf2, payu_udf3, payu_udf4, payu_udf5, payu_hash, payu_error, payu_pg_type, payu_bank_ref_num, payu_shipping_firstname, payu_shipping_lastname, payu_shipping_address1, payu_shipping_address2, payu_shipping_city, payu_shipping_state, payu_shipping_country, payu_shipping_zipcode, payu_shipping_phone, payu_shipping_phoneverified, payu_unmappedstatus) VALUES(:payu_mihpayid, :payu_mode, :payu_status, :payu_key, :payu_txnid, :payu_amount, :payu_discount, :payu_offer, :payu_product_info, :payu_firstname, :payu_lastname, :payu_address1, :payu_address2, :payu_city, :payu_state, :payu_country, :payu_zip_code, :payu_email, :payu_phone, :payu_udf1, :payu_udf2, :payu_udf3, :payu_udf4, :payu_udf5, :payu_hash, :payu_error, :payu_pg_type, :payu_bank_ref_num, :payu_shipping_firstname, :payu_shipping_lastname, :payu_shipping_address1, :payu_shipping_address2, :payu_shipping_city, :payu_shipping_state, :payu_shipping_country, :payu_shipping_zipcode, :payu_shipping_phone, :payu_shipping_phoneverified, :payu_unmappedstatus)", array(':payu_mihpayid' => $payu_mihpayid, ':payu_mode' => $payu_mode, ':payu_status' => $payu_status, ':payu_key' => $payu_key, ':payu_txnid' => $payu_txnid, ':payu_amount' => $payu_amount, ':payu_discount' => $payu_discount, ':payu_offer' => $payu_offer, ':payu_product_info' => $payu_product_info, ':payu_firstname' => $payu_firstname, ':payu_lastname' => $payu_lastname, ':payu_address1' => $payu_address1, ':payu_address2' => $payu_address2, ':payu_city' => $payu_city, ':payu_state' => $payu_state, ':payu_country' => $payu_country, ':payu_zip_code' => $payu_zip_code, ':payu_email' => $payu_email, ':payu_phone' => $payu_phone, ':payu_udf1' => $payu_udf1, ':payu_udf2' => $payu_udf2, ':payu_udf3' => $payu_udf3, ':payu_udf4' => $payu_udf4, ':payu_udf5' => $payu_udf5, ':payu_hash' => $payu_hash, ':payu_error' => $payu_error, ':payu_pg_type' => $payu_pg_type, ':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_shipping_firstname' => $payu_shipping_firstname, ':payu_shipping_lastname' => $payu_shipping_lastname, ':payu_shipping_address1' => $payu_shipping_address1, ':payu_shipping_address2' => $payu_shipping_address2, ':payu_shipping_city' => $payu_shipping_city, ':payu_shipping_state' => $payu_shipping_state, ':payu_shipping_country' => $payu_shipping_country, ':payu_shipping_zipcode' => $payu_shipping_zipcode, ':payu_shipping_phone' => $payu_shipping_phone, ':payu_shipping_phoneverified' => $payu_shipping_phoneverified, ':payu_unmappedstatus' => $payu_unmappedstatus));
//  $update_success = db_query("UPDATE uniview8_payu_response SET receipt_number = :payu_bank_ref_num WHERE payu_txnid = :payu_txnid", 
//array(':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_txnid' => $payu_txnid));

 $update_success = db_query("UPDATE edu_uniview8_payu_response SET payu_mode = :payu_mode, payu_hash = :payu_hash, payu_bank_ref_num = :payu_bank_ref_num, payu_status = :payu_status WHERE payu_txnid = :payu_txnid ", array(':payu_mode' => $payu_mode, ':payu_hash' => $payu_hash, ':payu_bank_ref_num' => $payu_bank_ref_num, ':payu_status' => $payu_status, ':payu_txnid' => $payu_txnid));


//    $receivedhash = $_POST['hash'];
    $successMode = $_POST['mode'];
    $successModeText = '';
    switch ($successMode) {
     case 'CC': $successModeText = 'Credit Card'; break;
     case 'DC': $successModeText = 'Debit Card'; break;
     case 'NB': $successModeText = 'Net Banking'; break;
     default: $successModeText = 'N/A';
    }

    $form['success_title'] = array(
      '#type' => 'markup',
      '#prefix' => '<div id="tabdiv"><table><tr><th colspan="2"><center>',
      '#markup' => '<span class="succmsg">Transaction Successful!</span>',
      '#suffix' => '</center></th></tr>',
    );


    $form['success_status'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Transaction Status</td><td>',
      '#markup' => $_POST['status'],
      '#suffix' => '</td></tr>',
    );
    
    $form['success_firstname'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Name</td><td>',
      '#markup' => $_POST['firstname'],
      '#suffix' => '</td></tr>',
    );

    $form['success_membernumber'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Member Number</td><td>',
      '#markup' => $_POST['udf2'],
      '#suffix' => '</td></tr>',
    );

    $form['success_txnid'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Transaction Id</td><td>',
      '#markup' => $_POST['txnid'],
      '#suffix' => '</td></tr>',
    );

    $form['success_amount'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Amount</td><td>',
      '#markup' => $_POST['amount'],
      '#suffix' => '</td></tr>',
    );

    $form['success_addedon'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Paid On</td><td>',
      '#markup' => $_POST['addedon'],
      '#suffix' => '</td></tr>',
    );

    $form['success_mode'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Mode</td><td>',
      '#markup' => $successModeText,
      '#suffix' => '</td></tr>',
    );

    $form['success_pgtype'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>PG TYPE</td><td>',
      '#markup' => $_POST['PG_TYPE'],
      '#suffix' => '</td></tr>',
    );

    $form['success_bankrefno'] = array(
      '#type' => 'markup',
      '#prefix' => '<tr><td>Bank Reference Number</td><td>',
      '#markup' => $_POST['bank_ref_num'],
      '#suffix' => '</td></tr>',
    );

    $form['success_preface'] = array(
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

 
