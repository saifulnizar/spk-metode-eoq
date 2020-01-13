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
		<br><br>
		<img src="<?php echo base_url('asset/img/morodadi.png')?>" width="100%"/>
		<br><br>
		<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				<a href="<?php echo site_url('admin')?>"><button type="button" class="btn btn-dark"><span id="log"></span></button></a>
				</div>

				<p href="" class="white-text mx-3">Laporan Barang</p>

				<div>
					
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
  
  
  
  <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-3.4.1.min.js')?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/popper.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo base_url('asset/js/addons/datatables.min.js')?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url('asset/js/mdb.min.js')?>"></script>
  <script type="text/javascript">
		$(document).ready (function () {

	window.print();
	$('#log').html('Kembali');
});	
  </script>
  </script>
</body>

</html>