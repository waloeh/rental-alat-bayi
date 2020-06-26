<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Customer</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo $this->session->flashdata('message'); ?>
				<a href="<?php echo base_url('admin/DataCustomer/tambahCustomer'); ?>"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
				<hr>	
				<table id="tableCustomer" class="table table-sm table-striped table-responsive table-bordered table-hover" style="width: 100%; cursor: pointer;">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Customer</th>
				      <th scope="col">User Name</th>
				      <th scope="col">Alamat</th>
				      <th scope="col">Jenis Kelamin</th>
				      <th scope="col">No. Telpon</th>
				      <th scope="col">No KTP</th>
				      <th scope="col">Password</th>
				      <th scope="col">Role</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no=1; ?>
				  	<?php foreach ($customer as $cus) : ?>
				  	<tr>
				      <th scope="row"><?php echo $no++ ?></th>
				      <td><?php echo $cus['nama_customer']; ?></td>
				      <td><?php echo $cus['username']; ?></td>
				      <td><?php echo $cus['alamat']; ?></td>
				      <td><?php echo $cus['jenis_kelamin']; ?></td>
				      <td><?php echo $cus['no_tlp']; ?></td>
				      <td><?php echo $cus['no_ktp']; ?></td>
				      <td><?php echo $cus['password']; ?></td>
				      <td><?php if($cus['role_id'] == 1) {echo 'admin'; } else {
				      	echo 'customer';
				      }  ?>				      	
				      </td>
				      <td>
				      	<div class="row">
							<a href="<?php echo base_url('admin/DataCustomer/hapusDataCustomer/').$cus['id_customer']; ?>" onclick="return confirm('yakin mau di hapus?');"><button class="btn btn-danger btn-sm mr-1 ml-2"><i class="fas fa-trash"></i></button></a>
							<a href="<?php echo base_url('admin/DataCustomer/editCustomer/').$cus['id_customer']; ?>"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
						</div>
				      </td>
				    </tr>
				  	<?php endforeach; ?>
				  </tbody>
				</table>			
			</div>
		</div>
	</section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
	$('#tableCustomer').DataTable();
});
</script>