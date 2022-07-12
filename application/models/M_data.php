<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

  public function get_all_submenu()
  {
    $querysubmenu = "SELECT `tb_sub_menu`.*, `tb_menu`.`menu`
                      FROM `tb_sub_menu`
                      JOIN  `tb_menu` ON `tb_sub_menu`.`menu_id` = `tb_menu`.`id_menu`
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function get_all_tema()
  {
    $querysubmenu = "SELECT `tb_tema`.*, `tb_konsentrasi`.`nama_kons`
                      FROM `tb_tema`
                      JOIN  `tb_konsentrasi` ON `tb_tema`.`id_konsentrasi` = `tb_konsentrasi`.`id`
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function get_all_judul()
  {
    $judul = "SELECT `tb_judul`.*, `tb_konsentrasi`.`nama_kons`,`tb_pembimbing`.`nama_pem`,`tb_tema`.`tema`
                      FROM `tb_judul`
                      JOIN  `tb_konsentrasi` ON `tb_judul`.`konsentrasi` = `tb_konsentrasi`.`id`
                      JOIN  `tb_pembimbing` ON `tb_judul`.`pem_satu` = `tb_pembimbing`.`id_pem`
                      JOIN  `tb_tema` ON `tb_judul`.`id_tema` = `tb_tema`.`id_tema`
                  ";
    return $this->db->query($judul)->result_array();
  }

  public function get_id_judul($id)
  {
    $detailjudul = "SELECT `tb_judul`.*, `tb_konsentrasi`.`nama_kons`,`tb_pembimbing`.`nama_pem`,`tb_tema`.`tema`
                      FROM `tb_judul`
                      JOIN  `tb_konsentrasi` ON `tb_judul`.`konsentrasi` = `tb_konsentrasi`.`id`
                      JOIN  `tb_pembimbing` ON `tb_judul`.`pem_satu` = `tb_pembimbing`.`id_pem`
                      JOIN  `tb_tema` ON `tb_judul`.`id_tema` = `tb_tema`.`id_tema`
                      WHERE `tb_judul`.`id` = $id
                  ";
    return $this->db->query($detailjudul)->row_array();
  }

  public function add_judul($data)
  {
    $this->db->insert('tb_judul', $data);
    return $this->db->affected_rows();
  }

  public function edit_judul($data, $id)
  {
    $this->db->update('tb_judul', $data, ['id' => $id]);
    return $this->db->affected_rows();
  }

  public function get_id_tema($id)
  {
    $temaid = "SELECT `tb_tema`.*, `tb_konsentrasi`.`nama_kons`
                      FROM `tb_tema`
                      JOIN  `tb_konsentrasi` ON `tb_tema`.`id_konsentrasi` = `tb_konsentrasi`.`id`
                      WHERE `tb_tema`.`id_tema` = $id
                  ";
    return $this->db->query($temaid)->row_array();
  }

}

/* End of file M_data.php */