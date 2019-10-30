<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	Private  $_tabel = "user";
	public  $lastlog;
	function __construct(){  
	    parent::__construct();  
	    $this->load->database();  
	}  
	function islogin($data){
		$query=$this->db->get_where($this->_tabel,array('username'=>$data['username'],'password'=>md5($data['password'])));  
		$this->lastlogin($data);
    	return $query->num_rows();  
	}
	function userLoginData($data){
		$this->db->select('username, id, level, email');
		$this->db->where('username', $data['username']);
		$query = $this->db->get($this->_tabel);
		return $query->row();
	}
	function lastlogin($data){
		$username         = $data['username'];
		$this->lastlog = ['lastlog' => unix_to_human(time())];
		$this->db->update($this->_tabel, $this->lastlog, array('username' => $username));
	}
	

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */