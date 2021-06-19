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
		// tampil data realtime
		$data['sampah_organik'] = $this->mainModel->get_sampah_organik();
		$data['sampah_anorganik'] = $this->mainModel->get_sampah_anorganik();

		// get data buat ke grafik
		$date = time();
		$tanggal = date("Y-m-d", $date);
		$bulan = date("m", $date);
		$data['rekap_organik'] = $this->mainModel->get_rekap_org($tanggal);
		$data['rekap_anorganik'] = $this->mainModel->get_rekap_anorg($tanggal);
		return view('pages/index', $data);
	}

	public function grafik()
	{
		$data['data_rekap_organik'] = $this->mainModel->get_data_rekap_organik();
		$data['data_rekap_anorganik'] = $this->mainModel->get_data_rekap_anorganik();
		return view('pages/grafik', $data);
	}

	public function save_sampah_organik($tinggi, $metana, $status)
	{
		$date = time();
		$kirimdata['tinggi'] = $tinggi;
		$kirimdata['metana'] = $metana;
		$kirimdata['status'] = $status;
		$kirimdata['tanggal'] = date('Y-m-d', $date);
		$kirimdata['bulan'] = date('m', $date);
		$kirimdata2['tanggal'] = date('Y-m-d', $date);
		$tanggal = date('Y-m-d', $date);

		$cek_tgl = $this->mainModel->cek_tanggal_rekap_organik($tanggal);
		if ($cek_tgl <= 0) {
			$this->mainModel->add_sampah_organik($kirimdata);
			// menambahkan tanggal bulan ke tabel rekap anorganik
			$this->mainModel->add_tanggal_rekap_organik($kirimdata2);
			return redirect()->to('/');
		} else {
			$this->mainModel->add_sampah_organik($kirimdata);
			return redirect()->to('/');
		}
	}

	public function save_sampah_anorganik($tinggi, $metana, $status)
	{
		$date = time();
		$kirimdata['tinggi'] = $tinggi;
		$kirimdata['metana'] = $metana;
		$kirimdata['status'] = $status;
		$kirimdata['tanggal'] = date('Y-m-d', $date);
		$kirimdata['bulan'] = date('m', $date);
		$kirimdata2['tanggal'] = date('Y-m-d', $date);
		$tanggal = date('Y-m-d', $date);

		$cek_tgl = $this->mainModel->cek_tanggal_rekap_anorganik($tanggal);
		if ($cek_tgl <= 0) {
			$this->mainModel->add_sampah_anorganik($kirimdata);
			// menambahkan tanggal bulan ke tabel rekap anorganik
			$this->mainModel->add_tanggal_rekap_anorganik($kirimdata2);
			return redirect()->to('/');
		} else {
			$this->mainModel->add_sampah_anorganik($kirimdata);
			return redirect()->to('/');
		}
	}
}
