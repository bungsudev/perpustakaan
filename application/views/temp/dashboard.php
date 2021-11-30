<!-- NOTIFICATION -->
<?php if ($this->session->flashdata('message')) { ?>
<script type="text/javascript">
	$(document).ready(function () {
		toastr.options.timeOut = 3500;
		toastr.options.progressBar = true;
		toastr.options.positionClass = "toast-top-right";
		toastr.success('<?= $this->session->flashdata('
			message ') ?>');
	});

</script>
<?php } ?>

<div class="row">
	<div class="col-md-8">
		<div class="row">

			<div class="col-md-4 col-6">
				<div class="card">
					<div class="card-body">
						<div>
							<h4 class="mb-1 mt-1"><?= $artikel ?></h4>
							<p class="text-muted mb-0"><a href="<?= base_url(); ?>artikel">Artikel</a></p>
						</div>
					</div>
				</div>
			</div> <!-- end col-->

			<div class="col-md-4 col-6">
				<div class="card">
					<div class="card-body">
						<div>
							<h4 class="mb-1 mt-1"><?= $pengumuman ?></h4>
							<p class="text-muted mb-0"><a href="<?= base_url(); ?>pengumuman">Pengumuman</a></p>
						</div>
					</div>
				</div>
			</div> <!-- end col-->

			<div class="col-md-4 col-6">
				<div class="card">
					<div class="card-body">
						<div>
							<h4 class="mb-1 mt-1"><?= $komentar ?></h4>
							<p class="text-muted mb-0"><a href="<?= base_url(); ?>komentar">Komentar</a></p>
						</div>
					</div>
				</div>
			</div> <!-- end col-->

			<div class="col-md-12 col-12 bg-white py-4">
				<h4 class="card-title mb-4">Grafik Pengunjung</h4>
				<div class="mt-3">
					<div id="chartVisitor" class="apex-charts" dir="ltr"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card latest-update-sec">
			<div class="card-header">
				<div class="header-top d-sm-flex align-items-center">
					<h4 class="card-title mb-4">Log Login</h4>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordernone">
					<tbody>
						<?php foreach ($log_login as $row): ?>
						<tr>
							<td>
								<div class="media">
									<i data-feather="shield"></i>
									<div class="media-body"><span><?= $row['nama'] ?></span>
										<p><?= date('d F Y - h:i:s', strtotime($row['created'])) ?></p>
										<p class="mt-0 mb-0"><span class="text-primary"><?= $row['level'] ?></span></p>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- apexcharts -->
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		getVisitor();
	})
	
	function getVisitor() {
		$.ajax({
			url: base_url + 'dashboard/grafik_visitor',
			method: "POST",
			dataType: "json",
			asyn:false,
			success: function (data) {
				var kategori = $.map(data, function (n, i) {
					return [new Date(n.created).toLocaleDateString()];
				});
				var jumlah = $.map(data, function (n, i) {
					return [n.visitor];
				});
				var serie = $.map(data, function (n, i) {
					return [{
						x: new Date(n.created).getTime(),
						y: n.visitor
					}];
				});
				var options = {
					chart: {
						height: 300,
						type: "line",
						stacked: false
					},
					dataLabels: {
						enabled: false
					},
					colors: ["#FF1654", "#247BA0"],
					series: [{
						name: "Pengunjung",
						data: jumlah
					}],
					stroke: {
						width: [2, 2]
					},
					plotOptions: {
						bar: {
							columnWidth: "20%"
						}
					},
					xaxis: {
						categories: kategori
					},
					yaxis: [{
							axisTicks: {
								show: true
							},
							axisBorder: {
								show: true,
								color: "#FF1654"
							},
							labels: {
								style: {
									colors: "#FF1654"
								}
							},
							title: {
								text: "Pengunjung",
								style: {
									color: "#FF1654"
								}
							}
						},
						{
							opposite: true,
							axisTicks: {
								show: true
							},
							axisBorder: {
								show: true,
								color: "#247BA0"
							},
							labels: {
								style: {
									colors: "#247BA0"
								}
							}
						}
					],
					tooltip: {
						shared: false,
						intersect: true,
						x: {
							show: false
						}
					},
					legend: {
						horizontalAlign: "left",
						offsetX: 40
					}
				};
				(chart = new ApexCharts(document.querySelector("#chartVisitor"), options)).render();
			}
		});
	}
</script>
