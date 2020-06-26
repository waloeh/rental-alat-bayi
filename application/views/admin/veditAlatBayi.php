<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Alat Bayi</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="<?php echo base_url('admin/DataAlatBayi/formEditAlatBayi/').$alatBayi['id_alatbayi']; ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Type Alat Bayi</label>
								<select name="type" class="custom-select">
									<option value="<?php echo $alatBayi['kode_type'] ?>"><?php echo $alatBayi['nama_type']; ?></option>
									<?php foreach ($type as $tp) : ?>
										<option value="<?php echo $tp['kode_type']; ?>"><?php echo $tp['nama_type']; ?></option>
									<?php endforeach; ?>
								</select>
             					<?php echo form_error('type', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>		
							<div class="form-group">
								 <label>Merk</label>
								 <input type="text" name="merk" class="form-control" value="<?php echo $alatBayi['merk']; ?>">
             					<?php echo form_error('merk', '<small class="text-danger pl-3">', '</small>'); ?> 
							</div>
							<div class="form-group">
								<label>Warna</label>
								<input type="text" name="warna" class="form-control" value="<?php echo $alatBayi['warna']; ?>">
								<?php echo form_error('warna', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Harga Sewa</label>
								<input type="number" name="harga" class="form-control" value="<?php echo $alatBayi['harga']; ?>">
								<?php echo form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tahun</label>
								<input type="text" name="tahun" class="form-control" value="<?php echo $alatBayi['tahun']; ?>">
								<?php echo form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>						
							</div>
							<div class="form-group">
								<label>Denda</label>
								<input type="number" name="denda" class="form-control" value="<?php echo $alatBayi['denda']; ?>">
								<?php echo form_error('denda', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="status" class="form-control">
									<option <?php if ($alatBayi['status'] == 1) {
										echo "selected='selected'";
									} ?> value="1">Tersedia</option>
									<option <?php if ($alatBayi['status'] == 0) {
										echo "selected='selected'";
									} ?> value="0">Tidak tersedia</option>
								</select>
								<?php echo form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Gambar</label>
								<input type="file" name="gambar" class="form-control">
								<?php echo form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
		   			<a href="<?php echo base_url('admin/DataAlatBayi/index') ?>"><button type="button" class="btn btn-sm btn-danger">Batal</button></a>		
				</form>	
			</div>
		</div>
	</section>
</div>