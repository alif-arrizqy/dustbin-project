<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}

	function index()
	{
		$data = array(
			'sampah_organik' => $this->main_model->get_sampah_organik()->result(),
			'sampah_anorganik' => $this->main_model->get_sampah_anorganik()->result(),
		);

		$this->load->view('src/assets/header');
		$this->load->view('src/index', $data);
		$this->load->view('src/assets/footer');
	}
	
	function grafik()
	{
		$data = array(
			'sampah_organik' => $this->main_model->get_sampah_organik()->result(),
			'sampah_anorganik' => $this->main_model->get_sampah_anorganik()->result(),
		);

		$this->load->view('src/assets/header');
		$this->load->view('src/grafik', $data);
		$this->load->view('src/assets/footer');
	}
}
