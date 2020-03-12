<?php

namespace Drupal\uniview8_payu;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class payuRequest extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }

function uniview8_payu_page_attachments(array &$attachments) {
  $attachments['#attached']['library'][] =
        'uniview8_payu/uniview8_payu-library';
}


public function buildForm(array $form, FormStateInterface $form_state) {

$form['#attached']['library'][] = 'uniview8_payu/drupal.payu';


$payu_RequestUrl = \Drupal::config('payu.settings')->get('payu_RequestUrl');
$payu_MerchantKey = \Drupal::config('payu.settings')->get('payu_MerchantKey');
$payu_Salt = \Drupal::config('payu.settings')->get('payu_Salt');
$payu_SuccessUrl = \Drupal::config('payu.settings')->get('payu_SuccessUrl');
$payu_FailureUrl = \Drupal::config('payu.settings')->get('payu_FailureUrl');
$payu_CancelUrl = \Drupal::config('payu.settings')->get('payu_CancelUrl');
$payu_CodUrl = \Drupal::config('payu.settings')->get('payu_CodUrl');
$payu_ToutUrl = \Drupal::config('payu.settings')->get('payu_ToutUrl');
$payu_DefaultTab = \Drupal::config('payu.settings')->get('payu_DefaultTab');


$Refference_No='0001002';
$Total_Amount = \Drupal::request()->query->get('amounts');
$bill_date = \Drupal::request()->query->get('billdate');
$payu_billnumber = \Drupal::request()->query->get('billnumber');
$member_id = \Drupal::request()->query->get('memberid');


$userCurrent = \Drupal::currentUser();
$user = \Drupal\user\Entity\User::load($userCurrent->id());
$username = $user->getUsername();

// $select = db_select("cnc_subscription_due2", 'x');
//         $select->fields('x', array('name'));
//       $select->condition('paidtime', array($minDate, $maxDate), 'BETWEEN');
//         $select->condition('code', $username, '=');
//         $ans=$select->execute()->fetchAssoc();
$select = db_select("membernames", 'x');
            $select->fields('x', array('membername','memberid'));
            $select->condition('memberid', $username, '=');
            $ans=$select->execute()->fetchAssoc();

//$member_name = $ans["name"];
$member_name = $ans["membername"];

$Phone_No = \Drupal::request()->query->get('phone');
$email_id = \Drupal::request()->query->get('email');
$facilit = \Drupal::request()->query->get('facility');
$Transaction_Desc = 'active';
$productinfo = 'delivered';


//drupal_set_message(t($payu_DefaultTab));


$payu_ServiceProvider = "payu_paisa";

 


/*    $form = array(
      '#prefix' => '<div id="payform">',
      '#suffix' => '</div>',
    );
  


$Refference_No='0001002';
$Amount = \Drupal::request()->request->get('amount');

drupal_set_message(t("$Amount"));

$Total_Amount = $Amount;

drupal_set_message(t("$Total_Amount"));
$bill_date=(string)\Drupal::request()->request->get('billdate');
$bill_date = $bill_date;
drupal_set_message(t($bill_date));

$payu_billnumber=(string)\Drupal::request()->request->get('billnumber');

drupal_set_message(t("$payu_billnumber"));

$member_id=(string)\Drupal::request()->request->get('membernumber');
$member_name=(string)\Drupal::request()->request->get('membername');
$Phone_No=(string)\Drupal::request()->request->get('memberphonenumber');
$membercity=(string)\Drupal::request()->request->get('membercity');
$Transaction_Desc='active';
$productinfo ='delivered';

*/

/*
$Refference_No='0001002';
$Total_Amount='200';
$bill_date='1-4-2017';
$payu_billnumber='235323532';
$member_id='0001';
$member_name='john';
$Phone_No='9934543212';
$email_id='john@gmail.com';
$Transaction_Desc='active';
$productinfo ='delivered';
*/

//$config = \Drupal::service('config.factory')->getEditable('foo.bar');
//drupal_set_message(t("$config"));
/*$config
  ->set('foo', 'foo')
  ->set('bar', 'bar')
  ->save();*/
$form['curl'] = array(
      '#type' => 'hidden',
      '#title' => t('uid'),
      '#size' => 15,
      '#default_value' => $payu_CancelUrl,
);



$form['payu_RequestUrlHidden'] = array(
      '#type' => 'hidden',
      '#title' => t('uid'),
      '#size' => 15,
      '#default_value' => $payu_RequestUrl,
);

$form['payu_SaltHidden'] = array(
      '#type' => 'hidden',
      '#title' => t('uid'),
      '#size' => 15,
      '#default_value' => $payu_Salt,
);


$form['key'] = array(
      '#type' => 'hidden',
      '#title' => t('uid'),
      '#size' => 15,
      '#default_value' => $payu_MerchantKey,
);

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  $form['txnid'] = array(
  '#type' => 'hidden',
  '#value' => $txnid,
  );

$form['amount'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $Total_Amount,
);

$form['firstname'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $member_name,
);

$form['email'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $email_id,
);

$form['phone'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => "1213212131",
);

$form['productinfo'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $productinfo,
);

$form['surl'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $payu_SuccessUrl,
);

$form['furl'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $payu_FailureUrl,
);

$form['service_provider'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $payu_ServiceProvider,
);


$form['bill_date'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $bill_date,
);
$form['member_id'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $member_id,
);
$form['Transaction_Desc'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#default_value' => $Transaction_Desc,
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
$form['zipcode'] = array(
  '#type' => 'hidden',
  '#default_value' => $zipcode,
  );



$form['pg'] = array(
  '#type' => 'hidden',
  '#default_value' => $payu_DefaultTab,
  );
$form['hd0'] = array(
  '#type' => 'markup',
  '#markup' => '<h2></h2>',
  );

$form['hd1'] = array(
  '#type' => 'markup',
  '#markup' => '<h2>Confirm your Details</h2>',
  '#prefix' => '<div id="tabdiv">',
  );


$form['hr1'] = array(
  '#type' => 'markup',
  '#markup' => '<hr/>',
  );


$form['txt1'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Member Name :</b>',
  );

$form['txt2'] = array(
  '#type' => 'markup',
  '#markup' => $member_name,
  '#suffix' => "<br /><br />",
  );

$form['txt3'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Total Amount :</b>',
  );

$form['txt4'] = array(
  '#type' => 'markup',
  '#markup' => $Total_Amount,
  '#suffix' => "<br /><br />",

  );

/*$form['txt5'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Bill Date :</b>',
  );

$form['txt6'] = array(
  '#type' => 'markup',
  '#markup' => $bill_date,
  '#suffix' => "<br /><br />",

  );
*/
$form['txt7'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Member ID :</b>',
  );

$form['txt8'] = array(
  '#type' => 'markup',
  '#markup' => $member_id,
  '#suffix' => "<br /><br />",

  );

$form['txt9'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Reference No :</b>',
  );

$form['txt10'] = array(
  '#type' => 'markup',
  '#markup' => $Refference_No,
  '#suffix' => "<br /><br />",
  );

$form['txt11'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Email :</b>',
  );

$form['txt12'] = array(
  '#type' => 'markup',
  '#markup' => $email_id,
  '#suffix' => "<br /><br />",
  );


$form['txt13'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Order Number :</b>',
  );

$form['txt14'] = array(
  '#type' => 'markup',
  '#markup' => $payu_billnumber,
  '#suffix' => "<br /><br />",
  );

$form['txt15'] = array(
  '#type' => 'markup',
  '#markup' => '<b>Facility Selected :</b>',
  );

$form['facility'] = array(
  '#type' => 'markup',
  '#markup' => $facilit,
  '#suffix' => "<br /><br />",
  );

$form['end2'] = array(
  '#type' => 'markup',
  '#markup' => "<h2></h2>",
//  '#suffix' => '</div>',
  );




//$name="$congig";

//$name=$config->get('payu_DefaultTab'),

/*$form['details'] = array(
       '#type' => 'markup',
      '#markup' =>'<table>
			<tr>
				<td><label for="one"> Refference No.</label></td>
				<td>'. $Refference_No .' </td>
				 
				<td><label for="one"> Total Amount </label></td>
				<td>'. $Total_Amount .' </td>
			</tr>
			<tr>	
				<td><label for="one"> bill date </label></td>
				<td>'. $bill_date .' </td>
			
				<td><label for="two">member id</label></td>
				<td>'. $member_id .' </td>
			</tr>
			<tr>	
				<td><label for="two">member name</label></td>
				<td>'. $member_name.' </td>
				
				<td><label for="two">email id</label></td>
				<td>'. $email_id .' </td>
			</tr>
			<tr>
				<td><label for="two">Order Number</label></td>
				<td>'. $payu_billnumber.' </td>
				
			</tr>			

		</table>'
	
    );*/







/*$request = new Request(
    $_GET,
    $_POST,
    array(),
    $_COOKIE,
    $_FILES,
    $_SERVER
);*/

//$request->query->set('bar', 'baz');
/*$options[] = [
      'Refference_No' => "$Refference_No",
      'amount' => "$Total_Amount",
     'bill_date' => "$bill_date",
     'member_id' => "$member_id",
      '$member_name' => "$member_name",
      'email_id'  => "$email_id",
       '$Transaction_Desc' => "$Transaction_Desc",

];*/
//$request->request->set('tactill_customerbundle_customertype', $Transaction_Desc);
//$redirect_url = 'https://secure.payu.in';
/*function store(Request $request) 
{
  // some additional logic or checking
  $plan = 123; // some logic to decide user's plan
  $request->request->add(['plan' => $plan]);
  User::create($request->all());
}
*/

$payu_key = $payu_MerchantKey;
$payu_txnid = $txnid;
$payu_amount = $Total_Amount;
$payu_firstname = $member_name;
$payu_email = $email_id;
$payu_phone = $Phone_No;
$payu_product_info = $productinfo;
$payu_serviceprovider = $payu_ServiceProvider;
$payu_billdate = $bill_date;
$payu_memberid = $member_id;
$payu_transactiondesc = $Transaction_Desc;
$payu_city = $city;
$payu_state = $state;
$payu_country = $country;
$payu_zip_code = $zipcode;
$payu_pg = $payu_DefaultTab;
$payu_billnumber = $payu_billnumber;
$payu_facility = $facilit;
//print_r($payu_amount);

payuStorage::insert(SafeMarkup::checkPlain($payu_key),SafeMarkup::checkPlain($payu_txnid),SafeMarkup::checkPlain($payu_amount), SafeMarkup::checkPlain($payu_firstname),SafeMarkup::checkPlain($payu_email),SafeMarkup::checkPlain($payu_phone),SafeMarkup::checkPlain($payu_product_info), SafeMarkup::checkPlain($payu_serviceprovider),SafeMarkup::checkPlain($payu_billdate),SafeMarkup::checkPlain($payu_billnumber),SafeMarkup::checkPlain($payu_memberid),SafeMarkup::checkPlain($payu_transactiondesc),SafeMarkup::checkPlain($payu_city),SafeMarkup::checkPlain($payu_state), SafeMarkup::checkPlain($payu_country), SafeMarkup::checkPlain($payu_zip_code),SafeMarkup::checkPlain($payu_pg), SafeMarkup::checkPlain($payu_facility));

 $form['udf1'] = array(
  '#type' => 'hidden',
//  '#type' => 'textfield',
  '#value' => $payu_firstname,
  );
  $form['udf2'] = array(
  '#type' => 'hidden',
//  '#type' => 'textfield',
  '#value' => $payu_memberid,
  );
 $form['udf3'] = array(
  '#type' => 'hidden',
//  '#type' => 'textfield',
  '#value' => $payu_phone,
   );
  $form['udf4'] = array(
  '#type' => 'hidden',
//  '#type' => 'textfield',
  '#value' => $payu_city,
  );
  $form['udf5'] = array(
  '#type' => 'hidden',
//  '#type' => 'textfield',
  '#value' => $payu_email,
  );

$form['#action'] = '/modules/uniview8_payu/src/payuform.php';

$form['#method'] = 'POST';
 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('proceed to pay'),
	 '#suffix' => '</div>',
    );
return $form;
//return $s;
 }

/*function store(Request $request) 
{
  // some additional logic or checking
  $plan = 123; // some logic to decide user's plan
  $request->request->add(['plan' => $plan]);
  User::create($request->all());
}*/

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

 
