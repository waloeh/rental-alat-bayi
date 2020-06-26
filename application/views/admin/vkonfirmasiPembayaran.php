<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Konfirmasi Pembayaran</h1>
		</div>
		<form action="<?php echo base_url('admin/Transaksi/konfirmasi/').$konfirmasi['id_rental'] ?>" method="post">
		<div class="card" style="width: 50%">
			<div class="card-header">
				<h6 class="card-subtitle mb-2 text-muted">Konfirmasi Pembayaran</h6>
			</div>
			    <div class="card-body">
			    <a href="<?php echo base_url('admin/Transaksi/download_bukti/').$konfirmasi['id_rental'] ?>" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Download Bukti Pembayaran</a>
			    <div class="custom-control custom-switch ml-5">
				  <input type="checkbox" class="custom-control-input" id="customSwitch1" name="konfirmasi" value="1"<?php if($konfirmasi['status_pembayaran'] == 1){echo 'checked';}?>>
				  <label class="custom-control-label" for="customSwitch1">Konfirmasi Pembayran</label>
				</div>
				<div>
				<hr>
				<button class="btn btn-sm btn-primary" type="submit">Simpan</button>
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/Transaksi') ?>">Batal</a>
				</div>
		  	</div>
		</div>
		</form>
	</section>
</div>	