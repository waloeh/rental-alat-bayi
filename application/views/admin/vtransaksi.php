<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi</h1>
		</div>
		<?php echo $this->session->flashdata('message'); ?>
		<div class="table-responsive">
			<table id="tableTransasi" class="table table-striped table-hover table-bordered table-sm" style="width: 100%; cursor: pointer">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Customer</th>
			      <th scope="col">Alat</th>
			      <th scope="col">Tgl_Rental</th>
			      <th scope="col">Tgl_Kembali</th>
			      <th scope="col">Harga/Hari</th>
			      <th scope="col">Denda/Hari</th>
			      <th scope="col">Tgl_Dikembalikan</th>
			      <th scope="col">Status_Kembali</th>
			      <th scope="col">Status_Rental</th>
			      <th scope="col">Durasi_Rental</th>
			      <th scope="col">Durasi_denda</th>
			      <th scope="col">Jml_Harga</th>
			      <th scope="col">Jml_Denda</th>
			      <th scope="col">Total_Harga</th>
			      <th scope="col">Bukti_Bayar</th>
			      <th scope="col">Status_Bayar</th>
			      <th scope="col">Aksi</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1; ?>
			  	<?php foreach ($transaksi as $tr) : ?>
				    <tr>
				      <th scope="row"><?php echo $no++; ?></th>
				      <td><?php echo $tr['nama_customer']; ?></td>
				      <td><?php echo $tr['merk']; ?></td>
				      <td><?php echo date('d/m/Y', strtotime($tr['tanggal_rental'])); ?></td>
				      <td><?php echo date('d/m/Y', strtotime($tr['tanggal_kembali'])); ?></td>
				      <td><?php echo number_format($tr['harga'],0,',','.'); ?></td>
				      <td><?php echo number_format($tr['denda'],0,',','.'); ?></td>
				      <td>	
				      	<?php 
				      		if ($tr['tanggal_pengembalian'] == '0000-00-00') {
				      			echo "- ";
				      		} else {
				      			 echo date('d/m/Y', strtotime($tr['tanggal_pengembalian']));
				      		}
				      	?>	
				      </td>
				      <td>
				      	<?php 
				      		if ($tr['status_pengembalian'] == '0') {
					      		echo "Belum Kembali";
					      	} else {
					      		echo "Sudah Kembali";
					      	}
				      	?> 		
				      </td>
				      <td>
				      	<?php 
				      		if ($tr['status_rental'] == '0') {
					      		echo "Selesai";
					      	} else {
					      		echo "Dirental";
					      	}
				      	?>
				      </td>
				      <td>
				      <?php 
				      	$tgl_kembali = strtotime($tr['tanggal_kembali']);
				      	$tgl_rental = strtotime($tr['tanggal_rental']);
				      	$jml = $tgl_kembali - $tgl_rental;
				      	$hari = $jml/60/60/24;
				      	echo $hari.' Hari';
				      ?>
				      </td>
				      <td>
				      	<?php  
				      		$tgl_kembali = strtotime($tr['tanggal_kembali']);
				      		if ($tr['tanggal_pengembalian'] == '0000-00-00') {
				      			echo "-";
				      		}else {
				      			$tgl_dikembalikan = strtotime($tr['tanggal_pengembalian']);
				      			$selisih = $tgl_dikembalikan - $tgl_kembali;
				      			$selisih = $selisih/60/60/24;
				      			if ($selisih == 0) {
				      				echo "-";
				      			} else {
				      				echo $selisih.' Hari';
				      			}
				      		}
				      	?>
				      </td>	
				      <td>
				      <?php
				      	$harga = $hari * $tr['harga'];
				      	echo number_format($harga,0,',','.'); 
				      ?>
				      </td>
				      <td>
				      <?php 
			      		$tgl_kembali = strtotime($tr['tanggal_kembali']);
			      		if ($tr['tanggal_pengembalian'] == '0000-00-00') {
			      			echo "-";
				      	} else {
				      		$tgl_dikembalikan = strtotime($tr['tanggal_pengembalian']);
				      		$selisih = $tgl_dikembalikan - $tgl_kembali;
				      		$selisih = $selisih/60/60/24;
				      		$harga_total_denda = $selisih * $tr['denda'];
				      		echo number_format($harga_total_denda,0,',','.');
				      	} 
				      ?>
				      </td>
				      <td>
				      <?php  
				      	$tgl_kembali = strtotime($tr['tanggal_kembali']);
				      	if ($tr['tanggal_pengembalian'] == '0000-00-00') {
				      		echo $harga;
				      	} else {
				      		$denda = $tr['denda'];
				      		$tanggal_pengembalian = strtotime($tr['tanggal_pengembalian']);
				      		$lama_denda = $tanggal_pengembalian - $tgl_kembali;
				      		$lama_denda = $lama_denda/60/60/24;
				      		$denda = $denda * $lama_denda;
				      		$denda = $denda + $harga;
				      		echo number_format($denda,0,',','.');
				      	}

				      ?>
				      </td>
				      <td>
				      	<?php if (!empty($tr['bukti_pembayaran'])) { ?>
				   			<a href="<?php echo base_url('admin/Transaksi/konfirmasi_pembayaran/'.$tr['id_rental']) ?>"><button class="btn btn-sm btn-primary"><i class="fas fa-check-circle"></i></button></a>
				   		<?php } else { ?>
				   			<button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
				   		<?php } ?>
				      </td>
				      <td>
				      <?php
				      	if ($tr['status_pembayaran'] == 0) {
				      		echo 'Belum Bayar';
				      	} else {
				      		echo "Lunas";
				      	}
				      ?>
				      </td>
				      <td>
				      	<?php if ($tr['status_rental'] == '0' && $tr['status_pembayaran'] == '1') {
					      		echo "-";
					      	} else { ?>
					      		<div class="row">
						      		<a href="<?php echo base_url('admin/Transaksi/transaksi_selesai/').$tr['id_rental']; ?>"><button class="btn btn-success mr-1 btn-sm "><i class="fas fa-check"></i></button></a>
									<a href="<?php echo base_url('admin/Transaksi/transaksi_batal/').$tr['id_rental'].'/'.$tr['id_alatbayi']; ?>" onclick="return confirm('yakin transaksi dibatalkan dan dihapus.? ');"><button class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button></a>
								</div>
					    <?php } ?>
				      </td>
				    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</section>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('#tableTransasi').DataTable();
	});
</script>