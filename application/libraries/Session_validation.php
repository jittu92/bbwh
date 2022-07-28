<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_validation
{
  public function authentication()
  {
    // die();
    $CI =& get_instance();

    if (!$CI->session->userdata('user_session_data')) {
        return false;
    }
    if (isset($_SESSION['user_session_data']['app_session']) && $_SESSION['user_session_data']['app_session'] === app_session()) {
        return true;
    } else {
        $CI->session->sess_destroy();
        return false;
    }
  }
  public function authenticationforadmin()
  {
    $CI =& get_instance();

    if (!$CI->session->userdata('admin_session_data')) {
      return false;
    }
    if (isset($_SESSION['admin_session_data']['app_session']) && $_SESSION['admin_session_data']['app_session'] === app_session()) {
      return true;
    } else {
      !$CI->session->sess_destroy();
      return false;
    }
  }
  public function authenticationforemployee()
  {
    $CI =& get_instance();

    if (!$CI->session->userdata('employee_session_data')) {
      return false;
    }
    if (isset($_SESSION['employee_session_data']['app_session']) && $_SESSION['employee_session_data']['app_session'] === app_session()) {
      return true;
    } else {
      !$CI->session->sess_destroy();
      return false;
    }
  }
  public function authenticationforuser()
  {
    $CI =& get_instance();

    if (!$CI->session->userdata('user_session_data')) {
      return false;
    }
    if (isset($_SESSION['user_session_data']['app_session']) && $_SESSION['user_session_data']['app_session'] === app_session()) {
      return true;
    } else {
      !$CI->session->sess_destroy();
      return false;
    }
  }

  public function authenticationforsubsation()
  {
    $CI =& get_instance();

    if (!$CI->session->userdata('sub_session_data')) {
      return false;
    }
    if (isset($_SESSION['sub_session_data']['app_session']) && $_SESSION['sub_session_data']['app_session'] === app_session()) {
      return true;
    } else {
      !$CI->session->sess_destroy();
      return false;
    }
  }
}
