<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public $table 	= 'barang';
	public $id 		= 'id_barang';
	public $order 	= 'ASC';
		
	function __construct(){
		parent:: __construct();
	}
	
	function cek(){
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
	
	function get_supp(){
		$this->db->order_by('id_supplier', $this->order);
		return $this->db->get('supplier')->result();
	}
	
	function get_all(){
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
	
	function update($id, $nama, $harga_beli, $harga_jual, $stok_min){
		
		$this->db->set('nama_barang', $nama);
		$this->db->set('harga_beli', $harga_beli);
		$this->db->set('harga_jual', $harga_jual);
		$this->db->set('stok_min', $stok_min);
		
		$this->db->where($this->id, $id);
		$result = $this->db->update($this->table);
        return $result;
	}
	
	function update_semua($id, $nama, $harga_beli, $harga_jual, $stok_min, $biaya_pesan, $biaya_simpan){
		$this->db->set('nama_barang', $nama);
		$this->db->set('harga_beli', $harga_beli);
		$this->db->set('harga_jual', $harga_jual);
		$this->db->set('stok_min', $stok_min);
		$this->db->set('biaya_pesan', $biaya_pesan);
		$this->db->set('biaya_simpan', $biaya_simpan);
		
		$this->db->where($this->id, $id);
		$result = $this->db->update($this->table);
        return $result;
	}
	
	
	function hapus($id) {
		$this->db->where($this->id, $id);
		$result = $this->db->delete($this->table);
		return $result;
	}
	
	function update_stok($id, $jumlah, $biaya){
		$this->db->set('biaya_pesan', $biaya);
		$this->db->set('stok_akhir', $jumlah);
		$this->db->where($this->id, $id);
		$query = $this->db->update($this->table);
		return $query;
	}
	
	function update_restok($id, $j, $biaya_pesan, $biaya_simpan){
		$this->db->set('biaya_simpan', $biaya_simpan);
		$this->db->set('biaya_pesan', $biaya_pesan);
		$this->db->set('stok_akhir', $j);
		$this->db->set('stok_awal', $j);
		$this->db->where($this->id, $id);
		$query = $this->db->update($this->table);
		return $query;
	}
	
	function join_barang(){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('supplier', 'supplier.id_supplier = barang.id_supp');
		$this->db->join('perhitungan', 'perhitungan.id_barang = barang.id_barang');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	
	
	function save_supp($data){
			
		$result = $this->db->insert('supplier', $data);
		return $result;
	}
	
	function update_supp($id, $data){
		$this->db->where('id_supplier', $id);
		$result = $this->db->update('supplier', $data);
        return $result;
	}
	
	function hapus_supp($id) {
		$this->db->where('id_supplier', $id);
		$result = $this->db->delete('supplier');
		return $result;
	}
	
	function get_harga($id){
		$query = $this->db->get_where('barang', array('id_barang' => $id));
        return $query;
	}
}
