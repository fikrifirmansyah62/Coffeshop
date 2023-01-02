<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA PENJUALAN</title>
</head>
<style>
	page {
		background: white;
		display: block;
		margin: 0 auto;
		margin-bottom: 2cm;
		padding-top: 0.1cm;
		padding-right: 0.3cm;
		padding-left: 0.3cm;
		padding-bottom: 0.5cm;
	}
	page[size="A4"] {  
		width: 21cm;
		height: 29.7cm; 
	}
	page[size="A4"][layout="portrait"] {
		width: 29.7cm;
		height: auto;  
	}
	page[size="A3"] {
		width: 29.7cm;
		height: 42cm;
	}
	page[size="A3"][layout="portrait"] {
		width: 42cm;
		height: 29.7cm;  
	}
	page[size="A5"] {
		width: 14.8cm;
		height: 21cm;
	}
	page[size="A5"][layout="portrait"] {
		width: 21cm;
		height: 14.8cm;  
	}
      body {
        margin-top: 3rem;
      }
      h1 {
        text-align: center;
      }
      table {
    border: 1px solid;
    border-collapse: collapse;
    width: 100%;
	}

	table, th, td {
		border: 1px solid black;
		padding: 2px;
		font-size: 14px;
		text-align: center;
	}

	th {
		height: 40px;
		text-align: center;
	}	

	th {
		height: 20px;
		background-color: #eff3f8;
		color: black;
	}
		
	th {
		padding: 5px;
	}

	td.label {
		padding-top: 30px;
		padding-bottom: 30px;
	}
</style>
<body>
	<u>
		<img src="<?=base_url('img/logo-login.png');?>" align="left" width="150"></br>
		<img src="<?=base_url('img/unpam.png');?>" align="right" width="115"></br>
		<h2 style="margin-bottom: 80px;" align="center">LAPORAN PENJUALAN COFFEE SHOP VIKTOR</h2>
	</u>
	<!-- <a href="#Print">
    <img src="<?=base_url('img/print.png');?>" align="left" height="24" width="30" 
	title="Print Laporan" id="print-link" onClick="window.print(); return false;"/>
    </a> -->
	<?php 
	include 'config.php';
	?>

	<table border="2" cellspacing="0" style="width: 100%">
		<tr>
			<th width="3%">No</th>
			<th>TANGGAL</th>
			<th>MENU</th>
			<th>QTY</th>
			<th>HARGA</th>
			<th>TOTAL</th>
			<th>DONASI(5%)</th>
			<th>PENDAPATAN BERSIH</th>
		</tr>
		<?php 
		$sql = mysqli_query($conn,"SELECT * FROM resto_order_detail 
		INNER JOIN resto_menu ON resto_order_detail.menu_id = resto_menu.menu_id
		INNER JOIN resto_order ON resto_order_detail.order_id = resto_order.order_id"
		
		);
		
		$qty    = 0;
		$total 	= 0;
		$donasi = 0;
		$no = 1;

		while($r = $sql->fetch_assoc()){
			$qty = $qty + $r['order_detail_qty'];
			$total = $total + $r['order_detail_subtotal'];
			$donasi = $donasi + $r['order_detail_donasi'];
			$bersih = $total - $donasi;
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $r['order_tanggal']; ?></td>
			<td><?= $r['menu_nama']; ?></td>
			<td><?= $r['order_detail_qty']; ?></td>
			<td><?= $r['order_detail_harga']; ?></td>
			<td><?= $r['order_detail_subtotal']; ?></td>
			<td><?= $r['order_detail_donasi']; ?></td>
			<td><?= $r['order_detail_bersih']; ?></td>
		</tr>
		<?php
		}
		?>
		<tr>
		<td align="center" colspan="3"><b>TOTAL (RP)</b></td>
		<td align="center"><b><?=$qty ?></b></td>
		<td align="center"><b></b></td>
		<td align="center"><b><?=$total ?></b></td>
		<td align="center"><b><?=$donasi ?></b></td>
		<td align="center"><b><?=$bersih ?></b></td>
		</tr>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>