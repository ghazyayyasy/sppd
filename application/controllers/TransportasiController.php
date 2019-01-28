<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransportasiController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("TransportasiModel");

    }

    function index() {
        $data['data'] = $this->TransportasiModel->ambilDataTransportasi()->result();
        $this->load->view('transportasi', $data);
      }

      function TambahTransportasi() {
        if ($this->input->post('tambah') == 'tambah') {
          $namaTransportasi = $this->input->post('namaTransportasi');
          $input            = array('nama_transportasi' => $namaTransportasi);
          $this->TransportasiModel->tambahData('transportasi', $input);
          $this->session->set_flashdata('pesan', 'Data Sukses Ditambahkan');
          redirect(base_url('transportasi/index'));
        } else {
          redirect(base_url('transportasi/index'));
        }
      }

      function EditTransportasi($id) {
        if ($this->input->post('edit') == 'edit') {
          $namaTransportasi = $this->input->post('namaTransportasi');
          $input            = array('nama_transportasi' => $namaTransportasi);
          $this->TransportasiModel->updateData('transportasi', $input, 'id_transportasi', $id);
          $this->session->set_flashdata('pesan', 'Data Sukses Diperbarui');
          redirect(base_url('transportasi/index'));
        } else {
          redirect(base_url('transportasi/index'));
        }
      }
      function AjaxTransportasi() {
        $output = '';
        $id     = $this->input->post('id');
        $query  = $this->db->select('*')->from('transportasi')->where('id_transportasi = "'.$id.'"')->get()->row();
        if ($query == true) {
          $output .= $query->nama_transportasi;
        }
        echo $output;
      }

      function HapusTransportasi($id) {
        $this->TransportasiModel->hapusData('transportasi', 'id_transportasi', $id);
        redirect(base_url('transportasi/index'));
      }


    


}

?>