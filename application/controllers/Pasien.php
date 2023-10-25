<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_pasien');
	}

	public function index()
	{
		$data['pasien'] = $this->m_pasien->tampil_data()->result();
		$this->load->view('v_header');
		$this->load->view('pasien/v_pasien', $data);
		$this->load->view('v_footer');
	}

	public function tambah()
	{
		$this->load->view('v_header');
		$this->load->view('pasien/v_tambah');
		$this->load->view('v_footer');
	}

	public function tambah_aksi()
	{
		$nama_pasien = $this->input->post('nama_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat = $this->input->post('alamat');
		//$date_created = time();

		//rule validasi
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() != FALSE) {

			$data = array(
				'nama_pasien' => $nama_pasien,
				'jenis_kelamin' => $jenis_kelamin,
				'pendidikan' => $pendidikan,
				'pekerjaan' => $pekerjaan,
				'alamat' => $alamat
			);

			$this->m_pasien->simpan_data($data);

			redirect('pasien'); //redirect urlnya

		} else {
			$this->load->view('v_header');
			$this->load->view('pasien/v_tambah');
			$this->load->view('v_footer');
		}
	}

	public function edit($no_medicalrecord)
	{
		$where = array('no_medicalrecord' => $no_medicalrecord);
		$data['pasien'] = $this->m_pasien->edit_data($where)->result();
		$this->load->view('v_header');
		$this->load->view('pasien/v_edit', $data);
		$this->load->view('v_footer');
	}

	public function edit_aksi()
	{
		$no_medicalrecord = $this->input->post('id');
		$nama_pasien = $this->input->post('nama_pasien');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama_pasien' => $nama_pasien,
			'jenis_kelamin' => $jenis_kelamin,
			'pendidikan' => $pendidikan,
			'pekerjaan' => $pekerjaan,
			'alamat' => $alamat
		);

		$where = array('no_medicalrecord' => $no_medicalrecord);

		$this->m_pasien->update_data($where, $data);

		redirect('pasien');
	}

	public function hapus($no_medicalrecord)
	{
		$where = array('no_medicalrecord' => $no_medicalrecord);
		$this->m_pasien->hapus_data($where);
		redirect('pasien');
	}
}
