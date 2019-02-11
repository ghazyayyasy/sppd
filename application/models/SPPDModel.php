<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPPDModel extends CI_Model 
{
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
	
	function ambilNoSPPD() {
		$this->db->select('no_sppd');
		$this->db->from('sppd');
		$this->db->order_by('no_sppd', 'desc');
		$this->db->limit(1);
		return $this->db->get();
	}

	function ambilTarifGPPegawai($nip) {
		$this->db->select('tarif');
		$this->db->from('pegawai a');
		$this->db->join('gp b', 'a.id_gp = b.id_gp');
		$this->db->where('a.nip', $nip);
		return $this->db->get();
	}

	function tambahData($tabel, $input) {
		$this->db->insert($tabel, $input);
	}

	function hapusData($tabel, $where, $nilaiWhere) {
		$this->db->where($where, $nilaiWhere);
		$this->db->delete($tabel);
	}

	function updateData($tabel, $input, $where, $nilaiWhere) {
		$this->db->where($where, $nilaiWhere);
		$this->db->update($tabel, $input);
	}
	function detailCetakSPPD($id) {
		$this->db->select('a.no_sppd, a.nip, a.maksud, a.jumlah_biaya, a.rute, a.tgl_berangkat, a.tgl_berakhir, a.id_transport_berangkat, a.id_transport_berakhir, a.pembuat_daftar, a.biaya_pergi, a.biaya_pulang, b.nama_pegawai, b.nip, c.nama_jabatan, d.nama_gp, d.tarif, e.nama_transportasi transport_berangkat, f.nama_transportasi transport_pulang');
		$this->db->from('sppd a');
		$this->db->join('pegawai b', 'a.nip = b.nip');
		$this->db->join('jabatan c', 'b.id_jabatan = c.id_jabatan');
		$this->db->join('gp d', 'b.id_gp = d.id_gp');
		$this->db->join('transportasi e', 'a.id_transport_berangkat = e.id_transportasi');
		$this->db->join('transportasi f', 'a.id_transport_berakhir = f.id_transportasi');
		$this->db->where('a.no_sppd', $id);
		return $this->db->get();
	}

	function ambilDetailSPPD($id) {
		$this->db->select('no_sppd, a.nip, tgl_berangkat, tgl_berakhir, id_transport_berangkat, id_transport_berakhir, biaya_pergi, biaya_pulang, rute, pembuat_daftar, jumlah_biaya, maksud, status, tarif');
		$this->db->from('sppd a');
		$this->db->join('pegawai b', 'a.nip = b.nip');
		$this->db->join('gp c', 'b.id_gp = c.id_gp');
		$this->db->where('no_sppd', $id);
		return $this->db->get();
	}
	function ambilDataPegawai() {
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
		$this->db->join('gp', 'pegawai.id_gp = gp.id_gp');
		return $this->db->get();
	}

	function ambilDataTransportasi() {
		$this->db->order_by('nama_transportasi', 'asc');
		return $this->db->get('transportasi');
	}
}