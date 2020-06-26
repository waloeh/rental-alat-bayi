<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Transaksi Selesai</h1>
		</div>
		<div class="card" style="width: 50%;">
			<div class="card-body">
				<form action="<?php echo base_url('admin/Transaksi/transaksi_selesai/').$transaksi['id_rental']; ?>" method="post">
					<div class="form-group">
						<label>Tanggal pengembalian</label>
						<input type="date" name="tanggal_kembali" class="form-control">
					</div>
					<div class="form-group">
						<label>Status Pengembalian</label>
						<select name="status_pengembalian" class="form-control">
							<option value="<?php echo $transaksi['status_pengembalian'] ?>"><?php if ($transaksi['status_pengembalian'] == 0) {
									echo "Belum Kembali";
								} else {
									echo "Sudah Kembali";
								}?>				
							</option>
							<option value="0">Belum Kembali</option>
							<option value="1">Sudah Kembali</option>}
						</select>
					</div>
					<div class="form-group">
						<label>Status Rental</label>
						<select name="status_rental" class="form-control">
							<option value="<?php echo $transaksi['status_rental'] ?>"><?php if ($transaksi['status_rental'] == 1) {
									echo "Dirental";
								} else {
									echo "Selesai";
								}?>				
							</option>
							<option value="0">Selesai</option>
							<option value="1">Dirental</option>}
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-sm" type="submit">Simpan</button>
						<a class="btn btn-danger btn-sm" href="<?php echo base_url('admin/Transaksi') ?>">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>