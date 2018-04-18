<?php

namespace Drupal\uniview8_billdisplay;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Routing\TrustedRedirectResponse;
use \Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation;


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
/*
if(isset(\Drupal::request()->request->get('user')) && isset(\Drupal::request()->request->get('pass')) {
$user = \Drupal::request()->request->get('user');
$pass = \Drupal::request()->request->get('pass');

if($user == "" || $pass == "")
{
return 'Incorrect';
}

$response = new Response();
      $query = db_select('login')
      		->fields('login')
      		->condition('name', $user, '=')
      		->execute()->fetchAll();
      		
	foreach($query as $value) {
	if($user == $value->name) {
		if($pass == $value->pass) {
			$result = "logged in Successfully";
			$response->setContent(json_encode(array('name' => $user, 'pass' => $pass)));
			$response->headers->set('Content-Type', 'application/json');
			//return new JsonResponse($response);
			}
		
	else {
		$result = "Incorrect usename or password";
		
	}
      }}
return $response;

 }*/
 }

 function submitForm(array &$form, FormStateInterface $form_state) {



return;


}

}

 
