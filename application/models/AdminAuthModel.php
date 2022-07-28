<?php
class AdminAuthModel extends CI_Model
{
  public function login($user_name, $user_pass){
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];
    // prd($user_pass);
    $query = $this->db->select('*')
    ->where('admin_username', $user_name)
    // ->where('user_status', 1)
    ->get('admin_details');

    if ($query->num_rows() > 0) {

      $user = $query->row();
      $admin_id = $user->admin_id;
      $admin_name = $user->admin_name;
      $admin_username = $user->admin_username;
      $admin_role = $user->admin_role;
      $password = $user->admin_pass;

      $admin_session_data = [
        'admin_id' => $admin_id,
        'admin_name' => $admin_name,
        'admin_username' => $admin_username,
        'admin_role' => $admin_role,
        'app_session'=> 1618322281, // this digit paste in application->helper->app_helper->app_session
      ];
      if (password_verify($user_pass, $password)) {
        $response = [
          'success' => true,
          'message' => 'Successfully Logged in.',
          'data' => $admin_session_data
        ];
      }
      else {
        $response['message'] = 'Entered password is wrong.';
      }
    }
    else {
      $response['message'] = 'Entered username is wrong.';
    }
    return $response;
  }
}
