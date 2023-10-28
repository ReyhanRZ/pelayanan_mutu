<?php
class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_grafik');
        $this->load->model('m_dropdown');
    }

    public function index()
    {
        $data['indikator'] = $this->m_dropdown->tampil_select();
        $data['unit'] = $this->m_dropdown->tampil_unit();
        $this->load->view('v_header');
        $this->load->view('grafik/chart', $data);
        $this->load->view('v_footer');
    }

    public function filter()
    {
        // $date = $this->input->post('date');
        // $bulan = date('m', strtotime($date));
        // $tahun = date('Y', strtotime($date));
        //        $data['graph'] = $this->m_grafik->graph($bulan, $tahun);

        $indikator = $this->input->post('indikator');
        $unit = $this->input->post('unit');
        // $data['graph'] = $this->m_grafik->graph($bulan, $tahun);
        $data['perunit'] = $this->m_grafik->perunit($unit, $indikator);
        //var_dump($data['title']);
        //        $data['title'] = $this->m_grafik->title();
        $data['title'] = $this->m_grafik->month();
        // var_dump($data['title']);

        // for ($i = 0; $i < 12; $i++) {
        //     echo $data['title'][$i];
        // }

        $this->load->view('v_header');
        $this->load->view('grafik/chart', $data);
        $this->load->view('v_footer');
    }
}
