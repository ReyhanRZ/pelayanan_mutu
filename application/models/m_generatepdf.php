<?php
class m_generatepdf extends CI_Model
{

    function queryAll()
    {
        $data = $this->db->query("SELECT * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator INNER JOIN unit ON mutu.kd_unit = unit.kd_unit");
        return $data->result();
    }

    function queryFilter($bulan, $tahun)
    {
        $data = $this->db->query("SELECT * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator INNER JOIN unit ON mutu.kd_unit = unit.kd_unit WHERE mutu.bulan = $bulan AND mutu.tahun = $tahun");
        return $data->result();
    }

    function queryFilterUnit($unit)
    {
        $data = $this->db->query("SELECT * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator INNER JOIN unit ON mutu.kd_unit = unit.kd_unit WHERE mutu.kd_unit = $unit");
        return $data->result();
    }

    function queryFilterLengkap($unit, $bulan, $tahun)
    {
        $data = $this->db->query("SELECT * FROM mutu INNER JOIN indikator ON mutu.kd_indikator = indikator.kd_indikator INNER JOIN unit ON mutu.kd_unit = unit.kd_unit WHERE mutu.bulan = $bulan AND mutu.tahun = $tahun AND mutu.kd_unit = $unit");
        return $data->result();
    }
}
