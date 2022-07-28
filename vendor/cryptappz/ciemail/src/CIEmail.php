<?php

namespace cryptappz\CIEmail;

class CIEmail
{
  public $protocol = 'smtp'; // 'mail', 'sendmail', or 'smtp'
  public $smtp_host = 'srv70.cloudserverzone.com';
  public $smtp_port = 465;
  public $smtp_user = 'noreply@webprismits.com';
  public $smtp_user_name; // Username or AppName
  public $smtp_pass;
  public $smtp_crypto = 'ssl'; // can be 'ssl' or 'tls' for example
  public $mailtype = 'html'; // plaintext 'text' mails or 'html'
  public $smtp_timeout = '4'; // in seconds
  public $charset = 'iso-8859-1';
  public $wordwrap = TRUE;
  public $email_template_data = [];
  
  public $config= [
    'charset' => 'utf-8',
    'wordwrap' => TRUE,
    'mailtype' => 'html'
  ];

  public $set_newline = "\r\n";

  public function __construct()
  {
    // do nothing
  }

  public function getMessage()
  {
    $CI =& get_instance();

    $msg = '';
    if(isset($this->email_template_data['message'])){
      $msg .= $this->email_template_data['message'];
    }

    if(isset($this->email_template_data['header'])){
      $msg .= $CI->load->view($this->email_template_data['header'], $this->email_template_data['page_data'], true);
    }

    if(isset($this->email_template_data['template'])){
      $msg .= $CI->load->view($this->email_template_data['template'], $this->email_template_data['page_data'], true);
    }

    if(isset($this->email_template_data['footer'])){
      $msg .= $CI->load->view($this->email_template_data['footer'], $this->email_template_data['page_data'], true);
    }

    return $msg;
  }

  public function sendEmail()
  {
    $CI =& get_instance();

    $to = $this->email_template_data['to'];
    $subject = $this->email_template_data['subject'];
    $from = $this->smtp_user;
    $smtp_user_name = $this->smtp_user_name;

    $msg = $this->getMessage();

    $config = $this->config;

    $CI->email->initialize($config);
    $CI->email->set_newline("\r\n");
    $CI->email->from($from, $smtp_user_name);
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($msg);

    if ($CI->email->send()) {
      // echo 'Your Email has successfully been sent.';
      return 1;
    }
    else {
      return $CI->email->print_debugger();
    }
  }
}
