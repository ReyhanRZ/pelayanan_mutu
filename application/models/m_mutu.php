<?php

class m_mutu extends CI_Model
{

    function tampil_data()
    {
        $data = $this->db->query("SELECT * from mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator");
        return $data->result();
    }

    function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('mutu', $where);
    }

    public function mutu_filter($bulan, $tahun)
    {
        $data = $this->db->query("SELECT * from mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator  WHERE mutu.bulan = $bulan and mutu.tahun = $tahun");
        return $data->result();
        //return $data->result_array();
    }

    function edit_data($where)
    {
        // return $this->db->get_where('mutu', $where);
        $data = $this->db->query("SELECT * from mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator  WHERE mutu.kd_mutu = $where");
        return $data->result();
    }

    function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('mutu', $data);
        // $this->db->query("UPDATE mutu SET  ON mutu.kd_indikator = indikator.kd_indikator  WHERE mutu.kd_mutu = $where");

    }
}
