<?php
 

 
namespace Drupal\cash\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class ConfigFormpay extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

 $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('payu.settings');

     $form['payu_RequestUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('Request URL'),
      '#description' => 'Enter the Payment Gatewat URL, to which the request will be POSTed - provided by PayU. Test URL - https://test.payu.in/_payment',
     '#default_value' => $config->get('payu_RequestUrl'),
      '#required' => TRUE,
	'#size' => '200',
   );
   $form['payu_MerchantKey'] = array(
      '#type' => 'textfield',
      '#title' => t('Merchant Key'),
      '#description' => 'Enter the Merchant Key provided by PayU.',
      '#default_value' => $config->get('payu_MerchantKey'),
      '#required' => TRUE,
      '#size' => '200',
   );
   $form['payu_Salt'] = array(
      '#type' => 'textfield',
      '#title' => t('SALT'),
      '#description' => 'Enter the SALT provided by PayU',
      '#default_value' => $config->get('payu_Salt'),
      '#required' => TRUE,
	'#size' => '200',
   );
   $form['payu_SuccessUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('Success URL'),
      '#description' => 'Enter the URL, to which the Payment Gateway will redirect after a successful transaction.',
      '#default_value' => $config->get('payu_SuccessUrl'),
	'#size' => '200',
      '#required' => TRUE,
   );
   $form['payu_FailureUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('Failure URL'),
      '#description' => 'Enter the URL, to which the Payment Gateway will redirect after a failed transaction.',
      '#default_value' => $config->get('payu_FailureUrl'),
	'#size' => '200',
      '#required' => TRUE,
   );
   $form['payu_CancelUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('Cancel URL'),
      '#description' => 'Enter the URL, to which the Payment Gateway will redirect after a transaction is cancelled.',
	'#size' => '200',
      '#default_value' => $config->get('payu_CancelUrl'),
      '#required' => TRUE,
   );
   $form['payu_CodUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('COD URL'),
      '#description' => 'Enter the URL, to which the Payment Gateway will redirect after a COD transaction.',
	'#size' => '200',
      '#default_value' => $config->get('payu_CodUrl'),
      '#required' => TRUE,
   );
   $form['payu_ToutUrl'] = array(
      '#type' => 'textfield',
      '#title' => t('Time Out URL'),
      '#description' => 'Enter the URL, to which the Payment Gateway will redirect after a transaction is timed out.',
	'#size' => '200',
      '#default_value' => $config->get('payu_ToutUrl'),
      '#required' => TRUE,
   );
   $form['payu_DefaultTab'] = array(
      '#type' => 'textfield',
      '#title' => t('Default Tab'),
      '#description' => 'Enter the default tab to be open when redirected to the PayU gateway. CC-CreditCard, DB-DebitCard, NB-NetBanking, EMI, COD',
	'#size' => '200',
      '#default_value' => $config->get('payu_DefaultTab'),
      '#required' => TRUE,
   );
   $form['payu_DropCategory'] = array(
      '#type' => 'textfield',
      '#title' => t('Categories to Drop'),
      '#description' => 'Enter the categories that you do NOT need. CC-CreditCard, DB-DebitCard, NB-NetBanking, EMI, COD-CashOnDelivery',
	'#size' => '200',
      '#default_value' => $config->get('payu_DropCategory'),
      '#required' => TRUE,
   );
   $form['payu_ServiceProvider'] = array(
      '#type' => 'textfield',
      '#title' => 'Service Provider',
      '#description' => 'Enter the Service Provider',
	'#size' => '200',
      '#default_value' => 'payu_paisa',
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
 
    $config = $this->config('payu.settings');
 
$config->set('payu_RequestUrl', $form_state->getValue('payu_RequestUrl'));
$config->set('payu_MerchantKey', $form_state->getValue('payu_MerchantKey'));
$config->set('payu_Salt', $form_state->getValue('payu_Salt'));
$config->set('payu_SuccessUrl', $form_state->getValue('payu_SuccessUrl'));
$config->set('payu_FailureUrl', $form_state->getValue('payu_FailureUrl'));
$config->set('payu_CancelUrl', $form_state->getValue('payu_CancelUrl'));
$config->set('payu_CodUrl', $form_state->getValue('payu_CodUrl'));
$config->set('payu_ToutUrl', $form_state->getValue('payu_ToutUrl'));
$config->set('payu_DefaultTab', $form_state->getValue('payu_DefaultTab'));
$config->set('payu_DropCategory', $form_state->getValue('payu_DropCategory'));
$config->set('payu_ServiceProvider', $form_state->getValue('cnc_payu_ServiceProvider')); 
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
 
      'payu.settings',
 
    ];
 
  }
 
}
