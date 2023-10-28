<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CuciTangan extends CI_Controller
{
    public function index()
    {
        $this->load->model('m_dropdown');
        $this->load->model('m_cucitangan');
        //$data = $this->m_dropdown->tampil_select();
        $data['opsi'] = $this->m_dropdown->tampil_select();
        $data['unit'] = $this->m_dropdown->tampil_unit();

        // $opsi = array();
        // foreach ($data as $s) {
        //     $opsi[$s->kd_indikator] = $s->nama_indikator;
        // }
        //$opsilist = form_dropdown('opsi', $opsi, set_value('opsi', $kd_indikator));
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_cucitangan', $data);
        $this->load->view('v_footer');

        //var_dump($data['opsi']);
        //sudh masuk
        // $this->load->library('scontrollers/cucitangan');
        // $this->cucitangan->check();
    }

    // public function check()
    // {
    //     $data['denominator'] = $this->input->post('denominator');
    //     $data['numerator'] = $this->input->post('numerator');
    //     if (!empty($data['denominator'] && $data['numerator'])) {
    //         $data['hasil'] = $this->m_cucitangan->hitung($data['numerator'], $data['denominator']);
    //     }
    // }
    public function simpan()
    {
        // $isTrue = false;
        $this->load->model('m_cucitangan');
        $numerator = $this->input->post('numerator');
        $demunerator = $this->input->post('demunerator');
        $kd_indikator = $this->input->post('indikator');
        $date = $this->input->post('tgl');
        $unit = $this->input->post('unit');
        //$date = date('d-n-Y', strtotime($_POST['tgl']));
        // echo $date;
        // var_dump($date);
        //$hasil = $this->m_cucitangan->hitung($numerator, $demunerator);
        // if (!empty($numerator) && !empty($demunerator)) {
        //if (isset($data['numerator']) && isset($data['denumerator'])) {
        $hasil = $this->m_cucitangan->hitung($numerator, $demunerator);
        //}
        // var_dump($hasil);
        // $hasil = $this->input->post('hasil');
        // }
        //$date_created = time();
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));

        $data = array(
            'numerator' => $numerator,
            'demunerator' => $demunerator,
            'kd_indikator' => $kd_indikator,
            'hasil' => $hasil,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'unit' => $unit
        );
        //save ke database
        if (!empty($data)) {
            $this->m_cucitangan->simpan_data($data);
            // $isTrue = true;
            $this->session->set_flashdata('simpan', 'Data berhasil disimpan');
        }
        // //anehnya masih belum tampil
        // if ($isTrue == true) {
        //     echo "<script>alert('tambah data berhasil'); window.location.href='CuciTangan.php';</script>";
        // }
        // var_dump($data);
        redirect('mutu'); //redirect urlnya
    }


    public function hitung()
    {
        // $this->load->model('m_dropdown');
        // $data['opsi'] = $this->m_dropdown->tampil_select();
        $this->load->model('m_cucitangan');
        $data['denominator'] = $this->input->post('denominator');
        $data['numerator'] = $this->input->post('numerator');
        $data['hasil'] = $this->m_cucitangan->hitung($data['numerator'], $data['denominator']);
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_cucitangan', $data);
        $this->load->view('v_footer');
    }
}
