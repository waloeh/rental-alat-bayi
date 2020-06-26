<div class="container mt-5 mb-5 ">
    <div class="card mx-auto" style="margin-top: 170px; width: 50%;">
        <div class="card-header text-center font-weight-bold">
            Form Rental Alat Bayi
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('customer/Rental/tambahRental/').$alatbayi['id_alatbayi']; ?>" method="post">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Harga Sewa/Hari</label>
                            <input type="text" name="harga" class="form-control" value="<?php echo number_format($alatbayi['harga']); ?>" readonly>
                            <?php echo form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>                      
                        </div>
                        <div class="form-group">
                            <label>Denda/Hari</label>
                            <input type="text" name="denda" class="form-control" value="<?php echo number_format($alatbayi['denda']); ?>" readonly>
                            <?php echo form_error('denda', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                         <div class="form-group">
                            <label>Tanggal Rental</label>
                            <input type="date" name="tanggal_rental" class="form-control">
                            <?php echo form_error('tanggal_rental', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control">
                            <?php echo form_error('tanggal_kembali', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Rntal</button>
                <a href="<?php echo base_url('customer/DataAlatBayi'); ?>"><button type="button" class="btn btn-sm btn-danger">Batal</button></a>    
            </form> 
        </div>
    </div>      
</div>