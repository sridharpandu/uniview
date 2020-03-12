<?php

namespace Drupal\uniview8_pastpayments\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database;
class uniview8PastpaymentController extends ControllerBase {
 
public static function load($entry = array()) {
    $userCurrent = \Drupal::currentUser();
    $user = \Drupal\user\Entity\User::load($userCurrent->id());
    $uid = $user->getUsername();
    /*
 $startdate = date('Y-m-d', strtotime($maxDate));
 $enddate = date('Y-m-d', strtotime($minDate));
$tablename = \Drupal::config('table.settings')->get('tablename');

/*$memberid = \Drupal::config('table.settings')->get('field1');
$name = \Drupal::config('table.settings')->get('field2');
$amount = \Drupal::config('table.settings')->get('field3');
$time = \Drupal::config('table.settings')->get('field4');

$status = \Drupal::config('table.settings')->get('field5');

$query = db_query("desc $table");

$name = array();
foreach($query as $values){
$field = $values->Field;

array_push($name, $field);

}

	 $select = db_select($tablename, 'x');
	 $select->fields('x', array($memberid, $name, $amount, $time, $status));
	 $select->condition($time, array($startdate, $enddate), 'BETWEEN');
         $ans=$select->execute()->fetchAll();
*/  

$minDate = \Drupal::request()->query->get('set_start_date');
$maxDate = \Drupal::request()->query->get('set_end_date');
$table = \Drupal::config('table.settings')->get('tablename');

$split = explode('_', $table);
$pgname = $split['1'];
$query = db_query("desc $table");
$name = array();

foreach($query as $values){
$field = $values->Field;
$name[$values->Field] = $values->Field;
}

 $select = db_select($table, 'x');
//	 $select->fields('x', array($pgname.'_memberid', $pgname.'_firstname', $pgname.'_amount', 'paidtime', $pgname.'_statusDesc'));
         $select->fields('x', array('paidtime', $pgname.'_txnid', $pgname.'_amount' ,$pgname.'_statusDesc'));
	 $select->condition('paidtime', array($minDate, $maxDate), 'BETWEEN');
         $select->condition($pgname.'_memberid', $uid, '=');
         $select->orderby('paidtime', 'DESC');
         $ans=$select->execute()->fetchAll();

$a = array($minDate, $maxDate);
       return $ans;

  }

  public function entryList() {
    $content = array();

    $rows = array();
    $headers = array(t('Date & Time'), t('Transactionid'), t('Amount'), t('Status'));

    foreach ($entries = $this->load() as $entry) {
      // Sanitize each entry.
$tmparray =  (array) $entry;
$tmparray["airpay_amount"] = money_format('₹%i', $tmparray["airpay_amount"]);
$tmparray["paidtime"] = date('d-M-Y H:i:s', strtotime($tmparray["paidtime"]));

//$tmparray["payu_status"] = "<span class='scs'>".$tmparray["payu_amount"]."</span>";

      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $tmparray);

//      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', (array) $tmp);
    }
    $content['table'] = array(
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
    );
    // Don't cache this page.
    $content['#cache']['max-age'] = 0;

    return $content;
  }




}
