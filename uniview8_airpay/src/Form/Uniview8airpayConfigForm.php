<?php

namespace Drupal\uniview8_airpay\Form;

use Drupal\Core\Form\ConfigFormBase;

use Drupal\Core\Form\FormStateInterface;

class Uniview8airpayConfigForm extends ConfigFormBase {

  public function getFormId() {

    return 'uniview8_airpay_config_form';

  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form = parent::buildForm($form, $form_state);

    $config = $this->config('uniview8_airpay.settings');

$form['M_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Merchant Key'),
      '#default_value' => $config->get('uniview8_airpay.M_key'),
      '#required' => TRUE,
    );

$form['uname'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('User Name'),
     '#default_value' => $config->get('uniview8_airpay.uname'),
      '#required' => TRUE,
    );

$form['pwd'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Password'),
      '#default_value' => $config->get('uniview8_airpay.pwd'),
      '#required' => TRUE,
    );


$form['secret'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Secret'),
      '#default_value' => $config->get('uniview8_airpay.secret'),
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

    	$config = $this->config('uniview8_airpay.settings');

	$config->set('uniview8_airpay.M_key', $form_state->getValue('M_key'));
	$config->set('uniview8_airpay.uname', $form_state->getValue('uname'));
	$config->set('uniview8_airpay.pwd', $form_state->getValue('pwd'));
	$config->set('uniview8_airpay.secret', $form_state->getValue('secret'));

    	$config->save();

    return parent::submitForm($form, $form_state);

  }

  protected function getEditableConfigNames() {

    return [

      'uniview8_airpay.settings',

    ];

  }

}
