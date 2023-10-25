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

        // ob_start();
        $view = $this->load->view('pdf/v_generate_pdf', $data,  true);
        //$this->load->view('pdf/v_generate_pdf', $data);
        // $html  = ob_get_contents();
        // ob_get_clean();
        // masalahnya, di view mutu itu, pakai $mutu dari controller mutu. ini tidak terbaca ketika read html
        //kemudian yang filter juga masih tidak terbaca
        //var_dump($html);
        $this->pdf->createPDF($view, 'mypdf', false);
    }

    function get_filter()
    {
        $date = $this->input->post('date');

        //$convert = date('d/m/Y', strtotime(str_replace('.', '-', $date)));
        $tgl = date('d', strtotime($date));
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));
        var_dump($tgl . $bulan . $tahun);
        //anehnya nangkep bulan 01 tahun 1970 terus
        $data['mutu'] = $this->m_generatepdf->queryFilter($bulan, $tahun);
        var_dump($data);
        //$this->load->view('pdf/v_generate_pdf', $data,  true);

        //        $view = $this->load->view('pdf/v_generate_pdf', $data,  true);

        //   $this->pdf->createPDF($view, 'mypdf', false);
    }
}
