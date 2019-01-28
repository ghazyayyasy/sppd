<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GPModel extends CI_Model 
{

	function ambilDataGP() {
		return $this->db->get('gp');
	}

	function ambilDataGPUrutNama() {
		$this->db->order_by('nama_gp', 'asc');
		return $this->db->get('gp');
	}

	function tambahData($table, $input) {
		$this->db->insert($table, $input);
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

