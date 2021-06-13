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

    // untuk grafik
    public function get_rekap_bulan_org($bulan)
    {
        $query = $this->db->query("SELECT SUM(tinggi) AS total_tinggi, SUM(metana) AS total_metana FROM sampah_organik WHERE bulan = '$bulan'");
        return $query;
    }

    public function get_rekap_bulan_anorg($bulan)
    {
        $query = $this->db->query("SELECT SUM(tinggi) AS total_tinggi, SUM(metana) AS total_metana FROM sampah_anorganik WHERE bulan = '$bulan'");
        return $query;
    }
}
