<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModelKTP extends CI_Model
{
    //manajemen buku
    public function getKtp()
    {
        return $this->db->get('ktp');
    }
    public function cekData()
    {
        $this->db->Where('id_user', $this->session->userdata('id'));
        return $this->db->get('ktp');
    }
    public function ktpWhere($where)
    {
        return $this->db->get_where('ktp', $where);
    }
    public function getKtpWhere($where = null)
    {
        return $this->db->get_where('ktp', $where);
    }
    public function simpanktp($data = null)
    {
        $this->db->insert('ktp',$data);
    }
    public function updateKtp($data = null, $where = null)
    {
        $this->db->update('ktp', $data, $where);
    }
    public function hapusktp($where = null)
    {
        $this->db->delete('ktp', $where);
    }
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
    }
        $this->db->from('ktp');
        return $this->db->get()->row($field);
    }

    
}
   