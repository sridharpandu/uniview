<?php
 

 
namespace Drupal\uniview8_atom\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class ConfigForm extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

 $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('atom.settings');

 $form['atom_status'] = array(
      '#type' => 'checkbox',
      '#title' => t('Active'),
      '#default_value' => $config->get('atom_status'),
//      '#options' => array('active' => 'Active'),
   );

   $form['atom_RequestUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('Request URL'),
      '#description' => 'Enter the Payment Gatewat URL',
     '#default_value' => $config->get('atom_RequestUrl'),
      '#required' => TRUE,
   );

  $form['atom_Productid'] = array(
      '#type' => 'textfield',
      '#title' => t('Product ID'),
      '#description' => 'Enter the Product ID',
     '#default_value' => $config->get('atom_Productid'),
      '#required' => TRUE,
   );

   $form['atom_login'] = array(
      '#type' => 'textfield',
      '#title' => t('Login'),
      '#description' => 'Enter Atom Login.',
      '#default_value' => $config->get('atom_login'),
      '#required' => TRUE,
   );
   $form['atom_password'] = array(
      '#type' => 'textfield',
      '#title' => t('Password'),
      '#description' => 'Enter Atom Pasword',
      '#default_value' => $config->get('atom_password'),
      '#required' => TRUE,
   );
   $form['atom_MerchantName'] = array(
      '#type' => 'textfield',
      '#title' => t('Merchant Name'),
      '#description' => 'Enter the MerchantName',
      '#default_value' => $config->get('atom_MerchantName'),
      '#required' => TRUE,
   );
   $form['atom_tranxcurr'] = array(
      '#type' => 'textfield',
      '#title' => t('TxnCurr'),
      '#description' => 'Enter the Transaction currency.',
      '#default_value' => $config->get('atom_tranxcurr'),
      '#required' => TRUE,
   );
   $form['atom_tranxamt'] = array(
      '#type' => 'textfield',
      '#title' => t('TxnScAmt'),
      '#description' => 'Enter the Transaction Amount.',
      '#default_value' => $config->get('atom_tranxamt'),
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
 
    $config = $this->config('atom.settings');

$config->set('atom_status', $form_state->getValue('atom_status')); 
$config->set('atom_RequestUrl', $form_state->getValue('atom_RequestUrl'));
$config->set('atom_Productid', $form_state->getValue('atom_Productid'));
$config->set('atom_login', $form_state->getValue('atom_login'));
$config->set('atom_password', $form_state->getValue('atom_password'));
$config->set('atom_MerchantName', $form_state->getValue('atom_MerchantName'));
$config->set('atom_tranxcurr', $form_state->getValue('atom_tranxcurr'));
$config->set('atom_tranxamt', $form_state->getValue('atom_tranxamt'));
 
  \Drupal::service('config.factory')->getEditable('foo.bar')->set('foo', 'foo')->save(); 
 
    $config->save();



 
    return parent::submitForm($form, $form_state);
 
  }
 

  protected function getEditableConfigNames() {
 
    return [
 
      'atom.settings',
 
    ];
 
  }
 
}
