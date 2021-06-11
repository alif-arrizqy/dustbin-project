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
}
