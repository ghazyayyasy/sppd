<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model 
{
    function ambilSPPDSelesai() {
		$this->db->select('count(no_sppd) jumlah');
		$this->db->from('sppd');
		$this->db->where('status = "Selesai"');
		return $this->db->get();
	}

	function ambilSPPDBelumCair() {
		$this->db->select('count(no_sppd) jumlah');
		$this->db->from('sppd');
		$this->db->where('status = "Pengajuan ke SDM Pusat"');
		return $this->db->get();
	}

	function ambilSPPDSDMPusat() {
		$this->db->select('count(no_sppd) jumlah');
		$this->db->from('sppd');
		$this->db->where('status = "Masuk Keuangan"');
		return $this->db->get();
    }

    function ambilDataSPPD() {
		$this->db->select('a.no_sppd, a.nip, a.maksud, a.rute, a.tgl_berangkat, a.tgl_berakhir, a.pembuat_daftar, a.biaya_pergi, a.biaya_pulang, a.akomodasi, a.status, b.nama_transportasi transport_berangkat, c.nama_transportasi transport_pulang, d.nama_pegawai, d.id_jabatan, a.jumlah_biaya, e.tarif');
		$this->db->from('sppd a');
		$this->db->join('transportasi b', 'a.id_transport_berangkat = b.id_transportasi');
		$this->db->join('transportasi c', 'a.id_transport_berakhir = c.id_transportasi');
		$this->db->join('pegawai d', 'a.nip = d.nip');
		$this->db->join('gp e', 'd.id_gp = e.id_gp');
		$this->db->order_by('a.tgl_berangkat', 'desc');
        return $this->db->get();
    }

}