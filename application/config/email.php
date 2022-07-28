<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($_SERVER['SERVER_NAME'] == 'localhost'){
  $config = array(
      'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
      'smtp_host' => 'srv70.cloudserverzone.com',
      'smtp_port' => 465,
      'smtp_user' => 'mailer_testing@cryptappz.com',
      'smtp_pass' => '123456789',
      'smtp_crypto' => 'ssl', // can be 'ssl' or 'tls' for example
      'mailtype' => 'html', // plaintext 'text' mails or 'html'
      'smtp_timeout' => '4', // in seconds
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE,
      'reciever' => 'arnab47stars@gmail.com'
  );
}
else{
  $config = array(
      'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
      'smtp_host' => 'srv70.cloudserverzone.com',
      'smtp_port' => 465,
      'smtp_user' => 'support@saraha.co.in',
      'smtp_pass' => 'kee27V46%',
      'smtp_crypto' => 'ssl', // can be 'ssl' or 'tls' for example
      'mailtype' => 'html', // plaintext 'text' mails or 'html'
      'smtp_timeout' => '4', // in seconds
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE,
      'reciever' => 'support@saraha.co.in'
  );
}
