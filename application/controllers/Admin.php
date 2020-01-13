<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		if($this->session->userdata('logged_in') !== TRUE){
				redirect('welcome');
			}
		$this->load->model(['m_barang','m_user','m_transaksi','m_laporan']);
	}
	
	public function index()
	{
		$data['pesan_pending'] = $this->m_transaksi->pesan_pending();
		$data['pesan_sukses'] = $this->m_transaksi->pesan_sukses();
		$data['jumlah_supplier'] = $this->m_transaksi->jumlah_supplier();
		$data['jumlah_barang'] = $this->m_transaksi->jumlah_barang();
		$data['barang_warning'] = $this->m_transaksi->barang_warning();
		
		$data['penjualan']	= $this->m_transaksi->get_penjualan();
		$data['transaksi']	= $this->m_transaksi->get_join_transaksi();
		$data['pembelian']	= $this->m_transaksi->get_join();
		$data['supp']		= $this->m_barang->get_supp();
		$data['barang']		= $this->m_barang->join_barang();
		
		$this->load->view('pemilik', $data);
	}
	
	function laporan_barang(){
		$data['barang']		= $this->m_barang->join_barang();
		$this->load->view('laporan_barang' , $data);
	}
	
	function cek_join(){
		$data = $this->m_barang->join_barang();
		echo json_encode($data);
	}
	
	function data_user(){
		$data = $this->m_user->get_all();
		echo json_encode($data);
	}
	
	function data_supp(){
		$data = $this->m_barang->get_supp();
		echo json_encode($data);
	}
	
	//FUNGSI SUPPLIER//
	public function save_supp(){
		$data = array (
						'id_supplier' => $this->input->post('id_supp'),
						'nama_supp' => $this->input->post('nama_supp'),
						'alamat_supp' => $this->input->post('alamat_supp'),
						'tlp_supp' => $this->input->post('tlp_supp')
					); 
					$this->m_barang->save_supp($data);
					redirect('admin');
	}
	
	public function edit_supp(){
		$id = $this->input->post('id_supp');
		$data = array (
						'nama_supp' => $this->input->post('nama_supp'),
						'alamat_supp' => $this->input->post('alamat_supp'),
						'tlp_supp' => $this->input->post('tlp_supp')
					); 
					$this->m_barang->update_supp($id, $data);
					redirect('admin');
	}
	
	public function hapus_supp(){
		$id = $this->input->post('id_supp');
		$this->m_barang->hapus_supp($id);
					redirect('admin');
	}
	
	
	// FUNGSI CRUD USER //
	
	public function save_user(){
		$data = array (
						'userlogin' => $this->input->post('nama'),
						'psslogin' => $this->input->post('pass'),
						'level' => $this->input->post('level')
					); 
					$this->m_user->save($data);
					redirect('admin');
	}
	
	public function edit_user(){
		$id = $this->input->post('id_user_edit');
		$data = array (
						'userlogin' => $this->input->post('nama_edit'),
						'psslogin' => $this->input->post('pass_edit'),
						'level' => $this->input->post('level_edit')
					); 
					$this->m_user->update($id, $data);
					redirect('admin');
	}
	
	public function hapus_user(){
		$id = $this->input->post('id_userh');
		$this->m_user->hapus($id, $data);
					redirect('admin');
	}
	
	// END FUNGSI USER //
	
	
	// FUNGSI TB_BARANG //
	
	public function save_barang(){
		$stok = $this->input->post('stok_awal');
		$harga = $this->input->post('harga_beli');
		$jumlah = $stok * $harga;
		$biaya = ($jumlah * 0.06) / $stok;
		$data = array (
						'id_supp'		=> $this->input->post('id_supp'),
						'nama_barang'	=> $this->input->post('nama_barang'),
						'harga_beli'	=> $harga,
						'harga_jual'	=> $this->input->post('harga_jual'),
						'stok_awal'		=> $stok,
						'stok_akhir'	=> $stok,
						'stok_min'		=> $this->input->post('stok_min'),
						'biaya_pesan'	=> $jumlah,
						'biaya_simpan'	=> $biaya
						
					); 
					$this->m_barang->save($data);
					redirect('admin/hitung');
	}
	
	public function edit_barang(){
		$id = $this->input->post('id_barang_edit');
		$harga_beli = $this->input->post('harga_beli_edit');
		$nama = $this->input->post('nama_barang_edit');
		$harga_jual = $this->input->post('harga_jual_edit');
		$stok_min = $this->input->post('stok_min_edit');
		
		
		
		$row = $this->m_barang->get_by_id($id);
		
		
		$biaya_pesan = $harga_beli * $row->stok_awal;
		$biaya_simpan = ($biaya_pesan * 0.06) / $row->stok_awal;
		
		if ( $harga_beli <= $row->harga_beli){
		
		
			$this->m_barang->update($id, $nama, $harga_beli, $harga_jual, $stok_min);
		
		} else {	
		
			
			$this->m_barang->update_semua($id, $nama, $harga_beli, $harga_jual, $stok_min, $biaya_pesan, $biaya_simpan);
		}
		
		
					redirect('admin/hitung');
	}
	
	public function hapus_barang(){
		$id = $this->input->post('id_barang');
		$this->m_barang->hapus($id);
					redirect('admin');
	}
	
	// END FUNGSI TB_BARANG//
	
	
	  // FUNGSI PEMBELIAN //
	  
	  public function save_pembelian(){
		$data = array (
						'id_user'			=> $this->session->userdata('id_user'),
						'id_supp'			=> $this->input->post('id_supp'),
						'item_pembelian'	=> $this->input->post('id_barang'),
						'jumlah_pembelian'	=> $this->input->post('jumlah_beli'),
						'harga_pembelian'	=> $this->input->post('harga_beli'),
						'total_pembelian'	=> $this->input->post('totbayar'),
						'action'            => 1
					); 
					$this->m_transaksi->save_pembelian($data);
					redirect('admin');
	}
	
	public function update_pembelian(){
		$id_b = $this->input->post('a');
		$id = $this->input->post('b');
		$j = $this->input->post('c');
		$b = $this->input->post('e');
		
		$row = $this->m_barang->get_by_id($id);
			$jumlah = $row->stok_akhir + $j;
			$biaya  = $row->biaya_pesan;
			$biaya_pesan = $row->harga_beli * $j ;
			
			$biaya_simpan = ($biaya_pesan * 0.06) / $j;
			
			if ($j <= $row->stok_awal) {
				$this->m_barang->update_stok($id, $jumlah, $biaya);
			} else {
				
				$this->m_barang->update_restok($id, $j, $biaya_pesan, $biaya_simpan);
			}
		$get = $this->m_transaksi->get_by_id_pembelian($id_b);
		$id_get = $get->id_pembelian;
		$this->m_transaksi->hapus_pembelian($id_get);
		
		
		$data = array (
						'id_pembelian'      => $id_b,
						'id_user'			=> $this->session->userdata('id_user'),
						'id_supp'			=> $this->input->post('f'),
						'item_pembelian'	=> $id,
						'jumlah_pembelian'	=> $jumlah,
						'harga_pembelian'	=> $this->input->post('d'),
						'total_pembelian'	=> $b,
						'action'            => 2
					); 
					$this->m_transaksi->save_pembelian($data);
					redirect('admin/hitung');
		
	}
	
	public function hapus_pembelian(){
		$id = $this->input->post('id_pembelian');
		$this->m_barang->hapus($id, $data);
					redirect('admin');
	}
	  
	// END FUNGSI PEMBELIAN //


	// FUNGSI PENJUALAN //
	
	public function save_penjualan(){
		$id = $this->input->post('id_barang');
		$stok = $this->input->post('stok');
		
		// cek persediaan 
		$count = $this->m_barang->get_by_id($id);
			
			// fungsi stok barang
			$biaya = $count->biaya_pesan - ($count->harga_beli * $stok);
			$jumlah = $count->stok_awal - $stok;
			$this->m_barang->update_stok($id, $jumlah, $biaya);
					
			
			$data = array(
				'id_user'	=> $this->input->post('id_user'),
				'id_barang'	=> $this->input->post('id_barang'),
				'jumlah_penjualan'	=> $this->input->post('stok'),
				'harga_item'	=> $this->input->post('harga_item'),
				'total'	=> $this->input->post('total')
			);
			
			$this->m_transaksi->save($data);
			redirect('admin/hitung');
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
			
				if ($count->stok_akhir <= $count->stok_min ){
					
					$array = array(
								'id_barang'		=> $id ,
								'eoq'			=> $data,
								'stok_beli'		=> $stok,
								'keterangan'	=> 1,
							);
							$this->m_transaksi->save_hitung($array);
					
				} else {
					
					$array = array(
								'id_barang'		=> $id,
								'eoq'			=> $data,
								'stok_beli'		=> $stok,
								'keterangan'	=> 2,
							);
							$this->m_transaksi->save_hitung($array);
					
					}
				//	$id = $id +1;
			}
			redirect('admin');
	}
	
	

	public function laporan(){
		
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Penjualan Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'admin/cetak_penjualan?filter=1&tanggal='.$tgl;
                $transaksi = $this->m_transaksi->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Penjualan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/cetak_penjualan?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->m_transaksi->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Penjualan Tahun '.$tahun;
                $url_cetak = 'admin/cetak_penjualan?filter=3&tahun='.$tahun;
                $transaksi = $this->m_transaksi->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Penjualan';
            $url_cetak = 'admin/cetak_penjualan';
            $transaksi = $this->m_transaksi->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->m_transaksi->option_tahun();
		$this->load->view('laporan', $data);
	
	}
	
	public function cetak_penjualan(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Penjualan Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->m_transaksi->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Penjualan Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->m_transaksi->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Penjualan Tahun '.$tahun;
                $transaksi = $this->m_transaksi->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Penjualan';
            $transaksi = $this->m_transaksi->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
		
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

		ob_start();
		$this->load->view('print', $data);
		$html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'D');
	}
	// FUNGSI PEMBELIAN LAPORAN
	
	function pembelian(){
	
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Pembelian Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'admin/cetak_pembelian?filter=1&tanggal='.$tgl;
                $transaksi = $this->m_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Pembelian Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/cetak_pembelian?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->m_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Pembelian Tahun '.$tahun;
                $url_cetak = 'admin/cetak_pembelian?filter=3&tahun='.$tahun;
                $transaksi = $this->m_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pembelian';
            $url_cetak = 'admin/cetak_pembelian';
            $transaksi = $this->m_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->m_laporan->option_tahun();
		$this->load->view('laporan_pembelian', $data);
	}
	
	function cetak_pembelian(){
		 if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Pembelian Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->m_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Pembelian Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->m_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Pembelian Tahun '.$tahun;
                $transaksi = $this->m_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Pembelian';
            $transaksi = $this->m_laporan->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
		
		
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

		ob_start();
		$this->load->view('print_pembelian', $data);
		$html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Data Transaksi.pdf', 'D');
	}
	
	function e(){
		$this->load->view('print');
	}

}
