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


// XML
$xml_doc = new DOMDocument();
$xml_doc->load($bill);
 
// XSL
$xsl_doc = new DOMDocument();
$xsl_doc->load($uniview_xslfile);

// XSLT 
$proc = new XSLTProcessor();
$proc->importStylesheet($xsl_doc);

$postdata = array('memberid' => $memberid);


foreach ($postdata as $records => $values) {
  $proc->setParameter('', $records, $values);
}

$newdom = $proc->transformToDoc($xml_doc);

$a = $newdom->saveXML($newdom->documentElement);

$form['data'] = array(
      '#type' => 'markup',
      '#markup' =>  $a,
   );


$xmlbill = simplexml_load_file($bill);

foreach ($xmlbill->xpath('//member') as $member) {
    $row = simplexml_load_string($member->asXML());
    $memvalues = $row->xpath('//membernumber[. = ' . '"' . $memberid . '"' . ']');
   
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


 
