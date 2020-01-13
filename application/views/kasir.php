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
<p class="text-center h4">TB.MORODADI &nbsp; Halaman Kasir</p>
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
			  aria-controls="pills-contact" aria-selected="false">DATA PENJUALAN</button>
		  </li>
		 </ul>
        </ol>
      </nav>
    </div>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <button class="nav-link dropdown-toggle btn btn-indigo btn-sm" id="navbarDropdownMenuLink" data-toggle="dropdown"
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
			  <img src="<?php echo base_url('asset/img/logo.png')?>" class="img-fluid " alt="zoom">
			  <div class="mask flex-center waves-effect waves-light">
			  </div>
			</div>
		
		</div>
		
		<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-home-tab">	
		
			<div class="card card-cascade narrower">

			  <!--Card image-->
			  <div
				class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

				<div>
				</div>

				<p href="" class="white-text mx-3">Table Barang</p>

				<div>
				<button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2" data-toggle="modal" data-target="#Tambah">Transaksi</button>
				</div>

			  </div>
			  <!--/Card image-->

			  <div class="px-4">

				<div class="table-wrapper">
				  <!--Table-->
				  <table id="dtBasicExample" class="table table-bordered table-sm table-hover mb-0">

					<!--Table head-->
					<thead>
					  <tr>
					  <th>Id barang</th>
					  <th>Nama Barang</th>
					  <th>Harga Jual</th>
					  <th>Stok Akhir</th>
					  </tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody>
						<?php foreach ($barang as $row) {?>
						<tr>
							<td><?= $row->id_barang ?></td>
							<td><?= $row->nama_barang ?></td>
							<td><?= $row->harga_jual ?></td>
							<td><?= $row->stok_akhir ?></td>
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
		<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-home-tab">	
		
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
			
			var b1 = document.getElementById('harga').value;
			var b2 = document.getElementById('stok').value;

			var result = parseInt(b1) * parseInt(b2);
			if (!isNaN(result)) {
			   document.getElementById('total').value = result;
			}
		}
  </script>
  <script type="text/javascript">
  $(document).ready(function () {
	  
		$('#dtBasicExample1').DataTable();
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
	
			$('#id_barang').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('kasir/get_harga');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<input type="text" value="'+data[i].harga_jual+'" class="form-control" id="harga" name="harga" onKeyup="hitung();">';
                        }
                        $('#harga_item').html(html);
 
                    }
                });
                return false;
            }); 
	
	});
  </script>
  
</body>

</html>


<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Transaksi Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php echo site_url('kasir/save_penjualan') ?>" method="post">
      <div class="modal-body mx-3">
        
			<div class=" justify-content-md-center">
				<div class="input-group mb-3">
				<select class="browser-default custom-select" id="id_barang" name="id_barang">
				<option selected>Pilih Barang</option>
				<?php foreach ($barang as $x){?>
				  <option value="<?=$x->id_barang?>"><?=$x->nama_barang ?></option>
				<?php }?>
				</select>
				</div>
				<div class="input-group mb-3">
				<input type="text" id="stok" name="stok" onKeyup="hitung();" class="form-control" placeholder="masukkan jumlah barang">
				</div>
				<div class="input-group mb-3" id="harga_item">
				</div>
			</div>
			<input type="text" id="total" name="total" class="form-control" placeholder="total harga">
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit">Transaksi</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="Beli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Transaksi Baru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form action="<?php echo site_url('kasir/save_penjualan') ?>" method="post">
      <div class="modal-body mx-3">
        
			<div class=" justify-content-md-center">
				<div class="input-group mb-3">
				<select class="browser-default custom-select" id="id_barang" name="id_barang">
				<option selected>Pilih Barang</option>
				<?php foreach ($barang as $x){?>
				  <option value="<?=$x->id_barang?>"><?=$x->nama_barang ?></option>
				<?php }?>
				</select>
				</div>
				<div class="input-group mb-3">
				<input type="text" id="stok" name="stok" onKeyup="hitung();" class="form-control" placeholder="masukkan jumlah barang">
				</div>
				<div class="input-group mb-3" id="harga_item">
				</div>
			</div>
			<input type="text" id="total" name="total" class="form-control" placeholder="total harga">
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default" type="submit">Transaksi</button>
      </div>
	  </form>
    </div>
  </div>
</div>