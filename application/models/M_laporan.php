<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

		
	function __construct(){
		parent:: __construct();
	}
	
	public function view_by_date($date){
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
        $this->db->where('DATE(tanggal_pembelian)', $date); // Tambahkan where tanggal nya
        
		return $this->db->get()->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
		$this->db->join('barang', 'barang.id_barang = pembelian.item_pembelian');
        $this->db->where('MONTH(tanggal_pembelian)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_pembelian)', $year); // Tambahkan where tahun
        
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
		$this->db->select('*');
		$this->db->from('pembelian');
		
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
		$this->db->join('barang', 'barang.id_barang = pembelian.item_pembelian');
        $this->db->where('YEAR(tanggal_pembelian)', $year); // Tambahkan where tahun
        
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
	}
																							
	public function view_all(){
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
		$this->db->join('barang', 'barang.id_barang = pembelian.item_pembelian');
		return $this->db->get()->result(); // Tampilkan semua data transaksi
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_pembelian) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('pembelian'); // select ke tabel transaksi
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
		$this->db->join('barang', 'barang.id_barang = pembelian.item_pembelian');
        $this->db->order_by('YEAR(tanggal_pembelian)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal_pembelian)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
	
	
	
}