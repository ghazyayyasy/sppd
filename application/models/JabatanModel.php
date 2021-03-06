<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanModel extends CI_Model 
{

	function ambilDataJabatan() {
		return $this->db->get('jabatan');
	}

	function ambilDataJabatanUrutNama() {
		$this->db->order_by('nama_jabatan', 'asc');
		return $this->db->get('jabatan');
	}

	function tambahData($tabel, $input) {
		$this->db->insert($tabel, $input);
	}

	function updateData($tabel, $input, $where, $nilaiWhere) {
		$this->db->where($where, $nilaiWhere);
		$this->db->update($tabel, $input);
	}

	function hapusData($tabel, $where, $nilaiWhere) {
		$this->db->where($where, $nilaiWhere);
		$this->db->delete($tabel);
	}
}

