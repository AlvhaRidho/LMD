<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MBansos extends CI_Model
{
    //manajemen keluhan
    public function getBansos()
    {
        return $this->db->get('bansos');
    }
    public function bansosWhere($where)
    {
        return $this->db->get_where('bansos', $where);
    }
    public function getBansosWhere($where = null)
    {
        return $this->db->get_where('bansos', $where);
    }
    public function simpanBansos($data = null)
    {
        $this->db->insert('bansos',$data);
    }
    public function updateBansos($data = null, $where = null)
    {
        $this->db->update('bansos', $data, $where);
    }
    public function hapusBansos($where = null)
    {
        $this->db->delete('Bansos', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
    }
        $this->db->from('Bansos');
        return $this->db->get()->row($field);
    }
}
   