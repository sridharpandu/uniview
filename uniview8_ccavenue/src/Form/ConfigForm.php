<?php
 

 
namespace Drupal\uniview8_ccavenue\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class ConfigForm extends ConfigFormBase {
 
  
 
  public function getFormId() {
 
    return 'config_form';
 
  }
 
 
 
  public function buildForm(array $form, FormStateInterface $form_state){

 $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('ccavenue.settings');

    
 
   


   return $form;  
}

 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    


 
    return parent::submitForm($form, $form_state);
 
  }
 

  protected function getEditableConfigNames() {
 
    return [
 
      'ccavenue.settings',
 
    ];
 
  }
 
}
