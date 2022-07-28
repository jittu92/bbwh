<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ProductsModel');
    $this->load->helper(array('form', 'url'));
  }

  public function index()
  {
    if ($this->session_validation->authenticationforadmin()) {
      $products = $this->ProductsModel->get();
      $page_data = [
        'admin_id' => $this->session->userdata['admin_session_data']['admin_id'],
        'admin_name' => $this->session->userdata['admin_session_data']['admin_name'],
        'products' => $products,
        'page_name' => 'products',
        'aside_menu_name' => 'products',
        'aside_tab_name' => 'products',
        'page_title' => 'Products',
      ];
      // prd($page_data);
      $this->load->view('admin/products',$page_data);
    } else {
      redirect('admin');
    }
  }


  public function create()
  {

    if ($this->input->is_ajax_request()) {
      $response = [
        'success' => false,
        'message' => '',
      ];
      if ($this->session_validation->authenticationforadmin()) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pm_name', 'Product Name', 'required|alpha');
        $this->form_validation->set_rules('pm_price', 'Price', 'numeric');
        $this->form_validation->set_rules('pm_sale_price', 'Sale Price', 'numeric');
        $this->form_validation->set_rules('pm_stock', 'Stock', 'numeric');

        if ($this->form_validation->run() == FALSE)
        {
          $response['message'] = validation_errors();
        }
        else
        {
          $req_data = [
            'pm_name' => $this->input->post('pm_name', TRUE),
            'pm_description' => $this->input->post('pm_description', TRUE),
            'pm_price' => $this->input->post('pm_price', TRUE),
            'pm_sale_price' => $this->input->post('pm_sale_price', TRUE),
            'pm_stock' => $this->input->post('pm_stock', TRUE),
            'pm_created_by' => $this->session->userdata('admin_session_data')['admin_id']
          ];
          // prd($req_data);
          $this->db->trans_begin();
          $result = $this->ProductsModel->insert($req_data);
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
      }
      else {
        $response['message'] = 'You are not logged in';
      }
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
    } else {
      echo "No direct script access allowed";
      die;
    }

  }
  public function update()
  {
    if ($this->input->is_ajax_request()) {
      $response = [
        'success' => false,
        'message' => '',
      ];
      if ($this->session_validation->authenticationforadmin()) {
        $product_id = $this->uri->segment(4);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pm_name', 'Product Name', 'required|alpha');
        $this->form_validation->set_rules('pm_price', 'Price', 'numeric');
        $this->form_validation->set_rules('pm_sale_price', 'Sale Price', 'numeric');
        $this->form_validation->set_rules('pm_stock', 'Stock', 'numeric');

        if ($this->form_validation->run() == FALSE)
        {
          $response['message'] = validation_errors();
        }
        else
        {
          $req_data = [
            'pm_name' => $this->input->post('pm_name', TRUE),
            'pm_description' => $this->input->post('pm_description', TRUE),
            'pm_price' => $this->input->post('pm_price', TRUE),
            'pm_sale_price' => $this->input->post('pm_sale_price', TRUE),
            'pm_stock' => $this->input->post('pm_stock', TRUE),
          ];
          // prd($req_data);
          $this->db->trans_begin();
          $result = $this->ProductsModel->update($req_data, $product_id);
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
      }
      else {
        $response['message'] = 'You are not logged in';
      }

      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
    } else {
      echo "No direct script access allowed";
      die;
    }

  }
  public function delete()
  {
    if ($this->input->is_ajax_request()) {
      $response = [
        'success' => false,
        'message' => '',
      ];
      if ($this->session_validation->authenticationforadmin()) {
        if($this->session->userdata('admin_session_data')['admin_role'] == 1){
          $product_id = $this->uri->segment(4);
          $this->db->trans_begin();
          $result = $this->ProductsModel->delete($product_id);
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
        else {
          $response['message'] = 'You are not allowed to delete';
        }
      }
      else {
        $response['message'] = 'You are not logged in';
      }

      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
    } else {
      echo "No direct script access allowed";
      die;
    }

  }
  public function upload()
  {

    if ($this->input->is_ajax_request()) {
      $response = [
        'success' => false,
        'message' => '',
      ];
      // prd($_POST);
      if ($this->session_validation->authenticationforadmin()) {
        $file_name = uniqid();
        $file_path = APPPATH . '../assets/product_files/'.$file_name.'.csv';
        $this->load->library('upload');
        $config['upload_path'] = realpath(APPPATH . '../assets/product_files');
        $config['allowed_types'] = 'csv';
        $config['max_size']= '2048';
        $config['file_name']= $file_name;
        $config['file_ext_tolower']= TRUE;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('csv_file'))
        {
          $response['message'] = $this->upload->display_errors();
        }
        else
        {
          $data_upload_status = TRUE;
          $i = 0;
          $product_fields = ['NAME', 'DESCRIPTION', 'PRICE', 'SALE PRICE', 'STOCK'];
          $csv_file = fopen($file_path, 'r');
          $csv_file_fields = fgetcsv($csv_file, 1000, ';');
          $keys_values = explode(',', $csv_file_fields[0]);
          $keys = escape_string($keys_values);
          // prd($keys);
          if ($keys == $product_fields) {
            $this->db->trans_begin();
            while(($row = fgetcsv($csv_file, 1000, ';')) !== FALSE){
              if($row != NULL){
                ++$i;
                $product_data = explode(',', $row[0]);
                $product_data = escape_string($product_data);
                if(isset($_POST['input_required'])){
                  foreach ($_POST['input_required'] as $req_p_key => $req_p_data) {
                    if ($product_data[$req_p_data] == '') {
                      $response['message'] = $product_fields[$req_p_data].' is required for row '.$i;
                      $data_upload_status = FALSE;
                      break;
                    }
                  }
                }
                if ($data_upload_status == TRUE) {
                  $req_data = [
                    'pm_name' => $product_data[0],
                    'pm_description' => $product_data[1],
                    'pm_price' => $product_data[2],
                    'pm_sale_price' => $product_data[3],
                    'pm_stock' => $product_data[4],
                    'pm_created_by' => $this->session->userdata('admin_session_data')['admin_id']
                  ];
                  // prd($req_data);
                  $result = $this->ProductsModel->insert($req_data);
                  if ($result['success'] == FALSE){
                    $data_upload_status = FALSE;
                    break;
                  }
                }
                else {
                  break;
                }
              }
            }
            if ($data_upload_status == TRUE){
              $response['success'] = true;
              $response['message'] = 'Products Imported successfully';
              $this->db->trans_commit();
            }
            else{
              $this->db->trans_rollback();
            }
          }
          else {
            $data_upload_status = FALSE;
            $response['message'] = 'Keys Not Match';
          }
          fclose($csv_file);
          unlink(APPPATH . '../assets/product_files/'.$file_name.'.csv');
        }
      }
      else {
        $response['message'] = 'You are not logged in';
      }
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
    } else {
      echo "No direct script access allowed";
      die;
    }

  }
}
