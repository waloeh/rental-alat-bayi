<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Alat Bayi</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-7">
						<img height="400" width="450" src="<?php echo base_url('assets/img/'). $alatbayi['gambar']; ?>">
					</div>
					<div class="col-md-5">
						<table class="table font-weight-bold">
							<tr>
								<td>Type</td>
								<td><?php echo $alatbayi['nama_type']; ?></td>
							</tr>
							<tr>
								<td>Merek</td>
								<td><?php echo $alatbayi['merk']; ?></td>
							</tr>
							<tr>
								<td>Warna</td>
								<td><?php echo $alatbayi['warna']; ?></td>
							</tr>
							<tr>
								<td>Tahun</td>
								<td><?php echo $alatbayi['tahun']; ?></td>
							</tr>
							<tr>
								<td>Harga</td>
								<td><?php echo 'Rp. '. number_format($alatbayi['harga'],0,',','.'); ?></td>
							</tr>
							<tr>
								<td>Denda</td>
								<td><?php echo 'Rp. '. number_format($alatbayi['denda'],0,',','.'); ?></td>
							</tr>
							<tr>
								<td>Status</td>
								<td>
									<?php if ($alatbayi['status'] == 0) {
										echo '<span class="badge badge-pill badge-danger">Tidak tersedia</span>';
									} else {
										echo '<span class="badge badge-pill badge-primary"> Tersedia</span>';
									}
									?>
								</td>
							</tr>
						</table>
						<a class="btn btn-sm btn-danger ml-4 mt-2" href="<?php echo base_url('admin/DataAlatBayi'); ?>">Kembali</a>
						<a class="btn btn-sm btn-success ml-1 mt-2" href="<?php echo base_url('admin/DataAlatBayi/formEditAlatBayi/').$alatbayi['id_alatbayi']; ?>">Update</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>