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

	function laporan_organik()
	{
		$data = array(
			'sampah_organik' => $this->main_model->get_sampah_organik()->result(),
			'sampah_anorganik' => $this->main_model->get_sampah_anorganik()->result(),
		);

		$this->load->view('src/assets/header');
		$this->load->view('src/laporan_organik', $data);
		$this->load->view('src/assets/footer');
	}

	function laporan_anorganik()
	{
		$data = array(
			'sampah_organik' => $this->main_model->get_sampah_organik()->result(),
			'sampah_anorganik' => $this->main_model->get_sampah_anorganik()->result(),
		);

		$this->load->view('src/assets/header');
		$this->load->view('src/laporan_anorganik', $data);
		$this->load->view('src/assets/footer');
	}

	function save_sampah_organik($tinggi, $metana, $status)
	{
		$date = time();
		$kirimdata['tinggi'] = $tinggi;
		$kirimdata['metana'] = $metana;
		$kirimdata['status'] = $status;
		$kirimdata['bulan'] = date("m", $date);
		// $kirimdata['jam'] = date("h:i:sa");
		$this->main_model->add_sampah_organik($kirimdata);
		redirect('dashboard');
	}
}
