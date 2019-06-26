<?php

namespace Drupal\uniview8_paynimo;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class paynimoRequest extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }


public function buildForm(array $form, FormStateInterface $form_state) {
   

return $form;
 }


 function submitForm(array &$form, FormStateInterface $form_state) {


return;


}

}

 
