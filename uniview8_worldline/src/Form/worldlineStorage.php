<?php

namespace Drupal\uniview8_worldline\Form;

class worldlineStorage {

static function insert($worldline_amount,$worldline_username,$worldline_email,$worldline_phone,$worldline_billdate,$worldline_billnumber,$worldline_userid,$worldline_orderid) {

db_insert('uniview8_worldline_response')->fields(array(
      'worldline_firstname' => $worldline_username,
      'worldline_memberid' => $worldline_userid,
      'worldline_email' => $worldline_email,
      'worldline_phone' => $worldline_phone,    
      'worldline_billdate' => $worldline_billdate,
      'worldline_billnumber' => $worldline_billnumber,
      'worldline_amount' => $worldline_amount,
      'worldline_orderid' => $worldline_orderid,
      'worldline_status' => 'C',
    ))
    ->execute();


}
  
 }
