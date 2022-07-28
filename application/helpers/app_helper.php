<?php
// https://www.tutsmake.com/how-to-create-use-codeigniter-helpers/

if (! defined('BASEPATH')) exit('No direct script access allowed');

if (! function_exists('aap_session')) {
  function app_session() {
    return 1618322281;
  }
}

if (! function_exists('prd')) {
  function prd($array_name) {
    echo '<pre>';
    print_r($array_name);
    echo '</pre>';
    die;
  }
}

if (! function_exists('pr')) {
  function pr($array_name) {
    echo '<pre>';
    print_r($array_name);
    echo '</pre>';
  }
}

if (! function_exists('fb_date')) {
  function fb_date($d) {
    $date = new DateTime($d);
    return $date->format('F d, Y'); // March 03, 2018
  }
}

if (! function_exists('amount_inr_format')) {
  function amount_inr_format($amount) {
    $fmt = new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
    return $fmt->format($amount);
  }
}

if (! function_exists('project_name')) {
  function project_name() {
    return 'Sales';
  }
}
if (! function_exists('handle_mysql_error')) {
  function handle_mysql_error($error_data) {
    $message = '';
    if($error_data['code'] == 1062){
      $key_message = [];
      $key_message['customer_details']['cd_mobile'] = 'Customer Mobile No';
      $key_message['customer_details']['cd_pan'] = 'Customer PAN No';
      $key_message['customer_details']['cd_gst'] = 'Customer GST No';
      $key_message['customer_details']['cd_email'] = 'Customer Email id';
      $key_message['customer_details']['cd_login_id'] = 'Customer Login id';
      $key = rtrim(substr($error_data['message'],strpos($error_data['message'],"for key '")+9),"'");
      $message = $key_message[$error_data['table']][$key].' Already Exist';
    }
    return $message;
  }
}
if (! function_exists( 'generateNumericOTP' )){
  function generateNumericOTP($n) {
      $generator = "1357902468";
      $result = "";
      for ($i = 1; $i <= $n; $i++) {
          $result .= substr($generator, (rand()%(strlen($generator))), 1);
      }
      return $result;
  }
}
if (! function_exists( 'get_current_session' )){
  function get_current_session() {
    $current_month = intval(date('m'));
    if($current_month >= 4){
      $current_session = date('y').'-'.(intval(date('y'))+1);
    }
    else{
      $current_session = (intval(date('y'))+1).'-'.date('y');
    }
    return $current_session;
  }
}
if (! function_exists( 'escape_string' )){
  function escape_string($data){
    $result = array();
    foreach($data as $row){
      $result[] = str_replace('"', '', $row);
    }
    return $result;
  }
}
