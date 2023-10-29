<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('m_generatepdf');
    }


    function index()
    {
        //jika datanya lengkap

        //        $html = $this->load->view('cuci_tangan/v_mutu', [], true);

        // if filer(parameter) = false -> 
        // $data = $this->model->queryAll
        // else ->
        // $data = $this->model->queryFilter

        $data['mutu'] = $this->m_generatepdf->queryAll();

        $view = $this->load->view('pdf/v_generate_pdf', $data,  true);
        $this->pdf->createPDF($view, 'mypdf', false);
        //var_dump($data);
    }

    function get_filter()
    {
        $date = $this->input->post('getdate');
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));
        //var_dump($date);

        //anehnya nangkep bulan 01 tahun 1970 terus
        $data['mutu'] = $this->m_generatepdf->queryFilter($bulan, $tahun);
        //var_dump($data);
        //$this->load->view('pdf/v_generate_pdf', $data,  true);

        $view = $this->load->view('pdf/v_generate_pdf', $data,  true);

        $this->pdf->createPDF($view, 'mypdf', false);
    }

    function get_filterunit()
    {
        $unit = $this->input->post('getunit');
        //var_dump($date);

        //anehnya nangkep bulan 01 tahun 1970 terus
        $data['mutu'] = $this->m_generatepdf->queryFilterUnit($unit);
        //var_dump($data);
        //$this->load->view('pdf/v_generate_pdf', $data,  true);

        $view = $this->load->view('pdf/v_generate_pdf', $data,  true);

        $this->pdf->createPDF($view, 'mypdf', false);
    }

    function get_filterlengkap()
    {
        $date = $this->input->post('getdate');
        $unit = $this->input->post('getunit');
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));
        //var_dump($date);

        //anehnya nangkep bulan 01 tahun 1970 terus
        $data['mutu'] = $this->m_generatepdf->queryFilterLengkap($unit, $bulan, $tahun);
        //var_dump($data);
        //$this->load->view('pdf/v_generate_pdf', $data,  true);

        $view = $this->load->view('pdf/v_generate_pdf', $data,  true);

        $this->pdf->createPDF($view, 'mypdf', false);
    }
}
