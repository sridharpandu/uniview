<?php
namespace Drupal\uniview8_billdisplay\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class tableconfig extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

$form = parent::buildForm($form, $form_state);
 
    $config = $this->config('table.settings');
$form['tablename'] = array(
	'#type' => 'textfield',
	'#title' => 'Enter the name of the table',
	'#size' => '90',
	'#required' => true,	
	 '#default_value' => $config->get('tablename'),
	'#description' => 'Enter the name of the payment gateway response table to be used');


$table = $config->get('tablename');

/*
$query = db_query("desc $table");
$name = array();
foreach($query as $values){
$field = $values->Field;

array_push($name, $field);
//drupal_set_message($field);
}

$form['field1'] = array(
	'#type' => 'select',
	'#options' => array($name),
	'#title' => 'select the field name of Member Id',
	 '#default_value' => $config->get('field1'),
	'#description' => 'Enter the name of the field used in the table for memberID');
	

$form['field2'] = array(
	'#type' => 'select',
	'#options' => array($name),
	'#title' => 'select the field name of Name of member',
	 '#default_value' => $config->get('field2'),
	'#description' => 'select the name of the field used in the table for name of member');
	

$form['field3'] = array(
	'#type' => 'select',
	'#options' => array($name),
	'#title' => 'select the field name of Amount',
	 '#default_value' => $config->get('field3'),
	'#description' => 'Enter the name of the field used in the table for amount paid');
	

$form['field4'] = array(
	'#type' => 'select',
	'#options' => array($name),
	'#title' => 'select the field name of Paid date',
	 '#default_value' => $config->get('field4'),
	'#description' => 'Enter the name of the field used in the table for payment date');
	

$form['field5'] = array(
	'#type' => 'select',
	'#options' => array($name),
	'#title' => 'select the field name of status',
	 '#default_value' => $config->get('field5'),
	'#description' => 'Enter the name of the field used for  status of payment ');
	
*/
 $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
 
    $node_type_titles = array();
 
    foreach ($node_types as $machine_name => $val) {
 
      $node_type_titles[$machine_name] = $val->label();
 
    }
 


   return $form;  
}

 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('table.settings');
 
$config->set('tablename', $form_state->getValue('tablename'));
$config->set('field1', $form_state->getValue('field1'));
$config->set('field2', $form_state->getValue('field2'));
$config->set('field3', $form_state->getValue('field3'));
$config->set('field4', $form_state->getValue('field4'));
$config->set('field5', $form_state->getValue('field5'));

$time = $config->get('field4');
$date = date('Y-m-d', strtotime($time));

drupal_set_message($time);
  \Drupal::service('config.factory')->getEditable('foo.bar')->set('foo', 'foo')->save(); 
 
    
/*$table = $form_state->getValue('tablename');
$query = db_select($table)
	->fields($table)
	->execute()->fetchAll();*/

$config->save();
 //$somedata = 'rajes';
//$_SESSION['uniview8_payu']['my_variable_name'] = $somedata;
    return parent::submitForm($form, $form_state);
 
  }
  protected function getEditableConfigNames() {
 
    return [
 
      'table.settings',
 
    ];
 
  }
 
}
