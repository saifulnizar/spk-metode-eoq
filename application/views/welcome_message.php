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
<p class="text-center h4">Selamat Datang </p>
<br>
	<div class="row  justify-content-md-center">

		<div class="col-5">
		
			<!-- Card -->
<div class="card mx-xl-5">

  <!-- Card body -->
  <div class="card-body">
    <!-- Default form subscription -->
    <form action="<?php echo site_url('welcome/login')?>" method="post">
      <p class="h4 text-center py-4">MASUK</p>

      <!-- Default input name -->
      <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Nama</label>
      <input type="text" name="nama" id="defaultFormCardNameEx" class="form-control">

      <br>
		 
      <!-- Default input email -->
      <label for="defaultFormCardEmailEx" class="grey-text font-weight-light">Sandi</label>
      <input type="password" name="sandi" id="defaultFormCardEmailEx" class="form-control">

      <div class="text-center py-4 mt-3">
        <button class="btn btn-outline-purple" type="submit">Masuk<i
            class="fa fa-paper-plane-o ml-2"></i></button>
      </div>
    </form>
    <!-- Default form subscription -->
<?php echo $this->session->flashdata('msg');?>
  </div>
  <!-- Card body -->

</div>
<!-- Card -->
		
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
  $('.toast').toast('show');
  </script>
</body>

</html>