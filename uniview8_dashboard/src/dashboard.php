<?php

namespace Drupal\uniview8_dashboard;
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

 $counts = db_query("select count(name) as users_count from users_field_data as us join user__roles as ur on us.uid = ur.entity_id where ur.roles_target_id='member' and us.status=1;");

foreach ($counts as $records) {
 $total_members  = $records->users_count;
}

 $percent = 250/$total_members;
 $height = array();
 $pay_u = array();
 $h = 1;
 $u = 1;

for($i = 3; $i >= 0; $i--){

 $paid_user = 0;
 $date = date('Y-m', strtotime('-'.$i.' month'));

 /* UPDATE QUERY BY ADDING STATUS = SUCCESS IN WHERE CONDITION THEN ONLY IT WILL FILTER SUCESSFULL PAYMENTS */
$table = \Drupal::config('dashboard.settings')->get('tablename');
/*$memberid = \Drupal::config('dashboard.settings')->get('field1');
$time = \Drupal::config('dashboard.settings')->get('field2');*/

$split = explode('_', $table, 3);
$pgname = $split['1'];
$query = db_query("desc $table");
$name = array();

foreach($query as $values){
$field = $values->Field;
$name[$values->Field] = $values->Field;
}

 $counts2 = db_query("select count(distinct(".$pgname."_memberid)) as users from ".$table." where  DATE_FORMAT(paidtime, '%Y-%m') = :date group by ".$pgname."_memberid;", array(':date' => $date));

foreach($counts2 as $values){
 $paid_user += $values->users;
 }

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
	$total_members
    );

print_r("<div style='display: none;'>".$html["html_page"]["template"]."</div>");
 $form['bar'] = array(
  '#type' => 'markup',
  '#markup' => $html["html_page"]["template"],
 // '#allowed_tags' => ['html']['style'],
 );
} else {

// REDIRECT TO 403 PAGE
 throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException();
}

return $form;
 }

function submitForm(array &$form, FormStateInterface $form_state) {

return;
}

}

function dashboard_graph($height1,$height2,$height3,$height4,$height5,$height6,$height7,$height8,$height9,$height10,$height11,$height12,
                        $pay_u1,$pay_u2,$pay_u3,$pay_u4,$pay_u5,$pay_u6,$pay_u7,$pay_u8,$pay_u9,$pay_u10,$pay_u11,$pay_u12,$total_members) {

/*$month1 = date('M-y', strtotime('-11 month'));
$month2 = date('M-y', strtotime('-10 month'));
$month3 = date('M-y', strtotime('-9 month'));
$month4 = date('M-y', strtotime('-8 month'));
$month5 = date('M-y', strtotime('-7 month'));
$month6 = date('M-y', strtotime('-6 month'));
$month7 = date('M-y', strtotime('-5 month'));
$month8 = date('M-y', strtotime('-4 month'));*/
$month9 = date('M-y', strtotime('-3 month'));
$month10 = date('M-y', strtotime('-2 month'));
$month11 = date('M-y', strtotime('-1 month'));
$month12 = date('M-y');

  return array(
    'html_page' => array(
      'template' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/><!-- IF YOUR THEME IS BARTIK SET IT TO main.php ELSE main3.php -->
		<link rel="stylesheet" type="text/css" href="/modules/uniview8_dashboard/src/styles/main.php?height1='.$height1.'&height2='.$height2.'&height3='.$height3.'&height4='.$height4.'&height5='.$height5.'&height6='.$height6.'&height7='.$height7.'&height8='.$height8.'&height9='.$height9.'&height10='.$height10.'&height11='.$height11.'&height12='.$height12.'"/>

	</head>
	<body>
			<p><div class="totalusers">Total Members</div>
			<div class="totalusers1"><b>'. $total_members .'</b></div></p>
		<!-- css bar graph -->
		<div class="css_bar_graph">
			
			<!-- y_axis labels -->
			<ul class="y_axis">
				<li>100%</li><li>90%</li><li>80%</li><li>70%</li><li>60%</li><li>50%</li><li>40%</li><li>30%</li><li>20%</li><li>10%</li><li>0%	</li>
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
				<!-- 250px = 100% -->
		<ul>
		<li class="bar nr_1 purple"><div class="top"></div><div class="bottom"></div><span>'.$pay_u1.'</span></li>
		<li class="bar nr_2 purple"><div class="top"></div><div class="bottom"></div><span>'.$pay_u2.'</span></li>
		<li class="bar nr_3 purple"><div class="top"></div><div class="bottom"></div><span>'.$pay_u3.'</span></li>
		<li class="bar nr_4 purple"><div class="top"></div><div class="bottom"></div><span>'.$pay_u4.'</span></li>
		
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
 
