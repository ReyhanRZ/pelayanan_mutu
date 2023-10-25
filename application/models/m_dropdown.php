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
        // use result_array() instead of result() as you're getting value as an array in your view.

        return $query;
    }
}
