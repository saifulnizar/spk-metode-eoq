<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

		
	function __construct(){
		parent:: __construct();
	}
	
	function cek_perhitungan(){
		$query = $this->db->get('perhitungan');
		return $query->result();
		
	}
	function hapus_hitung($i) {
		$this->db->where('id_barang', $i);
		$result = $this->db->delete('perhitungan');
		return $result;
	}
	
	function save_hitung($array){
			
		$result = $this->db->insert('perhitungan', $array);
		return $result;
	}
	
	function save($data){
			
		$result = $this->db->insert('penjualan', $data);
		return $result;
	}
	
	function get_penjualan(){
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('user', 'user.id_user = penjualan.id_user');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_join(){
		$action = 1;
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->join('user', 'user.id_user = pembelian.id_user');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
		$this->db->join('barang', 'barang.id_barang = pembelian.item_pembelian');
		$this->db->where('action', $action);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_join_transaksi(){
		$action = 2;
		$this->db->select('*');
		$this->db->from('pembelian');
		$this->db->join('user', 'user.id_user = pembelian.id_user');
		$this->db->join('supplier', 'supplier.id_supplier = pembelian.id_supp');
		$this->db->join('barang', 'barang.id_barang = pembelian.item_pembelian');
		$this->db->where('action', $action);
		$query = $this->db->get();
		return $query->result();
	}
	
	// tb pembelian
	function save_pembelian($data){
			
		$result = $this->db->insert('pembelian', $data);
		return $result;
	}
	
	function get_by_id_pembelian($id){
		$this->db->where('id_pembelian',$id);
		return $this->db->get('pembelian')->row();
	}
	
	function hapus_pembelian($id_get) {
		$this->db->where('id_pembelian', $id_get);
		$result = $this->db->delete('pembelian');
		return $result;
	}
	
	
	
	
	//================ INFO ================//
	
	function pesan_pending(){
		$this->db->select('*');
		$this->db->where('action', 1);
		$query = $this->db->get('pembelian');
		return $query->num_rows();
		
	}
	
	function pesan_sukses(){
		$this->db->select('*');
		$this->db->where('action', 2);
		$query = $this->db->get('pembelian');
		return $query->num_rows();
	}
	
	function jumlah_supplier(){
		$query = $this->db->get('supplier');
		return $query->num_rows();
	}
	
	function jumlah_barang(){
		$query = $this->db->get('barang');
		return $query->num_rows();
	}
	
	function barang_warning(){
		$this->db->select('*');
		$this->db->where('keterangan', 1);
		$query = $this->db->get('perhitungan');
		return $query->num_rows();
	}
	
	//============= END INFO ==============//
	
	function laporan_pembelian(){
		$this->db->order_by('id_pembelian', $this->order);
		return $this->db->get('pembelian')->result();
	}
	
	function laporan_penjualan(){
		$this->db->order_by('id_penjualan', $this->order);
		return $this->db->get('penjualan')->result();
	}
	
	function laporan_stok(){
		$this->db->order_by('id_barang', $this->order);
		return $this->db->get('barang')->result();
	}
	
	
	
	
	
	// Laporan
	public function view_by_date($date){
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->db->where('DATE(tanggal_penjualan)', $date); // Tambahkan where tanggal nya
        
		return $this->db->get()->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->db->where('MONTH(tanggal_penjualan)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_penjualan)', $year); // Tambahkan where tahun
        
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->db->where('YEAR(tanggal_penjualan)', $year); // Tambahkan where tahun
        
		return $this->db->get()->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
		return $this->db->get()->result(); // Tampilkan semua data transaksi
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_penjualan) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('penjualan'); // select ke tabel transaksi
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->db->order_by('YEAR(tanggal_penjualan)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal_penjualan)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}