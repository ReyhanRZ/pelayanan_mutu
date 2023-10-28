<?php

class m_dropdown extends CI_Model
{

    function tampil_select()
    {
        // $this->db->select('*');
        // $this->db->from('indikator');
        // $this->db->order_by('kd_indikator', 'ASC');

        //$query = $this->db->get('indikator')->result();
        $query = $this->db->get('indikator')->result_array();

        return $query;
    }

    function tampil_unit()
    {
        $query = $this->db->get('unit')->result_array();
        return $query;
    }
}
