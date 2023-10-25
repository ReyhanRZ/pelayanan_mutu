<?php
class m_generatepdf extends CI_Model
{

    function queryAll()
    {
        $data = $this->db->query("SELECT * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator");
        return $data->result();
    }

    function queryFilter($bulan, $tahun)
    {
        $data = $this->db->query("SELECT * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator WHERE mutu.bulan = $bulan AND mutu.tahun = $tahun");
        return $data->result();
    }
}
