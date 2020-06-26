<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Alat Bayi</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo $this->session->flashdata('message'); ?>
				<a href="<?php echo base_url('admin/DataAlatBayi/formTambahAlatBayi'); ?>"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
				<hr>	
				<table id="tableAlatBAyi" class="table table-sm table-bordered table-hover" style="width: 100%; cursor: pointer;">
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Gambar</th>
							<th>Type</th>
							<th>Merk</th>
							<th>Warna</th>
							<th>Harga</th>
							<th>Denda</th>
							<th>Status</th>
							<th>Tahun</th>
							<th>Aksi</th>	
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($dataAlatBayi as $data) : ?>
							<tr class="text-center">
								<td><?php echo $no++; ?></td>
								<td>
									<img src="<?php echo base_url().'assets/img/'.$data['gambar']; ?>" width="60" height="60">
								</td>
								<td><?php echo $data['nama_type']; ?></td>
								<td><?php echo $data['merk']; ?></td>
								<td><?php echo $data['warna']; ?></td>
								<td><?php echo $data['harga']; ?></td>
								<td><?php echo $data['denda']; ?></td>
								<td><?php if($data['status'] == 1) {
	                            			echo '<span class="badge badge-primary">tersedia</span>';
	                            		} else {
	                            			echo '<span class="badge badge-danger">tidak tersedia</span>';
	                            		}
									?>	
								</td>
								<td><?php echo $data['tahun']; ?></td>
								<td>
									<a href="<?php echo base_url('admin/DataAlatBayi/detailAlatBayi/').$data['id_alatbayi']; ?>"><button class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button></a>
									<a href="<?php echo base_url('admin/DataAlatBayi/hapusAlatBayi/').$data['id_alatbayi']; ?>" onclick="return confirm('yakin mau di hapus?');"><button class="btn btn-danger  btn-sm "><i class="fas fa-trash"></i></button></a>
									<a href="<?php echo base_url('admin/DataAlatBayi/formEditAlatBayi/').$data['id_alatbayi']; ?>"><button class="btn btn-primary  btn-sm "><i class="fas fa-edit"></i></button></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

<script src="<?php echo base_url('assets/stisla-master')?>/assets/js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
	$('#tableAlatBAyi').DataTable();

	$.ajax({
		type: 'get',
		url: '<?php echo base_url(); ?>' + 'admin/DataAlatBayi/dataAll',
		dataType: 'json',
		success: function (response) {
			console.log('TESTING :' + response);
		},
		error: function(xhr, ajaxOptions, throwError) {
			alert(throwError);
		}
	});

});
</script>
