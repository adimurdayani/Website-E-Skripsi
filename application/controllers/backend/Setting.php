<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    
    is_logged_in();
  }

  public function index()
  {
    $data['judul'] = 'Data Users';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_user'] = $this->m_user->get_all_user();
    $data['get_grup'] = $this->db->get('tb_grup')->result_array();

    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tb_user.email]');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
    $this->form_validation->set_rules('konf_pass', 'konfirmasi password', 'trim|required|min_length[5]|matches[password]');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_user/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      $data = [
        'user_id'     => $this->input->post('user_id'),
        'user_active' => $this->input->post('user_active'),
        'nama'        => $this->input->post('nama'),
        'email'       => $this->input->post('email'),
        'username'    => $this->input->post('username'),
        'password'    => sha1($this->input->post('password')),
        'created_at'  => date('d M Y')        
      ];

      $this->db->insert('tb_user', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/setting');
    }
  }

  public function edit()
  {
    $data['judul'] = 'Data Users';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_user'] = $this->m_user->get_all_user();
    $data['get_grup'] = $this->db->get('tb_grup')->result_array();
    
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_user/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      $id = $this->input->post('id');
      
      $data = [
        'user_active' => $this->input->post('user_active'),
        'nama'        => $this->input->post('nama'),
        'email'       => $this->input->post('email'),
        'username'    => $this->input->post('username'),
        'created_at'  => date('d M Y')          
      ];

      $this->db->where('id', $id);
      
      $this->db->update('tb_user', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/setting');
    }
  }

  public function hapus($id)
  {
    $this->db->delete('tb_user', ['id' => $id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terhapus.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/setting');
  }

  public function grup()
  {
    $data['judul'] = 'Data Grup';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_grup'] = $this->db->get('tb_grup')->result_array();
    $this->form_validation->set_rules('nama_grup', 'nama grup', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_grup/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama_grup' => $this->input->post('nama_grup'),
        'created_at' => date("d M Y"),        
      ];
      
      $this->db->insert('tb_grup', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/setting/grup');
    }
    
  }

  public function edit_grup()
  {
    $data['judul'] = 'Data Grup';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_grup'] = $this->db->get('tb_grup')->result_array();
    $this->form_validation->set_rules('nama_grup', 'nama grup', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_grup/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('user_id');
      
      $data = [
        'nama_grup' => $this->input->post('nama_grup'),
        'created_at' => date("d M Y"),        
      ];
      
      $this->db->where('user_id', $id);
      
      $this->db->update('tb_grup', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/setting/grup');
    }
    
  }

  public function hapus_grup($id)
  {
    $this->db->delete('tb_grup', ['user_id' => $id]);

    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terhapus.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/setting/grup');
  }

  public function akses($user_id)
  {
    $data['judul'] = 'Data Akses';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['get_grup'] = $this->db->get_where('tb_grup', ['user_id' => $user_id])->row_array();
    $this->db->where('id_menu !=',1);
    $data['get_menu'] = $this->db->get('tb_menu')->result_array();
    $this->load->view('backend/layout/head', $data, FALSE);
    $this->load->view('backend/layout/sidebar', $data, FALSE);
    $this->load->view('backend/layout/header', $data, FALSE);
    $this->load->view('backend/tb_grup/akses', $data, FALSE);
    $this->load->view('backend/layout/footer', $data, FALSE);
  }

  public function ubahakses()
  {
    $menu_id = $this->input->post('menuId');
    $user_id = $this->input->post('userId');

    $data = [
      'user_id' => $user_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('tb_akses_menu', $data);
   
    if ($result->num_rows() < 1) {
      $this->db->insert('tb_akses_menu', $data);
    }else{
      $this->db->delete('tb_akses_menu', $data);
    }
    $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
  }

}

/* End of file User.php */