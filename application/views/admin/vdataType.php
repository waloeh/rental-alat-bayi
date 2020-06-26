<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Type Alat Bayi</h1>
		</div>
		<div class="row">
			<div class="col-md-8">
				<?php echo $this->session->flashdata('message'); ?>
				<?php echo form_error('kode', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span></button>', '</div>'); ?>
				<?php echo form_error('nama', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span></button>', '</div>'); ?>
				<a href="#"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalType"><i class="fas fa-plus"></i> Tambah Data</button></a>
				<hr>
				<table id="tableType" class="table table-bordered table-sm table-hover" style="width: 100%; cursor: pointer;">
				  <thead>
				    <tr class="text-center">
				      <th scope="col">No</th>
				      <th scope="col">Kode Type</th>
				      <th scope="col">Nama Type</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <?php $No = 1; ?>
				  <?php foreach ($type as $tp) : ?>
				  	<tbody>
				  		<tr class="text-center">
					  		<td><?php echo $No++; ?></td>
					  		<td><?php echo $tp['kode_type']; ?></td>
					  		<td><?php echo $tp['nama_type']; ?></td>
					  		<td>
								<a href="<?php echo base_url('admin/DataType/hapusDataType/').$tp['id_type']; ?>" onclick="return confirm('yakin mau di hapus?');"><button class="btn btn-danger  btn-sm "><i class="fas fa-trash"></i></button></a>
								<a href="#"><button class="btn btn-primary btn-sm edit-type" data-id="<?php echo $tp['id_type']; ?>" data-toggle="modal" data-target="#modalEditType"><i class="fas fa-edit"></i></button></a>
					  		</td>
				  		</tr>
				  	</tbody>
				  <?php endforeach; ?>		  	
				</table>
			</div>	
		</div>
	</section>
</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modatType" aria-hidden="true" id="modalType">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="<?php echo base_url('admin/DataType/tambahType'); ?>" method="post" accept-charset="utf-8">
      	<div class="modal-body">
        	<div class="form-group"	>
        		<label>Kode Type</label>
        		<input type="text" name="kode" class="form-control form-control-sm">
        	</div>
        	<div class="form-group"	>
        		<label>Nama Type</label>
        		<input type="text" name="nama" class="form-control form-control-sm">
        	</div>	
      	</div>
      	<div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
      	</div>
    </form>
    </div>
  </div>
</div>
<!-- Modal end -->

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditType" aria-hidden="true" id="modalEditType">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="<?php echo base_url('admin/DataType/editType'); ?>" method="post" accept-charset="utf-8">
      	<div class="modal-body">
        	<div class="form-group"	>
        		<label>Kode Type</label>
        		<input type="hidden" name="id" id="id">
        		<input id="kode" type="text" name="kode" class="form-control form-control-sm">
        	</div>
        	<div class="form-group"	>
        		<label>Nama Type</label>
        		<input id="nama" type="text" name="nama" class="form-control form-control-sm">
        	</div>	
      	</div>
      	<div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
      	</div>
    </form>
    </div>
  </div>
</div>
<!-- Modal end -->

<script src="<?php echo base_url('assets/stisla-master')?>/assets/js/scripts.js"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$('#tableType').DataTable();

		$('.edit-type').click(function(){
			let id = $(this).data('id');
			console.log('id type : '+id);
			$.ajax({
				url: '<?php echo base_url('admin/DataType/') ?>' + 'type_where/' + id,
				method : 'GET',
				success : function(result){
					console.log(result);
					let data = JSON.parse(result);
					$('#id').val(data.id_type);
					$('#kode').val(data.kode_type);
					$('#nama').val(data.nama_type);

					$('#editmenu').modal('show');

				},
				error : function(error){
					alert(error);
				}
			});
		});
	});
</script>