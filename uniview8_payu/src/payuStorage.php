<?php

namespace Drupal\uniview8_payu;

class payuStorage {

static function insert($payu_key,$payu_txnid,$payu_amount,$payu_firstname,$payu_email,$payu_phone,$payu_product_info,$payu_serviceprovider,$payu_billdate,$payu_billnumber,$payu_memberid,$payu_transactiondesc,$payu_city,$payu_state,$payu_country,$payu_zip_code,$payu_pg,$payu_facility) {
    
db_insert('uniview8_payu_response')->fields(array(
      'payu_key' => $payu_key,
      'payu_txnid' => $payu_txnid,
      'payu_amount' => $payu_amount,
      'payu_firstname' => $payu_firstname,
      'payu_email' => $payu_email,
      'payu_product_info' => $payu_product_info,      
      'payu_phone' => $payu_phone,     
      'payu_serviceprovider' => $payu_serviceprovider,
      'payu_billdate' => $payu_billdate,
      'payu_billnumber' => $payu_billnumber,
      'payu_memberid' => $payu_memberid,
      'payu_transactiondesc' => $payu_transactiondesc,
      'payu_city' => $payu_city,
      'payu_state' => $payu_state,
      'payu_country' => $payu_country,
      'payu_zip_code' => $payu_zip_code,
      'payu_pg' => $payu_pg,   
      'payu_facility' => $payu_facility, 
    ))
    ->execute();

  }
  
 }
