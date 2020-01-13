<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public $table 	= 'user';
	public $id 		= 'id_user';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	
	function get_all(){
		$this->db->where('level !=', 1);
		$this->db->order_by($this->id, $this->order);
		return $this->db->get($this->table)->result();
	}
	
	function get_by_id($id){
		$this->db->where($this->id,$id);
		return $this->db->get($this->table)->row();
	}
	
	function save($data){
		
		$result = $this->db->insert($this->table, $data);
		return $result;
	}
	
	function update($id, $data){
		$this->db->where($this->id, $id);
		$result = $this->db->update($this->table, $data);
        return $result;
	}
	
	function hapus($id) {
		$this->db->where($this->id, $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
}
