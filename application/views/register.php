<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <?php echo $this->session->flashdata('message'); ?>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form action="<?php echo base_url('customer/Register'); ?>" method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama" autofocus>
                      <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username">
                      <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input id="alamat" type="text" class="form-control" name="alamat">
                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin">
                        <option value="">--Jenis Kelamin--</option>}
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                      <?php echo form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="no_telepon" class="d-block">No Telepon</label>
                      <input id="no_telepon" type="text" class="form-control" name="no_telepon">
                      <?php echo form_error('no_telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>No KTP</label>
                      <input class="form-control" type="text" name="no_ktp">
                      <?php echo form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                      <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>