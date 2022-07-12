<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

  public function get_all_user()
  {
    $querysubmenu = "SELECT `tb_user`.*, `tb_grup`.`nama_grup`
                      FROM `tb_user`
                      JOIN  `tb_grup` ON `tb_user`.`user_id` = `tb_grup`.`user_id`
                  ";
    return $this->db->query($querysubmenu)->result_array();
  }

  public function get_username($username)
  {
    return $this->db->get_where('tb_user', $username);
  }

}

/* End of file M_user.php */