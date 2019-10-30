<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruang_model extends CI_Model
{

    public $table = 'ruang';
    public $id    = 'idRuang';
    public $f1    = 'peruID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {   
        $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
        }
        
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

   function get_by_perusahaan($peruID)
    {   
        $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
             $this->db->where('ruang.peruID', $peruID);
        }
        
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }


    // get data by id
    function get_by_id($id)
    {
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
        }
        $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
        }else{
            $this->db->like('idRuang', $q);
            $this->db->or_like('peruID', $q);
            $this->db->or_like('luasLahan', $q);
            $this->db->or_like('statusPemilik', $q);
            $this->db->or_like('nmPemilik', $q);
            $this->db->or_like('nmrSertifikat', $q);
            $this->db->or_like('atasNama', $q);
            $this->db->or_like('nagari', $q);
            $this->db->or_like('kecamatan', $q);
            $this->db->or_like('letakLahan', $q);
        }
        $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
            $this->db->order_by($this->id, $this->order);
            $this->db->or_like('nmrSertifikat', $q);
            $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
        }else{
            $this->db->like('idRuang', $q);
            //$this->db->or_like('peruID', $q);
            $this->db->or_like('luasLahan', $q);
            $this->db->or_like('statusPemilik', $q);
            $this->db->or_like('nmPemilik', $q);
            $this->db->or_like('nmrSertifikat', $q);
            $this->db->or_like('atasNama', $q);
            $this->db->or_like('nagari', $q);
            $this->db->or_like('kecamatan', $q);
            $this->db->or_like('letakLahan', $q);
        }

        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

            // get data with limit and search by_perusahaan
    function get_limit_data_by_perusahaan($limit, $start = 0, $q = NULL, $peruID) {
            $this->db->order_by($this->id, $this->order);
            $this->db->or_like('nmrSertifikat', $q);
            $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
             $this->db->where('ruang.peruID', $peruID);
        }
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

        // get total rows by_perusahaan
    function total_rows_by_perusahaan($q = NULL, $peruID=null) {
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
              $this->db->where('ruang.peruID', $peruID);
        }
        $this->db->join('perusahaan','perusahaan.idPru=ruang.peruID','left');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
        }
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        if($this->session->userdata('level')==='user'){
            $userid = $this->session->userdata('iduser');
             $this->db->where('ruang.userid', $userid);
        }
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Ruang_model.php */
/* Location: ./application/models/Ruang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 18:43:29 */
/* http://harviacode.com */