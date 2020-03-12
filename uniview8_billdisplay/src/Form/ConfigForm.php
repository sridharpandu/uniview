<?php
 

 
namespace Drupal\uniview8_billdisplay\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class ConfigForm extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

 $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('billdisplay.settings');

  $form['uniview_xmldocumentdtd'] = array(
     '#type' => 'textfield',
     '#title' => t('The name of the referenced DTD'),
     '#default_value' => $config->get('uniview_xmldocumentdtd'),
     '#size' => 90,
    // '#maxlength' => 90,
     '#description' => t('The location and file name of the XML DTD against which XML document should be validated. This can either be the sites/all/files directory or your FTP directory. The XML documents are validated with this DTD to check if the format is correct.'),
     '#required' => TRUE,
  );

  $form['uniview_xslfile'] = array(
     '#type' => 'textfield',
     '#title' => t('The location  the XSL File'),
     '#default_value' => $config->get('uniview_xslfile'),
     '#size' => 90,
   //  '#maxlength' => 90,
     '#description' => t('The location of xsl file'),
     '#required' => TRUE,
  );

  $form['uniview_billlocation'] = array(
     '#type' => 'textfield',
     '#title' => t('The URI Location of the XML Files'),
     '#default_value' => $config->get('uniview_billlocation'),
     '#size' => 90,
    // '#maxlength' => 90,
     '#description' => t('The URI of the final member bills. This should not be either be the sites/default/files directory, Mention your FTP directory.'),
     '#required' => TRUE,
  );

  $form['uniview_billdetails'] = array(
     '#type' => 'textfield',
     '#title' => t('The location to search for the bill supporting pdfs'),
     '#default_value' => $config->get('uniview_billdetails'),
     '#size' => 90,
   //  '#maxlength' => 90,
     '#description' => t('The location of the document supporting details. This can either be the sites/default/files directory or your FTP directory'),
     '#required' => TRUE,
  );

  $form['uniview_paymentlastdate'] = array(
     '#type' => 'textfield',
     '#title' => t('The due date or last date for paying the bills.'),
     '#default_value' => $config->get('uniview_paymentlastdate'),
     '#size' => 2,
    // '#maxlength' => 2,
     '#description' => t('The last date for people to remit payments on this site. After this date people will be able to view but not pay their bills'),
     '#required' => TRUE,
  );

  $form['uniview_bankcharges'] = array(
     '#type' => 'textfield',
     '#title' => t('Bank charges'),
     '#default_value' => $config->get('uniview_bankcharges'),
     '#size' => 2,
    // '#maxlength' => 2,
     '#description' => t('If the bank charges are borne by the payer then enter the value in percentage. For one percent enter 1'),
     '#required' => TRUE,
  );

  $form['uniview_vendor'] = array(
     '#type' => 'textfield',
     '#title' => t('Vendor'),
     '#default_value' => $config->get('uniview_vendor'),
     '#size' => 30,
    // '#maxlength' => 30,
     '#description' => t('Vendor name'),
     '#required' => TRUE,
  );
 
  $form['uniview_module'] = array(
     '#type' => 'textfield',
     '#title' => t('Module used'),
     '#default_value' => $config->get('uniview_module'),
     '#size' => 20,
    // '#maxlength' => 20,
     '#description' => t('Name of the module'),
     '#required' => TRUE,
  );

  $form['uniview_vendormessage'] = array(
     '#type' => 'textfield',
     '#title' => t('Vendor Message'),
     '#default_value' => $config->get('uniview_vendormessage'),
     '#size' => 90,
    // '#maxlength' => 90,
     '#description' => t('Vendor Message'),
     '#required' => TRUE,
   );
  
   
 
  
  
 $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
 
    $node_type_titles = array();
 
    foreach ($node_types as $machine_name => $val) {
 
      $node_type_titles[$machine_name] = $val->label();
 
    }
 


   return $form;  
}

 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('billdisplay.settings');
 
$config->set('uniview_xmldocumentdtd', $form_state->getValue('uniview_xmldocumentdtd'));
$config->set('uniview_billlocation', $form_state->getValue('uniview_billlocation'));
$config->set('uniview_xslfile', $form_state->getValue('uniview_xslfile'));
$config->set('uniview_billdetails', $form_state->getValue('uniview_billdetails'));
$config->set('uniview_paymentlastdate', $form_state->getValue('uniview_paymentlastdate'));
$config->set('uniview_bankcharges', $form_state->getValue('uniview_bankcharges'));
$config->set('uniview_vendor', $form_state->getValue('uniview_vendor'));
$config->set('uniview_module', $form_state->getValue('uniview_module'));
$config->set('uniview_vendormessage', $form_state->getValue('uniview_vendormessage'));
 
  \Drupal::service('config.factory')->getEditable('foo.bar')->set('foo', 'foo')->save(); 
 
    $config->save();



 //$somedata = 'rajes';
//$_SESSION['uniview8_payu']['my_variable_name'] = $somedata;
    return parent::submitForm($form, $form_state);
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'billdisplay.settings',
 
    ];
 
  }
 
}
