<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("PegawaiModel");
        $this->load->model("JabatanModel");
        $this->load->model("GPModel");
        $this->load->library("form_validation");
        $this->load->helper('form');
    }

    function index(){
        $data['jabatan']  = $this->JabatanModel->ambilDataJabatanUrutNama()->result();
        $data['gp']       = $this->GPModel->ambilDataGPUrutNama()->result();
        $data['pegawai']  = $this->PegawaiModel->getPegawai()->result();
        $this->load->view('pegawai', $data);
    }

    // public function rules()
    // {
    //     return [
    //         ['field' => 'NIP',
    //         'label' => 'NIP',
    //         'rules' => 'required'],

    //         ['field' => 'namaPegawai',
    //         'label' => 'Nama Pegawai',
    //         'rules' => 'required'],

    //         ['field' => 'idJabatan',
    //         'label' => 'Jabatan',
    //         'rules' => 'required'],
           
    //         ['field' => 'idGP',
    //         'label' => 'Golongan',
    //         'rules' => 'required'],


    //     ];
    // }

    function TambahPegawai() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('NIP', 'NIP', 'required|numeric|max_length[18]|is_unique[pegawai.nip]');
        $this->form_validation->set_rules('namaPegawai', 'Nama Pegawai', 'required|alpha');
        $this->form_validation->set_rules('idJabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('idGP', 'Golongan', 'required');
        // $pegawai = $this->PegawaiModel;
        // $validation = $this->form_validation;
        // $validation->set_rules($pegawai->rules());

        // if ($this->form_validation->run() == FALSE)
        // {
        //         $this->load->view('myform');
        // }
        // else
        // {
        //         $this->load->view('formsuccess');
        // }
        // if ($this->form_validation->run() == FALSE) {
        //     echo validation_errors();
        // }
        // else {
        
          if ($this->form_validation->run() == FALSE){
             echo validation_errors();
          }
          else {
 
          $nip          = $this->input->post('NIP');
          $namaPegawai  = $this->input->post('namaPegawai');
          $idJabatan    = $this->input->post('idJabatan');
          $idGP         = $this->input->post('idGP');
          $input        = array(
                                'nip'           => $nip,
                                'nama_pegawai'  => $namaPegawai,
                                'id_jabatan'    => $idJabatan,
                                'id_gp'         => $idGP
                          );

          $this->PegawaiModel->addPegawai('pegawai', $input);
          $this->session->set_flashdata('message', 'Data Sukses Ditambahkan');
          // redirect(base_url('pegawai/index'));
          echo "Sukses";
        //   else{
        //       echo error_validation();
        //   }
        }
      }
    // }

    function EditPegawai($id) {


      if($this->input->post('NIP') != $id) { // ini cek valid id nya dulu biar gak tabrakan sama diri sendiri
        $is_unique =  '|is_unique[pegawai.nip]';
     } else {
        $is_unique =  '';
     }
     
      //  $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean'.$is_unique);
      $this->form_validation->set_error_delimiters('', '');
      $this->form_validation->set_rules('NIP', 'NIP', 'required|numeric|max_length[18]'.$is_unique);
      $this->form_validation->set_rules('namaPegawai', 'Nama Pegawai', 'required|alpha');
      $this->form_validation->set_rules('idJabatan', 'Jabatan', 'required');
      $this->form_validation->set_rules('idGP', 'Golongan', 'required');

      if ($this->form_validation->run() == FALSE){
        echo validation_errors();
     }
     else {
        
          $nip          = $this->input->post('NIP');
          $namaPegawai  = $this->input->post('namaPegawai');
          $idJabatan    = $this->input->post('idJabatan');
          $idGP         = $this->input->post('idGP');
          $input        = array(
                                'nip'           => $nip,
                                'nama_pegawai'  => $namaPegawai,
                                'id_jabatan'    => $idJabatan,
                                'id_gp'         => $idGP
                          );
          $this->PegawaiModel->updateData('pegawai', $input, 'nip', $id);
          $this->session->set_flashdata('message', 'Data Sukses Diperbarui');
          // redirect(base_url('pegawai/index'));
          echo "Sukses";

        }
      
      }

      function AjaxPegawai() {
        $output = '';
        $id     = $this->input->post('id');
        $query  = $this->db->select('*')->from('pegawai')->where('nip = "'.$id.'"')->get()->row();
        if ($query == true) {
          $output .= $query->nama_pegawai;
        }
        echo $output;
      }

      function HapusPegawai($id) {
        $this->PegawaiModel->hapusData('pegawai', 'nip', $id);
        redirect(base_url('pegawai/index'));
      }
    
}

?>