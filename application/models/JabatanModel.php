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


}

