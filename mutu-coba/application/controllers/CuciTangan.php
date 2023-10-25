<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CuciTangan extends CI_Controller
{
    public function index()
    {
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_cucitangan');
        $this->load->view('v_footer');
    }

    public function hitung()
    {
        $this->load->model('m_cucitangan');
        $data['denominator'] = $this->input->post('denominator');
        $data['numerator'] = $this->input->post('numerator');
        $data['hasil'] = $this->m_cucitangan->hitung($data['numerator'], $data['denominator']);
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_cucitangan', $data);
        $this->load->view('v_footer');
    }
}
