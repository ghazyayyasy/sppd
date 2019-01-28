<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("JabatanModel");

    }

    function index() {
        $data['data'] = $this->JabatanModel->ambilDataJabatanUrutNama()->result();
        $this->load->view('jabatan', $data);
      }

    function TambahJabatan() {
        if ($this->input->post('tambah') == 'tambah') {
            $namaJabatan  = $this->input->post('namaJabatan');
            $input        = array('nama_jabatan' => $namaJabatan);
            $this->JabatanModel->tambahData('jabatan', $input);
            $this->session->set_flashdata('pesan', 'Data Sukses Ditambahkan');
            redirect(base_url('jabatan/index'));
          } else {
            redirect(base_url('jabatan/index'));
          }
    }

    function EditJabatan($id) {
        if ($this->input->post('edit') == 'edit') {
          $namaJabatan  = $this->input->post('namaJabatan');
          $input        = array('nama_jabatan' => $namaJabatan);
          $this->JabatanModel->updateData('jabatan', $input, 'id_jabatan', $id);
          $this->session->set_flashdata('pesan', 'Data Sukses Diperbarui');
          redirect(base_url('jabatan/index'));
        } else {
          redirect(base_url('jabatan/index'));
        }
      }

      function AjaxJabatan() {
        $output = '';
        $id     = $this->input->post('id');
        $query  = $this->db->select('*')->from('jabatan')->where('id_jabatan = "'.$id.'"')->get()->row();
        if ($query == true) {
          $output .= $query->nama_jabatan;
        }
        echo $output;
      }

      function HapusJabatan($id) {
        $this->JabatanModel->hapusData('jabatan', 'id_jabatan', $id);
        redirect(base_url('jabatan/index'));
      }


    


}

?>