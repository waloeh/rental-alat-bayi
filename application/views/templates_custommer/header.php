<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Rental alat bayi</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--=== Bootstrap CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?php echo base_url('assets/template_customer/') ?>css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="<?php echo base_url('assets/template_customer/') ?>img/baby.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
 <!--    <header id="header-area" class="fixed-top"> -->
        <!--== Header Top Start ==-->
   <!--      <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row"> -->
                    <!--== Single HeaderTop Start ==-->
                  <!--   <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> 802/2, Mirpur, Dhaka
                    </div> -->
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
            <!--         <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +1 800 345 678
                    </div> -->
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
               <!--      <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Fri 09.00 - 17.00
                    </div> -->
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
          <!--           <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div> -->
                    <!--== Social Icons End ==-->
        <!--         </div>
            </div>
        </div> -->
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom"> 
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="index2.html" class="logo">
                          <!--   <img src="<?php echo base_url('assets/template_customer/') ?>img/logo.png" alt="JSOFT"> -->
                          <img src="<?php echo base_url('assets/img/baby.jpg') ?>" alt="JSOFT" class="rounded-circle" width="75"> <!-- gambar diganti  -->
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                               <!--  <li><a href="<?php echo base_url('customer/Dashboard_customer') ?>">Home</a></li> -->
                                <li><a href="<?php echo base_url('customer/Dataalatbayi') ?>">Alat</a></li>
                                <li><a href="<?php echo base_url('customer/Transaksi') ?>">Transaksi</a></li>
                                <li><a href="<?php echo base_url('customer/Register') ?>">Register</a></li>
                                <?php if ($this->session->userdata('nama')) { ?>
                                	<li><a href="#">Hi-<?php echo $this->session->userdata('nama') ?></a>
                                		<ul>
                                			<li><a href="<?php echo base_url('customer/Register/gantiPassword') ?>">Gnti Password</a></li>
                                		</ul>
                                	</li> 
                                	<li><a href="<?php echo base_url('customer/Register/logout') ?>" onclick="return confirm('yakin mau keluar?')">Logout</a></li>	
                                <?php } else { ?>
                                	<li><a href="<?php echo base_url('customer/Register/login') ?>">Login</a></li>
                                <?php } ?>
                                <!-- <li><a href="#">Kontak</a></li> -->
<!--                                 <li><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="article.html">Blog Page</a></li>
                                        <li><a href="article-details.html">Blog Details</a></li>
                                    </ul>
                                </li> -->                              
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->
