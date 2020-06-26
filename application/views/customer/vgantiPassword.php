<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url('assets/img/baby.jpg'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <div class="card card-primary">
              <div class="card-header"><h4>Ganti Password</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('customer/Register/gantiPassword'); ?>">
                  <div class="form-group">
                    <label for="password_baru">Password Baru</label>
                    <input id="password_baru" type="password" class="form-control" name="password_baru" tabindex="1" autofocus>
                    <?php echo form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="ulang_password" class="control-label">Ulangi Password</label>
                    </div>
                    <input id="ulang_password" type="password" class="form-control" name="ulang_password" tabindex="2">
                    <?php echo form_error('ulang_password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Ganti Password
                    </button>
                    <a href="<?php if($this->session->userdata('role_id') == 2) {
                      echo base_url('customer/Dataalatbayi');
                    }else {
                      echo base_url('admin/Dashboard_admin');
                    } ?>"><button type="button" class="btn btn-danger btn-sm btn-block mt-1" tabindex="4">
                      Batal
                    </button></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>