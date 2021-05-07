<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->load->model('login_model');
		// $this->load->model('main_model');
	}

	function index()
	{
		$this->load->view('src/assets/header');
		$this->load->view('src/index');
		$this->load->view('src/assets/footer');
	}
}