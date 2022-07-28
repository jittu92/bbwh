<?php

class ProductsModel extends CI_Model
{
  public function get()
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];

    $query = $this->db->select('*')
    ->from('products_master pm')
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
  public function get_by_any($search_by)
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];

    $query = $this->db->select('*')
    ->like('pm_tenant_name',$search_by,'both')
    ->or_like('pm_address',$search_by,'both')
    ->from('products_master pm')
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


    $result = $this->db->insert('products_master', $req_data);

    if ($result) {
      $property_id = $this->db->insert_id();
      $response['success'] = TRUE;
      $response['message'] = "Property Created Successfully";
      $response['data']['pm_id'] = $property_id;
    } else {
      $response['message'] = $this->db->error();
      $response['data']['table'] = 'products_master';
    }

    return $response;
  }
  public function update($req_data, $property_id)
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];
    $result = $this->db->where('pm_id', $property_id)->update('products_master', $req_data);
    if ($result) {
      $response['success'] = TRUE;
      $response['message'] = "Property Updated Successfully";
    }
    else {
      $response['message'] = $this->db->error();
      $response['data']['table'] = 'products_master';
    }
    return $response;
  }
  public function delete($property_id)
  {
    $response = [
      'success' => false,
      'message' => '',
      'data' => []
    ];
    $result = $this->db->where('pm_id', $property_id)->delete('products_master');
    if ($result) {
      $response['success'] = TRUE;
      $response['message'] = "Property Deleted Successfully";
    }
    else {
      $response['message'] = $this->db->error();
      $response['data']['table'] = 'products_master';
    }
    return $response;
  }
}
