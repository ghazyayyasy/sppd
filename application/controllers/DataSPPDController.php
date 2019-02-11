<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSPPDController extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model("SPPDModel");
    $this->load->model("PegawaiModel");
    $this->load->model("TransportasiModel");
    $this->load->model("GPModel");
    $this->load->model("JabatanModel");
  }

  function index() {
    $data['data'] = $this->SPPDModel->ambilDataSPPD()->result();
    $this->load->view('datasppd', $data);
  }

  function TambahSPPD() { // move ke view tambah, bukan controller untuk tambah data nya 
    if ($this->SPPDModel->ambilNoSPPD()->row() == true) {
      $data['no_sppd']    = $this->SPPDModel->ambilNoSPPD()->row()->no_sppd + 1;
    } else {
      $data['no_sppd']    = 1;
    }
    $data['pegawai']      = $this->PegawaiModel->getPegawai()->result();
    $data['transportasi'] = $this->TransportasiModel->ambilDataTransportasi()->result();
    $this->load->view('tambahsppd', $data);
  }
  function Tambah(){
    $noSPPD                   = $this->input->post('noSPPD');
    $namaPegawai              = $this->input->post('namaPegawai');
    $tglBerangkat             = $this->input->post('tglBerangkat');
    $tglBerakhir              = $this->input->post('tglBerakhir');
    $transportBerangkat       = $this->input->post('transportBerangkat');
    $transportPulang          = $this->input->post('transportPulang');
    $biayaTransportBerangkat  = $this->input->post('biayaTransportBerangkat');
    $biayaTransportPulang     = $this->input->post('biayaTransportPulang');
    $rutePerjalanan           = $this->input->post('rutePerjalanan');
    $pembuat                  = $this->input->post('pembuat');
    $maksud                   = $this->input->post('maksud');
    $totalBiaya               = $this->input->post('totalBiayaAngka');
    $status                   = "Pengajuan ke SDM Pusat";
    $input                    = array(
                                      'no_sppd'                 => $noSPPD,
                                      'nip'                     => $namaPegawai,
                                      'maksud'                  => $maksud,
                                      'rute'                    => $rutePerjalanan,
                                      'tgl_berangkat'           => $tglBerangkat,
                                      'tgl_berakhir'            => $tglBerakhir,
                                      'pembuat_daftar'          => $pembuat,
                                      'biaya_pergi'             => $biayaTransportBerangkat,
                                      'biaya_pulang'            => $biayaTransportPulang,
                                      'id_transport_berangkat'  => $transportBerangkat,
                                      'id_transport_berakhir'   => $transportPulang,
                                      'jumlah_biaya'            => $totalBiaya,
                                      'status'                  => $status
                                );
    $this->SPPDModel->tambahData('sppd', $input);
    $this->session->set_flashdata('pesan', 'Data Sukses Ditambahkan');
    redirect(base_url('datasppd/index'));
  }

  function EditSPPD($id) {
      $data['data']         = $this->SPPDModel->ambilDetailSPPD($id)->row();
      $data['pegawai']      = $this->SPPDModel->ambilDataPegawai()->result();
      $data['transportasi'] = $this->SPPDModel->ambilDataTransportasi()->result();
      $this->load->view('editsppd', $data);
  }

  function Edit($id){

      $noSPPD                   = $this->input->post('noSPPD');
      $namaPegawai              = $this->input->post('namaPegawai');
      $tglBerangkat             = $this->input->post('tglBerangkat');
      $tglBerakhir              = $this->input->post('tglBerakhir');
      $transportBerangkat       = $this->input->post('transportBerangkat');
      $transportPulang          = $this->input->post('transportPulang');
      $biayaTransportBerangkat  = $this->input->post('biayaTransportBerangkat');
      $biayaTransportPulang     = $this->input->post('biayaTransportPulang');
      $rutePerjalanan           = $this->input->post('rutePerjalanan');
      $pembuat                  = $this->input->post('pembuat');
      $maksud                   = $this->input->post('maksud');
      $totalBiaya               = $this->input->post('totalBiayaAngka');
      $status                   = $this->input->post('status');
      $input                    = array(
                                        'no_sppd'                 => $noSPPD,
                                        'nip'                     => $namaPegawai,
                                        'maksud'                  => $maksud,
                                        'rute'                    => $rutePerjalanan,
                                        'tgl_berangkat'           => $tglBerangkat,
                                        'tgl_berakhir'            => $tglBerakhir,
                                        'pembuat_daftar'          => $pembuat,
                                        'biaya_pergi'             => $biayaTransportBerangkat,
                                        'biaya_pulang'            => $biayaTransportPulang,
                                        'id_transport_berangkat'  => $transportBerangkat,
                                        'id_transport_berakhir'   => $transportPulang,
                                        'jumlah_biaya'            => $totalBiaya,
                                        'status'                  => $status
                                  );
      $this->SPPDModel->updateData('sppd', $input, 'no_sppd', $id);
      $this->session->set_flashdata('pesan', 'Data Sukses Diperbarui');
      redirect(base_url('datasppd/index'));
      // print_r($input);
    
  }
    //number_format(number,decimals,decimalpoint,separator)
  function AjaxFormattedTarifGP() {
    $nip = $this->input->post('nip');
    $tarif = $this->SPPDModel->ambilTarifGPPegawai($nip)->row()->tarif;
    echo 'Rp '.number_format($tarif, 0, '', '.');
  }

  function AjaxTarifGP() {
    $nip = $this->input->post('nip');
    $tarif = $this->SPPDModel->ambilTarifGPPegawai($nip)->row()->tarif;
    echo $tarif;
  }

  function cetakSPPD($id) {
    $data['data'] = $this->SPPDModel->detailCetakSPPD($id)->row();
    $this->load->view('cetaksppd', $data);
  }
  function AjaxSPPD() {
    $output = '';
    $id     = $this->input->post('id');
    $query  = $this->db->select('*')->from('sppd')->where('no_sppd = "'.$id.'"')->get()->row();
    if ($query == true) {
      $output .= $query->no_sppd;
    }
    echo $output;
  }

  function HapusSPPD($id) {
    $this->SPPDModel->hapusData('sppd', 'no_sppd', $id);
    redirect(base_url('datasppd/index'));
  }
}
  