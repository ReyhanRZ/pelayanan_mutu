<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mutu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_mutu');
        $this->load->model('m_dropdown');
        $this->load->model('m_cucitangan');
    }

    public function index()
    {
        $data['mutu'] = $this->m_mutu->tampil_data();
        $data['unit'] = $this->m_dropdown->tampil_unit();
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_mutu', $data);
        $this->load->view('v_footer');
    }

    public function tambah()
    {
        $data['opsi'] = $this->m_dropdown->tampil_select();
        $data['unit'] = $this->m_dropdown->tampil_unit();
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_cucitangan', $data);
        $this->load->view('v_footer');
    }

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
            'kd_unit' => $unit
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

    public function edit($id)
    {
        // $where = array('kd_mutu' => $id);
        $data['mutu'] = $this->m_mutu->edit_data($id);
        $data['opsi'] = $this->m_dropdown->tampil_select();
        $data['unit'] = $this->m_dropdown->tampil_unit();
        $this->load->view('v_header');
        $this->load->view('cuci_tangan/v_mutu_edit', $data);
        $this->load->view('v_footer');
    }

    public function simpan_edit()
    {
        $kd_mutu = $this->input->post('id');
        $numerator = $this->input->post('numerator');
        $demunerator = $this->input->post('demunerator');
        $kd_indikator = $this->input->post('indikator');
        $date = $this->input->post('tgl');
        $hasil = $this->m_cucitangan->hitung($numerator, $demunerator);
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));

        $data = array(
            'numerator' => $numerator,
            'demunerator' => $demunerator,
            'kd_indikator' => $kd_indikator,
            'hasil' => $hasil,
            'bulan' => $bulan,
            'tahun' => $tahun
        );

        $where = array('kd_mutu' => $kd_mutu);
        var_dump($where);

        $this->m_mutu->update_data($where, $data);
        $this->session->set_flashdata('edit', 'Data berhasil diedit');

        redirect('mutu');
    }



    public function hapus($nomor)
    {
        $where = array('kd_mutu' => $nomor);
        $this->m_mutu->hapus_data($where);
        $this->session->set_flashdata('simpan', 'Data berhasil dihapus');
        redirect('mutu');
    }

    public function filter()
    {
        $data['unit'] = $this->m_dropdown->tampil_unit();
        $unit = $this->input->post('unit');
        $date = $this->input->post('date');
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));
        if ($date != null && $unit != null) {
            $data['mutu'] = $this->m_mutu->mutu_filter_lengkap($unit, $bulan, $tahun);
            $this->load->view('v_header');
            $this->load->view('cuci_tangan/v_mutu', $data);
            $this->load->view('v_footer');
        } else if ($date != null) {
            $data['mutu'] = $this->m_mutu->mutu_filter($bulan, $tahun);
            $this->load->view('v_header');
            $this->load->view('cuci_tangan/v_mutu', $data);
            $this->load->view('v_footer');
        } else if ($unit != null) {
            $data['mutu'] = $this->m_mutu->mutu_filter_unit($unit);
            $this->load->view('v_header');
            $this->load->view('cuci_tangan/v_mutu', $data);
            $this->load->view('v_footer');
        } else {
            redirect('mutu');
        }
    }
}
