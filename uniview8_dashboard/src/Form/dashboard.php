<?php

namespace Drupal\uniview8_dashboard\Form;
header("Content-type: text/css; href='/modules/uniview8_dashboard/src/styles/main.css' charset: UTF-8");
$height = '125px';

 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;
 use Drupal\Component\Utility\SafeMarkup;
 use Drupal\Core\Routing\TrustedRedirectResponse;
 use \Drupal\Core\Url;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\HttpFoundation\Response;
class dashboard extends FormBase {


public function getFormId() {
 
  
return 'uniview';
}

public function buildForm(array $form, FormStateInterface $form_state) {
 $userCurrent = \Drupal::currentUser();
 $user = \Drupal\user\Entity\User::load($userCurrent->id());
 $uid = $user->getUsername();

if($uid == "admin"){

//no of users
 $counts = db_query("select count(name) as users_count from users_field_data as us join user__roles as ur on us.uid = ur.entity_id where ur.roles_target_id='members' and us.status=1;");



//$total = db_query("select SUM((".$pgname."_amount) as totalamount from ".$table" WHERE ".$pgname."_status='S'");
$table = \Drupal::config('dashboard.settings')->get('tablename');
$dashboardamount = \Drupal::config('dashboard.settings')->get('dashamount');
$split = explode('_', $table);
$pgname = $split['1'];
$query = db_query("desc $table");
$name = array();

foreach ($counts as $records) {
 $total_members  = $records->users_count;
}


//$m = money_format('₹',$tmparray["".$pgname."_amount"]);

//setlocale(LC_NUMERIC, 'en_IN');

//$v = money_format('₹',$thisamt["".$pgname."_amount"]);
//$p = date('Y-m', strtotime('first month of current year'));
//$g =date_create("2019-01");

$t = date('Y-m', strtotime('0 month'));
$p = date('Y-m', strtotime('-1 month'));


//$g = date('Y-');
//$ge = '04';
//$date = $g.$ge;
//drupal_set_message($date);
//this month
$sum = db_query("select COUNT(".$pgname."_memberid) as membert,ROUND(SUM(".$pgname."_amount),2) as thisamount1 from ".$table." where ".$pgname."_statusDesc = 'success' and DATE_FORMAT(paidtime, '%Y-%m') = :amt;" ,array(':amt' => $t));


foreach ($sum as $records) {
 $tamt  = $records->thisamount1;
 $memberthis = $records->membert;
//$thisamt =$the.$m;
}

setlocale(LC_NUMERIC, 'en_IN');
$thisamt = money_format('₹%.1n',$tamt);
//previous month
$sum1 = db_query("select COUNT(".$pgname."_memberid) as memberp,ROUND(SUM(".$pgname."_amount),2) as thisamount2 from ".$table." where ".$pgname."_statusDesc = 'success' and DATE_FORMAT(paidtime, '%Y-%m') = :amt;" ,array(':amt' => $p));


foreach ($sum1 as $records1) {
$tamt2 = 0;
$tamt2  = $records1->thisamount2;
$memberpre = $records1->memberp;
//$thisamt2 =$m.$this2;
}

$thisamt2 = money_format("%n",$tamt2);

// $percent = 240/$total_members;
// $percent = 240/1000000;
$percent = 240/$dashboardamount;
 $height = array();
 $pay_u = array();
 $h = 1;
 $u = 1;
 $mnt = '03';
 $n =0;
 $yr = date('Y');
 $chkyr = 0;
for($j = 11; $j >= 0; $j--){

//for($j=15;$j>=4;$j--) {

//for($j=4;$j>=15;$j++) {

 $paid_user = 0;
// $date = date('Y-m', strtotime('-'.$j.' month'));
//$date =date('Y-m',strtotime('-'.$j.'month'));


if ($mnt >= 12)
{
$mnt = 01;

if($chkyr < 1) {
 $yr++;
$chkyr++;
 }

}
else
{
$mnt++;
}


$date = date($yr."-".$n.$mnt);

//drupal_set_message($date);

 /* UPDATE QUERY BY ADDING STATUS = SUCCESS IN WHERE CONDITION THEN ONLY IT WILL FILTER SUCESSFULL PAYMENTS */
//$table = \Drupal::config('dashboard.settings')->get('tablename');
/*$memberid = \Drupal::config('dashboard.settings')->get('field1');
$time = \Drupal::config('dashboard.settings')->get('field2');*/

/*
$split = split('_', $table);
$pgname = $split['1'];
$query = db_query("desc $table");
$name = array();

*/


foreach($query as $values){
$field = $values->Field;
$name[$values->Field] = $values->Field;
}

// $counts2 = db_query("select count(distinct(".$pgname."_memberid)) as users from ".$table." where  DATE_FORMAT(paidtime, '%Y-%m') = :date AND ".$pgname."_status='S' group by ".$pgname."_memberid;", array(':date' => $date));
$counts2 = db_query("select ROUND(SUM(".$pgname."_amount),2) as users from ".$table." where DATE_FORMAT(paidtime,'%Y-%m') = :date AND ".$pgname."_statusDesc = 'success' group by ".$pgname."_memberid;",array(':date' => $date));

foreach($counts2 as $values){
 $paid_user += $values->users;
 }
//drupal_set_message($percent*$paid_user);

 $height[$h] = $percent*$paid_user;
 $pay_u[$u] = $paid_user;
 $h++;
 $u++;
}

/* ASSIGNING HEIGHTS */
 $height1 = $height[1];
 $height2 = $height[2];
 $height3 = $height[3];
 $height4 = $height[4];
 $height5 = $height[5];
 $height6 = $height[6];
 $height7 = $height[7];
 $height8 = $height[8];
 $height9 = $height[9];
 $height10 = $height[10];
 $height11 = $height[11];
 $height12 = $height[12];

/* ASSIGNING PAID USERS */ 
 $pay_u1 = $pay_u[1];
 $pay_u2 = $pay_u[2];
 $pay_u3 = $pay_u[3];
 $pay_u4 = $pay_u[4];
 $pay_u5 = $pay_u[5];
 $pay_u6 = $pay_u[6];
 $pay_u7 = $pay_u[7];
 $pay_u8 = $pay_u[8];
 $pay_u9 = $pay_u[9];
 $pay_u10 = $pay_u[10];
 $pay_u11 = $pay_u[11];
 $pay_u12 = $pay_u[12];

 $html = dashboard_graph(
	$height1,
	$height2,
	$height3,
	$height4,
	$height5,
	$height6,
	$height7,
	$height8,
	$height9,
	$height10,
	$height11,
	$height12,
	$pay_u1,
	$pay_u2,
	$pay_u3,
	$pay_u4,
	$pay_u5,
	$pay_u6,
	$pay_u7,
	$pay_u8,
	$pay_u9,
	$pay_u10,
	$pay_u11,
	$pay_u12,
	$total_members,
        $thisamt,
        $thisamt2,
        $memberthis,
        $memberpre
    );

print_r("<div style='display: none;'>".$html["html_page"]["template"]."</div>");
 $form['bar'] = array(
  '#type' => 'markup',
  '#markup' => $html["html_page"]["template"],
 // '#allowed_tags' => ['html']['style'],


 );

}


 else {

// REDIRECT TO 403 PAGE
 throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
}




//$result = db_query("select memberid, membername, amount1, SUM(".$pgname."_amount), (amount1 - SUM(".$pgname."_amount)) as balance , DATE_FORMAT(billdate,'%Y%m')  from bill_details a left join uniview8_".$pgname."_response b on a.memberid = b.".$pgname."_memberid where particular1 = :TOTAL and b.".$pgname."_status = 's' and DATE_FORMAT(billdate,'%Y%m') = :amonth and DATE_FORMAT(paidtime,'%Y%m') = :bmonth group by amount1, memberid, membername, DATE_FORMAT(billdate,'%Y%m') order by balance desc limit 10", array (":TOTAL" => "TOTAL BILL AMOUNT", ":bmonth" => '201904',":amonth" => '201904'));
//$mon = $_GET[$today];
//$yr = $_GET['year'];
//$year = $_GET['ye'];
//$month = $_GET['mo'];
//$today = date("Ym");
//$y = date('Ym',strtotime('-4 month'));

$dummy = date("Y-m", strtotime('0 month'));
$d = date("Y-m", strtotime('-1 month'));

$c = date("Y-m", strtotime('0 month'));



//$current = $ye.$mo;

//drupal_set_message($ap);
//$ddate = $yr.$mon;

/**
$result = db_query("select memberid, membername, amount1, SUM(".$pgname."_amount), ROUND(amount1 - SUM(".$pgname."_amount)) as balance , DATE_FORMAT(billdate,'%Y%m')  from bill_details a left join ".$table." b on a.memberid = b.".$pgname."_memberid where particular1 = :TOTAL and b.".$pgname."_status = 's' and DATE_FORMAT(billdate,'%Y%m') = :amonth and DATE_FORMAT(paidtime,'%Y%m') = :bmonth and amount1 != 0 group by amount1, memberid, membername, DATE_FORMAT(billdate,'%Y%m') order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT", ':bmonth' => $d,':amonth' => $d));




if ($result) {
    $table_data = '<h3 >TopDefaulters this month</h3><table ><tr><th >Member id</th><th>Amount</th></tr>';
//<th>Memberid</th><th>Amount</th>
//drupal_set_message("success");

    foreach ($result as $row) {

      $table_data .= '<tr><td>' . $row->memberid .'</td><td>' . $row->balance .'</td></tr>'; 

    }
    $table_data .= '</table>';  
   $form['print_table'] = array(
     '#markup' => $table_data,
      '#empty' => t('No records available'),
   ); 


 }  
*/

//$result = db_query("select memberid, membername, amount1, SUM(".$pgname."_amount), ROUND(IFNULL(amount1,0) - IFNULL(SUM(".$pgname."_amount),0),2) as balance , DATE_FORMAT(billdate,'%Y-%m')  from bill_details a left join ".$table." b on a.memberid = b.".$pgname."_memberid and amount1 >= 0 where particular1 = :TOTAL and b.".$pgname."_status = 's' and DATE_FORMAT(billdate,'%Y-%m') = :amonth and DATE_FORMAT(paidtime,'%Y-%m') = :bmonth  group by amount1, memberid, membername, DATE_FORMAT(billdate,'%Y-%m') order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT", ':bmonth' => $dummy,':amonth' => $dummy));

//Defaulter this month
//$result = db_query("select memberid, membername, SUM(amount1), ".$pgname."amt, ROUND(SUM(amount1) - IFNULL((".$pgname."amt),0),2) as balance , DATE_FORMAT(billdate,'%Y-%m')  from bill_details a left join (select ".$pgname."_memberid,SUM(".$pgname."_amount) ".$pgname."amt from ".$table." where ".$pgname."_status = 's' and DATE_FORMAT(paidtime,'%Y-%m') = :bmonth group by ".$pgname."_memberid ) b on a.memberid = b.".$pgname."_memberid and amount1 >= 0 where particular1 = :TOTAL and DATE_FORMAT(billdate,'%Y-%m') = :amonth group by amount1, memberid, membername,".$pgname."amt, DATE_FORMAT(billdate,'%Y-%m') order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT", ':bmonth' => $dummy,':amonth' => $dummy));

$result = db_query("select memberid, membername, SUM(amount1), ".$pgname."amt, ROUND(SUM(amount1) - IFNULL((".$pgname."amt),0),2) as balance , DATE_FORMAT(billdate,'%Y-%m')  from bill_details a left join (select ".$pgname."_memberid,SUM(".$pgname."_amount) ".$pgname."amt from ".$table." where ".$pgname."_status = 's' and DATE_FORMAT(paidtime,'%Y-%m') = :bmonth group by ".$pgname."_memberid ) b on a.memberid = b.".$pgname."_memberid and amount1 >= 0 where particular1 != :TOTAL and particular1 != :OPEN and DATE_FORMAT(billdate,'%Y-%m') = :amonth group by memberid, membername,".$pgname."amt, DATE_FORMAT(billdate,'%Y-%m') order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT", ':bmonth' => $d,':amonth' => $d,':OPEN' => 'OPENING BAL'));



//$result1 = db_query("select memberid, membername, SUM(amount1), SUM(".$pgname."_amount), ROUND((SUM(amount1) - SUM(".$pgname."_amount)),2) as balance from bill_details a left join ".$table." b on a.memberid = b.".$pgname."_memberid where amount1 > 0 and   particular1 = :TOTAL and b.".$pgname."_status = 's' group by memberid, membername order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT"));

//Defaulter all time
//$result1 = db_query("select memberid, membername, SUM(amount1), ".$pgname."amt, ROUND(IFNULL(SUM(amount1),0) - IFNULL((".$pgname."amt),0),2) as balance from bill_details a left join (select ".$pgname."_memberid, SUM(".$pgname."_amount) as ".$pgname."amt from  ".$table." where ".$pgname."_status = 's' group by ".$pgname."_memberid ) b on a.memberid = b.".$pgname."_memberid where amount1 > 0 and   particular1 != :TOTAL and particular1 != :OPEN group by memberid, membername,".$pgname."amt order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT",':OPEN'=>'OPENING BAL'));
$result1 = db_query("select memberid , membername , SUM(amount1) balance from bill_details where particular1 = :TOTAL and DATE_FORMAT(billdate,'%Y-%m') = :amonth group by memberid, membername order by balance DESC limit 10",array(':TOTAL' => "TOTAL BILL AMOUNT", ':amonth' => $d));


//$result2 = db_query("select memberid, membername, amount1, SUM(".$pgname."_amount), ROUND((SUM(".$pgname."_amount) - amount1),2) as balance , DATE_FORMAT(billdate,'%Y-%m')  from bill_details a left join ".$table." b on a.memberid = b.".$pgname."_memberid where amount1 > 0 and  particular1 = :TOTAL and b.".$pgname."_status = 's' and DATE_FORMAT(billdate,'%Y-%m') = :amonth and DATE_FORMAT(paidtime,'%Y-%m') = :bmonth group by amount1, memberid, membername, DATE_FORMAT(billdate,'%Y-%m') order by balance desc limit 10;",array(':TOTAL'=> "TOTAL BILL AMOUNT",':bmonth' => $c,':amonth' => $c));

//Top usage
$result2 = db_query("select memberid, membername, particular1 ,ROUND(SUM(amount1),2) as balance from bill_details where particular1 !=:OPEN and particular1 != :TOTAL and particular1 !='' and DATE_FORMAT(billdate,'%Y-%m') = :amount group by memberid, membername, particular1 order by balance DESC limit 10;",array(':TOTAL' => "TOTAL BILL AMOUNT",':OPEN' => "OPENING BAL",':amount'=> $d));

/**
$result2 = db_select('bill_details','a');
	  $result2->fields('a',array('memberid','membername','amount1',"DATE_FORMAT(billdate','%Y-%m')")); 
	  $result2->leftjoin($table,'b',array('".$pgname."_memberid','".$pgname."_status'));
          $result2->where('SUM(".$pgname."_amount)','amount1','-');
          $result2->condition('a.memberid','b.".$pgname."_memberid','=');
          $result2->condition('b.".$pgname."_status','s','=');
        $result2->condition("DATE_FORMAT(billdate,'%Y-%m')",array($c));
        $result2->condition("DATE_FORMAT(paidtime,'%Y-%m')",array($c));
	  $result2->groupby('amount1', 'memberid', 'membername',"DATE_FORMAT(billdate,'%Y-%m')"); 
          $result2->orderby('balance','DESC');
          $result2->execute()->fetchAll();
*/

//Top usage facility wise
$result3 = db_query("select particular1 ,ROUND(SUM(amount1),2) as balance from bill_details where particular1 !=:OPEN and particular1 != :TOTAL and particular1 !='' and amount1 > 0 and DATE_FORMAT(billdate,'%Y-%m') = :amont group by particular1 order by balance DESC;",array(':TOTAL' => "TOTAL BILL AMOUNT",':OPEN' => "OPENING BAL",':amont'=> $d));


//drupal_set_message(hai);
 if($result1) {

 $table_data1 = '<h3>All Time</h3><table  class="responsive-enabled  table table-bordered table-striped table-hover responsive"><tr><th >Member Id</th><th>Member Name</th><th class="ritd">Amount</th></tr>';
$v= 0;
foreach ($result1 as $row) {

  
      $table_data1 .= '<tr><td>' . $row->memberid .'</td><td>'. $row->membername   .'</td><td class="ritd">' . (money_format("₹%n",$row->balance)).'</td></tr>';   
$v++;
 }
if($v < 1)
{
$table_data1 .= "<tr><td>No Records found</td></tr>";
}
    $table_data1 .= '</table>';  
$form['print_table'] = array(
//      '#markup' => $table_data1,


     );

    }


if($result) 

 {
$table_data = '<h3 >This Month</h3><table class="responsive-enabled table table-bordered table-striped table-hover responsive"><tr><th >Member Id</th><th>Member Name</th><th class="ritd">Amount</th></tr>';
$v = 0;
foreach ($result as $row) {

      $table_data .= '<tr><td>' . $row->memberid .'</td><td>'. $row->membername   .'</td><td class="ritd">' . (money_format("₹%n",$row->balance)) .'</td></tr>'; 
$v++; 
    }
if($v < 1)
{
$table_data .= "<tr><td>No Records found</td></tr>";
}

 $table_data .= '</table>';  
   $form['print_table1'] = array(
 //     '#markup' => $table_data,
     //    '#empty' => t('No entries available'),


    );  


}


$form['div1'] = array(
    '#type' => 'markup',
    '#markup' => '<h2 class="hea">Top Defaulters</h2><table class="responsive-enabled table table-bordered table-striped table-hover responsive" align ="center"><tr><td>'.$table_data.'</td><td>'.$table_data1.'</td></tr></table>',
   // '#empty' => 'No Records available',
);

if($result2) {

 $table_data2 = '<h3>Top Usage (This Month)</h3><table class="responsive-enabled table table-bordered table-striped table-hover responsive"><tr><th >Member Id</th><th>Member Name</th><th class="ritd">Amount</th></tr>';
$v = 0;
    foreach ($result2 as $row) {
      $table_data2 .= '<tr><td>' . $row->memberid .'</td><td>'. $row->membername   .'</td><td class="ritd">' . (money_format("₹%n",$row->balance)) .'</td></tr>';  
$v++; 
 }
if($v < 1)
{
$table_data2 .= "<tr><td>No Records found</td></tr>";
}
    $table_data2 .= '</table>';  
$form['print_table3'] = array(
      '#markup' => $table_data2,

     );

    }

if($result3) {

 $table_data3 = '<h3>Top Usage (Facility Wise This Month)</h3><table  class="responsive-enabled table table-bordered table-striped table-hover responsive"><tr><th >Facility</th><th class="ritd">Total Amount</th></tr>';
$v =0;
    foreach ($result3 as $row) {

//drupal_set_message($y);   

      $table_data3 .= '<tr><td>' . $row->particular1 .'</td><td class="ritd">' . (money_format("₹%n",$row->balance)) .'</td></tr>';   
$v++;
 }

if($v < 1)
{

$table_data3 .= "<tr><td>No Records found</td></tr>";
}
    $table_data3 .= '</table>';  
$form['print_table4'] = array(
      '#markup' => $table_data3,
     );

    }





//goto $result;


//else if ($result)  {

//<th>Memberid</th><th>Amount</th>
//drupal_set_message("success");
//goto $result1;
//} 





//drupal_set_message($name);


return $form;

// membername, amount1, SUM(".$pgname."_amount),, DATE_FORMAT(billdate,'%Y%m')
//$result1 = db_query("select memberid, ROUND((amount1 - SUM(".$pgname."_amount)),2) as balance from bill_details a left join ".$table." b on a.memberid = b.".$pgname."_memberid where particular1 = :TOTAL and b.".$pgname."_status = 's' and DATE_FORMAT(billdate,'%Y%m') = :amonth and DATE_FORMAT(paidtime,'%Y%m') = :bmonth group by amount1, memberid, membername, DATE_FORMAT(billdate,'%Y%m') order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT", ':bmonth' => $y,':amonth' => $y));

/**
$select = db_select($table,x);
$select->fields('x',array('memberid','balance'))
$select->condition('a.memberid','b.".$pgname."_memberid','=');
$select->condition('particular1','TOTAL BILL AMOUNT','=');
$select->condition('b.".$pgname."_status','s','=');
$select->condition('DATE_FORMAT'('billdate','%Y%m'),'$y');
$select->group by('amount1','memberid','membername','DATE_FORMAT'('billdate','%Y%m'));
$select->order by('balance','DESC','limit 10');
$result1=$select->execute()->fetchAll();   
*/
/**
if($result2) {

   foreach ($result2 as $row) {
      // Sanitize each entry.

    $headers = array(t(member Id),t(Member Name),t(Amount));
$rows = array();

$rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $tmparray);
}


 $form['mkup1'] = array(
     '#type' => 'markup',
     '#markup' => "<h1>".$result2['member_name']."</h1><h2>".$uid."</h2>",
      '#prefix' => "<table '><tr><td>",
      '#suffix' => "</td>",
    );

 $form['mkup2'] = array(
     '#type' => 'markup',
     '#markup' => "<h3></h3><h3></h3>",
 '#prefix' => "<td>",
      '#suffix' => "</td></tr>",
    );
 $form['mkup'] = array(
     '#type' => 'markup',
     '#markup' => "<hr/><h4>Top Defaulters</h4>",     
     '#prefix' => "<tr><td>",
    );

$form['table'] = array(
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
      '#suffix' => "</td></tr></table>",
    //  '#id' => 'customers',
    );

}
return $form;   

 
*/
}


/**
public function entryList() {

$userCurrent = \Drupal::currentUser();
    $user = \Drupal\user\Entity\User::load($userCurrent->id());

   // $table = \Drupal::config('table.settings')->get('tablename');
    $uid = $user->getUsername();

 $rows = array();
    $headers = array(t(memberid),t(Amount));


 foreach ($entries = $this->load() as $entry) {
$tmparray =  (array) $entry;

$rows[] = array_map('Drupal\Component\Utility\SafeMarkup::checkPlain', $tmparray);

$result1 = db_query("select memberid, membername, amount1, SUM(".$pgname."_amount), ROUND((amount1 - SUM(".$pgname."_amount)),2) as balance , DATE_FORMAT(billdate,'%Y%m')  from bill_details a left join ".$table." b on a.memberid = b.".$pgname."_memberid where particular1 = :TOTAL and b.".$pgname."_status = 's' and DATE_FORMAT(billdate,'%Y%m') = :amonth and DATE_FORMAT(paidtime,'%Y%m') = :bmonth group by amount1, memberid, membername, DATE_FORMAT(billdate,'%Y%m') order by balance desc limit 10", array (':TOTAL' => "TOTAL BILL AMOUNT", ':bmonth' => $y,':amonth' => $y));

$content['table'] = array(
      '#type' => 'table',
      '#header' => $headers,
      '#rows' => $rows,
      '#empty' => t('No entries available.'),
      '#suffix' => "</td>",
      '#id' => 'customers',
    );


    // Don't cache this page.
    $content['#cache']['max-age'] = 0;

    return $content;  

}
} 

*/

/**

public function parentbuildForm ($form,$form_state)  {
	$result = array();
$header = array(t(Memberid),t(Amount));

    $rows = array();

foreach($result as $rows)  {

$default [] = [
'Memberid'=>$rows->memberid,
'Amount'=>$rows->balance,
];

}
 $form['table'] = [
'#type' => 'table',
'#header' => $header,
'#rows' => $rows,
'#empty' => t('No users found'),
];

return paren::buildForm $form;

}
}
*/


function submitForm(array &$form, FormStateInterface $form_state) {

return;
}

}

function dashboard_graph($height1,$height2,$height3,$height4,$height5,$height6,$height7,$height8,$height9,$height10,$height11,$height12,
                        $pay_u1,$pay_u2,$pay_u3,$pay_u4,$pay_u5,$pay_u6,$pay_u7,$pay_u8,$pay_u9,$pay_u10,$pay_u11,$pay_u12,$total_members,$thisamt,$thisamt2, $memberthis,$memberpre) {

/**
$month1 = date('M-y', strtotime('-11 month'));
$month2 = date('M-y', strtotime('-10 month'));
$month3 = date('M-y', strtotime('-9 month'));
$month4 = date('M-y', strtotime('-8 month'));
$month5 = date('M-y', strtotime('-7 month'));
$month6 = date('M-y', strtotime('-6 month'));
$month7 = date('M-y', strtotime('-5 month'));
$month8 = date('M-y', strtotime('-4 month'));
$month9 = date('M-y', strtotime('-3 month'));
$month10 = date('M-y', strtotime('-2 month'));
$month11 = date('M-y', strtotime('-1 month'));
$month12 = date('M-y');
*/
/**
$month1 = date('M-y', strtotime('-15 month'));  //aug //apr
$month2 = date('M-y', strtotime('-14 month'));  //sep  //may
$month3 = date('M-y', strtotime('-13 month'));  //oct  //jun
$month4 = date('M-y', strtotime('-12 month'));   //nov //jul
$month5 = date('M-y', strtotime('-11 month'));   //dec  //aug
$month6 = date('M-y', strtotime('-10 month'));    //jan //sep
$month7 = date('M-y', strtotime('-9 month'));    //feb  //oct
$month8 = date('M-y', strtotime('-8 month'));    //mar  //nov
$month9 = date('M-y', strtotime('-7 month'));    //apr   //dec
$month10 = date('M-y', strtotime('-6 month'));  //may   //jan
$month11 = date('M-y', strtotime('-5 month'));   // jun //feb
$month12 = date('M-y',strtotime('-4 month'));    //jul  //mar
//$month12 = date('M-y');
*/
//$month1 = date('M-y',strtotime('-3 month'));

$month1 = "Apr".date('-y');
$month2 = "May".date('-y');
$month3 = "Jun".date('-y');
$month4 = "Jul".date('-y');
$month5 = "Aug".date('-y');
$month6 = "Sep".date('-y');
$month7 = "Oct".date('-y');
$month8 = "Nov".date('-y');
$month9 = "Dec".date('-y');
$month10 = "Jan".date('-y',strtotime('1 year'));
$month11 = "Feb".date('-y',strtotime('1 year'));
$month12 = "Mar".date('-y',strtotime('1 year'));





  return array(
    'html_page' => array(
      'template' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/><!-- IF YOUR THEME IS BARTIK SET IT TO main.php ELSE main3.php -->
		<link rel="stylesheet" type="text/css" href="/modules/uniview8_dashboard/src/styles/main.php?height1='.$height1.'&height2='.$height2.'&height3='.$height3.'&height4='.$height4.'&height5='.$height5.'&height6='.$height6.'&height7='.$height7.'&height8='.$height8.'&height9='.$height9.'&height10='.$height10.'&height11='.$height11.'&height12='.$height12.'"/>

	</head>
	<body>
                        <h1 align="center">Admin Dashboard<h1>
                        <p class="thismonth">This month<br>(Online Payment)</p>

                        <p class="previousmonth">Previous month<br>(Online Payment)</p>

                       <p class="thismonth1">'. $thisamt .' <br>by<br> '. $memberthis.' Members  </p> 

                       <p class="previousmonth1">'. $thisamt2 .'<br>by<br> '.$memberpre.' Members</p> 

			<p><div class="totalusers">Total Members</div>
                      

			<div class="totalusers1"><b>'. $total_members .'</b></div></p>

                        
		<!-- css bar graph -->
		<div class="css_bar_graph">
			
			<!-- y_axis labels -->
			<ul class="y_axis">
				<li><!--100--></li><li><!--90--></li><li><!--80--></li><li><!--70--></li><li><!--60--></li><li><!--50--></li><li><!--40--></li><li><!--30--></li><li><!--20--></li><li><!--10--></li><li><!--0--></li>
			</ul>
			
			<!-- x_axis labels -->
			<ul class="x_axis">
				<li>'.$month1.'</li><li>'.$month2.'</li><li>'.$month3.'</li><li>'.$month4.'</li><li>'.$month5.'</li><li>'.$month6.'</li><li>'.$month7.'</li><li>'.$month8.'</li><li>'.$month9.'</li><li>'.$month10.'</li><li>'.$month11.'</li><li>'.$month12.'</li>
			</ul>
			
			<!-- graph -->
			<div class="graph">
				<!-- grid -->
				<ul class="grid">
					<li><!-- 100 --></li>
					<li><!-- 90 --></li>
					<li><!-- 80 --></li>
					<li><!-- 70 --></li>
					<li><!-- 60 --></li>
					<li><!-- 50 --></li>
					<li><!-- 40 --></li>
					<li><!-- 30 --></li>
					<li><!-- 20 --></li>
					<li><!-- 10 --></li>
					<li class="bottom"><!-- 0 --></li>
				</ul>
				
				<!-- bars -->
				<!-- 240px = 100% -->
		<ul>
		<li class="bar nr_1 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u1)).'</span></li>
		<li class="bar nr_2 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u2)).'</span></li>
		<li class="bar nr_3 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u3)).'</span></li>
		<li class="bar nr_4 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u4)).'</span></li>
		<li class="bar nr_5 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u5)).'</span></li>		
		<li class="bar nr_6 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u6)).'</span></li>
		<li class="bar nr_7 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u7)).'</span></li>
		<li class="bar nr_8 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u8)).'</span></li>
		<li class="bar nr_9 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u9)).'</span></li>
		<li class="bar nr_10 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u10)).'</span></li>
		<li class="bar nr_11 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u11)).'</span></li>
		<li class="bar nr_12 purple"><div class="top"></div><div class="bottom"></div><span>'.(money_format("₹%n",$pay_u12)).'</span></li>

		</ul>	
			</div>
			
			<!-- graph label -->
			<div class="label">Usage Statistics of uniview</div>
		</div>
	</body>
</html>',
    ),
  );
}













 
