<?php
// Penduduk.php
class m_grafik extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function graph($bulan, $tahun)
    {
        $data = $this->db->query("SELECT * from mutu WHERE mutu.bulan = $bulan and mutu.tahun = $tahun");
        //$data = $this->db->query("SELECT * from mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator WHERE mutu.bulan = $bulan and mutu.tahun = $tahun");
        return $data->result();
        //return $data->result_array();
    }

    public function title()
    {
        $data = $this->db->query("SELECT * from indikator");
        return $data->result();
    }
}
