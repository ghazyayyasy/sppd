<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GPController extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model("GPModel");

    }

    function index() {
        $data['data'] = $this->GPModel->ambilDataGPUrutNama()->result();
        $this->load->view('gp', $data);
      }

    function TambahGP() {
          $this->form_validation->set_error_delimiters('', '');
          $this->form_validation->set_rules('namaGP', 'Golongan', 'required|alpha|spaces');
          $this->form_validation->set_rules('tarif', 'Tarif', 'required');

          if ($this->form_validation->run() == FALSE){
            echo validation_errors();
         }
         else {
          $namaGP = $this->input->post('namaGP');
          $tarif  = $this->input->post('tarif');
          $input  = array(
                          'nama_gp' => $namaGP,
                          'tarif' => $tarif
                    );
          $this->GPModel->tambahData('gp', $input);
          $this->session->set_flashdata('pesan', 'Data Sukses Ditambahkan');
          // redirect(base_url('gp/index'));

          echo "Sukses";

        }
       
    }

    function EditGP($id) {
        if ($this->input->post('edit') == 'edit') {
          $namaGP = $this->input->post('namaGP');
          $tarif  = $this->input->post('tarif');
          $input  = array(
                          'nama_gp' => $namaGP,
                          'tarif' => $tarif
                    );
          $this->GPModel->updateData('gp', $input, 'id_gp', $id);
          $this->session->set_flashdata('pesan', 'Data Sukses Diperbarui');
          redirect(base_url('gp/index'));
        } else {
          redirect(base_url('gp/index'));
        }
      }

      function AjaxGP() {
        $output = '';
        $id     = $this->input->post('id');
        $query  = $this->db->select('*')->from('gp')->where('id_gp = "'.$id.'"')->get()->row();
        if ($query == true) {
          $output .= $query->nama_gp;
        }
        echo $output;
      }

      function HapusGP($id) {
        $this->GPModel->hapusData('gp', 'id_gp', $id);
        redirect(base_url('gp/index'));
      }
    


}

?>