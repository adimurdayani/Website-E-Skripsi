<?php 

function is_logged_in(){

  $ci = get_instance();
  
  if (!$ci->session->userdata('username')) {

    redirect('login');
    
  }else{

    $user_id = $ci->session->userdata('user_id');
    $menurl = $ci->uri->segment(2);

    $querymenu = $ci->db->get_where('tb_menu', ['menu' => $menurl])->row_array();
    $menu_id = $querymenu['id_menu'];

    $aksesmenu = $ci->db->get_where('tb_akses_menu', [
      'user_id' => $user_id,
      'menu_id' => $menu_id
    ]);

    if ($aksesmenu->num_rows() < 1) {
      redirect('login/blocked');
    }
  }
}

function check_akses($user_id, $menu_id){

  $ci = get_instance();
  
  $ci->db->where('user_id', $user_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('tb_akses_menu');

  if ($result->num_rows() > 0) {
    return "checked='checked'";
  }
}