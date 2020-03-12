<?php
 

 
namespace Drupal\cash\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class ConfigForm extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 public function buildForm(array $form, FormStateInterface $form_state){

 $form = parent::buildForm($form, $form_state);
   $config = $this->config('cash.settings');

  $form['cnc_billiards'] = array(
  '#type' => 'textfield',
  '#title' => 'Billiards Monthly Subscription',
  '#required' => TRUE,
  '#size' => 5,
  '#default_value' => $config->get('cnc_billiards'),
  );
  
  $form['cnc_gymnasiumm'] = array(
  '#type' => 'textfield',
  '#title' => 'Gymnasium Monthly Subscription',
  '#size' => 5,
  '#required' => TRUE,
  '#default_value' => $config->get('cnc_gymnasiumm'),
  );

  $form['cnc_gymnasiumy'] = array(
  '#type' => 'textfield',
  '#title' => 'Gymnasium Yearly Subscription',
  '#size' => 5,
  '#required' => TRUE,
  '#default_value' => $config->get('cnc_gymnasiumy'),
  );

  $form['cnc_shuttle'] = array(
  '#type' => 'textfield',
  '#title' => 'Shuttle Subscription',
  '#size' => 5,
  '#required' => TRUE,
  '#default_value' => $config->get('cnc_shuttle'),
  );

  $form['cnc_swimming'] = array(
  '#type' => 'textfield',
  '#title' => 'Swimming Monthly Subscription',
  '#required' => TRUE,
  '#size' => 5,
  '#default_value' => $config->get('cnc_swimming'),
  );

  $form['cnc_advance'] = array(
  '#type' => 'textfield',
  '#title' => 'Advance Payment',
  '#required' => TRUE,
  '#size' => 5,
  '#default_value' => $config->get('cnc_advance'),
  );

  $form['cnc_paymentcutoffdate'] = array(
  '#type' => 'textfield',
  '#title' => 'Last date for payment',
  '#required' => TRUE,
  '#size' => 2,
  '#default_value' => $config->get('cnc_paymentcutoffdate'),
  );
 
  
 $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
 
    $node_type_titles = array();
 
    foreach ($node_types as $machine_name => $val) {
 
      $node_type_titles[$machine_name] = $val->label();
 
    }
 


   return $form;  
}

 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('cash.settings');
 
$config->set('cnc_billiards', $form_state->getValue('cnc_billiards'));
$config->set('cnc_gymnasiumm', $form_state->getValue('cnc_gymnasiumm'));
$config->set('cnc_gymnasiumy', $form_state->getValue('cnc_gymnasiumy'));
$config->set('cnc_shuttle', $form_state->getValue('cnc_shuttle'));
$config->set('cnc_swimming', $form_state->getValue('cnc_swimming'));
$config->set('cnc_advance', $form_state->getValue('cnc_advance'));
$config->set('cnc_paymentcutoffdate', $form_state->getValue('cnc_paymentcutoffdate'));

 
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
 
      'cash.settings',
 
    ];
 
  }
 
}
