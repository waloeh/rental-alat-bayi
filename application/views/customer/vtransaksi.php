<div class="container mt-5" style="height: 400px;">
	<div class="card mx-auto"  style="margin-top: 170px; width: 80%">
		<?php echo $this->session->flashdata('message'); ?>
		<div class="card-header">
			Data Transaksi Anda
		</div>
		<div class="card-body  table-responsive">
			<table class="table table-striped table-sm table-hover">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Customer</th>
			      <th scope="col">Alat</th> 
			      <th scope="col">Harga</th>
			      <th scope="col">Tgl Rental</th>
			      <th scope="col">Tgl Kembali</th>
			      <th scope="col">Aksi</th>
			      <th scope="col">Batal</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $no=1;?>
			  	<?php foreach ($transaksi as $tr) : ?>
				    <tr>
				      <th scope="row"><?php echo $no++; ?></th>
				      <td><?php echo $tr['nama_customer'] ?></td>
				      <td><?php echo $tr['merk'] ?></td>
				      <td><?php echo number_format($tr['harga'],0,',','.'); ?></td>
				      <td><?php echo date('d/m/Y',strtotime($tr['tanggal_rental'])) ?></td>
				      <td><?php echo date('d/m/Y', strtotime($tr['tanggal_kembali'])) ?></td>
				      <td>
				      	<?php if ($tr['status_rental'] == 0) { ?>
				      		<button class="btn btn-sm btn-primary btn-danger">Rental Selesai</button>
				      	<?php } else { ?>
				      		<a href="<?php echo base_url('customer/Transaksi/pembayaran/').$tr['id_rental']; ?>" class="btn btn-sm btn-primary btn-success">Cek Pembayaran</a>
				      	<?php } ?>
				      </td>
				      <td>
				      	<?php  
				      		if ($tr['status_pembayaran'] == 0) { ?>
				      			<a onclick="return confirm('Yakin mau dibatalkan?');" class="btn btn-sm btn-danger" href="<?php echo base_url('customer/Transaksi/transaksi_batal/').$tr['id_rental'] ?>">Batal</a>
				      		<?php } else { ?>
				      			<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">
								  Batal
								</button>
				      	<?php } ?>
				      </td>
				    </tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</div>																				
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p>Transaksi sudah selesai, tidak bisa dibatalkan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>