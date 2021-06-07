<?php
class Main_model extends CI_Model
{

    // Dashboard
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
        $query = $this->db->insert('sampah_organik', $kirimdata);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
