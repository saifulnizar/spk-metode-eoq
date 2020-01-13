<html>
<head>
	<title>PDF</title>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" />
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
	<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>
<body>
<div class="container">

<br>
    <p class="h3" style="text-align:center;">Laporan Penjualan</p>
	<hr>
	<a href="<?php echo site_url('admin')?>" class="btn btn-sm btn-warning">Kembali</a>
	<div class="row justify-content-md-center">
	<div class="col-5 ">
	<div class="card">
	<div class="card-body">
	
    <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select class="form-control" name="filter" id="filter">
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        

        <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal form-control" />
           
        </div>

        <div id="form-bulan">
            <label>Bulan</label><br>
            <select class="form-control" name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            
        </div>

        <div id="form-tahun">
            <label>Tahun</label><br>
            <select class="form-control" name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
         
        </div>
		<hr>
        <button class="btn btn-sm btn-primary" type="submit">Tampilkan</button>
        <a href="<?php echo site_url('admin/laporan'); ?>">Reset Filter</a>
    </form>
	</div>
	</div>
	</div>
	</div>
  
    
    <b><?php echo $ket; ?></b><br /><br />
    <a href="<?php echo $url_cetak; ?>" class="btn btn-sm btn-danger">CETAK PDF</a><br /><br />

    <table class = "table table-bordered" border="1" cellpadding="8">
	<thead class="thead-dark">
    <tr>
        <th>Tanggal</th>
        <th>Kode Penjualan</th>
		<th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
    </tr>
	</thead>
    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tanggal_penjualan));
            
    		echo "<tr>";
    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->id_penjualan."</td>";
			echo "<td>".$data->nama_barang."</td>";
    		echo "<td>".$data->jumlah_penjualan."</td>";
    		echo "<td>".$data->harga_item."</td>";
    		echo "<td>".$data->total."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
 </div>   
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</table>
</body>
</html>
