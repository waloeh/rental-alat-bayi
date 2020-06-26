<table style="width: 50%;">
	<h3>INVOICE</h3>
    <tr>
		<td>Nama Customer</td>
		<td>:</td>
		<td><?php echo $invoice['nama_customer'] ?></td>
	</tr>
	<tr>
		<td>Merek</td>
		<td>:</td>
		<td><?php echo $invoice['merk']; ?></td>
	</tr>
	<tr>
		<td>Tanggal rental</td>
		<td>:</td>
		<td><?php echo date('d/m/Y', strtotime($invoice['tanggal_rental'])); ?></td>
	</tr>
	<tr>
		<td>Tanggal Kembali</td>
		<td>:</td>
		<td><?php echo date('d/m/Y', strtotime($invoice['tanggal_kembali'])); ?></td>
	</tr>
	<tr>
		<td>Biaya Sewa/hari</td>
		<td>:</td>
		<td><?php echo 'Rp. '. number_format($invoice['harga'], 0, ',', '.'); ?></td>
	</tr>
	<tr>
		<td>Durasi</td>
		<td>:</td>
		<td>
		<?php
			$tgl_rental = strtotime($invoice['tanggal_rental']);
			$tgl_kembali = strtotime($invoice['tanggal_kembali']);
			$jml = $tgl_kembali - $tgl_rental;
			$jml = $jml/60/60/24;
			echo $jml.' Hari';
		?>
		</td>
	</tr>
	<tr>
		<td>Status Pembayaran</td>
		<td>:</td>
		<td>
			<?php 
				if ($invoice['status_pembayaran'] == 0 ) {
					echo "Belum Lunas";
				}else {
					echo "Lunas";
				}
			?>
			
		</td>
	</tr>
	<tr style="font: bold; color: red">
		<td>JUMLAH PEMBAYARAN</td>
		<td>:</td>
		<td>
		<?php 
			$total = $jml * $invoice['harga'];
			$total = number_format($total,0,',','.');
			echo  "Rp. ".$total;
		?>	
		</td>
	</tr>
</table>
<script type="text/javascript">
	window.print();
</script>