<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{
    
    function __construct() {
        parent::__construct();
      }
      function index() {
        if ($this->session->userdata('login') == 'yes') {
          redirect(base_url('dashboard/index'));
        } else {
          if ($this->input->post('login') == 'login') {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $cekLogin = $this->LoginModel->cekUser($username, $password)->row();
            if ($cekLogin == true) {
              $session =  array(
                                'username' => $cekLogin->username,
                                'namaUser' => $cekLogin->nama_user,
                                'login' => 'yes'
                          );
              $this->session->set_userdata($session);
              redirect(base_url('dashboard/index'));
            } else {
              echo '<script>alert("Username atau Password Salah");window.location.href = "'.base_url().'"</script>';
            }
          } else {
            $this->load->view('login');
          }
        }
      }

      function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
      }
    

}
