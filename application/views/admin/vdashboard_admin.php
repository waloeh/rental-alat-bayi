	<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header">
					<h1>Dashboard</h1>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-primary">
								<i class="far fa-user"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Total Admin</h4>
								</div>
								<div class="card-body">
									<?php echo $admin; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-danger">
								<i class="fas fa-users"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Tottal Customer</h4>
								</div>
								<div class="card-body">
									<?php echo $customer;; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-warning">
								<i class="fas fa-baby-carriage"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Tottal Alat Bayi</h4>
								</div>
								<div class="card-body">
									<?php echo $alat_bayi; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-12">
						<div class="card card-statistic-1">
							<div class="card-icon bg-success">
								<i class="fas fa-random"></i>
							</div>
							<div class="card-wrap">
								<div class="card-header">
									<h4>Total Transaksi</h4>
								</div>
								<div class="card-body">
									<?php echo $transaksi; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
