<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Tema extends BD_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('m_data');
    
  }

  public function index_get()
  {
    // mengambil data yang di kirim
    $id = $this->get('id_tema');

    // kondisi jika id laporan tidak di temukan 
    
    if ($id === null) {
      
      // mengambil data dari database
      $data_tema = $this->m_data->get_all_tema();
      
    }else{

      // mengambil data dengan id yang di kirim
      $data_tema = $this->m_data->get_id_tema($id);

    }

    if ($data_tema) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $data_tema,
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

/* End of file Tema.php */