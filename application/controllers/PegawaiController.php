<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("PegawaiModel");
    }

    function index(){
        $data['pegawai'] = $this->PegawaiModel->getPegawai()->result();
        var_dump($data);
        $this->load->view('pegawai', $data);
    }

}

?>