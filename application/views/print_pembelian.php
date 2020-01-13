<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 70%;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="7">
	<tr>
		<th>Tanggal</th>
        <th>Kode Pembelian</th>
		<th>Nama Supplier</th>
		<th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
	</tr>

    <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl = date('d-m-Y', strtotime($data->tanggal_pembelian));

    		echo "<tr>";
    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->id_pembelian."</td>";
			echo "<td>".$data->nama_supp."</td>";
			echo "<td>".$data->nama_barang."</td>";
    		echo "<td>".$data->jumlah_pembelian."</td>";
    		echo "<td>".$data->harga_pembelian."</td>";
    		echo "<td>".$data->total_pembelian."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
