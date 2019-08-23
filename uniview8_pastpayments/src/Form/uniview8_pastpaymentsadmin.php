<?php

namespace Drupal\uniview8_pastpayments\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\SafeMarkup;

class uniview8_pastpaymentsadmin extends FormBase {

  public function getFormId() {
    return 'uniview8_pastpaymentsadmin';
  }
 function pastpayments_page_attachments(array &$attachments) {
  $attachments['#attached']['library'][] = 
	'pastpayments/pastpayments-library';
}


public function buildForm(array $form, FormStateInterface $form_state,$entry = array()) {
$userCurrent = \Drupal::currentUser();
    $user = \Drupal\user\Entity\User::load($userCurrent->id());
    $uid = $user->getUsername();

$form['#attached']['library'][] = 'uniview8_pastpayments/drupal.pastpayments';

  $table = \Drupal::config('table.settings')->get('tablename');

$split = explode('_', $table);
$pgname = $split['1'];
$query = db_query("desc $table");

//$minDate = \Drupal::request()->query->get('tm');
//$maxDate= \Drupal::request()->query->get('tm');

/**
$table = \Drupal::config('table.settings')->get('tablename');



foreach($query as $values){
$field = $values->Field;
$name[$values->Field] = $values->Field;
}

 $select = db_select($table, 'x');
//	 $select->fields('x', array($pgname.'_memberid', $pgname.'_firstname', $pgname.'_amount', 'paidtime', $pgname.'_statusDesc'));
         $select->fields('x', array('paidtime', $pgname.'_txnid', $pgname.'_amount' ,$pgname.'_statusDesc'));
	 $select->condition('paidtime', array($minDate, $maxDate), 'BETWEEN');
         $select->condition($pgname.'_memberid', $uid, '=');
         $select->orderby('paidtime', 'DESC');
         $ans=$select->execute()->fetchAll();

$a = array($minDate, $maxDate);
       return $ans;
*/
$minDate = \Drupal::request()->query->get('set_start_date');
$maxDate = \Drupal::request()->query->get('set_end_date');

//$minDate = $_GET['set_start_date'];
//$maxDate = $_GET['set_end_date'];


$c = date("Y-m", strtotime('0 month'));
$p = date("Y-m", strtotime('-1 month'));

$cuyr = date("Y");
$yr = date('Y');
$pryr = date("Y")-1;
$fyr  = date("Y")+1;   
$smn = '04';
$enm  = '03';
$st = $pryr.'-'.$smn;
$en = $cuyr.'-'.$enm;
$cufs = $yr.'-'.$smn;
$cufe = $fyr.'-'.$enm;


if($uid == "admin"){
$form['head'] = [
 '#type' => 'markup',
  '#markup' => '<h2 align="center">PAST PAYMENTS </h2>',
];

$form['hr'] = [
 '#type' => 'markup',
  '#markup' => '<hr />',
];

$form['tab'] = [
 '#type' => 'markup',
  '#markup' => '<table><tr><td>',
];


/**
   $form['tsubmit'] = [
	      '#type' => 'markup',
              '#markup' => '<a href="/pastpayments?q=ft" class="button js-form-submit form-submit btn btn-primary">Filter</a>',

             	    ];
*/
   $form['tmonth'] = [
	      '#type' => 'markup',
              '#markup' => '<a href="/pastpaymentsadmin?q=tm" class="mybut">This month</a></td><td>',
	    ];


   $form['pmonth'] = [
	      '#type' => 'markup',
 	      '#markup' => '<a href="/pastpaymentsadmin?q=pm" class="mybut">Last month</a></td><td>',
	    ];

   $form['acfmonth'] = [
	      '#type' => 'markup',
              '#markup' => '<a href="/pastpaymentsadmin?q=cfy" class="mybut">This financial year</a></td><td>',

	    ];

   $form['pfmonth'] = [
	      '#type' => 'markup',
//              '#markup' => '<a href="/pastpayments?q=pfy" class="button js-form-submit form-submit btn btn-primary">Last financial year</a></td><td>',
                '#markup' => '<a href="/pastpaymentsadmin?q=pfy" class="mybut">Last financial year</a></td><td>',
	  
	    ];

/**
$form['#action'] = "/pastpayments";
$form['#method'] = 'GET';

   $form['submit'] = [
              '#type' => 'submit',
              '#value' => t('Filter'),
            ];
*/

/**

$form['frmdat'] = [
 '#type' => 'markup',
  '#markup' => '<b>From Date :</b>',
];

*/
$form['set_start_date'] = [
      '#title' => 'From Date :',
      '#type' => 'date',
      '#attributes' => array('type'=> 'date', 'min'=> '-12 months', 'max' => 'now' ),
      '#date_date_format' => 'd-m-Y',

    ];

/**
$form['todat'] = [
 '#type' => 'markup',
  '#markup' => '<br /><b>To Date :</b>',
];
*/

 $form['set_end_date'] = [
      '#title' => 'To Date :',
      '#type' => 'date',
      '#attributes' => array('type'=> 'date', 'min'=> '-12 months', 'max' => 'now+1' ),
      '#date_date_format' => 'd-m-Y',

    ];

$form['#action'] = "/pastpaymentsadmin";
$form['#method'] = 'GET';

   $form['submit'] = [
              '#type' => 'submit',
              '#value' => t('Filter'),
            ];




 $form['br'] = [
 '#type' => 'markup',
  '#markup' => '<br /></td></tr></table>',
];




/*$select = db_select($table, 'x');
//	 $select->fields('x', array($pgname.'_memberid', $pgname.'_firstname', $pgname.'_amount', 'paidtime', $pgname.'_statusDesc'));
         $select->fields('x', array('paidtime', $pgname.'_txnid',$pgname.'_firstname', $pgname.'_amount' ,$pgname.'_statusDesc'));
	 $select->condition('paidtime', array($minDate, $maxDate), 'BETWEEN');
         $select->condition('paidtime',$minDate,'>=');
         $select ->condition('paidtime',$maxDate,'<=');
         $select->condition($pgname.'_status','s','=');
    //     $select->condition($pgname.'_memberid', $uid, '=');
         $select->orderby('paidtime', 'DESC');
         $ans=$select->execute()->fetchAll();*/


$q = $_GET['q'];

$queryfrm = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m-%d') >=:st and DATE_FORMAT(paidtime, '%Y-%m-%d') <= :en and ".$pgname."_status = :s order by paidtime DESC";

//$queryfrm1 = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m-%d') >=:st and DATE_FORMAT(paidtime, '%Y-%m-%d') <= :en and ".$pgname."_status = :s order by paidtime DESC";
if($q == "cfy")
{
$queryfrm = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m') >=:st and DATE_FORMAT(paidtime, '%Y-%m') <= :en and ".$pgname."_status = :s order by paidtime DESC";
$frmval = $cufs;
$toval = $cufe;

}
else if($q == "pfy")
{
$queryfrm = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m') >=:st and DATE_FORMAT(paidtime, '%Y-%m') <= :en and ".$pgname."_status = :s order by paidtime DESC";
$frmval = $st;
$toval = $en;
}
else if($q == "pm")
{
$queryfrm = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m') >=:st and DATE_FORMAT(paidtime, '%Y-%m') <= :en and ".$pgname."_status = :s order by paidtime DESC";
$frmval = $p;
$toval = $p;
}
else if($q == "tm")
{
$queryfrm = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m') >=:st and DATE_FORMAT(paidtime, '%Y-%m') <= :en and ".$pgname."_status = :s order by paidtime DESC";
$frmval = $c;
$toval = $c;

}
else
{

$queryfrm1 = "select ".$pgname."_memberid,".$pgname."_txnid,".$pgname."_firstname,".$pgname."_amount,paidtime,".$pgname."_statusDesc from ".$table." where DATE_FORMAT(paidtime, '%Y-%m-%d') >= :st and DATE_FORMAT(paidtime, '%Y-%m-%d') <= :en and ".$pgname."_status = :s order by paidtime DESC";

$frmval = $minDate;
$toval = $maxDate;

}


if ($q != "")
{
$queryresult = db_query($queryfrm, array(':st' =>$frmval,'s'=>"S",':en'=>$toval));

}
else
{
$queryresult = db_query($queryfrm1, array(':st' =>$frmval,'s'=>"S",':en'=>$toval));

}
    $table_data = '<table class="responsive-enabled table table-bordered table-striped table-hover responsive" id="cfmonth1"><tr><th>Member id</th><th>Member Name</th><th>Date paid</th><th>Amount</th><th>Status</th></tr>';

$v =0;

 foreach ($queryresult as $row) {
$v++;

      $table_data .= '<tr><td>' . $row->airpay_memberid .'</td><td>' . $row->airpay_firstname .'</td><td>' . $row->paidtime .'</td><td>' . $row->airpay_amount .'</td><td>' . $row->airpay_statusDesc .'</td></tr>'; 

    }


if($v < 1)
{
$table_data .= "<tr><td>No Records found</td></tr>";

}

    $table_data .= '</table>';  
    $form['print_table4'] = array(
      '#markup' => $table_data,
    );

} 

/**
$th = db_select($table, 'y');
//	 $select->fields('x', array($pgname.'_memberid', $pgname.'_firstname', $pgname.'_amount', 'paidtime', $pgname.'_statusDesc'));
         $th->fields('y', array('paidtime', 'airpay_txnid','airpay_firstname', 'airpay_amount' ,'airpay_statusDesc'));
    $th->condition(DATE_FORMAT(paidtime, '%Y-%m'),$c,'=');
         $th->condition('airpay_status','S','=');
    //     $select->condition($pgname.'_memberid', $uid, '=');
         $th->orderby('paidtime', 'DESC');
         $thismonth=$th->execute()->fetchAll();
*/
return $form;
	}


function submitForm(array &$form, FormStateInterface $form_state ){

//    $set_start_date = $form_state->getValue('set_start_date');
  //  $set_end_date = $form_state->getValue('set_end_date');
/**	   
  $params['query'] = ['set_start_date' => $form_state->getValue('set_start_date'),'set_end_date' => $form_state->getValue('set_end_date'),];
 

  $form_state->setRedirectUrl(Url::fromUri('internal:' . '/pastpayments', $params));

*/
return;
	}

	}


