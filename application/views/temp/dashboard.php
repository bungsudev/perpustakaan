<!-- NOTIFICATION -->
<?php if ($this->session->flashdata('message')) { ?>
<script>
	$.notify({
		title: 'Halo, <?= $this->session->flashdata('
		message ') ?>',
		message: 'Selamat datang kembali.'
	}, {
		type: 'success',
		allow_dismiss: true,
		newest_on_top: false,
		mouse_over: false,
		showProgressbar: false,
		spacing: 10,
		timer: 2000,
		placement: {
			from: 'top',
			align: 'right'
		},
		offset: {
			x: 30,
			y: 30
		},
		delay: 1000,
		z_index: 10000,
		animate: {
			enter: 'animated bounceIn',
			exit: 'animated flash'
		}
	});

</script>
<?php } ?>

<?php if($this->session->userdata('level') == "Siswa"): ?>
<div class="col-xl-12 recent-order-sec">
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<h5>Riwayat Peminjaman</h5>
				<table id="tblResultBuku">
					<thead>
						<tr>
							<th>No.</th>
							<th>Informasi Buku</th>
							<th>Tanggal Pinjam</th>
							<th>Lokasi Buku</th>
							<th class="text-center">Status</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<script>
	$(document).ready(function () {
		console.log('<?= $this->session->userdata('id_siswa') ?>')
		ListPinjamanBuku('<?= $this->session->userdata('id_siswa') ?>')
	})


	function ListPinjamanBuku(id_siswa) {
		$.ajax({
			url: '<?= base_url() ?>dashboard/listPinjamanBuku',
			type: "POST",
			data: {
				id_siswa: id_siswa
			},
			dataType: "json",
			success: function (data) {
				console.log(data);
				let html = '';
				let no = 0;
				for (let i = 0; i < data.length; i++) {
					let status = '';
					if (data[i].tanggal_kembali) {
						status = '<span class="badge badge-success">Sudah dikembalikan</span>'
					}else{
						status = '<span class="badge badge-warning">Belum dikembalikan</span>'
					}
					no = i + 1;
					html += `
						<tr>
							<td>` + no + `</td>
							<td>` + data[i].judul_buku + `</td>
							<td>` + data[i].tanggal_pinjam + `</td>
							<td>` + data[i].lokasi_rak + `</td>
							<td>` + status + `</td>
						</tr>
					`;
				}
				$('#tblResultBuku').DataTable().clear().destroy();
				$("#tblResultBuku tbody").html(html);
				$('#tblResultBuku').dataTable({
					"autoWidth": false,
					"columnDefs": [{
							"width": "1%",
							"targets": 0
						},
						{
							"width": "30%",
							"targets": 1
						},
						{
							"width": "18%",
							"targets": 2
						},
						{
							"width": "31%",
							"targets": 3
						},
						{
							"width": "20%",
							"targets": 4
						},
					]
				});
			}
		});
	}

</script>
