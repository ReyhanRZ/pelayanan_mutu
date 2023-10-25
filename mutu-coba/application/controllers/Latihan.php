<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends CI_Controller{

	function __construct(){
		parent::__construct();
		//echo "ini pesan dari construct<br>";
		//$this->load->helper('url');

	}


	function index(){
		$data['title'] = "View Latihan Tes";
		$data['nama'] = "Alexander Paijo";

		$this->load->view('v_header');
		$this->load->view('v_latihan',$data);
		$this->load->view('v_footer');

	}

	function tes(){

		echo "Ini ditampilkan oleh controller Latihan method tes";

	}

}

