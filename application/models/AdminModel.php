<?php

class AdminModel extends CI_Model
{
  public function get()
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];

    $query = $this->db->select('*')
    ->from('admin_details ad')
    ->get();

    if ($query->num_rows() > 0) {
      $response['success'] = true;
      $response['message'] = 'Records Found';
      $response['data'] = $query->result();
    } else {
      $response['message'] = 'NO-DATA-FOUND';
    }
    return $response;
  }
  public function insert($req_data)
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];


    $result = $this->db->insert('admin_details', $req_data);

    if ($result) {
      $admin_id = $this->db->insert_id();
      $response['success'] = TRUE;
      $response['message'] = "Admin Created Successfully";
      $response['data']['admin_id'] = $admin_id;
    } else {
      $response['message'] = $this->db->error();
      $response['data']['table'] = 'admin_details';
    }

    return $response;
  }
  
}
