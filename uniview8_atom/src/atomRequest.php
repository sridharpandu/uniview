<?php

namespace Drupal\uniview8_atom;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class atomRequest extends FormBase {


  public function getFormId() {
   
  
 return 'uniview';
  }
public function buildForm(array $form, FormStateInterface $form_state) {
   

$atom_RequestUrl = \Drupal::config('atom.settings')->get('atom_RequestUrl');
$atom_Productid = \Drupal::config('atom.settings')->get('atom_Productid');
$atom_login = \Drupal::config('atom.settings')->get('atom_login');
$atom_password = \Drupal::config('atom.settings')->get('atom_password');
$atom_MerchantName = \Drupal::config('atom.settings')->get('atom_MerchantName');
$atom_tranxcurr = \Drupal::config('atom.settings')->get('atom_tranxcurr');
$atom_tranxamt = \Drupal::config('atom.settings')->get('atom_tranxamt');

$form['Url'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_RequestUrl,
);

$form['product'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_Productid,
);

$form['Login'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_login,
);

$form['Password'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_password,
);

$form['MerchantName'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_MerchantName,
);

$form['TxnCurr'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_tranxcurr,
);

$form['TxnScAmt'] = array(
      '#type' => 'hidden',
      '#default_value' => $atom_tranxamt,
);






$form['clientcode'] = array(
      '#type' => 'textfield',
      '#title' => t('CLIENT CODE'),
      '#size' => 25,
      '#required' => 'true', 
      
);



$form['IFSCCode'] = array(
     '#type' => 'textfield',
      '#title' => t('IFSC CODE'),
      '#size' => 25,
      '#required' => 'true',
);

$form['ClientName'] = array(
      '#type' => 'textfield',
      '#title' => t('CLIENT NAME'),
      '#size' => 25,
      '#required' => 'true',
);


$form['AccountNo'] = array(
    '#type' => 'textfield',
      '#title' => t('ACCOUNT NO'),
      '#size' => 25,
      '#required' => 'true',
    
);

$form['BankName'] = array(
     '#type' => 'textfield',
      '#title' => t('BANK NAME'),
      '#size' => 25,
      '#required' => 'true',
    
);


$TType = 'NBFundTransfer';

$form['TType'] = array(
     '#type' => 'textfield',
      '#title' => t('TRANSFER TYPE'),
      '#size' => 25,
     '#default_value' => $TType,
      '#required' => 'true',
    
);

$form['Amount'] = array(
     '#type' => 'textfield',
      '#title' => t('AMOUNT'),
      '#size' => 25,
      '#required' => 'true',
    
);

$form['Product Name'] = array(
     '#type' => 'textfield',
      '#title' => t('PRODUCT NAME'),
      '#size' => 25,
      '#required' => 'true',
    
);

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  $form['tempTxnId'] = array(
  '#type' => 'hidden',
  '#value' => $txnid,
  );

$Token ='1234';


$form['token'] = array(
      '#type' => 'hidden',
      '#size' => 15,
      '#title' => t('token'),
      '#default_value' => $Token,
);





$form['#action'] = '/modules/uniview8_atom/src/submit.php';

$form['#method'] = 'POST';
 $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('proceed to pay'),
    );
return $form;
 }


 function submitForm(array &$form, FormStateInterface $form_state) {


return;


}

}

 
