<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	function __construct(){
		parent:: __construct();
		if($this->session->userdata('logged_in') !== TRUE){
				redirect('welcome');
			}
		$this->load->model(['m_barang','m_user','m_transaksi']);
	}
	
	public function index()
	{
		$data['penjualan']	= $this->m_transaksi->get_penjualan();
		$data['barang']		= $this->m_barang->join_barang();
		
		$this->load->view('kasir', $data);
	}
	
	function get_harga(){
		$id = $this->input->post('id',TRUE);
        $data = $this->m_barang->get_harga($id)->result();
        echo json_encode($data);
	}
	
	
	// FUNGSI PENJUALAN //
	
	public function save_penjualan(){
		$id = $this->input->post('id_barang');
		$stok = $this->input->post('stok');
		
		// cek persediaan 
		$count = $this->m_barang->get_by_id($id);
			
			// fungsi stok barang
			$biaya = $count->biaya_pesan;
			$jumlah = $count->stok_akhir - $stok;
			$this->m_barang->update_stok($id, $jumlah, $biaya);
					
			
			$data = array(
				'id_user'	=> $this->session->userdata('id_user'),
				'id_barang'	=> $id,
				'jumlah_penjualan'	=> $stok,
				'harga_item'	=> $this->input->post('harga'),
				'total'	=> $this->input->post('total')
			);
			
			$this->m_transaksi->save($data);
			redirect('kasir/hitung');
	}
	
	//END FUNGSI PENJUALAN//


	// Master Perhitungan
	public function hitung(){
		$cek = $this->m_transaksi->cek_perhitungan();
		
		foreach ($cek as $y) {
			$i = $y->id_barang;
			$this->m_transaksi->hapus_hitung($i);
		}
		
		$barang = $this->m_barang->get_all();
		//$id = $this->m_transaksi->cek_perhitungan();
			foreach ($barang as $count){
			$id = $count->id_barang;
				$data = number_format(sqrt((2 * (($count->stok_awal - $count->stok_akhir) + $count->stok_min) * $count->harga_beli) / $count->biaya_simpan));
				$jumlah = ($data - $count->stok_akhir) * $count->harga_beli ; 
				$stok = $data - $count->stok_akhir;
			
				if ($count->stok_akhir < 10 ){
					
					$array = array(
								'id_barang'		=> $id,
								'eoq'			=> $data,
								'stok_beli'		=> $stok,
								'keterangan'	=> 1,
							);
							$this->m_transaksi->save_hitung($array);
					
				} else {
					
					$array = array(
								'id_barang'		=> $id ,
								'eoq'			=> $data,
								'stok_beli'		=> $stok,
								'keterangan'	=> 2,
							);
							$this->m_transaksi->save_hitung($array);
					
					}
					//$id = $id +1;
			}
			redirect('kasir');
	}
	

}
