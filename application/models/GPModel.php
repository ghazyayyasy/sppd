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


}

