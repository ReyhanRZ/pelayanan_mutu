<?php

class M_cucitangan extends CI_Model
{

    function hitung($numerator, $demunerator)
    {
        $rumus = ($numerator / $demunerator) * 100;
        return $rumus;
    }

    function simpan_data($data)
    {
        $this->db->insert('mutu', $data);
    }
}
