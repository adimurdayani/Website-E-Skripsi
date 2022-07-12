<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    is_logged_in();
  }

  public function index()
  {
    $data['judul'] = 'Data Profil';
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('backend/layout/head', $data, FALSE);
    $this->load->view('backend/layout/sidebar', $data, FALSE);
    $this->load->view('backend/layout/header', $data, FALSE);
    $this->load->view('backend/tb_profil/index', $data, FALSE);
    $this->load->view('backend/layout/footer', $data, FALSE);
  }

}

/* End of file Profil.php */