<div class="container mt-5 mb-5">
	<div class="card" style="margin-top: 170px">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
                  <img height="400" width="450" src="<?php echo base_url('assets/img/'). $detail['gambar']; ?>" alt="">
				</div>
				<div class="col-md-6">
					<table class="table font-weight-bold">
						<tr>
							<td>Type</td>
							<td><?php echo $detail['nama_type']; ?></td>
						</tr>
						<tr>
							<td>Merek</td>
							<td><?php echo $detail['merk']; ?></td>
						</tr>
						<tr>
							<td>Warna</td>
							<td><?php echo $detail['warna']; ?></td>
						</tr>
						<tr>
							<td>Tahun</td>
							<td><?php echo $detail['tahun']; ?></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><?php echo 'Rp. '. number_format($detail['harga']).'/hari'; ?></td>
						</tr>
						<tr>
							<td>Denda</td>
							<td><?php echo 'Rp. '. number_format($detail['denda']).'/hari'; ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<?php if ($detail['status'] == 0) {
									echo '<span>Tidak tersedia</span>';
								} else {
									echo '<span> Tersedia</span>';
								}
								?>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo base_url('customer/Dataalatbayi') ?>"><button class="btn btn-sm btn-success">Kembali</button></a>
								<?php if($detail['status'] == '0') {
								  echo "<span class='btn btn-danger btn-sm' disable>Telah di Rental</span>";
							    } else {
								  echo anchor('customer/rental/tambahRental/'.$detail['id_alatbayi'], '<button class="btn btn-primary btn-sm">Rental</button>');
							    } 
							    ?>
							</td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>								