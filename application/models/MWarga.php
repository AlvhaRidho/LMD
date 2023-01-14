<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MWarga extends CI_Model
{
    //manajemen buku
    public function getWarga()
    {
        return $this->db->get('warga');
    }
    public function wargaWhere($where)
    {
        return $this->db->get_where('warga', $where);
    }
    public function getWargaWhere($where = null)
    {
        return $this->db->get_where('warga', $where);
    }
    public function simpanwarga($data = null)
    {
        $this->db->insert('warga',$data);
    }
    public function updateWarga($data = null, $where = null)
    {
        $this->db->update('warga', $data, $where);
    }
    public function hapuswarga($where = null)
    {
        $this->db->delete('warga', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
    }
        $this->db->from('warga');
        return $this->db->get()->row($field);
    }

    
}
   