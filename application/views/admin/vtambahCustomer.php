<div  class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tambah Data Customer</h1>
		</div>
		<div class="card">
			<div class="card-body">
				<form action="<?php echo base_url('admin/DataCustomer/tambahCustomer') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="nama" class="form-control">
								<?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control">
								<?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
								<?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Repeat Password</label>
								<input type="password" name="password2" class="form-control">
								<?php echo form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Alamat</label>
								<textarea type="text" name="alamat" class="form-control"></textarea>
								<?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label><br><br>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="laki-laki">
								  <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
								</div>
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="perempuan">
								  <label class="form-check-label" for="inlineRadio2">Perempuan</label>
								</div>
							</div>
							<?php echo form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
							<div class="form-group">
								<label>No. Telepon</label>
								<input type="text" name="telepon" class="form-control">
								<?php echo form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>No. KTP</label>
								<input type="text" name="ktp" class="form-control">
								<?php echo form_error('ktp', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
		   			<a href="<?php echo base_url('admin/DataCustomer'); ?>"><button type="button" class="btn btn-sm btn-danger">Kembali</button></a>
				</form>
			</div>
		</div>
	</section>
</div>