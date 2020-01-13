<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
	
	
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function validate(){
		$where = array(
			'userlogin'	=> $this->input->post('nama'),
			'psslogin'		=> $this->input->post('sandi')
		);
		
		return $this->db->get_where('user', $where);
	}
}
