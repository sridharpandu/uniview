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

class displayBill extends FormBase {

  public function getFormId() {
	return 'uniview';
  }

public function buildForm(array $form, FormStateInterface $form_state) {

 $userCurrent = \Drupal::currentUser();
    $user = \Drupal\user\Entity\User::load($userCurrent->id());
    $memberid = $user->getUsername();


$file = \Drupal::request()->query->get('months');

if (!$file) {
drupal_set_message('Select a Month.', 'error');

$form['back'] = array(
  '#type' => 'markup',
  '#markup' => '<a href="/fetchmyBill"> << Go Back</button>',
  );

return $form;
}


$uniview_xmldocumentdtd = \Drupal::config('billdisplay.settings')->get('uniview_xmldocumentdtd');
$uniview_billlocation = \Drupal::config('billdisplay.settings')->get('uniview_billlocation');
$uniview_xslfile = \Drupal::config('billdisplay.settings')->get('uniview_xslfile');
$uniview_billdetails = \Drupal::config('billdisplay.settings')->get('uniview_billdetails');
$uniview_paymentlastdate = \Drupal::config('billdisplay.settings')->get('uniview_paymentlastdate');
$uniview_bankcharges = \Drupal::config('billdisplay.settings')->get('uniview_bankcharges');
$uniview_vendor = \Drupal::config('billdisplay.settings')->get('uniview_vendor');
$uniview_module = \Drupal::config('billdisplay.settings')->get('uniview_module');
$uniview_vendormessage = \Drupal::config('uniview_vendormessage')->get('uniview_vendormessage');

$bill = $uniview_billlocation.'/'.$file;


$postdata = array('memberid' => $memberid);


//foreach ($postdata as $records => $values) {
//  $proc->setParameter('', $records, $values);
//}

$form['data'] = array(
      '#type' => 'markup',
      '#markup' =>  $a,
   );

$output = db_query("select * from bill_details where memberid = :name and EXTRACT(YEAR_MONTH from billdate) = :billdate;", array(":name" => $memberid, ":billdate" => $file));

//drupal_set_message("select * from bill_details where memberid = :name and EXTRACT(YEAR_MONTH from billdate) = ".$file);
//$xmlbill = simplexml_load_file($bill);

foreach ($output as $member) {
//    $row = simplexml_load_string($member->asXML());
//    $memvalues = $row->xpath('//membernumber[. = ' . '"' . $memberid . '"' . ']');

$form['table'] = array(
      '#type' => '#markup',
      '#markup' => '<table ><tr><th><center>'.$member->clubname.'</center></th></tr>
			   <tr><th><center>'.$member->address.'</center></th></tr>
			<tr><th><center>'.$member->city.'</center></th></tr>
			<tr><th>'.$member->phone.'</th></tr>
			<tr><td>'.$member->memberid.'</td></tr>
                        <tr><td>'.$member->membername.'</td></tr>
                        <tr><td>'.$member->memberaddress1.'</td></tr>
                        <tr><td>'.$member->memberaddress2.'</td></tr>
                        <tr><td>'.$member->membercity.'</td></tr>
                        <tr><td>'.$member->memberpostalcode.'</td></tr>
                        <tr><td>Mobile Number :'.$member->memberphonenumber.'</td></tr>
			<tr><th>'.$member->title.'</th></tr>
			<tr><th>'.$member->notes.'</th></tr>
		   </table>',
);




  $memvalues = true;
 if ($memvalues) {

$form['firstname'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->membername,
);

$form['phone'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->memberphonenumber,
);

$form['email'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->memberemail,
);

$form['billdate'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->billdate,
);

$form['memberid'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->membernumber,
);

$form['city'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->membercity,
);

$form['postalcode'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->memberpostalcode,
);

$form['billnumber'] = array(
      '#type' => 'hidden',
      '#default_value' => (string) $member->billnumber,
);
 }
}

$outputs = db_query("select * from bill_details where memberid = :name and EXTRACT(YEAR_MONTH from billdate) = :billdate;", array(":name" => $memberid, ":billdate" => $file));

$tbl_det = "<table>";
$v = 0;
foreach ($outputs as $members) {
//    $row = simplexml_load_string($member->asXML());
//    $memvalues = $row->xpath('//membernumber[. = ' . '"' . $memberid . '"' . ']');
if ($v < 1)
{
$tbl_det .= '<tr><th>'.$member->columnh1.'</th><th>'.$member->columnh2.'</th><th>'.$member->columnh3.'</th><th>'.$member->columnh4.'</th></tr>';
}

$tbl_det .=  '<tr><td>'.$members->particular1.'</td><td>'.$members->amount1.'</td><td>'.$members->particular2.'</td><td>'.$members->amount2.'</td></tr>';
$v++;
}

$tbl_det .= "</table>";

$form['table_det'] = array(
      '#type' => '#markup',
      '#markup' => $tbl_det,
	);

  
$form['amounts'] = array(
      '#type' => 'textfield',
      '#title' => t('Enter the Amount'),
     '#size' => 15,
     '#required' => TRUE,
     '#attributes' => array('autocomplete' => 'off')   
);

$form['#action'] ='/airpay';
$form['#method'] = 'POST';// USE POST INSTEAD OF GET TO PASS VALUES

 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Proceed to pay'),
    );

return $form;

 }

function validateForm(array &$form, FormStateInterface $form_state) {

return $form;
}

function submitForm(array &$form, FormStateInterface $form_state) {

return $form;

}

}


 
