<?php
$id = $this->session->userdata('id_user');
$id_sekolah = $this->session->userdata('id_sekolah');
$desa = $this->db->query("select * from identitas_sekolah where id_sekolah = '$id_sekolah'")->row_array();
$countkomentar = $this->db->query("select * from komentar where id_sekolah = '$id_sekolah' and status='pending'")->num_rows();
$komentar = $this->db->query("select * from komentar where id_sekolah = '$id_sekolah' and status='pending' order by id_komentar desc")->result_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/x-icon">
	<title><?= $title ?> - Admin Panel</title>
	<!-- Google font-->
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
		rel="stylesheet">
	<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
	<!-- Font Awesome-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/fontawesome.css">
	<!-- ico-font-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/icofont.css">
	<!-- Themify icon-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/themify.css">
	<!-- Flag icon-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/flag-icon.css">
	<!-- Feather icon-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/feather-icon.css">
	<!-- Plugins css start-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/datatables.css">
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.css">
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
	<link id="color" rel="stylesheet" href="<?= base_url(); ?>assets/css/color-1.css" media="screen">
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/responsive.css">


	<!-- latest jquery-->
	<script src="<?= base_url(); ?>assets/js/notify/bootstrap-notify.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/notify/index.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/select2.css">
	<script src="<?= base_url(); ?>assets/js/select2/select2.full.min.js"></script>
	<!-- <script src="<?= base_url(); ?>assets/js/select2/select2-custom.js"></script> -->

</head>

<body>
	<!-- Loader starts-->
	<div class="loader-wrapper">
		<div class="theme-loader">
			<div class="loader-p"></div>
		</div>
	</div>
	<!-- Loader ends-->
	<!-- page-wrapper Start-->
	<div class="page-wrapper" id="pageWrapper">
		<!-- Page Header Start-->
		<div class="page-main-header">
			<div class="main-header-right row m-0">
				<div class="main-header-left">
					<div class="logo-wrapper"><a href="<?= base_url(); ?>"><img class="img-fluid"
								src="<?= base_url(); ?>assets/images/logo-trisoft.png" width="120" alt=""></a></div>
					<div class="dark-logo-wrapper"><a href="<?= base_url(); ?>"><img class="img-fluid"
								src="<?= base_url(); ?>assets/images/logo-trisoft-white.png" width="120" alt=""></a>
					</div>
					<div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
							id="sidebar-toggle"></i></div>
				</div>
				<div class="nav-right col pull-right right-menu p-0">
					<ul class="nav-menus">
						<li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
									data-feather="maximize"></i></a></li>
						<li>
							<div class="mode"><i class="fa fa-moon-o"></i></div>
						</li>
						<li class="onhover-dropdown">
							<div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span>
							</div>
							<ul class="notification-dropdown onhover-show-div">
								<li>
									<p class="f-w-700 mb-0">You have 3 Notifications<span
											class="pull-right badge badge-primary badge-pill">4</span></p>
								</li>
								<li class="noti-primary">
									<div class="media"><span class="notification-bg bg-light-primary"><i
												data-feather="activity"> </i></span>
										<div class="media-body">
											<p>Delivery processing </p><span>10 minutes ago</span>
										</div>
									</div>
								</li>
								<li class="noti-secondary">
									<div class="media"><span class="notification-bg bg-light-secondary"><i
												data-feather="check-circle"> </i></span>
										<div class="media-body">
											<p>Order Complete</p><span>1 hour ago</span>
										</div>
									</div>
								</li>
								<li class="noti-success">
									<div class="media"><span class="notification-bg bg-light-success"><i
												data-feather="file-text"> </i></span>
										<div class="media-body">
											<p>Tickets Generated</p><span>3 hour ago</span>
										</div>
									</div>
								</li>
								<li class="noti-danger">
									<div class="media"><span class="notification-bg bg-light-danger"><i
												data-feather="user-check"> </i></span>
										<div class="media-body">
											<p>Delivery Complete</p><span>6 hour ago</span>
										</div>
									</div>
								</li>
							</ul>
						</li>
						<li class="onhover-dropdown p-0">
							<button class="btn btn-primary-light" type="button"><a
									href="<?= base_url(); ?>auth/logout"><i data-feather="log-out"></i>Log
									out</a></button>
						</li>
					</ul>
				</div>
				<div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
			</div>
		</div>
		<!-- Page Header Ends                              -->
		<!-- Page Body Start-->
		<div class="page-body-wrapper horizontal-menu">
			<!-- Page Sidebar Start-->
			<header class="main-nav">
				<div class="sidebar-user text-center"><img class="img-90 rounded-circle"
						src="<?= base_url(); ?>assets/img/foto_anggota/<?= $this->session->userdata('image') ?>" alt="">
					<a href="#">
						<h6 class="mt-3 f-14 f-w-600"><?= $this->session->userdata('nama') ?></h6>
					</a>
					<p class="mb-0 font-roboto"><?= $this->session->userdata('level') ?></p>
				</div>
				<nav>
					<div class="main-navbar">
						<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
						<div id="mainnav">
							<ul class="nav-menu custom-scrollbar">
								<li class="back-btn">
									<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
											aria-hidden="true"></i></div>
								</li>
								<li class="dropdown"><a class="nav-link menu-title link-nav"
										href="<?= base_url(); ?>"><i data-feather="home"></i><span>Dashboard</span></a>
								</li>
								<?php if($this->session->userdata('level') == 'Admin'): ?>
								<li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i
											data-feather="airplay"></i><span>Master Data</span></a>
									<ul class="nav-submenu menu-content">
										<li><a href="<?= base_url(); ?>rak">Lokasi Rak</a></li>
										<li><a href="<?= base_url(); ?>buku">Buku</a></li>
									</ul>
								</li>
								<li class="dropdown"><a class="nav-link menu-title link-nav"
										href="<?= base_url(); ?>peminjaman"><i
											data-feather="sunrise"></i><span>Peminjaman</span></a></li>
								<li class="dropdown"><a class="nav-link menu-title link-nav"
										href="<?= base_url(); ?>pengembalian"><i
											data-feather="sunset"></i><span>Pengembalian</span></a></li>
								<?php elseif ($this->session->userdata('level') == 'Siswa'): ?>

								<?php else: ?>
                                    
								<?php endif; ?>
                                <li class="dropdown"><a class="nav-link menu-title link-nav"
										href="<?= base_url(); ?>digilab"><i
											data-feather="book"></i><span>Digilab</span></a></li>
							</ul>
						</div>
						<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
					</div>
				</nav>
			</header>
			<!-- Page Sidebar Ends-->
