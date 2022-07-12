<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

  public function __construct()
  {
    parent::__construct();  
    is_logged_in();
    $this->load->model('m_data');
    
  }

  public function index()
  {
    $data['judul'] = 'Data Judul';
    $data['get_judul'] = $this->m_data->get_all_judul();
    $data['get_tema'] = $this->db->get('tb_tema')->result_array();
    $data['get_pembimbing'] = $this->db->get('tb_pembimbing')->result_array();
    $data['get_konsentrasi'] = $this->db->get('tb_konsentrasi')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required');
    $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
    $this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
    $this->form_validation->set_rules('judul', 'judul', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'id_tema' => $this->input->post('id_tema'),
        'is_active' => $this->input->post('is_active'),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'email' => $this->input->post('email'),
        'no_hp' => $this->input->post('no_hp'),
        'kelamin' => $this->input->post('kelamin'),
        'jurusan' => $this->input->post('jurusan'),
        'konsentrasi' => $this->input->post('konsentrasi'),
        'judul' => $this->input->post('judul'),
        'pem_satu' => $this->input->post('pem_satu'),
        'pem_dua' => $this->input->post('pem_dua'),
        'keterangan' => $this->input->post('keterangan'),
        'created_at' => date("d M Y")
      ];

      $this->db->insert('tb_judul', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul');
    }
    
  }

  public function edit()
  {
    $data['judul'] = 'Data Judul';
    $data['get_judul'] = $this->m_data->get_all_judul();
    $data['get_tema'] = $this->db->get('tb_tema')->result_array();
    $data['get_pembimbing'] = $this->db->get('tb_pembimbing')->result_array();
    $data['get_konsentrasi'] = $this->db->get('tb_konsentrasi')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('judul', 'judul', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/index', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'is_active' => $this->input->post('is_active'),
        'nim' => $this->input->post('nim'),
        'nama' => $this->input->post('nama'),
        'judul' => $this->input->post('judul'),
        'created_at' => date("d M Y")
      ];

      $this->db->where('id', $id);
      
      $this->db->update('tb_judul', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul');
    }
    
  }

  public function hapus($id)
  {
    $this->db->delete('tb_judul', ['id' => $id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terhapus.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul');
  }

  public function detail($id)
  {
    $data['judul'] = 'Data Detail';
    $data['get_id_judul'] = $this->m_data->get_id_judul($id);
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('backend/layout/head', $data, FALSE);
    $this->load->view('backend/layout/sidebar', $data, FALSE);
    $this->load->view('backend/layout/header', $data, FALSE);
    $this->load->view('backend/tb_judul/detail', $data, FALSE);
    $this->load->view('backend/layout/footer', $data, FALSE);
  }

  public function tema()
  {
    $data['judul'] = 'Data Tema';
    $data['get_tema'] = $this->m_data->get_all_tema();
    $data['get_konsentrasi'] = $this->db->get('tb_konsentrasi')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('tema', 'tema', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/tema', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'id_konsentrasi' => $this->input->post('id_konsentrasi'),
        'tema' => $this->input->post('tema'),
        'created_at' => date("d M Y")
      ];

      $this->db->insert('tb_tema', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/tema');
    }
    
  }

  public function edit_tema()
  {
    $data['judul'] = 'Data Tema';
    $data['get_tema'] = $this->db->get('tb_tema')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('tema', 'tema', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/tema', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id_tema');
      
      $data = [
        'id_konsentrasi' => $this->input->post('id_konsentrasi'),
        'tema' => $this->input->post('tema'),
        'created_at' => date("d M Y")
      ];

      $this->db->where('id_tema', $id);

      $this->db->update('tb_tema', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/tema');
    }
    
  }

  public function hapus_tema($id)
  {
    $this->db->delete('tb_tema', ['id_tema' => $id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terhapus.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/tema');
  }

  public function konsentrasi()
  {
    $data['judul'] = 'Data Konsentrasi';
    $data['get_konsentrasi'] = $this->db->get('tb_konsentrasi')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_kons', 'nama konsentrasi', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/konsentrasi', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama_kons' => $this->input->post('nama_kons'),
        'created_at' => date("d M Y")
      ];

      $this->db->insert('tb_konsentrasi', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/konsentrasi');
    }
    
  }

  public function edit_konsentrasi()
  {
    $data['judul'] = 'Data Konsentrasi';
    $data['get_konsentrasi'] = $this->db->get('tb_konsentrasi')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_kons', 'nama konsentrasi', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/konsentrasi', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'nama_kons' => $this->input->post('nama_kons'),
        'created_at' => date("d M Y")
      ];

      $this->db->where('id', $id);      
      $this->db->update('tb_konsentrasi', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/konsentrasi');
    }
    
  }

  public function hapus_konsentrasi($id)
  {
    $this->db->delete('tb_konsentrasi', ['id' => $id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terhapus.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/konsentrasi');
  }

  public function pembimbing()
  {
    $data['judul'] = 'Data Pembimbing';
    $data['get_pembimbing'] = $this->db->get('tb_pembimbing')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nip', 'NIDN', 'trim|required');
    $this->form_validation->set_rules('nama_pem', 'nama dosen', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/pembimbing', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nip' => $this->input->post('nip'),
        'nama_pem' => $this->input->post('nama_pem'),
        'created_at' => date("d M Y")
      ];

      $this->db->insert('tb_pembimbing', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah tersimpan.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/pembimbing');
    }
  }

    public function edit_pembimbing()
  {
    $data['judul'] = 'Data Pembimbing';
    $data['get_pembimbing'] = $this->db->get('tb_pembimbing')->result_array();
    $data['user_ses'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nip', 'NIDN', 'trim|required');
    $this->form_validation->set_rules('nama_pem', 'nama dosen', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layout/head', $data, FALSE);
      $this->load->view('backend/layout/sidebar', $data, FALSE);
      $this->load->view('backend/layout/header', $data, FALSE);
      $this->load->view('backend/tb_judul/pembimbing', $data, FALSE);
      $this->load->view('backend/layout/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id_pem');
      
      $data = [
        'nip' => $this->input->post('nip'),
        'nama_pem' => $this->input->post('nama_pem'),
        'created_at' => date("d M Y")
      ];

      $this->db->where('id_pem', $id);
      
      $this->db->update('tb_pembimbing', $data);
      $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terubah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/pembimbing');
    }
    
  }

  public function hapus_pembimbing($id)
  {
    $this->db->delete('tb_pembimbing', ['id_pem' => $id]);
    $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> data anda telah terhapus.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('backend/modul/pembimbing');
  }

}

/* End of file Modeul.php */