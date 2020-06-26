<section id="car-list-area" class="section-padding">
<div class="container mt-5 mb-5">
	<?php echo $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
			  <div class="card-header alert-danger">
			    Invoice Pembayaran
			  </div>
			  <div class="card-body">
			    <table class="table table-sm table-hover">
			    	<tr>
			    		<td>Merek</td>
			    		<td>:</td>
			    		<td><?php echo $pembayaran['merk']; ?></td>
			    	</tr>
			    	<tr>
			    		<td>Tanggal rental</td>
			    		<td>:</td>
			    		<td><?php echo date('d/m/Y', strtotime($pembayaran['tanggal_rental'])); ?></td>
			    	</tr>
			    	<tr>
			    		<td>Tanggal Kembali</td>
			    		<td>:</td>
			    		<td><?php echo date('d/m/Y', strtotime($pembayaran['tanggal_kembali'])); ?></td>
			    	</tr>
			    	<tr>
			    		<td>Biaya Sewa/hari</td>
			    		<td>:</td>
			    		<td><?php echo 'Rp. '. number_format($pembayaran['harga'], 0, ',', '.'); ?></td>
			    	</tr>
			    	<tr>
			    		<td>Durasi</td>
			    		<td>:</td>
			    		<td>
			    		<?php
			    			$tgl_rental = strtotime($pembayaran['tanggal_rental']);
			    			$tgl_kembali = strtotime($pembayaran['tanggal_kembali']);
			    			$jml = $tgl_kembali - $tgl_rental;
			    			$jml = $jml/60/60/24;
			    			echo $jml.' Hari';
			    		?>
			    		</td>
			    	</tr>
			    	<tr>
			    		<td class="text-danger">JUMLAH PEMBAYARAN</td>
			    		<td>:</td>
			    		<td>
			    		<?php 
			    			$total = $jml * $pembayaran['harga'];
			    			$total = number_format($total,0,',','.');
			    			echo "<button class='btn btn-sm btn-danger'> Rp. ".$total."</button>";
			    		?>	
			    		</td>
			    	</tr>
			    	<tr>
			    		<td></td>
			    		<td></td>
			    		<td>
			    			<a href="<?php echo base_url('customer/Transaksi/print_invoice/').$pembayaran['id_rental']?>" target="_blank"><button class="btn btn-sm btn-secondary mt-2">Print Invoice</button></a>
			    		</td>
			    	</tr>
			    </table>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			  <div class="card-header alert-secondary">
			    Informasi Pembayaran
			  </div>
			  <div class="card-boy">
			    <p class="card-text ml-3 mr-3 mt-2 mb-2">Silahkan lakukan pembayaran melalui nomor rekening di bawah ini.</p>
			    <ul class="list-group list-group-flush ml-3 mr-3">
				  <li class="list-group-item">Bank Mandiri 32162476 <br> An: Hadi Mulyana</li>
				  <li class="list-group-item">Bank BNI 32162476 <br>An: Hadi Mulyana</li>
				  <li class="list-group-item">Bank BRI 32162476<br>An: Hadi Mulyana</li>
				</ul>
				<?php if (empty($pembayaran['bukti_pembayaran'])) { ?>
					<button type="button" class="btn btn-sm btn-danger" style="width: 100%;" data-toggle="modal" data-target="#exampleModal"><i class="far fa-file-alt"></i> Upload Bulti Pembayaran</button>
				<?php } elseif ($pembayaran['status_pembayaran'] == 0){ ?>
					<button type="button" class="btn btn-sm btn-warning" style="width: 100%;"><i class="fas fa-clock-o"></i> Tunggu Konfirmasi Pembayaran</button>
				<?php } else { ?>
					<button type="button" class="btn btn-sm btn-success" style="width: 100%;"><i class="fas fa-check"></i> Pembayaran Selesai</button>
				<?php } ?>
			  </div>
			</div>
		</div>
	</div>
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('customer/Transaksi/bukti_pembayaran/').$pembayaran['id_rental'] ?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      		<div class="form-group">
				<input type="file" name="file" class="form-control">
				<small class="text-danger">gunakan file: png, jpeg, jpg, pdf</small>
			</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
      </div>
     </form>
    </div>
  </div>
</div>