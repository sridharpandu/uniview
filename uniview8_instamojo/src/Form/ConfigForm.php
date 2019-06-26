<?php
 

 
namespace Drupal\uniview8_instamojo\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class ConfigForm extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

 $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('instamojo.settings');

    $form['instamojo_apikey'] = array(
      '#type' => 'textfield',
      '#title' => t(' INSTAMOJO API KEY'),
      '#description' => 'Private API Key',
      '#default_value' => $config->get('instamojo_apikey'),
      '#required' => TRUE,
  );
  $form['instamojo_authtoken'] = array(
      '#type' => 'textfield',
      '#title' => t('INSTAMOJO AUTH TOKEN'),
      '#description' => 'Private AUTH Token',
      '#default_value' => $config->get('instamojo_authtoken'),
      '#required' => TRUE,
  );
  $form['instamojo_salt'] = array(
      '#type' => 'textfield',
      '#title' => t('SALT'),
      '#description' => ' Private SALT ',
      '#default_value' => $config->get('instamojo_salt'),
      '#required' => TRUE,
  );
  $form['instamojo_url'] = array(
      '#type' => 'textfield',
      '#title' => t('REQUEST URL'),
      '#description' => 'Enter URL Instamojo',
      '#default_value' => $config->get('instamojo_url'),
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
 
    $config = $this->config('instamojo.settings');
 
$config->set('instamojo_apikey', $form_state->getValue('instamojo_apikey'));
$config->set('instamojo_authtoken', $form_state->getValue('instamojo_authtoken'));
$config->set('instamojo_salt', $form_state->getValue('instamojo_salt'));
$config->set('instamojo_url', $form_state->getValue('instamojo_url'));


  \Drupal::service('config.factory')->getEditable('foo.bar')->set('foo', 'foo')->save(); 
 
    $config->save();



 
    return parent::submitForm($form, $form_state);
 
  }
 

  protected function getEditableConfigNames() {
 
    return [
 
      'instamojo.settings',
 
    ];
 
  }
 
}
