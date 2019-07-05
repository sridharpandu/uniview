<?php

namespace Drupal\cash;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Druapl\core\includes\pager;
use Symfony\Component\HttpFoundation;
class report extends FormBase{

public function getFormId(){

return 'test';

}
 function cash_page_attachments(array &$attachments) {
  $attachments['#attached']['library'][] =
	'cash/cash-library';
}

public static function load($entry = array()) {
    $userCurrent = \Drupal::currentUser();
    $user = \Drupal\user\Entity\User::load($userCurrent->id());
    $uid = $user->getUsername();
$pgname = 'payu';

 $select = db_select('uniview8_payu_response', 'x');
	 $select->fields('x', array('paidtime', $pgname.'_txnid', 'payu_bank_ref_num', 'payu_amount' ,$pgname.'_status'));
	 $select->condition('payu_memberid', $uid, '=');
	 $select->orderby('paidtime', 'DESC');
         $ans=$select->execute()->fetchAll();

$a = array($minDate, $maxDate);
       return $ans;

  }

public function buildform(array $form, FormStateInterface $form_state){


$userCurrent = \Drupal::currentUser();
$user = \Drupal\user\Entity\User::load($userCurrent->id());
$username = $user->getUsername();
$email = $user->getEmail();
$form['#attached']['library'][] = 'cash/drupal.cash';

//$select = db_select("cnc_subscription_due2", 'x');
//         $select->fields('x', array('name'));
//       $select->condition('paidtime', array($minDate, $maxDate), 'BETWEEN');
//         $select->condition('code', $username, '=');
//         $ans=$select->execute()->fetchAssoc();
$select = db_select("membernames", 'x');
           $select->fields('x', array('membername','memberid'));
            $select->condition('memberid', $username, '=');
             $ans=$select->execute()->fetchAssoc();
          


 $form['outstanding'] = array(
    '#type' => 'markup',
    //'#markup' => '<b>Outstanding (Rs.)  </b>',
    '#markup' => '<br/><h3>Past Payments of <span id="uname">'.$ans["membername"]."</span> (". $username .")".'</h3><br/>',
    '#prefix' => "<div id='tabdiv'>",
    '#suffix' => "<a href='/cash' class='alink'>Pay current month subscription</a><br><br>",
  );


    $content = array();
    $rows = array();
    $headers = array(t('Date'), t('Transaction ID'), t('Bank reference no.'), t('Amount'), t('Payment Status'));

    foreach ($entries = $this->load() as $entry) {
      // Sanitize each entry.
$tmparray =  (array) $entry;
$tmparray["payu_amount"] = money_format('₹%i', $tmparray["payu_amount"]);
$tmparray["paidtime"] = date('d-M-Y H:i:s', strtotime($tmparray["paidtime"]));

//$tmparray["payu_status"] = "<span class='scs'>".$tmparray["payu_amount"]."</span>";

      $rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $tmparray);

//print_r($aa["payu_amount"]);
    }
    $form['table'] = array(
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
    );
    // Don't cache this page.
    $form['#cache']['max-age'] = 0;
/*
$form['note1'] = array(
    '#type' => 'markup',
    '#markup' => '<a href="/cash">Pay Subscription</span>',
    '#prefix' => '<table><tr><th>',
    '#suffix' => '</th></tr></table></div>', 
  );*/

 $form['total'] = array(
    '#type' => 'markup',
    '#markup' => '<h4></h4>',
    '#id' => 'buttons',
    '#suffix' => '</div>', 
  );


return $form;
}


function submitform(array &$form, FormStateInterface $form_state){



return $form;


}

}
