<?php
namespace Drupal\uniview8_fileupload\Form;

trait validate{
 function libxml_display_error($error)
{
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning ".$error->code."</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error ".$error->code."</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error ".$error->code."</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .=    " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

 function libxml_display_errors() {
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
 	 print $this->libxml_display_error($error);
    }
    libxml_clear_errors();
exit();
}
}

use DOMDocument;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Component\Utility\Html;
use Drupal\menu_link_content\Entity\MenuLinkContent;
use Drupal\Core\File\File;

class uniview8_fileupload extends FormBase {

use validate;

  public function getFormId() {
    return 'uniview8_fileupload';
  }

public function buildForm(array $form, FormStateInterface $form_state) {

$billlocation = \Drupal::config('billdisplay.settings')->get('uniview_billlocation');
$xsd = \Drupal::config('billdisplay.settings')->get('uniview_xmldocumentdtd');

  $form['files'] = array(
        '#type' => 'managed_file',
        '#title' => t('File'),
        '#required' => TRUE,
        '#upload_validators'  => array(
          'file_validate_extensions' => array('xml'),
          'file_validate_size' => array(25600000),
	         ),
	'#progress_indicator' => 'bar',
	'#progress_message' => 'Please Wait...',
        '#upload_location' => 'public://',
    );

    $form['xsd'] = array(
        '#type' => 'hidden',
        '#value' => $xsd,
         );

    $form['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
         );

 return $form;
	}


function submitForm(array &$form, FormStateInterface $form_state ){

 $fid = $form_state->getValue('files');
 $file = \Drupal\file\Entity\File::load($fid[0]);

 $bill = $file->getFilename();
 $uri = $file->getFileuri();
 $year = substr($bill, 0, 4);
 $month = substr($bill, 4, 6);

 $billlocation = \Drupal::config('billdisplay.settings')->get('uniview_billlocation');
 $xmldocumentdtd = \Drupal::config('billdisplay.settings')->get('uniview_xmldocumentdtd');

if(file_exists($billlocation.$bill)){
 drupal_set_message('File '.$bill.' Already Exists', 'error');
 file_unmanaged_delete('public://'.$bill);
 return;

} else if(checkdate($month,12,$year) == FALSE){
 drupal_set_message('Incorrect File Name '.$bill.' , File Name Should be in YYYYMM.xml format', 'error');
 file_unmanaged_delete('public://'.$bill);
 return;

} else {
 $source = $file;
 $destination = $billlocation;
 file_move($source, $billlocation);
 $moved = 'ok';
}
 
if ($moved == 'ok'){

 libxml_use_internal_errors(true);

 $xml = new DOMDocument();
 $xml->load($billlocation.$bill);

if (!$xml->schemaValidate($xmldocumentdtd)) {

   file_unmanaged_delete($billlocation.$bill); 
   print '<a href="/uniview8/fileupload/" style="color:blue; font-size:20px; text-decoration:none;">Go Back</a> <p style="color:red; font-size:36px;">&nbsp;Errors Found On XML File!</p>';
   $this->libxml_display_errors();

} else {
 
 drupal_set_message('File '.$bill.' Uploaded Successfully!');

}

}


return $form;
	}

	}
