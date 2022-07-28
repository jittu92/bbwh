## Asana
- https://app.asana.com/0/1201293746594444/list

## DB Diagram
- https://dbdiagram.io/d/6096b170b29a09603d13fd3e [Arnab]
- https://dbdiagram.io/d/61974c7f02cf5d186b5e2fdc [Debu]

## 404 page configuration (as reference)
- `ProductsController.php`

## Library Used
- https://github.com/sonata-project/GoogleAuthenticator [for 2fa]

## How to send email
### #1-step
create a file called `email.php` on `application/config/`. replace the following code:
```
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  $config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'srv30.cloudserverzone.com',
    'smtp_port' => 465,
    'smtp_user' => 'mailer_testing@cryptappz.com',
    'smtp_pass' => '123456789',
    'smtp_crypto' => 'ssl', // can be 'ssl' or 'tls' for example
    'mailtype' => 'text', // plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', // in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
  );
} else {
  // Production settings
  $config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'srv30.cloudserverzone.com',
    'smtp_port' => 465,
    'smtp_user' => 'mailer_testing@cryptappz.com',
    'smtp_pass' => '123456789',
    'smtp_crypto' => 'ssl', // can be 'ssl' or 'tls' for example
    'mailtype' => 'text', // plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', // in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
  );
}
```
### #2-step
Add these two lines on controller:
```
$this->load->config('email');
$this->load->library('email');
```
### #3-step
Add the following on controller as mail body:
```
$to = 'your@email';
$from = $this->config->item('smtp_user');
$msg = 'Hi sir,<br>Please approve new Work Order http://localhost/saraogi-v2/estimation-list-locked/details/2';

$this->email->set_newline("\r\n");
$this->email->from($from);
$this->email->to($to);
$this->email->subject('Work Order Approval');
$this->email->message($msg);

if ($this->email->send()) {
  echo 'Your Email has successfully been sent.';
} else {
  show_error($this->email->print_debugger());
}
```
```
Array
(
  [user_session_data] => Array
    (
      [user_id] => 1
      [user_fullname] => Admin
      [user_username] => admin
      [user_avatar] => 10548877_986385781403136_7217125309863284364_o.jpg
      [user_role] => 1
      [user_2fa_status] => 1
      [app_session] => 1618322281
      [session_id] => 9
    )
)
```