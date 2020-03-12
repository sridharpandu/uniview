<?php

namespace Drupal\uniview8_billdisplay;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class viewmyBill extends FormBase {


  public function getFormId() {


 return 'uniview';
  }
public function buildForm(array $form, FormStateInterface $form_state) {

$form['#action'] = '/fetchmyBill';
$form['#method'] = 'POST';
 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('view my bill'),
    );
return $form;

 }

 function submitForm(array &$form, FormStateInterface $form_state) {



return;


}

}

 
