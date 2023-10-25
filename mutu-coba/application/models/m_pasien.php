<?php 

class M_pasien extends CI_Model{

	function tampil_data(){
		return $this->db->get('pasien');
	}

	function simpan_data($data){
		$this->db->insert('pasien',$data);
	}

	function edit_data($where){
		return $this->db->get_where('pasien',$where);
	}

	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('pasien',$data);
	}

	function hapus_data($where){
		$this->db->where($where);
		$this->db->delete('pasien',$where);
	}

}
