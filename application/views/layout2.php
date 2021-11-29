<?php $this->load->view($header); ?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

	<div class="page-content">
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0"><?= $title; ?></h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
								<li class="breadcrumb-item active"><?= $title; ?></li>
							</ol>
						</div>

					</div>
				</div>
			</div>
			<!-- end page title -->
			<?php $this->load->view($content); ?>

		</div> <!-- container-fluid -->
	</div>
	<!-- End Page-content -->


	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<script>
						document.write(new Date().getFullYear())
					</script> © Desa Digital.
				</div>
				<div class="col-sm-6">
					<div class="text-sm-end d-none d-sm-block">
						Created <i class="mdi mdi-heart text-danger"></i> by <a href="#" target="_blank" class="text-reset">Agara.id</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
<!-- end main content-->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- plugins -->
<script src="<?= base_url(); ?>assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/chenfengyuan/datepicker/datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/toastr/build/toastr.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/form-validation.init.js"></script>
<script src="<?= base_url(); ?>assets/libs/parsleyjs/parsley.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sweetalert.js"></script>


<script>
	$('.dataTables').dataTable();

	const base_url = '<?= base_url(); ?>';

	function a_ok(msg) {
		toastr.options.timeOut = 2000;
		toastr.options.progressBar = true;
		toastr.options.positionClass = "toast-bottom-right";
		toastr.success(msg);
	}

	function a_error(msg) {
		toastr.options.timeOut = 2000;
		toastr.options.progressBar = true;
		toastr.options.positionClass = "toast-bottom-right";
		toastr.error(msg);
	}

	function getAge(dateString) {
		let umur = dateString;
		umur = umur.split("-").reverse().join("-");
		umur = umur.split('-');
		var formattedDate = umur[1] + '-' + umur[0] + '-' + umur[2];


		var now = new Date();
		var today = new Date(now.getYear(), now.getMonth(), now.getDate());

		var yearNow = now.getYear();
		var monthNow = now.getMonth();
		var dateNow = now.getDate();

		var dob = new Date(formattedDate.substring(6, 10),
			formattedDate.substring(0, 2) - 1,
			formattedDate.substring(3, 5)
		);

		var yearDob = dob.getYear();
		var monthDob = dob.getMonth();
		var dateDob = dob.getDate();
		var age = {};
		var ageString = "";
		var yearString = "";
		var monthString = "";
		var dayString = "";


		yearAge = yearNow - yearDob;

		if (monthNow >= monthDob)
			var monthAge = monthNow - monthDob;
		else {
			yearAge--;
			var monthAge = 12 + monthNow - monthDob;
		}

		if (dateNow >= dateDob)
			var dateAge = dateNow - dateDob;
		else {
			monthAge--;
			var dateAge = 31 + dateNow - dateDob;

			if (monthAge < 0) {
				monthAge = 11;
				yearAge--;
			}
		}

		age = {
			years: yearAge,
			months: monthAge,
			days: dateAge
		};

		if (age.years > 1) yearString = " Thn";
		else yearString = " Thn";
		if (age.months > 1) monthString = " Bln";
		else monthString = " Bln";
		if (age.days > 1) dayString = " Hari";
		else dayString = " Hari";


		if ((age.years > 0) && (age.months > 0) && (age.days > 0))
			ageString = age.years + " " + yearString;
		else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
			ageString = "Only ";
		else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
			ageString = age.years + " " + yearString;
		else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
			ageString = age.years + " " + yearString;
		else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
			ageString = age.months + " " + monthString;
		else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
			ageString = age.years + " " + yearString;
		else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
			ageString = age.months + " " + monthString;
		else ageString = "Oops! Could not calculate age!";

		return ageString;
	}
</script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>

</body>

</html>