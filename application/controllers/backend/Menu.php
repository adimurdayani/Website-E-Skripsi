<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('m_data');
  }
  

  public function index()
  {
    $data['judul'] = 'Data Menu';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_menu'] = $this->db->get('tb_menu')->result_array();
    $this->form_validation->set_rules('menu', 'menu', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_menu/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'menu' => $this->input->post('menu')        
      ];
      
      $this->db->insert('tb_menu', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/menu');
    }
    
  }

  public function edit()
  {
    $data['judul'] = 'Data Menu';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_menu'] = $this->db->get('tb_menu')->result_array();
    $this->form_validation->set_rules('menu', 'menu', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_menu/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id_menu');
      
      $data = [
        'menu' => $this->input->post('menu')        
      ];
      
      $this->db->where('id_menu', $id);
      
      $this->db->update('tb_menu', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/menu');
    }
    
  }

  public function hapus($id)
  {
    $this->db->delete('tb_menu', ['id_menu' => $id]);
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
    redirect('backend/menu');
  }

  public function submenu()
  {
    $data['judul'] = 'Data Sub Menu';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_submenu'] = $this->m_data->get_all_submenu();
    $data['get_menu'] = $this->db->get('tb_menu')->result_array();
    
    $this->form_validation->set_rules('judul', 'judul', 'trim|required');
    $this->form_validation->set_rules('url', 'url', 'trim|required');
    $this->form_validation->set_rules('icon', 'icon', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_menu/submenu', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'menu_id' => $this->input->post('menu_id'),        
        'judul' => $this->input->post('judul'),        
        'url' => $this->input->post('url'),        
        'icon' => $this->input->post('icon'),        
        'is_active' => $this->input->post('is_active'),        
      ];
      
      $this->db->insert('tb_sub_menu', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/menu/submenu');
    }
    
  }

  public function edit_submenu()
  {
    $data['judul'] = 'Data Sub Menu';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_submenu'] = $this->m_data->get_all_submenu();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_menu'] = $this->db->get('tb_menu')->result_array();
    
    $this->form_validation->set_rules('judul', 'judul', 'trim|required');
    $this->form_validation->set_rules('url', 'url', 'trim|required');
    $this->form_validation->set_rules('icon', 'icon', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_menu/submenu', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('sub_id');
      
      $data = [
        'menu_id' => $this->input->post('menu_id'),        
        'judul' => $this->input->post('judul'),        
        'url' => $this->input->post('url'),        
        'icon' => $this->input->post('icon'),        
        'is_active' => $this->input->post('is_active'),        
      ];
      $this->db->where('sub_id', $id);
      
      $this->db->update('tb_sub_menu', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/menu/submenu');
    }
    
  }

  public function hapus_submenu($id)
  {
    $this->db->delete('tb_sub_menu', ['sub_id' => $id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> data anda telah terhapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
    redirect('backend/menu/submenu');
  }

}

/* End of file Menu.php */