<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authclass {
  
  public function __construct($params)
  {
    $this->load->library('session');
  }

  public function authentication()
  {
    if (!$this->session->userdata('user_session_data')) {
      return false;
    }
    if (isset($_SESSION['user_session_data']['app_session']) && $_SESSION['user_session_data']['app_session'] === app_session()) {
      return true;
    } else {
      $this->session->sess_destroy();
      return false;
    }
  }
  
}
