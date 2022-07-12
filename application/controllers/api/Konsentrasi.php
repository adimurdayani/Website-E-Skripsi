<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Konsentrasi extends BD_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    
  }

  public function index_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('id');

    // kondisi jika id laporan tidak di temukan 
    
    if ($id === null) {
      
      // mengambil data dari database
      $data_konsentrasi = $this->db->get('tb_konsentrasi')->result_array();
      
    }else{

      // mengambil data dengan id yang di kirim
      $data_konsentrasi = $this->db->get_where('tb_konsentrasi', ['id' => $id])->row_array();

    }

    if ($data_konsentrasi) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $data_konsentrasi,
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

}

/* End of file Konsentrasi.php */