<?php

namespace App\Controllers;

date_default_timezone_set("Asia/Jakarta");

use App\Models\mainModel;

class Main extends BaseController
{
	protected $mainModel;
	public function __construct()
	{
		$this->mainModel = new mainModel();
		helper('form');
	}

	public function index()
	{
		// $date = time();
		// $bulan = date("m", $date);
		// $data['kwh'] = $this->mainModel->kwh_bulan($bulan);
		// $data['jumlah'] = $this->mainModel->biaya_bulan($bulan);
		// $data['token'] = $this->mainModel->getDataToken();
		$data['sampah_organik'] = $this->mainModel->get_sampah_organik();
		$data['sampah_anorganik'] = $this->mainModel->get_sampah_anorganik();
		return view('pages/index', $data);
	}

	public function save_sampah_organik($tinggi, $metana, $status)
	{
		$date = time();
		$kirimdata['tinggi'] = $tinggi;
		$kirimdata['metana'] = $metana;
		$kirimdata['status'] = $status;
		$kirimdata['bulan'] = date("m", $date);
		// $kirimdata['jam'] = date("h:i:sa");
		$this->mainModel->add_sampah_organik($kirimdata);
		return redirect()->to('/');
	}
}
