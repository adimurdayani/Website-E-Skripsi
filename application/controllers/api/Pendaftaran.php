<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Pendaftaran extends BD_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('m_data');
    
  }
  

  public function index_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('id');

    // kondisi jika id laporan tidak di temukan 
    
    if ($id === null) {
      
      // mengambil data dari database
      $data_judul = $this->m_data->get_all_judul();
      
    }else{

      // mengambil data dengan id yang di kirim
      $data_judul = $this->m_data->get_id_judul($id);

    }

    if ($data_judul) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $data_judul,
        'message' => 'sukses'
      ], REST_Controller::HTTP_OK);

    }else {
      # response laporan jika laporan tidak ada
      $this->response([
        'status'  => false,
        'message' => 'data tidak di temukan'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }

  public function kirim_post()
  {
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
    // proses data yang di kirim ke database
    if ($this->m_data->add_judul($data) > 0) {
      
      // response jika data yang di kirim ada
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'laporan berhasil disimpan'
      ], REST_Controller::HTTP_CREATED);
      
    }else {
      
      // jika data yang di kirim tidak valid
      $this->response([
        'status' => false,
        'message'=> 'data gagal tersimpan'
      ], REST_Controller::HTTP_BAD_REQUEST);
      
    }
  }

  public function edit_post()
  {
    $id = $this->post('id');
    $data = [
      'id_tema' => $this->input->post('id_tema'),
      'is_active' => 0,
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
    // proses data yang di kirim ke database
    if ($this->m_data->edit_judul($data, $id) > 0) {
      
      // response jika data yang di kirim ada
      $this->response([
        'status'  => true,
        'data'    => $data,
        'message' => 'laporan berhasil disimpan'
      ], REST_Controller::HTTP_CREATED);
      
    }else {
      
      // jika data yang di kirim tidak valid
      $this->response([
        'status' => false,
        'message'=> 'data gagal tersimpan'
      ], REST_Controller::HTTP_BAD_REQUEST);
      
    }
  }

}

/* End of file Pendaftaran.php */