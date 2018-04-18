<?php
 
/**
 
 * @file
 
 * Contains \Drupal\uniview8_worldline\Form\Uniview8WorldlineConfigForm.
 
 */
 
namespace Drupal\uniview8_worldline\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class Uniview8WorldlineConfigForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'uniview8_worldline_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('uniview8_worldline.settings');
 
    $form['Req_url'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Request URL'),
 
      '#default_value' => $config->get('uniview8_worldline.Req_url'),
 
      '#required' => TRUE,
 
    );
$form['M_key'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Merchant Key'),
 
      '#default_value' => $config->get('uniview8_worldline.M_key'),
 
      '#required' => TRUE,
 
    );
$form['Enc_key'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Enckey'),
 
      '#default_value' => $config->get('uniview8_worldline.Enc_key'),
 
      '#required' => TRUE,
 
    );


$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

$domain = $protocol.$_SERVER['HTTP_HOST'];
//print_r($protocol.$_SERVER['HTTP_HOST']);


if($config->get('uniview8_worldline.Success_URL')){
  $default_value = $config->get('uniview8_worldline.Success_URL');
}else{
  $default_value = $domain.'/modules/uniview8_worldline/src/Form/meTrnSuccess.php';
}

$form['Success_URL'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Response URL '),
      '#default_value' => $default_value,
      '#required' => TRUE,
 
    );
/*
$form['Failure_URL'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Failure URL'),
 
      '#default_value' => $config->get('uniview8_worldline.Failure_URL'),
 
      '#required' => TRUE,
 
    );

$form['Cancel_URL'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Cancel URL'),
 
      '#default_value' => $config->get('uniview8_worldline.Cancel_URL'),
 
      '#required' => TRUE,
 
    );
*/


 
    $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
 
    $node_type_titles = array();
 
    foreach ($node_types as $machine_name => $val) {
 
      $node_type_titles[$machine_name] = $val->label();
 
    }
 
   
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    	$config = $this->config('uniview8_worldline.settings');
 
    	$config->set('uniview8_worldline.Req_url', $form_state->getValue('Req_url'));
	$config->set('uniview8_worldline.M_key', $form_state->getValue('M_key'));
	$config->set('uniview8_worldline.Enc_key', $form_state->getValue('Enc_key'));
	$config->set('uniview8_worldline.Success_URL', $form_state->getValue('Success_URL'));
	$config->set('uniview8_worldline.Failure_URL', $form_state->getValue('Failure_URL'));
	$config->set('uniview8_worldline.Cancel_URL', $form_state->getValue('Cancel_URL'));
	 
   
 
    	$config->save();
 
    return parent::submitForm($form, $form_state);
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'uniview8_worldline.settings',
 
    ];
 
  }
 
}
