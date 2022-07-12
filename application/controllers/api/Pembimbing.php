<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;
class Pembimbing extends BD_Controller {
  
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
      $data_pembimbing = $this->db->get('tb_pembimbing')->result_array();
      
    }else{

      // mengambil data dengan id yang di kirim
      $data_pembimbing = $this->db->get_where('tb_pembimbing', ['id' => $id])->row_array();

    }

    if ($data_pembimbing) {
      # response laporan jika data laporan ada, dan menampilkan semua data laporan
      $this->response([
        'status'  => true,
        'data'    => $data_pembimbing,
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

/* End of file Pembimbing.php */