<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Trisoft.id">
	<link rel="icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" type="image/x-icon">
	<title><?= $title ?></title>
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
	<!-- Plugins css Ends-->
	<!-- Bootstrap css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.css">
	<!-- App css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
	<link id="color" rel="stylesheet" href="<?= base_url(); ?>assets/css/color-1.css" media="screen">
	<!-- Responsive css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/responsive.css">
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
	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-7"><img class="bg-img-cover bg-center"
						src="<?= base_url(); ?>assets/images/login/1.jpg" alt="looginpage"></div>
				<div class="col-xl-5 p-0">
					<div class="login-card">
						<form class="theme-form login-form needs-validation" action="<?= base_url(); ?>auth/login"
							method="post" novalidate="">
							<h4>Login - Perpustakaan</h4>
							<h6>Welcome back! Log in to your account.</h6>
							<?php if($this->session->flashdata('message')) { ?>
							<div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
								<?= $this->session->flashdata('message') ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
								</button>
							</div>
							<?php } ?>
							<div class="form-group">
								<label>Sebagai</label>
								<div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
									<select class="form-select" name="sebagai" id="sebagai" required="">
										<option value="">-- Pilih --</option>
										<option value="Admin">Admin</option>
										<option value="Siswa">Siswa</option>
									</select>
								</div>
							</div>
							<div class="form-group rmv">
								<label id="txtUser">NISN</label>
								<div class="input-group"><span class="input-group-text"><i
											class="ic icon-email"></i></span>
									<input class="form-control" type="text" name="email" required=""
										placeholder="xxxxxx">
								</div>
							</div>
							<div class="form-group rmv">
								<label>Password</label>
								<div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
									<input class="form-control" type="password" name="password" required=""
										placeholder="*********">
									<div class="show-hide"><span class="show"> </span></div>
								</div>
							</div>
							<!-- <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div><a class="link" href="forget-password.html">Forgot password?</a>
                </div> -->
							<div class="form-group mb-0">
								<button class="btn btn-primary w-100 btn-block" type="submit">Sign in</button>
							</div>
							<!-- <p>Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- page-wrapper end-->
	<script>
		(function () {
			'use strict';
			window.addEventListener('load', function () {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function (form) {
					form.addEventListener('submit', function (event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();

	</script>
	<!-- latest jquery-->
	<script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
	<!-- feather icon js-->
	<script src="<?= base_url(); ?>assets/js/icons/feather-icon/feather.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/icons/feather-icon/feather-icon.js"></script>
	<!-- Sidebar jquery-->
	<script src="<?= base_url(); ?>assets/js/sidebar-menu.js"></script>
	<script src="<?= base_url(); ?>assets/js/config.js"></script>
	<!-- Bootstrap js-->
	<script src="<?= base_url(); ?>assets/js/bootstrap/popper.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
	<!-- Plugins JS start-->
	<!-- Plugins JS Ends-->
	<!-- Theme js-->
	<script src="<?= base_url(); ?>assets/js/script.js"></script>
	<!-- login js-->
	<!-- Plugin used-->
	<script type="text/javascript">
		$(".rmv").css('display', 'none');
		$(document).ready(function () {
			$("#sebagai").change(function () {
				if (this.value == 'Siswa') {
					$("#txtUser").text("NISN");
					$(".ic").removeClass("icon-email");
					$(".ic").addClass("icon-key");
					$(".rmv").show();
				} else {
					$("#txtUser").text("E-mail");
					$(".ic").removeClass("icon-key");
					$(".ic").addClass("icon-email");
					$(".rmv").show();
				}
				console.log(this.value);
			})
		})

	</script>
</body>

</html>
