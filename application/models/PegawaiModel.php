<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model 
{

    function getPegawai(){
        $this->db->select('*');
        $this->db->from('pegawai a');
        $this->db->join('jabatan b', 'a.id_jabatan = b.id_jabatan');
        $this->db->join('gp c', 'a.id_gp = c.id_gp');
        return $this->db->get();
    }

    // function addPegawai(){
            // kosek
    // }
}