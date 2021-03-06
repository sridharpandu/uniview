<?php
namespace Drupal\uniview8_dashboard\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
use Drupal\Core\Entity\Sql;
class configform extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

$form = parent::buildForm($form, $form_state);

 
 $config = $this->config('dashboard.settings');
$form['tablename'] = array(
	'#type' => 'textfield',
	'#title' => 'Enter the name of the table',
	'#size' => '90',
	'#required' => true,	
	 '#default_value' => $config->get('tablename'),
	'#description' => 'Enter the name of the payment gateway response table to be used');
$table = $config->get('tablename');
/*$query = db_query("desc $table");
$name = array();
foreach($query as $values){
$field = $values->Field;

array_push($name, $field);
//drupal_set_message($field);
}


$form['field1'] = array(
	'#type' => 'textfield',
	'#title' => 'Enter the field name of Member Id',
	'#size' => '90',
	'#required' => true,	
	 '#default_value' => $config->get('field1'),
	'#description' => 'Enter the name of the field used in the table for memberID');

$form['field2'] = array(
	'#type' => 'textfield',
	'#title' => 'Enter the name of Paid date',
	'#size' => '90',
	'#required' => true,	
	 '#default_value' => $config->get('field2'),
	'#required' => true,	
	'#description' => 'Enter the name of the field used for payment date');

*/
 $node_types = \Drupal\node\Entity\NodeType::loadMultiple();
 
    $node_type_titles = array();
 
    foreach ($node_types as $machine_name => $val) {
 
      $node_type_titles[$machine_name] = $val->label();
 
    }
 


   return $form;  
}

 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('dashboard.settings');
 
$config->set('tablename', $form_state->getValue('tablename'));
$config->set('field1', $form_state->getValue('field1'));
$config->set('field2', $form_state->getValue('field2'));

  \Drupal::service('config.factory')->getEditable('foo.bar')->set('foo', 'foo')->save(); 
$config->save();
    return parent::submitForm($form, $form_state);
 
  }
  protected function getEditableConfigNames() {
 
    return [
 
      'dashboard.settings',
 
    ];
 
  }
 
}

