<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

  function cekUser($username, $password) {
    return $this->db->get_where('user', array('username' => $username, 'password' => $password));
  }

}

?>