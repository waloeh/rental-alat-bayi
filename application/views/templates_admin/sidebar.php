<body>
<div id="app">
	<div class="main-wrapper">
		<div class="navbar-bg"></div>
		<nav class="navbar navbar-expand-lg main-navbar">
			<form class="form-inline mr-auto">
				<ul class="navbar-nav mr-3">
					<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
					<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
				</ul>
			</form>
			<ul class="navbar-nav navbar-right">
				<li class="dropdown"><a href="#"class="nav-link nav-link-lg nav-link-user">
					<div class="d-sm-none d-lg-inline-block">Welcome <span  class="text-warning"><?php echo $this->session->userdata('nama'); ?></span></div></a>
				</li>
			</ul>
		</nav>
		<div class="main-sidebar">
			<aside id="sidebar-wrapper">
				<div class="sidebar-brand">
					<a href="index.html">Attaqi Baby Rental</a>
				</div>
				<div class="sidebar-brand sidebar-brand-sm">
					<a href="index.html">BT</a>
				</div>
				<ul class="sidebar-menu">
					<li><a class="nav-link" href="<?php echo base_url('admin/Dashboard_admin') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('admin/DataAlatBayi') ?>"><i class="fas fa-baby-carriage"></i> <span>Data Alat Bayi</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('admin/DataType') ?>"><i class="fas fa-grip-horizontal"></i> <span>Data Type</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('admin/DataCustomer') ?>"><i class="fas fa-users"></i> <span>Data Customer</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('admin/Transaksi') ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('admin/Laporan') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('customer/Register/logout'); ?>" onclick="return confirm('yakin mau keluar?');"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
					<li><a class="nav-link" href="<?php echo base_url('customer/Register/gantiPassword'); ?>"><i class="fas fa-lock"></i>Ganti Password</a></li>
				</ul>
			</aside>
		</div>

