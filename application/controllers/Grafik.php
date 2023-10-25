<?php
class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_grafik');
    }

    public function index()
    {
        $this->load->view('v_header');
        $this->load->view('grafik/chart');
        $this->load->view('v_footer');
    }

    public function filter()
    {
        $date = $this->input->post('date');
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));
        $data['graph'] = $this->m_grafik->graph($bulan, $tahun);
        //var_dump($data['title']);
        $data['title'] = $this->m_grafik->title();
        // var_dump($data['graph']);

        $this->load->view('v_header');
        $this->load->view('grafik/chart', $data);
        $this->load->view('v_footer');
    }
}
