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
class cash extends FormBase{

public function getFormId(){

return 'test';

}
 function cash_page_attachments(array &$attachments) {
  $attachments['#attached']['library'][] = 
	'cash/cash-library';
}

public function buildform(array $form, FormStateInterface $form_state){
$userCurrent = \Drupal::currentUser();
 $user = \Drupal\user\Entity\User::load($userCurrent->id());
// $uid = $user->getUsername();
$username = $user->getUsername();
$email = $user->getEmail();
$form['#attached']['library'][] = 'cash/drupal.cash';
//drupal_set_message("asd");
//$role = implode(', ', array_slice($usercurrent->getRoles(), 1));

/*$member = db_query(" SELECT * FROM cnc_subscription_due2 where code = '$user' ");



$querys = db_select('cnc_subscription_due2')
		->fields('cnc_subscription_due2')
		->extend('Drupal\Core\Database\Query\PagerSelectExtender')
		->limit(10);

   $query = $querys->orderby('time', 'DESC')
		 ->execute();
//}

$querys = db_select('subscription_due2')
		->fields('subscription_due2')
		->extend('Drupal\Core\Database\Query\PagerSelectExtender');*/
//drupal_set_message($userCurrent->id());


$member = db_select('cnc_subscription_due2')
	->fields('cnc_subscription_due2')
	->condition('code', $username, '=')
//->condition('code', 'OMS081', '=')
	->execute()->fetchObject();
//drupal_set_message("asd");

//    $member = db_query("SELECT * FROM {cnc_subscription_due2} WHERE code = :loginname", array(':loginname' => $username))->fetchObject();


 $form['outstanding'] = array(
    '#type' => 'markup',
    //'#markup' => '<b>Outstanding (Rs.)  </b>',
    '#markup' => '<b>Outstanding - Annual Subscription and other arrears </b>',
    '#prefix' => "<div id='tabdiv'><table><tr><td>",
    '#suffix' => '</td>',
  );



 $form['outstanding_value'] = array(
    '#type' => 'textfield',
    '#prefix' => '<td>',
    '#suffix' => '</b></td></tr>',
    '#size' => 9,
   // '#default_value' => 0,
    '#default_value' => $member->amount,
    '#disabled' => TRUE,
   // '#attributes' => array('readonly' => 'readonly'),
  );

 if (in_array(date('j'), array("1", "2", "3", "4", "5"))) {
     $form['billiards'] = array(
       '#type' => 'checkbox',
       '#title' => 'Billiards Monthly Subscription  ',
     //  '#default_value' => $billards,
      '#return_value' => \Drupal::config('cash.settings')->get('cnc_billiards'),
       '#prefix' => '<tr><td>',
       '#suffix' => '</td>', 
     );
   }
   else {
     $form['billiards'] = array(
       '#type' => 'checkbox',
       '#title' => 'Billiards Monthly Subscription  ',
      // '#default_value' => $billards,
       '#return_value' =>  \Drupal::config('cash.settings')->get('cnc_billiards'),
       '#prefix' => '<tr><td>',
       '#suffix' => '</td>', 
       '#disabled' => 'disabled',
     );
   }
  $form['billiards_value'] = array(
    '#type' => 'markup',
    '#markup' => 'Rs. ' . \Drupal::config('cash.settings')->get('cnc_billiards'),
    '#prefix' => '<td>',
    '#suffix' => '</td></tr>',
  );

//Gym: Chk box
  if (in_array(date('j'), array("1", "2", "3", "4", "5"))) {
     $form['gymnasium_value'] = array(
      '#type' => 'checkbox',
      '#title' => 'Gymnasium Monthly Subscription',
      '#return_value' =>  \Drupal::config('cash.settings')->get('cnc_gymnasiumm'),
      '#prefix' => '<tr><td>',
      '#suffix' => '</td>', 
      '#id' => 'gymnasium-value',
     );
  }
  else {
    $form['gymnasium_value'] = array(
      '#type' => 'checkbox',
      '#title' => 'Gymnasium Monthly Subscription',
      '#return_value' =>  \Drupal::config('cash.settings')->get('cnc_gymnasiumm'),
      '#prefix' => '<tr><td>',
      '#suffix' => '</td>', 
      '#id' => 'gymnasium-value',
      '#disabled' => 'disabled',
    );
  }
  $form['gymnasium_amt'] = array(
    '#type' => 'markup',
    '#markup' => 'Rs. ' . \Drupal::config('cash.settings')->get('cnc_gymnasiumm'),
    '#prefix' => '<td>',
    '#suffix' => '</td></tr>',
  );

  if (in_array(date('j'), array("1", "2", "3", "4", "5"))) {
    $form['shuttle'] = array(
      '#type' => 'checkbox',
      '#title' => 'Shuttle Subscription  ',
      //'#default_value' => variable_get('cnc_swimming', ''),
      '#return_value' => \Drupal::config('cash.settings')->get('cnc_shuttle'),
      '#prefix' => '<tr><td>',
      '#suffix' => '</td>', 
    );
  }
  else {
    $form['shuttle'] = array(
      '#type' => 'checkbox',
      '#title' => 'Shuttle Subscription  ',
      //'#default_value' => variable_get('swimming', ''),
      '#return_value' => \Drupal::config('cash.settings')->get('cnc_shuttle'),
      '#prefix' => '<tr><td>',
      '#suffix' => '</td>', 
      '#disabled' => 'disabled',
    );
  }
  $form['shuttle_value'] = array(
    '#type' => 'markup',
    '#markup' => 'Rs. ' . \Drupal::config('cash.settings')->get('cnc_shuttle'),
    '#prefix' => '<td>',
    '#suffix' => '</td></tr>',
  );
  
  if (in_array(date('j'), array("1", "2", "3", "4", "5"))) {
    $form['swimming'] = array(
      '#type' => 'checkbox',
      '#title' => 'Swimming Monthly Subscription  ',
      //'#default_value' => variable_get('swimming', ''),
      '#return_value' => \Drupal::config('cash.settings')->get('cnc_swimming'),
      '#prefix' => '<tr><td>',
      '#suffix' => '</td>', 
    );
  }
  else {
    $form['swimming'] = array(
      '#type' => 'checkbox',
      '#title' => 'Swimming Monthly Subscription',
      //'#default_value' => variable_get('swimming', ''),
     '#return_value' => \Drupal::config('cash.settings')->get('cnc_swimming'),
      '#prefix' => '<tr><td>',
      '#suffix' => '</td>', 
      '#disabled' => TRUE,
    );
  }
  $form['swimming_value'] = array(
    '#type' => 'markup',
    '#markup' => 'Rs. ' . \Drupal::config('cash.settings')->get('cnc_swimming', ''),
    '#prefix' => '<td>',
    '#suffix' => '</td></tr>',
  );

  $form['advance'] = array(
  '#type' => 'markup',
  '#markup' => 'Amount you want to pay as an Advance (Rs.) ',
  '#prefix' => '<tr><td>',
  '#suffix' => '</td>', 
  );

  $form['advance_value'] = array(
  '#type' => 'textfield',
  '#prefix' => '<td>',
  '#suffix' => '</td></tr></table>', 
  '#size' => 9,
  '#default_value' => \Drupal::config('cash.settings')->get('cnc_advance'),
  );

  $form['total1'] = array(
    '#type' => 'markup',
    '#markup' => '<span id="cnc_total">Total (Rs.)</span>',
    '#prefix' => '<table><tr><td width = "70%">',
    '#suffix' => '</td>',
  );
$a = $form_state->getValue('advance_value');
 
  $form['amounts'] = array(
    '#type' => 'textfield',
  // '#id' => 'amounts',
    '#prefix' => '<td>',
    '#suffix' => '</td></tr></table>',
    '#size' => 9,
    '#default_value' => 0,
    //'#return_value' => $a,
    //'#disabled' => TRUE,
    '#attributes' => array('readonly' => 'readonly'),
  );

$form['facility'] = array(
    '#type' => 'textfield',
  // '#id' => 'amounts',
    '#prefix' => '<td>',
    '#suffix' => '</td></tr></table>',
    '#size' => 9,
    '#return_value' => '',
    //'#return_value' => $a,
    //'#disabled' => TRUE,
 '#attributes' => array('readonly' => 'readonly','class' =>array('fac')),
  );


 /* $form['amount'] = array(
    '#type' => 'hidden',
    '#default_value' => 1,
  ); */

  $form['note2'] = array(
  '#type' => 'markup',
  '#markup' => 'The advance amount can be used to make any payments that can be adjusted in future',
  '#prefix' => '<table><tr><th>',
  '#suffix' => '</th></tr></table>', 
  );

$form['align'] = array(
  '#type' => 'markup',
  //'#markup' => 'The advance amount can be used to make any payments that can be adjusted in future',
  '#prefix' => '<div id="center">',
 // '#suffix' => '</div>', 
  );
 $form['total'] = array(
    '#type' => 'submit',
    '#value' => 'Pay this Amount',
    '#id' => 'button',
      // '#disabled' => TRUE
   // '#id' => 'pay',
  //  '#attributes' => array("onclick" => "return advance_val(); javascript: this.value='Please Wait...'; this.disabled = disabled;"),
  );
$form['align1'] = array(
  '#type' => 'markup',
  //'#markup' => 'The advance amount can be used to make any payments that can be adjusted in future',
 // '#prefix' => '<div id="center">',
  '#suffix' => '</div>', 
  );
  $form['note1'] = array(
    '#type' => 'markup',
    '#markup' => '<span>Subscriptions should be paid by 5th of every month.</span>',
    '#prefix' => '<table><tr><th>',
    '#suffix' => '</th></tr></table></div>', 
  );

 $form['firstname'] = array(
   // '#id' => 'amounts',
    '#type' => 'hidden',
    '#default_value' => $username,
   
  );

 $form['memberid'] = array(
   // '#id' => 'amounts',
    '#type' => 'hidden',
    '#default_value' => $username,
   
  );

  
   $form['email'] = array(
  // '#id' => 'amounts',
    '#type' => 'hidden',
    '#default_value' => $email,
   
  );

//$form['#action'] ='/worldline';
$form['#action'] = '/payu';
$form['#method'] = 'GET';
return $form;
}


function submitform(array &$form, FormStateInterface $form_state){



return $form;


}

}
