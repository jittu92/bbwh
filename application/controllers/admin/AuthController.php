<?php
  defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AdminAuthModel');
    $this->load->model('AdminModel');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
  }
  public function index()
  {
    // prd(app_session());
    if ($this->session_validation->authenticationforadmin()) {
      redirect("admin/dashboard");
    } else {

      $this->load->view('admin/login');
    }
  }
  public function login()
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];
    if (!$this->session_validation->authenticationforadmin()) {
      if ($this->input->is_ajax_request()) {

        // prd($_POST);
        $this->form_validation->set_rules('user_name', 'Username', 'required');
        $this->form_validation->set_rules('user_pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
          $response['message'] = validation_errors();
        }
        else
        {
          $user_name = $this->input->post('user_name');
          $user_pass = $this->input->post('user_pass');
          $result = $this->AdminAuthModel->login($user_name, $user_pass);
          $response = $result;
          if($result['success']){
            $this->session->set_userdata('admin_session_data', $result['data']);
          }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));

      } else {
        $response['message'] = 'No direct script access allowed';
        echo json_encode($response);
      }
    }
    else {
      $response['message'] = 'You are already logged in';
      echo json_encode($response);
    }
  }
  public function sign_up()
  {
    if ($this->session_validation->authenticationforadmin()) {
      redirect("admin/dashboard");
    } else {
      $this->load->view('admin/register');
    }
  }

  public function register()
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];
    if (!$this->session_validation->authenticationforadmin()) {
      if ($this->input->is_ajax_request()) {

        // prd($_REQUEST);
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|is_unique[admin_details.admin_username]');
        $this->form_validation->set_rules('user_pass', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_conf_pass', 'Confirm Password', 'trim|required|matches[user_pass]');

        // prd($this->form_validation->run());

        if ($this->form_validation->run() == FALSE)
        {
          $response['message'] = validation_errors();
        }
        else
        {
          $req_data = [
            'admin_name' => $this->input->post('full_name'),
            'admin_username' => $this->input->post('user_name'),
            'admin_pass' => password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT)
          ];
          $this->db->trans_begin();
          $result = $this->AdminModel->insert($req_data);
          unset($result['data']);
          $response = $result;
          if ($result['success'] == FALSE)
          {
            $this->db->trans_rollback();
          }
          else
          {
            $this->db->trans_commit();
          }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));

      } else {
        $response['message'] = 'No direct script access allowed';
        echo json_encode($response);
      }
    }
    else {
      $response['message'] = 'You are already logged in';
      echo json_encode($response);
    }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect("admin"); // base_url() found at config.php
  }
  public function dashboard()
  {
    if ($this->session_validation->authenticationforadmin()) {

      $page_data = [
        'admin_id' => $this->session->userdata['admin_session_data']['admin_id'],
        'admin_name' => $this->session->userdata['admin_session_data']['admin_name'],
        'page_title' => 'Dashboard',
        'page_name' => 'dashboard',
        'aside_menu_name' => 'dashboard',
      ];
      // prd($page_data);
      $this->load->view('admin/dashboard', $page_data);
    } else {
      redirect("admin/login");
    }
  }


}
