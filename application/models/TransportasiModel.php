<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransportasiModel extends CI_Model 
{


	function ambilDataTransportasi() {
		$this->db->order_by('nama_transportasi', 'asc');
		return $this->db->get('transportasi');
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

