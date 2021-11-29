<div class="row">
	<!-- <div class="col-md-12 mb-3">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="uil-plus mr-1"></i> Tambah Data</button>
    </div> -->
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="form-group col-sm-12 col-md-8">
						<label>NIS / Nama Siswa</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" id="searchSiswa" name="searchSiswa"
								placeholder="Cari Siswa">
							<div class="input-group-append" id="tambah-div">
								<button type="button" class="btn btn-primary" style="cursor: pointer;" id="cariSiswa"><i
										class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="row panelDtlSiswa">
					<div class="col-md-2">
						<img width="100" src="<?= base_url() ?>assets/img/foto_anggota/alazmi.jpg" alt=""
							style="border-radius:5px;">
					</div>
					<div class="col-md-10">
						<div class="row">
							<input type="hidden" name="id_siswa" id="id_siswa">
							<div class="col-md-4"><b>Nama Siswa</b></div>
							<div class="col-md-8"> <span class="mx-3">:</span> <span class="txtNama"> Al azmi</span>
							</div>
							<div class="col-md-4"><b>Tempat/ Tanggal lahir </b></div>
							<div class="col-md-8"> <span class="mx-3">:</span> <span class="txtTtl">07 November
									1996</span></div>
							<div class="col-md-4"><b>Alamat </b></div>
							<div class="col-md-8"> <span class="mx-3">:</span> <span class="txtAlamat">Medan
									Marelan</span></div>
							<div class="col-md-4"><b>No Telepon </b></div>
							<div class="col-md-8"> <span class="mx-3">:</span> <span class="txtTelp">081774124643</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row panelDtlSiswa">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<table id="tblResultBuku" class="table">
							<thead>
								<tr>
									<th width="10">No.</th>
									<th>Kode Buku</th>
									<th>Judul</th>
									<th>Tanggal</th>
									<th width="10"></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modalCari" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<table id="tblResultSiswa" class="table">
					<thead>
						<tr>
							<th width="10">No.</th>
							<th>Nama Siswa</th>
							<th>Tanggal Lahir</th>
							<th>No Hp</th>
							<th width="10"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="modalPengembalian" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0" id="myModalLabel">Selesaikan Pengembalian</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="formPengembalian" enctype="multipart/form-data" novalidate>
					<input type="hidden" name="id_peminjaman" id="id_peminjaman">
					<input type="hidden" name="max_hari" id="max_hari">
					<input type="hidden" name="denda" id="denda">
					<input type="hidden" name="tanggal_pinjam" id="tanggal_pinjam">
					<input type="hidden" name="kode_buku" id="kode_buku">
					<input type="hidden" name="id_siswa_pinjaman" id="id_siswa_pinjaman">
					<input type="hidden" name="today" id="today" value="<?= date('Y-m-d')?>">
					<div class="row">
						<div class="col-md-12">
							<table width="100%">
								<tr>
									<th width="30%">Peminjam</th>
									<td width="1%"> : </td>
									<td><span id="txtNamaPeminjam"></span></td>
								</tr>
								<tr>
									<th width="30%">Kode Buku</th>
									<td width="1%"> : </td>
									<td><span id="txtKodeBuku"></span></td>
								</tr>
								<tr>
									<th width="30%">Judul</th>
									<td width="1%"> : </td>
									<td><span id="txtJudulBuku"></span></td>
								</tr>
								<tr>
									<th width="30%">Tanggal Pinjam</th>
									<td width="1%"> : </td>
									<td><span id="txtTanggalPinjam"></span></td>
								</tr>
							</table>
							<hr />
						</div>
						<div class="form-group mb-3 col-md-6">
							<label class="form-control-label">
								Tanggal Pengembalian <span class="text-danger">*</span>
							</label>
							<input type="date" class="form-control required" name="tanggal_pengembalian"
								id="tanggal_pengembalian" value="<?= date('Y-m-d')?>">
						</div>
						<div class="form-group mb-3 col-md-6">
							<label class="form-control-label">
								Denda
							</label>
							<input type="text" class="form-control" name="totalDenda" id="totalDenda" readonly>
						</div>
						<div class="form-group mb-3 col-md-12">
							<label class="form-control-label">
								Keterangan <span class="text-danger">*</span>
							</label>
							<textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="save"><i class="fa fa-save mr-1"></i> Simpan</button>
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i>
					Batal</button>
			</div>
			</form>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
	//datatables
	function tampil() {
		$('#datatables').DataTable().clear();
		$('#datatables').DataTable().destroy();
		$('#datatables').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('peminjaman/get')?>",
				"type": "POST"
			},

			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
		});
	}

</script>
<script>
	$(".panelDtlSiswa").hide();
	let id_siswa = '';
	$(document).ready(function () {
		$("#searchSiswa").focus();
		$("#id_rak").select2({
			dropdownParent: $("#modalAdd")
		});
		// tampil();
		// Siswa
		$("#cariSiswa").click(function () {
			$(".panelDtlSiswa").hide();
			let search = $("#searchSiswa").val();
			cariSiswa(search);
		})
		$('#searchSiswa').keypress(function (e) {
			if (e.which == 13) {
				$(".panelDtlSiswa").hide();
				$('#cariSiswa').click();
			}
		});
		$("#tblResultSiswa tbody").on('click', '.pilihSiswa', function () {
			$("#id_siswa").val($(this).data('id'))
			id_siswa = $(this).data('id');
			$(".txtNama").text($(this).data('nama_lengkap'))
			$(".txtTtl").text($(this).data('tgl_lahir'))
			$(".txtAlamat").text($(this).data('alamat'))
			$(".txtTelp").text($(this).data('no_hp'))
			$('#tblResultSiswa').DataTable().clear().destroy();
			$("#modalCari").modal('hide');
			$(".panelDtlSiswa").show();
			$("#searchBuku").focus();
			ListPinjamanBuku(id_siswa);
		})
		//End Siswa

		// Buku
		$("#cariBuku").click(function () {
			let search = $("#searchBuku").val();
			cariBuku(search);
		})
		$('#searchBuku').keypress(function (e) {
			if (e.which == 13) {
				$('#cariBuku').click();
			}
		});
		$('#searchBuku').keyup(function (e) {
			$(this).val(this.value.toUpperCase());
		});
		$("#tblResultBuku tbody").on('click', '.pilihBuku', function () {
			$('#tblResultBuku').DataTable().clear().destroy();
			$("#modalCari").modal('hide');
			$(".panelDtlBuku").show();
		})
		$("#tblResultBuku tbody").on('click', '.pengembalianBuku', function () {
			let id_peminjaman = $(this).data('id');
			let id_buku = $(this).data('id_buku');
			console.log(id_peminjaman, id_buku);
			detailPengembalianBuku(id_peminjaman);
			$("#modalPengembalian").modal('show');
			// pengembalianBuku(id_peminjaman, id_buku);
		})
		//End Buku

		//Pengembalian Buku
		$("#tanggal_pengembalian").change(function () {
			let max_hari = $("#max_hari").val();
			let denda = $("#denda").val();
			let tanggal_pinjam = Date.parse($("#tanggal_pinjam").val());
			let tanggal_pengembalian = Date.parse($("#tanggal_pengembalian").val());
			let today = Date.parse($("#today").val());

			//cari jarak hari pinjam dengan hari ini
			var diff = new Date(tanggal_pengembalian - tanggal_pinjam);
			var days_kondisi = diff / 1000 / 60 / 60 / 24;
			if (days_kondisi >= max_hari) {
				//cari kelebihan hari
				var diff_denda = new Date(tanggal_pengembalian - tanggal_pinjam);
				var days_denda = diff_denda / 1000 / 60 / 60 / 24;
				$("#totalDenda").val((days_denda + 1 - max_hari) * denda);
			} else {
				$("#totalDenda").val(0);
			}
			if (parseInt($("#totalDenda").val()) < 0) {
				$("#totalDenda").val(0);
			}
		})
		$("#tanggal_pengembalian").trigger('change')

		$('#save').click(function(){
            let check = true;
			$('.required').each(function () {
				if (this.value.trim() !== '') {
					$(this).removeClass('is-invalid');
				} else {
					$(this).addClass('is-invalid');
					check = false;
				}
			})
			if (check) {
				pengembalianBuku();
			}
        });
		//End Pengembalian Buku
	});

	function detailPengembalianBuku(id_peminjaman) {
		$.ajax({
			url: '<?= base_url() ?>pengembalian/detailPinjamanBuku',
			type: "POST",
			data: {
				id_peminjaman: id_peminjaman
			},
			dataType: "json",
			success: function (data) {
				console.log(data);
				if (data) {
					$("#txtNamaPeminjam").text(data.nama_lengkap)
					$("#txtKodeBuku").text(data.id_buku)
					$("#txtJudulBuku").text(data.judul_buku)
					$("#txtTanggalPinjam").text(data.tanggal_pinjam)
					$("#tanggal_pinjam").val(data.tanggal_pinjam)
					$("#max_hari").val(data.max_hari)
					$("#denda").val(data.denda)
					$("#kode_buku").val(data.id_buku)
					$("#id_siswa_pinjaman").val(data.id_siswa)
					$("#id_peminjaman").val(data.id_peminjaman)

					//Menentukan Denda
					let max_hari = $("#max_hari").val();
					let denda = $("#denda").val();
					let tanggal_pinjam = Date.parse($("#tanggal_pinjam").val());
					let tanggal_pengembalian = Date.parse($("#tanggal_pengembalian").val());
					let today = Date.parse($("#today").val());

					//cari jarak hari pinjam dengan hari ini
					var diff = new Date(tanggal_pengembalian - tanggal_pinjam);
					var days_kondisi = diff / 1000 / 60 / 60 / 24;
					if (days_kondisi >= max_hari) {
						//cari kelebihan hari
						var diff_denda = new Date(tanggal_pengembalian - tanggal_pinjam);
						var days_denda = diff_denda / 1000 / 60 / 60 / 24;
						$("#totalDenda").val((days_denda + 1 - max_hari) * denda);
					} else {
						$("#totalDenda").val(0);
					}
					if (parseInt($("#totalDenda").val()) < 0) {
						$("#totalDenda").val(0);
					}
				} else {
					a_msg("Maaf!", "Gagal mengambil data!", "danger");
				}
			}
		});
	}

	function pengembalianBuku() {
		if (confirm("Apakah kamu yakin?")) {
			$.ajax({
				url: '<?= base_url() ?>pengembalian/pengembalianBuku',
				type: "POST",
				data: $("#formPengembalian").serialize(),
				dataType: "json",
				success: function (data) {
					if (data) {
						a_msg("Berhasil!", "Buku dikembalikan!", "success");
						ListPinjamanBuku(id_siswa);
						$("#modalPengembalian").modal("hide");
					} else {
						a_msg("Maaf!", "Gagal menghapus!", "danger");
					}
				}
			});
		}
	}

	function tambahPinjaman(id_buku, id_siswa) {
		$.ajax({
			url: '<?= base_url() ?>peminjaman/tambahPinjaman',
			type: "POST",
			data: {
				id_buku: id_buku,
				id_siswa: id_siswa
			},
			dataType: "json",
			success: function (data) {
				if (data) {
					a_msg("Berhasil!", "Buku ditambahkan!", "success");
					$("#searchBuku").val('');
				} else {
					a_msg("Maaf!", "Gagal menambahkan!", "danger");
				}
			}
		});
	}

	function cariBuku(search) {
		$.ajax({
			url: '<?= base_url() ?>peminjaman/cariBuku',
			type: "POST",
			data: {
				search: search
			},
			dataType: "json",
			success: function (data) {
				if (data.length > 0) {
					let html = '';
					let no = 0;
					for (let i = 0; i < data.length; i++) {
						tambahPinjaman(data[i].id_buku, id_siswa)
					}
					ListPinjamanBuku(id_siswa)
				} else {
					a_msg("Maaf!", "Buku tidak ditemukan!", "danger");
				}
			}
		});
	}

	function cariSiswa(search) {
		$.ajax({
			url: '<?= base_url() ?>peminjaman/cariSiswa',
			type: "POST",
			data: {
				search: search
			},
			dataType: "json",
			success: function (data) {
				let html = '';
				let no = 0;
				for (let i = 0; i < data.length; i++) {
					no = i + 1;
					html += `
						<tr>
							<td widtd="10">` + no + `</td>
							<td>` + data[i].nama_lengkap + `</td>
							<td>` + data[i].tgl_lahir + `</td>
							<td>` + data[i].no_hp + `</td>
							<td widtd="10">
								<button type="button" class="btn btn-primary btn-xs pilihSiswa" 
								data-id="` + data[i].id_siswa + `"
								data-nama_lengkap="` + data[i].nama_lengkap + `"
								data-tgl_lahir="` + data[i].tgl_lahir + `"
								data-alamat="` + data[i].alamat + `"
								data-no_hp="` + data[i].no_hp + `"
								><i class="fa fa-arrow-right"></i></button>
							</td>
						</tr>
					`;
				}
				$('#tblResultSiswa').DataTable().clear().destroy();
				$("#tblResultSiswa tbody").html(html);
				$('#tblResultSiswa').DataTable({
					// dom: 'Bfrtip',
					// buttons: [
					// 	'csv', 'excel', 'pdf', 'print'
					// ]
				});
				$("#modalCari").modal('show');
			}
		});
	}

	function ListPinjamanBuku(id_siswa) {
		$.ajax({
			url: '<?= base_url() ?>peminjaman/listPinjamanBuku',
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
					no = i + 1;
					html += `
						<tr>
							<td widtd="10">` + no + `</td>
							<td>` + data[i].id_buku + `</td>
							<td>` + data[i].judul_buku + `</td>
							<td>` + data[i].tanggal_pinjam + `</td>
							<td widtd="10">
								<button type="button" class="btn btn-success btn-sm pengembalianBuku" 
								data-id="` + data[i].id_peminjaman + `"
								data-id_buku="` + data[i].id_buku + `"
								><i class="fa fa-external-link"></i></button>
							</td>
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
							"width": "15%",
							"targets": 1
						},
					]
				});
			}
		});
	}

</script>
