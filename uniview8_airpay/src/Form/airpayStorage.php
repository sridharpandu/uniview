<?php

namespace Drupal\uniview8_airpay\Form;

class airpayStorage {

static function insert($airpay_amount,$airpay_username,$airpay_email,$airpay_phone,$airpay_billdate,$airpay_billnumber,$airpay_userid,$airpay_orderid) {

db_insert('uniview8_airpay_response')->fields(array(
      'airpay_firstname' => $airpay_username,
      'airpay_memberid' => $airpay_userid,
      'airpay_email' => $airpay_email,
      'airpay_phone' => $airpay_phone,    
      'airpay_billdate' => $airpay_billdate,
      'airpay_billnumber' => $airpay_billnumber,
      'airpay_amount' => $airpay_amount,
      'airpay_orderid' => $airpay_orderid,
      'airpay_status' => 'C',
    ))
    ->execute();


}
  
 }
