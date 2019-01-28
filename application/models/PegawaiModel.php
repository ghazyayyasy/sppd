<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model 
{
    // public function rules()
    // {
    //     return [
    //         ['field' => 'NIP',
    //         'label' => 'NIP',
    //         'rules' => 'required|max_length[3]'],

    //         ['field' => 'namaPegawai',
    //         'label' => 'Nama Pegawai',
    //         'rules' => 'required|alpha'],

    //         ['field' => 'idJabatan',
    //         'label' => 'Jabatan',
    //         'rules' => 'required'],
           
    //         ['field' => 'idGP',
    //         'label' => 'Golongan',
    //         'rules' => 'required'],

    //     ];
    // }

    function getPegawai(){
        $this->db->select('*');
        $this->db->from('pegawai a');
        $this->db->join('jabatan b', 'a.id_jabatan = b.id_jabatan');
        $this->db->join('gp c', 'a.id_gp = c.id_gp');
        return $this->db->get();
    }

    function addPegawai($table, $input){
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

    // function addPegawai(){
            // kosek
    // }
}