<?php

namespace App\Models;

use CodeIgniter\Model;

class mainModel extends Model
{
    function get_sampah_organik()
    {
        $query = $this->db->query("SELECT * FROM sampah_organik ORDER BY id DESC LIMIT 1");
        return $query;
    }

    function get_sampah_anorganik()
    {
        $query = $this->db->query("SELECT * FROM sampah_anorganik ORDER BY id DESC LIMIT 1");
        return $query;
    }


    function add_sampah_organik($kirimdata)
    {
        $query = $this->db->table('sampah_organik')->insert($kirimdata);
        return $query;
    }

    function add_sampah_anorganik($kirimdata)
    {
        $query = $this->db->table('sampah_anorganik')->insert($kirimdata);
        return $query;
    }

    // untuk grafik
    public function cek_tanggal_rekap_organik($tanggal)
    {
        $query = $this->db->query("SELECT * FROM rekap_organik WHERE tanggal = '$tanggal' LIMIT 1");
        return $query->getNumRows();
    }

    function add_tanggal_rekap_organik($kirimdata2)
    {
        $query = $this->db->table('rekap_organik')->insert($kirimdata2);
        return $query;
    }

    public function get_rekap_org($tanggal)
    {
        $query = $this->db->query("SELECT tanggal ,SUM(tinggi) AS total_tinggi, SUM(metana) AS total_metana FROM sampah_organik WHERE tanggal = '$tanggal' GROUP BY tanggal");
        return $query;
    }

    public function get_data_rekap_organik()
    {
        // return $this->db->table('rekap_organik')->get()->getResultArray();
        return $this->db->query("SELECT * FROM rekap_organik ORDER BY tanggal DESC LIMIT 7")->getResultArray();
    }

    // Anorganik -----------------------------------------------------
    public function cek_tanggal_rekap_anorganik($tanggal)
    {
        $query = $this->db->query("SELECT * FROM rekap_anorganik WHERE tanggal = '$tanggal' LIMIT 1");
        return $query->getNumRows();
    }

    function add_tanggal_rekap_anorganik($kirimdata2)
    {
        $query = $this->db->table('rekap_anorganik')->insert($kirimdata2);
        return $query;
    }

    public function get_rekap_anorg($tanggal)
    {
        $query = $this->db->query("SELECT tanggal ,SUM(tinggi) AS total_tinggi, SUM(metana) AS total_metana FROM sampah_organik WHERE tanggal = '$tanggal' GROUP BY tanggal");
        return $query;
    }

    public function get_data_rekap_anorganik()
    {
        return $this->db->query("SELECT * FROM rekap_anorganik ORDER BY tanggal DESC LIMIT 7")->getResultArray();
    }
}
