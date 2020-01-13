<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SPK EOQ</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('asset/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('asset/css/addons/datatables.min.css')?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url('asset/css/mdb.min.css')?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url('asset/css/style.css')?>" rel="stylesheet">
</head>

<body>
<div class="container">
	<br>
	<p class="text-center h4">TB.MORODADI &nbsp; Halaman Admin</p>
	<nav class="navbar navbar-expand-md special-color-dark mb-5 no-content">
    <!-- SideNav slide-out button -->
    <div class="float-left">
     </div>
    <!-- Breadcrumb-->
    <div class="mr-auto">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb clearfix d-none d-md-inline-flex pt-0">
         <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
		  <li class="nav-item">
			<button  class="nav-link active btn-sm btn btn-indigo" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
			  aria-controls="pills-home" aria-selected="true">HOME</button>
		  </li>
		  <li class="nav-item">
			<button class="nav-link btn-sm btn btn-indigo" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
			  aria-controls="pills-profile" aria-selected="false">DATA BARANG</button>
		  </li>
		  <li class="nav-item">
			<button class="nav-link btn-sm btn btn-indigo" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
			  aria-controls="pills-contact" aria-selected="false">SUPLIER</button>
		  </li>
		  <li class="nav-item">
			<button class="nav-link btn-sm btn btn-indigo" id="pills-contact-tab" data-toggle="pill" href="#pills-user" role="tab"
			  aria-controls="pills-contact" aria-selected="false">USER</button>
		  </li>
		  <li class="nav-item">
			<button class="nav-link btn-sm btn btn-indigo" id="pills-contact-tab" data-toggle="pill" href="#pills-pembelian" role="tab"
			  aria-controls="pills-contact" aria-selected="false">PEMBELIAN</button>
		  </li>
		  <li class="nav-item">
			<button class="nav-link btn-sm btn btn-indigo" id="pills-contact-tab" data-toggle="pill" href="#pills-penjualan" role="tab"
			  aria-controls="pills-contact" aria-selected="false">PENJUALAN</button>
		  </li>
			 <li class="nav-item">
			<button class="nav-link btn-sm btn btn-indigo" id="pills-contact-tab" data-toggle="pill" href="#pills-laporan" role="tab"
			  aria-controls="pills-contact" aria-selected="false">LAPORAN</button>
		  </li>
		 </ul>
        </ol>
      </nav>
    </div>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <button class="nav-link dropdown-toggle btn btn-sm btn-indigo" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item waves-effect waves-light" href="<?php echo site_url('welcome/logout')?>">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

<div class="tab-content  pl-1" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">		
			
			<div class="view">
			  <img src="<?php echo base_url('asset/img/logo.png')?>"  class="rounded" alt="Responsive image" width="100%" height="200">
			</div>
			<hr>
				<div class="row justify-content-md-center">
					
					<div class="col-2">
						
						<div class="text-center"><i class="fas fa-sticky-note fa-4x"></i></div>
						<p class="h6 text-center">Pesan Pending <span class="badge badge-danger ml-1"><?= $pesan_pending ?></span></p>
					</div>
					<div class="col-2">
						<div class="text-center"><i class="far fa-sticky-note fa-4x"></i></div>
						<p class="h6 text-center">Pesan Sukses<span class="badge badge-success ml-1"><?= $pesan_sukses ?></span></p>
					</div>
					<div class="col-2">
						<div class="text-center"><i class="fas fa-user fa-4x"></i></div>
						<p class="h6 text-center">Jumlah Supplier<span class="badge badge-info ml-1"><?= $jumlah_supplier ?></span></p>
					</div>
					<div class="col-2">
						<div class="text-center"><i class="fas fa-th fa-4x"></i></div>
						<p class="h6 text-center">Jumlah Barang<span class="badge badge-info ml-1"><?= $jumlah_barang ?></span></p>
					</div>
					<div class="col-2">
						<div class="text-center"><i class="fas fa-box-open fa-4x"></i></div>
						<p class="h6 text-center">Barang Warning<span class="badge badge-warning ml-1"><?= $barang_warning ?></span></p>
					</div>
				</div>
  
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
	
	<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				</div>

				<p href="" class="white-text mx-3">Table Barang</p>

				<div>
				  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#Tambah">Tambah
					<i class="fas fa-pencil-alt mt-0"></i>
				  </button>
				</div>

			  </div>
			  <!--/Card image-->

			  <div class="px-4">

				<div class="table-wrapper">
				  <!--Table-->
				    <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

					<!--Table head-->
					<thead>
					  <tr>
					  <th>ACTION</th>
					  <th>SUPPLIER</th>
					  <th>ID BARANG</th>
					  <th>NAMA</th>
					  <th>HARGA BELI</th>
					  <th>HARGA JUAL</th>
					  <th>STOK AWAL</th>
					  <th>STOK AKHIR</th>
					  <th>STOK MINIMAL</th>
					  <th>EOQ</th>
					  <th>BIAYA PESAN</th>
					  <th>BIAYA SIMPAN</th>
					  <th>KETERANGAN</th>
					  </tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody>
						<?php foreach ($barang as $row) {?>
						<tr>
							<td>
							<button type="submit" class="btn btn-sm btn-info px-3 edit_barang"
							data-id_barang="<?= $row->id_barang ?>" data-id_supp="<?= $row->id_supp ?>"
							data-nama_barang="<?= $row->nama_barang ?>"
							data-harga_beli="<?= $row->harga_beli ?>"
							data-harga_jual="<?= $row->harga_jual ?>"
							data-stok_awal="<?= $row->stok_awal ?>"
							data-stok_akhir="<?= $row->stok_akhir ?>"
							data-stok_min="<?= $row->stok_min ?>"
							data-biaya_pesan="<?= $row->biaya_pesan ?>"
							data-biaya="<?= $row->biaya_simpan ?>"
							>Edit</button>
								<button type="submit" class="btn btn-sm btn-danger px-3 hapus_barang" data-id="<?= $row->id_barang ?>">Hapus</button>
							</td>
							<td><?= $row->nama_supp ?></td>
							<td><?= $row->id_barang ?></td>
							<td><?= $row->nama_barang ?></td>
							<td><?= $row->harga_beli ?></td>
							<td><?= $row->harga_jual ?></td>
							<td><?= $row->stok_awal ?></td>
							<td><?= $row->stok_akhir ?></td>
							<td><?= $row->stok_min ?></td>
							<td style="background-color:yellow;"><?= $row->eoq ?></td>
							<td><?= $row->biaya_pesan ?></td>
							<td><?= $row->biaya_simpan ?></td>
							<?php 
								if ($row->keterangan == 1 ){
							?>
							<td>
							<button type="submit" class="btn btn-sm btn-danger order" data-supp="<?= $row->id_supp ?>" data-id="<?= $row->id_barang ?>"
									data-supp="<?= $row->nama_supp ?>" data-nama="<?= $row->nama_barang ?>" data-hb="<?= $row->harga_beli ?>" 
									data-eoq="<?= $row->eoq  ?>" data-stok="<?= $row->stok_beli ?>" data-akhir="<?= $row->stok_akhir ?>">Harus Order</button></td>
								<?php } else {?>
								<td style="background-color:green;"></td>
								<?php } ?>
						</tr>
						<?php }?>
					</tbody>
					<!--Table body-->
				  </table>
				  <!--Table-->
				</div>

			  </div>

			</div>
	
  </div>
  
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
		<!-- Table with panel -->
			<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				</div>

				<p href="" class="white-text mx-3">Table Supplier</p>

				<div>
				  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#modalTambah">Tambah
					<i class="fas fa-pencil-alt mt-0"></i>
				  </button>
				</div>

			  </div>
			  <!--/Card image-->

			  <div class="px-4">

				<div class="table-wrapper">
				  <!--Table-->
				  <table class="table table-hover mb-0">

					<!--Table head-->
					<thead>
					  <tr>
					  <th class="th-lg" style="text-align:center;">
						  <a href="">Action
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a>Id Supplier
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a href="">Nama Supplier
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a href="">Alamat
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a href="">Telepon
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						
					  </tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody id="show_supp">
					
					</tbody>
					<!--Table body-->
				  </table>
				  <!--Table-->
				</div>

			  </div>

			</div>
<!-- Table with panel -->
  </div>
  
  <div class="tab-pane fade" id="pills-pembelian" role="tabpanel" aria-labelledby="pills-home-tab">
	<div class="card">
					<div class="card-header">
						<p class="text-center">Tabel Simpan Transaksi</p>
					</div>
					<div class="card-body">
					<table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
					  <thead>
						<tr>
							<th class="th-sm">Id Pembelian</th>
							<th class="th-sm">Nama User</th>
							<th class="th-sm">Supplier</th>
							<th class="th-sm">Barang</th>
							<th class="th-sm">Stok</th>
							<th class="th-sm">Jumlah</th>
							<th class="th-sm">Harga</th>
							<th class="th-sm">Total</th>
							<th class="th-sm">Tanggal</th>
							<th class="th-sm">Action</th>					  			  
						  </th>
						</tr>
					  </thead>
					  <tbody>
						<?php foreach ($pembelian as $row) {?>
						<tr>
							<td><?= $row->id_pembelian ?></td>
							<td><?= $row->userlogin ?></td>
							<td><?= $row->nama_supp ?></td>
							<td><?= $row->nama_barang ?></td>
							<td><?= $row->jumlah_pembelian ?></td>
							<td><?= $row->jumlah_pembelian ?></td>
							<td><?= $row->harga_pembelian ?></td>
							<td><?= $row->total_pembelian ?></td>
							<td><?= $row->tanggal_pembelian ?></td>
							<td>
								<button type="submit" class="btn btn-sm btn-default restok" 
									data-pembelian="<?= $row->id_pembelian ?>"
									data-user = "<?= $row->nama_supp ?>"
									data-barang = "<?= $row->nama_barang ?>"
									data-supp="<?= $row->id_supp ?>"
									data-id_barang="<?= $row->item_pembelian ?>"
									data-stok="<?= $row->jumlah_pembelian ?>"
									data-harga="<?= $row->harga_pembelian ?>"
									data-total="<?= $row->total_pembelian ?>"
									
									>pesan
								</button>
							</td>
							</tr>
						<?php }?>
					  </tbody>
					  <tfoot>
						<tr>
						  <th>Id Pembelian</th>
							<th>Nama User</th>
							<th>Supplier</th>
							<th>Barang</th>
							<th>Stok</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
							<th>Tanggal</th>
							<th>Action</th>	
						</tr>
					  </tfoot>
					</table>
					</div>
				</div>
				<br><hr>
	
				<div class="card">
				<div class="card-header">
					<p class="text-center">Tabel Transaksi</p>
				</div>
				<div class="card-body">
				<table class="table table-bordered">
				  <thead class="black  white-text">
					<tr>
					  <th scope="col">Id Pembelian</th>
					  <th scope="col">Nama User</th>
					  <th scope="col">Supplier</th>
					   <th scope="col">Barang</th>
					  <th scope="col">Stok</th>
					  <th scope="col">Jumlah</th>
					  <th scope="col">Harga</th>
					  <th scope="col">Total</th>
					  <th scope="col">Tanggal</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php foreach ($transaksi as $row) {?>
				  <tr>
					<td><?= $row->id_pembelian ?></td>
					<td><?= $row->userlogin ?></td>
					<td><?= $row->nama_supp ?></td>
					<td><?= $row->nama_barang ?></td>
					<td><?= $row->jumlah_pembelian ?></td>
					<td><?= $row->jumlah_pembelian ?></td>
					<td><?= $row->harga_pembelian ?></td>
					<td><?= $row->total_pembelian ?></td>
					<td><?= $row->tanggal_pembelian ?></td>
					</tr>
				  <?php }?>
				  </tbody>
				</table>
				</div>
				</div>
	
  </div>
  
  
  <div class="tab-pane fade" id="pills-penjualan" role="tabpanel" aria-labelledby="pills-home-tab">	
  
			<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				</div>

				<p href="" class="white-text mx-3">Tabel Transaksi</p>

				<div>
				
				</div>

			  </div>
			  <!--/Card image-->

			  <div class="px-4">

				<div class="table-wrapper">
				  <!--Table-->
				  <table id="dtBasicExample1" class="table table-bordered table-hover mb-0">

					<!--Table head-->
					<thead>
					  <tr>
					  <th>ID PENJUALAN</th>
					  <th>NAMA KASIR</th>
					  <th>NAMA BARANG</th>
					  <th>JUMLAH PENJUALAN</th>
					  <th>HARGA ITEM</th>
					  <th>TOTAL</th>
					  <th>TANGGAL</th>
					  </tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody>
						<?php foreach ($penjualan as $row) {?>
						<tr>
							<td><?= $row->id_penjualan ?></td>
							<td><?= $row->userlogin ?></td>
							<td><?= $row->nama_barang ?></td>
							<td><?= $row->jumlah_penjualan ?></td>
							<td><?= $row->harga_item ?></td>
							<td><?= $row->total ?></td>
							<td><?= $row->tanggal_penjualan ?></td>
							
						</tr>
						<?php }?>
					</tbody>
					<!--Table body-->
				  </table>
				  <!--Table-->
				</div>

			  </div>

			</div>
	
  </div>
  
   <div class="tab-pane fade" id="pills-laporan" role="tabpanel" aria-labelledby="pills-home-tab">
		<a href="<?php echo site_url('admin/laporan')?>" class="btn btn-indigo btn-sm"> Laporan Penjualan</a>
		<a href="<?php echo site_url('admin/pembelian')?>" class="btn btn-default btn-sm"> Laporan Pembelian</a>
	<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				</div>

				<p href="" class="white-text mx-3">Laporan Barang</p>

				<div>
					<a href="<?php echo site_url('admin/laporan_barang')?>"><button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" >Print
					<i class="fas fa-pencil-alt mt-0"></i>
				  </button></a>
				</div>

			  </div>
			  <!--/Card image-->

			  <div class="px-4">

				<div class="table-wrapper">
				  <!--Table-->
				    <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

					<!--Table head-->
					<thead>
					  <tr>
					   <th>ID BARANG</th>
					  <th>SUPPLIER</th>
					 
					  <th>NAMA</th>
					  <th>HARGA BELI</th>
					  <th>HARGA JUAL</th>
					  <th>STOK AWAL</th>
					  <th>STOK AKHIR</th>
					  <th>STOK MINIMAL</th>
					  <th>BIAYA PESAN</th>
					  <th>BIAYA SIMPAN</th>
					  </tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody>
						<?php foreach ($barang as $row) {?>
						<tr>
						<td><?= $row->id_barang ?></td>
							<td><?= $row->nama_supp ?></td>
							
							<td><?= $row->nama_barang ?></td>
							<td><?= $row->harga_beli ?></td>
							<td><?= $row->harga_jual ?></td>
							<td><?= $row->stok_awal ?></td>
							<td><?= $row->stok_akhir ?></td>
							<td><?= $row->stok_min ?></td>
							<td><?= $row->biaya_pesan ?></td>
							<td><?= $row->biaya_simpan ?></td>
						</tr>
						<?php }?>
					</tbody>
					<!--Table body-->
				  </table>
				  <!--Table-->
				</div>

			  </div>

			</div>
	
   </div>
    
	<div class="tab-pane fade " id="pills-user" role="tabpanel" aria-labelledby="pills-home-tab">	
		<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				</div>

				<p href="" class="white-text mx-3">Table User</p>

				<div>
				  <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#modaluser">Tambah
					<i class="fas fa-pencil-alt mt-0"></i>
				  </button>
				</div>

			  </div>
			  <!--/Card image-->

			  <div class="px-4">

				<div class="table-wrapper">
				  <!--Table-->
				  <table class="table table-hover table-sm mb-0">

					<!--Table head-->
					<thead>
					  <tr>
					  <th class="th-lg" style="text-align:center;">
						  <a href="">Action
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a>Id User
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a href="">Nama User
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						<th class="th-lg">
						  <a href="">Password
							<i class="fas fa-sort ml-1"></i>
						  </a>
						</th>
						
					  </tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody id="show_user">
					
					</tbody>
					<!--Table body-->
				  </table>
				  <!--Table-->
				</div>

			  </div>

			</div>
		
	
	</div>
  
</div>
  
</div>


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-3.4.1.min.js')?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/popper.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('asset/js/addons/datatables.min.js')?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/mdb.min.js')?>"></script>
  <script type="text/javascript">
		function hitung(){
			
			var b1 = document.getElementById('harga_beli').value;
			var b2 = document.getElementById('jumlah_beli').value;

			var result = parseInt(b1) * parseInt(b2);
			if (!isNaN(result)) {
			   document.getElementById('totbayar').value = result;
			}
		}
  </script>
  <script type="text/javascript">
	$(document).ready(function () {
		$('#dtHorizontalExample').DataTable({"scrollX": true});
		
		$('#dtDynamicVerticalScrollExample').DataTable({
			"scrollY": "200px",
			"scrollCollapse": true,
		});
		
		$('.dataTables_length').addClass('bs-select');
		
		
		
		
		data_supp();
		data_user();
		$('#dtHorizontalExample').on('click', '.order', function(){
			var v = $(this).data('supp');
			var z = $(this).data('id');
			var a = $(this).data('supp');
			var b = $(this).data('nama');
			var c = $(this).data('hb');
			var d = $(this).data('eoq');
			var e = $(this).data('stok');
			var f = $(this).data('akhir');
			$('#modalLoginForm').modal('show');
			$('[name="id_supp"]').val(v);
			$('[name="id_barang"]').val(z);
			$('[name="supplier"]').val(a);
			$('[name="nama_barang"]').val(b);
			$('[name="harga_beli"]').val(c);
			$('[name="eoq"]').val(d);
			$('[name="sisa"]').val(f);
			$('[name="kurang"]').val(e);
		});
		
		$('#dtHorizontalExample').on('click','.edit_barang', function(){
			var a	= $(this).data('id_barang');
			var b	= $(this).data('nama_barang');
			var c	= $(this).data('harga_beli');
			var d	= $(this).data('harga_jual');
			var e	= $(this).data('stok_awal');
			var f	= $(this).data('stok_akhir');
			var g	= $(this).data('stok_min');
			var h	= $(this).data('biaya_pesan');
			var i	= $(this).data('biaya');
			$('#Edit').modal('show');
			$('[name = "id_barang_edit"]').val(a);
			$('[name = "nama_barang_edit"]').val(b);
			$('[name = "harga_beli_edit"]').val(c);
			$('[name = "harga_jual_edit"]').val(d);
			$('[name = "stok_awal_edit"]').val(e);
			$('[name = "stok_akhir_edit"]').val(f);
			$('[name = "stok_min_edit"]').val(g);
			$('[name = "biaya_pesan_edit"]').val(h);
			$('[name = "biaya_simpan_edit"]').val(i);
			
		});
		
		$('#dtHorizontalExample').on('click','.hapus_barang', function(){
			var id	= $(this).data('id')
            $('#modalHapusBarang').modal('show');
            $('[name="id_barang"]').val(id);
		});
	
		function data_supp(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('admin/data_supp')?>',
				async  : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
						 '<td style="text-align:center;">'+
									'<button type="button" class="btn btn-info btn-sm item_edit_supp px-3" data-id="'+data[i].id_supplier+'" data-nama="'+data[i].nama_supp+'" data-alamat="'+data[i].alamat_supp+'" data-tlp="'+data[i].tlp_supp+'">Edit</button>'+
									'<button type="button" class="btn btn-danger btn-sm item_hapus_supp px-3" data-id="'+data[i].id_supplier+'">Hapus</button>'+
								'</td>'+
								  '<td>'+data[i].id_supplier+'</td>'+
								  '<td>'+data[i].nama_supp+'</td>'+
								  '<td>'+data[i].alamat_supp+'</td>'+
								  '<td>'+data[i].tlp_supp+'</td>'+
								 
								'</tr>';
					}
				
					$('#show_supp').html(html);
				}
				
			});
		}
		
		// ambil data bobot untuk proses edit
		$('#show_supp').on('click','.item_edit_supp',function(){
            var id	= $(this).data('id');
			var nm	= $(this).data('nama');
			var js	= $(this).data('alamat');
			var u	= $(this).data('tlp');
            $('#modalEdit').modal('show');
            $('[name="id_supp"]').val(id);
			$('[name="nama_supp"]').val(nm);
			$('[name="alamat_supp"]').val(js);
			$('[name="tlp_supp"]').val(u);
        });
		
		$('#show_supp').on('click','.item_hapus_supp',function(){
            var id	= $(this).data('id')
            $('#modalHapus').modal('show');
            $('[name="id_supp"]').val(id);
        });
		
		$('#hapus').on('click',function(){
            var id	= $('#id_supp').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('admin/hapus_supp')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="id_supp"]').val("");
                    $('#modalHapus').modal('hide');
                    data_supp();
                }
            });
            return false;
        });
		
		// FUNSI RESTOK
		$('#dtDynamicVerticalScrollExample').on('click', '.restok', function(){
			var a	= $(this).data('pembelian');
			var b	= $(this).data('id_barang');
			var c	= $(this).data('stok');
			var d	= $(this).data('harga');
			var e	= $(this).data('total');
			var f	= $(this).data('supp');
			var user = $(this).data('user');
			var barang = $(this).data('barang');
			$('#restok').modal('show');
			$('[name = "a"]').val(a);
			$('[name = "b"]').val(b);
			$('[name = "c"]').val(c);
			$('[name = "d"]').val(d);
			$('[name = "e"]').val(e);
			$('[name = "f"]').val(f);
			$('[name = "user"]').val(user);
			$('[name = "barang"]').val(barang);
		});
	
		
		
		// FUNGSI User
		function data_user(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('admin/data_user')?>',
				async  : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for (i=0; i<data.length; i++){
						html +='<tr>'+
						 '<td style="text-align:center;">'+
									'<button type="button" class="btn btn-info btn-sm item_edit_user px-3" data-id="'+data[i].id_user+'" data-nama="'+data[i].userlogin+'" data-alamat="'+data[i].psslogin+'" data-level="'+data[i].level+'">Edit</button>'+
									'<button type="button" class="btn btn-danger btn-sm item_hapus_user px-3" data-id="'+data[i].id_user+'">Hapus</button>'+
								'</td>'+
								  '<td>'+data[i].id_user+'</td>'+
								  '<td>'+data[i].userlogin+'</td>'+
								  '<td>'+data[i].psslogin+'</td>'+
								 
								'</tr>';
					}
				
					$('#show_user').html(html);
				}
				
			});
		}
		
		// ambil data bobot untuk proses edit
		$('#show_user').on('click','.item_edit_user',function(){
            var id	= $(this).data('id');
			var nm	= $(this).data('nama');
			var js	= $(this).data('alamat');
			var s   = $(this).data('level');
            $('#modalEdituser').modal('show');
            $('[name="id_user_edit"]').val(id);
			$('[name="nama_edit"]').val(nm);
			$('[name="pass_edit"]').val(js);
			$('[name="level_edit"]').val(s);
        });
		
		$('#show_user').on('click','.item_hapus_user',function(){
            var id	= $(this).data('id')
            $('#modalHapususer').modal('show');
            $('[name="id_userh"]').val(id);
        });
		
		
		
		
		
	});
  
  </script>
  
</body>

</html>
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">PEMBELIAN RESTOK</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
       <!-- Default form grid -->
<form action="<?php echo site_url('admin/save_pembelian')?>" method="post">
  <!-- Grid row -->
  <div class="row">
    <div class="col-6">
		 <input type="hidden" name="id_barang" id="id_barang" class="form-control" readonly>
		 <input type="hidden" name="id_user" id="id_user" class="form-control" readonly>
		 <input type="hidden" name="id_supp" id="id_supp" class="form-control" readonly>
	  <label>Supplier</label>
      <input type="text" name="supplier" id="supplier" class="form-control" readonly>
	  <label>Nama Barang</label>
      <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly >
	  <label>Harga Beli Satuan</label>
      <input type="text" name="harga_beli" id="harga_beli" onKeyup="hitung();" class="form-control" readonly>
	  <label>Jumlah Beli</label>
      <input type="text" name="jumlah_beli" id="jumlah_beli" onKeyup="hitung();" class="form-control" >
    </div>
	<div class="col-2"></div>
    <div class="col-4">
		<br><br><br>
      <label>EOQ</label>
      <input type="text" name="eoq" id="eoq" class="form-control" readonly >
	  <label>Sisa Stok</label>
      <input type="text" name="sisa" id="sisa" class="form-control" readonly>
	  <label>Kekurangan</label>
      <input type="text" name="kurang" id="kurang" class="form-control" readonly >
    </div>
  </div>
  <label>Total Bayar</label>
      <input type="text" name="totbayar" id="totbayar"  class="form-control" readonly>

<!-- Default form grid -->

      </div>
	   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
      </div>
    </form> 
    </div>
  </div>
</div>




	<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Edit Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/edit_supp')?>" method="post">
			  <div class="modal-body mx-3">
				<div class="input-group input-group-sm mb-3">
				  
				  <input type="hidden" class="form-control" id="id_supp" name="id_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Nama Supplier</span>
				  </div>
				  <input type="text" class="form-control" id="nama_supp" name="nama_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Alamat Supplier</span>
				  </div>
				  <input type="text" class="form-control" id="alamat_supp" name="alamat_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">No Telepon</span>
				  </div>
				  <input type="text" class="form-control" id="tlp_supp" name="tlp_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="edit_kriteria">Ubah</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>


		<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Tambah Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/save_supp')?>" method="post">
			  <div class="modal-body mx-3">
			  
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Id Supplier</span>
				  </div>
				  <input type="text" class="form-control" id="id_supp" name="id_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Nama Supplier</span>
				  </div>
				  <input type="text" class="form-control" id="nama_supp" name="nama_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Alamat Supplier</span>
				  </div>
				  <input type="text" class="form-control" id="alamat_supp" name="alamat_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">No Telepon</span>
				  </div>
				  <input type="text" class="form-control" id="tlp_supp" name="tlp_supp" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit" id="tambah">Tambah</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>

		<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Hapus Supplier</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/hapus_supp')?>" method="post">
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_supp" id="id_supp" class="form-control validate">
				 
				<h4>Apakah anda yakin akan menghapus supplier ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit">Hapus</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Tambah Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/save_barang')?>" method="post">
			  <div class="modal-body mx-3">
			  
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm"></span>
				  </div>
				  <select class="browser-default custom-select" name="id_supp" id="id_supp">
					  <option select>Pilih Supplier</option>
						<?php 
							foreach ($supp as $row) {?>
						   <option value="<?= $row->id_supplier ?>"><?= $row->nama_supp ?></option>
							<?php }?>
					</select>
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Nama Barang</span>
				  </div>
				  <input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Harga Beli</span>
				  </div>
				  <input type="text" class="form-control" id="harga_beli" name="harga_beli" aria-label="Sizing example input" onKeyup="hitung();" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Harga Jual</span>
				  </div>
				  <input type="text" class="form-control" id="harga_jual" name="harga_jual" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Stok Awal</span>
				  </div>
				  <input type="text" class="form-control" id="stok_awal" name="stok_awal" aria-label="Sizing example input" onKeyup="hitung();" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Stok Minimal</span>
				  </div>
				  <input type="text" class="form-control" id="stok_min" name="stok_min" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>


			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit">Simpan</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		<div class="modal fade" id="modalHapusBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Hapus Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/hapus_barang')?>" method="post">
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_barang" id="id_barang" class="form-control validate">
				 
				<h4>Apakah anda yakin akan menghapus barang ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit">Hapus</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		
		<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Ubah Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/edit_barang')?>" method="post">
			  <div class="modal-body mx-3">
				<div class="input-group input-group-sm mb-3">
				 
				  <input type="hidden" class="form-control" id="id_barang_edit" name="id_barang_edit" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Nama Barang</span>
				  </div>
				  <input type="text" class="form-control" id="nama_barang_edit" name="nama_barang_edit" aria-label="Sizing example input" onKeyup="hitung();" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Harga Beli</span>
				  </div>
				  <input type="text" class="form-control" id="harga_beli_edit" name="harga_beli_edit" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Harga Jual</span>
				  </div>
				  <input type="text" class="form-control" id="harga_jual_edit" name="harga_jual_edit" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Stok Minimal</span>
				  </div>
				  <input type="text" class="form-control" id="stok_min_edit" name="stok_min_edit" aria-label="Sizing example input" onKeyup="hitung();" aria-describedby="inputGroup-sizing-sm">
				</div>
				
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit">Ubah</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade" id="restok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Data Transaksi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/update_pembelian')?>" method="post">
			  <div class="modal-body mx-3">
				<div class="md-form input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">Id</span>
				  </div>
				  <input type="text" name="a" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>

				<div class="md-form input-group input-group-sm mb-3">
				 
				  <input type="hidden" name="f" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>
				
				<div class="md-form input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">Nama Supplier</span>
				  </div>
				  <input type="text" name="user" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>
				<div class="md-form input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">Nama Barang</span>
				  </div>
				  <input type="text" name="barang" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>
				<div class="md-form input-group input-group-sm mb-3">
				 
				  <input type="hidden" name="b" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>


				<div class="md-form input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">Stok</span>
				  </div>
				  <input type="text" name="c" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>


				<div class="md-form input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">Harga</span>
				  </div>
				  <input type="text" name="d" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>


				<div class="md-form input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">Total</span>
				  </div>
				  <input type="text" name="e" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
				</div>

			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button type="submit" class="btn btn-default">Transaksi</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
<div class="modal fade" id="modaluser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php echo site_url('admin/save_user')?>" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input type="text" name="nama" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form3">Nama User</label>
        </div>

        <div class="md-form mb-4">
          <input type="text" name="pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form2">Password</label>
        </div>
		 <div class="md-form mb-4">
           <select id="jenis_kelamin" name="level" class="browser-default custom-select">
			  <option selected>Pilih</option>
			  <option value="3">Gudang</option>
			  <option value="2">Kasir</option>
			</select>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-indigo">Tambah <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
	  </form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalEdituser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Ubah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php echo site_url('admin/edit_user')?>" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
		 <input type="hidden" name="id_user_edit" class="form-control validate">
        </div>
		<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Nama User</span>
				  </div>
				  <input type="text" class="form-control" id="nama_edit" name="nama_edit" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
				<div class="input-group input-group-sm mb-3">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
				  </div>
				  <input type="text" class="form-control" id="pass_edit" name="pass_edit" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
				</div>
		 <div class="md-form mb-4">
           <select id="jenis_kelamin" name="level_edit" class="browser-default custom-select">
			  <option selected>Pilih</option>
			  <option value="3">Gudang</option>
			  <option value="2">Kasir</option>
			</select>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-indigo">Ubah <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
	  </form>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="modalHapususer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Hapus User</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="<?php echo site_url('admin/hapus_user')?>" method="post">
			  <div class="modal-body mx-3">
				
				  <input type="hidden" name="id_userh" class="form-control validate">
				 
				<h4>Apakah anda yakin akan menghapus user ini...!!!</h4>
			  </div>
			  <div class="modal-footer d-flex justify-content-center">
				<button class="btn btn-default" type="submit">Hapus</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>