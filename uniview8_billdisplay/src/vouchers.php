<?php
namespace Drupal\uniview8_billdisplay;

use DOMDocument;
use XSLTProcessor;
use SimpleXMLElement;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\Html;
use Drupal\menu_link_content\Entity\MenuLinkContent;

class vouchers extends FormBase {

  public function getFormId() {


 return 'uniview';
  }




/*function voucherinfo_help($path, $arg) {
  $output = '';
  switch ($path) {
    case "admin/help#voucherinfo":
      $output = '<p>' . t("Displays the vouchers foreach member") . '</p>';
      break;
  }
  return $output;
} */

public function buildForm(array $form, FormStateInterface $form_state) {

/* $form['css_inblock'] = array(
    '#markup' => '<style>'
    . '#voucher_list, #voucher_paid {margin: 15px 0;}'
    . '#voucher_list th, #voucher_paid th {padding: 5px; font-weight:bold; background-color: #333333; color: #FFF;}'
    . '#voucher_list tr:nth-child(odd), #voucher_paid tr:nth-child(odd){background-color: #EEE;}'
    . '#voucher_list tr:nth-last-child(1), #voucher_paid tr:nth-last-child(1){border-bottom: 1px solid #000;}'
    . '#voucher_list td, #voucher_paid td{padding: 5px;}'
    . '.money_right {text-align: right;}'
    . '.txt-center {text-align: center;}'
    . '</style>'
  );
  
  $payment_check = db_select('uv_ebs_response', 'vp')
    ->fields('vp')
    ->condition('uha_billingname', $user->name, '=')
    ->condition('chs_sync', 0, '=')
    ->condition('uha_source', 'Uniview', '=')
    ->condition('uha_responsecode', 'Transaction Successful', '=')
    ->execute()->fetchAll();
  $i=0;
  $final_amount = 0;
  if ($payment_check) {
    $i=1;
    $payment_table = '<h3>Recent Payments</h3><table id="voucher_paid"><tr><th>S.No</th><th>Payment Date</th><th>Transaction 
Reference</th><th>Amount</th></tr>';
    foreach ($payment_check as $prow) {
      $payment_table .= '<tr><td>' . $i++ . '</td><td class="txt-center">' . date('d/m/Y', strtotime($prow->uha_datecreated)) . '</td><td>' . 
$prow->uha_merchantrefno . '</td><td 
class="money_right">' . $prow->uha_amount . '</td></tr>';
      $final_amount += $prow->uha_amount;
      
    }
    $payment_table .= '</table> <p>Note: The above data will be synced with the ledger in few minutes.</p>';
    
    $form['payment_table'] = array(
      '#markup' => $payment_table
    );
  }*/

 $userCurrent = \Drupal::currentUser();
    $user = \Drupal\user\Entity\User::load($userCurrent->id());
    $memberid = $user->getUsername();


  $voucher_query = db_select('vouchers', 'v')
    ->fields('v')
    ->condition('member_id', $memberid, '=')
    ->execute()->fetchAll();
  if ($voucher_query) {
    $table_data = '<h3>Available Vouchers</h3><table id="voucher_list" class="responsive-enabled table table-bordered table-striped table-hover responsive"><tr><th>Voucher Number</th><th>Voucher 
Date</th><th>Description</th><th>Debit</th><th>Credit</th></tr>';

    foreach ($voucher_query as $row) {
      $table_data .= '<tr><td><a href="/voucherdetails?vno=' . $row->voucher_number . '">'. $row->voucher_number . '</a></td><td class="txt-center">' . date('d/m/Y', strtotime($row->voucher_date)) . '</td><td 
class="txt-center">' . 
$row->voucher_description . 
'</td><td 
class="money_right">' . $row->voucher_debit . '</td><td class="money_right">' . $row->voucher_credit . '</td></tr>'; 
    }
    $table_data .= '</table>';  
    $form['print_table'] = array(
      '#markup' => $table_data,
    );

  }
  else {
    drupal_set_message('No vouchers found for the user..', 'warning');
  }

  $outstanding_balance = 0.00;
  $voucher_balance_query = db_select('voucher_balance', 'vb')
    ->fields('vb')
    ->condition('member_id', $memberid, '=')
    ->execute()->fetchObject();
  if ($voucher_balance_query) {
    $outstanding_balance = $voucher_balance_query->balance;
    $form['balance_amount'] = array(
      '#type' => 'textfield',
      '#title' => 'Balance (Rs.)',
      '#size' => 7,
      '#default_value' => number_format($outstanding_balance, 2),
//     '#disabled' => TRUE
    );
  }
  else {
    drupal_set_message('Unable to retrieve Balance.', 'warning');
  }
  $form['amounts'] = array(
    '#type' => 'textfield',
    '#title' => 'Outstanding Amount (Rs.)',
    '#size' => 7,
    '#default_value' => number_format($outstanding_balance - $final_amount, 2),
//    '#disabled' => TRUE
  );
  $form['member_id'] = array(
    '#type' => 'hidden',
    '#value' => $memberid
  );

$select = db_select("vouchers", 'x');
         $select->fields('x', array('member_name'));
//       $select->condition('paidtime', array($minDate, $maxDate), 'BETWEEN');
         $select->condition('member_id', $memberid, '=');
         $ans=$select->execute()->fetchAssoc();

$form['firstname'] = array(
    '#type' => 'hidden',
    '#value' => $ans['member_name']
  );

$form['memberid'] = array(
    '#type' => 'hidden',
    '#value' => $memberid
  );


 $form['amount'] = array(
    '#type' => 'hidden',
    '#value' => number_format($outstanding_balance - $final_amount, 2),
  );

 $form['email'] = array(
    '#type' => 'hidden',
    '#value' => $user->getEmail(),
  );

  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  $form['txn_id'] = array(
    '#type' => 'hidden',
    '#value' => $txnid
  );


$form['#action'] ='/airpay';
$form['#method'] = 'POST';// USE POST INSTEAD OF GET TO PASS VALUES

 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Proceed to pay'),
    );

return $form;


}

function submitForm(array &$form, FormStateInterface $form_state) {

return $form;
}
 

function validateForm(array &$form, FormStateInterface $form_state) {
return $form;
}
}


