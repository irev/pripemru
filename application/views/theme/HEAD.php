<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	$this->load->view('theme/_header');
	$this->load->view('theme/_nav');
	if($this->session->userdata('level')=='admin' || $this->session->userdata('level')=='operator'){
		$this->load->view('theme/_side');
	}else{
		$this->load->view('theme/_side_user');
	}
	

 ?>

 