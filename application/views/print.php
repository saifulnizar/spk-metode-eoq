<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
	</style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
	<table border="1" cellpadding="8">
	<tr>
		<th>Tanggal</th>
        <th>Kode Penjualan</th>
		<th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Total Harga</th>
	</tr>

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
	</table>
</body>
</html>
