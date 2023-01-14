<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelKeluhan extends CI_Model
{
    //manajemen keluhan
    public function getKeluhan()
    {
        return $this->db->get('keluhan');
    }
    public function keluhanWhere($where)
    {
        return $this->db->get_where('keluhan', $where);
    }
    public function getKeluhanWhere($where = null)
    {
        return $this->db->get_where('keluhan', $where);
    }

    public function simpanKeluhan($data = null)
    {
        $this->db->insert('keluhan',$data);
    }
    public function updateKeluhan($data = null, $where = null)
    {
        $this->db->update('keluhan', $data, $where);
    }
    public function hapusKeluhan($where = null)
    {
        $this->db->delete('keluhan', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
    }
        $this->db->from('keluhan');
        return $this->db->get()->row($field);
    }
}
   