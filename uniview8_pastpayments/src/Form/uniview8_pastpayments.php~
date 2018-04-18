<?php

namespace Drupal\uniview8_pastpayments\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\SafeMarkup;

class uniview8_pastpayments extends FormBase {

  public function getFormId() {
    return 'uniview8_pastpayments';
  }


public function buildForm(array $form, FormStateInterface $form_state) {

$form['set_start_date'] = [
      '#title' => $this->t('START DATE '),
      '#type' => 'date',
      '#attributes' => array('type'=> 'date', 'min'=> '-12 months', 'max' => 'now' ),
      '#date_date_format' => 'd-m-Y',
    ];


 $form['set_end_date'] = [
      '#title' => $this->t('END DATE'),
      '#type' => 'date',
      '#attributes' => array('type'=> 'date', 'min'=> '-12 months', 'max' => 'now+1' ),
      '#date_date_format' => 'd-m-Y',
    ];
            
            
            $form['submit'] = [
	      '#type' => 'submit',
	      '#value' => t('Filter'),
	    ];

return $form;
	}


function submitForm(array &$form, FormStateInterface $form_state ){

    $set_start_date = $form_state->getValue('set_start_date');
    $set_end_date = $form_state->getValue('set_end_date');
	   
  $params['query'] = ['set_start_date' => $form_state->getValue('set_start_date'),'set_end_date' => $form_state->getValue('set_end_date'),];
 
   
  
 

  $form_state->setRedirectUrl(Url::fromUri('internal:' . '/paidlist', $params));


return;
	}
	}


