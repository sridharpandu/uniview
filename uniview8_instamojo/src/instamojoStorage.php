<?php

namespace Drupal\uniview8_instamojo;

class instamojoStorage {

static function insert($instamojo_amount,$instamojo_firstname,$instamojo_email,$instamojo_phone,$instamojo_purpose,$instamojo_billdate,$instamojo_billnumber,$instamojo_memberid,$instamojo_city,$instamojo_pin_code) {

db_insert('uniview8_instamojo_response')->fields(array(
      'instamojo_amount' => $instamojo_amount,
      'instamojo_firstname' => $instamojo_firstname,
      'instamojo_email' => $instamojo_email,
      'instamojo_purpose' => $instamojo_purpose,      
      'instamojo_phone' => $instamojo_phone,    
      'instamojo_billdate' => $instamojo_billdate,
      'instamojo_billnumber' => $instamojo_billnumber,
      'instamojo_memberid' => $instamojo_memberid,
      'instamojo_city' => $instamojo_city,
      'instamojo_pin_code' => $instamojo_pin_code,
    ))
    ->execute();


}
  
 }
