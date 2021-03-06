<?php

namespace Drupal\uniview8_billdisplay;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class fetchmyBill extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }
public function buildForm(array $form, FormStateInterface $form_state) {
   
$uniview_xmldocumentdtd = \Drupal::config('billdisplay.settings')->get('uniview_xmldocumentdtd');
$uniview_billlocation = \Drupal::config('billdisplay.settings')->get('uniview_billlocation');
$uniview_billdetails = \Drupal::config('billdisplay.settings')->get('uniview_billdetails');
$uniview_paymentlastdate = \Drupal::config('billdisplay.settings')->get('uniview_paymentlastdate');
$uniview_bankcharges = \Drupal::config('billdisplay.settings')->get('uniview_bankcharges');
$uniview_vendor = \Drupal::config('billdisplay.settings')->get('uniview_vendor');
$uniview_module = \Drupal::config('billdisplay.settings')->get('uniview_module');
$uniview_vendormessage = \Drupal::config('uniview_vendormessage')->get('uniview_vendormessage');



//$xmlbills = file_scan_directory(\Drupal::request()->request->get('/home/ishwarya/public_html/tncanew/public/sites/default/files/'), '/.*\.xml$/');

$dirhandle = opendir($uniview_billlocation);
    $count = count($dirhandle);
    $filesavbl = '';
    $filearray = '';
    $i = 0;

    While (($filename = readdir($dirhandle)) !== false) {
      if ($filename != "." && $filename != "..") {
        if (strpos($filename, ".xml") !== false) {

          $i++;
          $billyear = substr($filename, 0, 4);
          $billmonth = substr($filename, 4, 2);


          $filesavbl = $filesavbl . ',' . $billmonth . ' ' . $billyear;
          $filearray = $filearray . ',' . $filename;

        }
	  }
  }

//$output = db_query("select CONCAT(CONCAT(EXTRACT(MONTH FROM billdate) ,' '), EXTRACT(YEAR FROM billdate)) as billdate  from bill_details group  by CONCAT(CONCAT(EXTRACT(MONTH FROM billdate), ' '), EXTRACT(YEAR FROM billdate));");
$output = db_query("select EXTRACT(YEAR_MONTH FROM billdate) as billdate  from bill_details group  by EXTRACT(YEAR_MONTH FROM billdate)");

//f = "";
//foreach ($output as $ans)
//{
//$bills = $ans->billdate.",";
//}
//drupal_set_message($filesavbl);

  /* Creating the string of file names introduces a comma (,) in the front because the $filesavbl variable is null in the first iteration. This should be removed */
  $filesavbl = substr($filesavbl, 1);

//drupal_set_message($filesavbl);
//drupal_set_message($bills);
//$filesavbl = $bills;
 
  $options = explode(",", $bills);
  $filearray = substr($filearray, 1);
  natsort($options);
  $count1 = count($options);



//  $options = array_reverse($options);

  for ($j = 0; $j < $count1; $j++) {
    switch (substr($options[$j], 0, 3)) {
      case '01 ':
        $options = str_replace(substr($options[$j], 0, 3), "January ", $options);
        break;
      case '02 ':
        $options = str_replace(substr($options[$j], 0, 3), "February ", $options);
        break;
      case '03 ':
        $options = str_replace(substr($options[$j], 0, 3), "March ", $options);
        break;
      case '04 ':
        $options = str_replace(substr($options[$j], 0, 3), "April ", $options);
        break;
      case '05 ':
        $options = str_replace(substr($options[$j], 0, 3), "May ", $options);
        break;
      case '06 ':
        $options = str_replace(substr($options[$j], 0, 3), "June ", $options);
        break;
      case '07 ':
        $options = str_replace(substr($options[$j], 0, 3), "July ", $options);
        break;
      case '08 ':
        $options = str_replace(substr($options[$j], 0, 3), "August ", $options);
        break;
      case '09 ':
        $options = str_replace(substr($options[$j], 0, 3), "September ", $options);
        break;
      case '10 ':
        $options = str_replace(substr($options[$j], 0, 3), "October ", $options);
        break;
      case '11 ':
        $options = str_replace(substr($options[$j], 0, 3), "November ", $options);
        break;
      case '12 ':
        $options = str_replace(substr($options[$j], 0, 2), "December ", $options);
        break;
    }
  }



$files = preg_grep('~\.(xml)$~', scandir($uniview_billlocation));

$options = array();

foreach ($output as $values) {

  $billyear = substr($values->billdate, 0, 4);
  $billmonth = substr($values->billdate, 4, 2);

switch ($billmonth) {
      case '01':
        $options[$values->billdate] = "January ".$billyear;
        break;
      case '02':
        $options[$values->billdate] = "February ".$billyear;
        break;
      case '03':
        $options[$values->billdate] = "March ".$billyear;
        break;
      case '04':
        $options[$values->billdate] = "April ".$billyear;
        break;
      case '05':
        $options[$values->billdate] = "May ".$billyear;
        break;
      case '06':
        $options[$values->billdate] = "June ".$billyear;
        break;
      case '07':
        $options[$values->billdate] = "July ".$billyear;
        break;
      case '08':
        $options[$values->billdate] = "August ".$billyear;
        break;
      case '09':
        $options[$values->billdate] = "September ".$billyear;
        break;
      case '10':
        $options[$values->billdate] = "October ".$billyear;
        break;
      case '11':
        $options[$values->billdate] = "November ".$billyear;
        break;
      case '12':
        $options[$values->billdate] = "December ".$billyear;
        break;

   }

}

  $form['bills'] = array(
    '#type' => 'markup',
    '#markup' => t('The following bills are available. Choose the bill that you wish to View'),
  );

  $form['months'] = array(
    '#type' => 'radios',
    '#title' => t('Months'),
    '#options' => $options,
    '#description' => t('Choose a month and click on Fetch My Bill to view your bill'),
  );
  $form['filearray'] = array(
    '#type' => 'hidden',

    '#value' => $filearray,
  );

 
$form['#action'] = '/displayBill';
$form['#method'] = 'GET';

 $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Fetch My Bill',
  );



return $form;

 }

 function submitForm(array &$form, FormStateInterface $form_state) {
// $uid = $form_state->getValue('month');

   // drupal_set_message(t("$uid"));

return;


}

}

 
