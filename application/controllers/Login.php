<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index()
  {
    $data['judul'] = 'Login';
    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('auth/layout/head', $data, FALSE);
      $this->load->view('auth/index', $data, FALSE);
      $this->load->view('auth/layout/footer', $data, FALSE);
    } else {
      # code...
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = sha1($this->input->post('password'));
    $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

    if ($user) {
      if ($user['user_active'] == 1) {
        # code...
        if (sha1($password, $user['password'])) {
          # code...
          $data = [
            'username' => $user['username'],
            'user_id' => $user['user_id']
          ];

          $this->session->set_userdata($data);
          if ($user['user_id'] == 1) {
            # code...
            redirect('backend/admin');
            
          }else {
            
            redirect('backend/modul');
          }
        }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Gagal!</strong> Password anda salah.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
          
          redirect('login','refresh');
          
        }
      }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Gagal!</strong> Username anda tidak teraktivasi.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
        redirect('login','refresh');
      }
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Gagal!</strong> Username anda tidak terdaftar.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
      redirect('login','refresh');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Sukses!</strong> Anda berhasil logout.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>');
    redirect('login');
  }

  public function blocked()
  {
    // $this->load->view('login/blocked');
    echo "Akses block";
  }

}

/* End of file Login.php */