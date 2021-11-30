<form ecntype="multipart/form-data">
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="box-body text-center">
							<img class="profile-user-img img-responsive img-circle" id="lambang_sekolah_img" src="" alt="Logo" width="100">
							<br>
							<p class="text-center text-bold">Lambang Sekolah</p>
							<p class="text-muted text-center text-red">(Kosongkan, jika logo tidak berubah)</p>
							<br>
							<div class="form-group">
								<input class="form-control" type="file" id="lambang_sekolah" name="lambang_sekolah">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-xl-4 mb-3">
							<div class="form-group">
								<label for="nama_sekolah">Nama Sekolah</label>
								<input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah">
							</div>
						</div>
						<div class="col-md-12 col-xl-4 mb-3">
							<div class="form-group">
								<label for="npsn">NPSN</label>
								<input type="text" class="form-control" name="npsn" id="npsn">
							</div>
						</div>
						<div class="col-md-12 col-xl-4 mb-3">
							<div class="form-group">
								<label for="kode_pos">Kode Pos</label>
								<input type="text" class="form-control" name="kode_pos" id="kode_pos">
							</div>
						</div>
						<div class="col-md-12 col-xl-4 mb-3">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" name="email" id="email">
							</div>
						</div>
						<div class="col-md-12 col-xl-4 mb-3">
							<div class="form-group">
								<label for="telepon">Telepon</label>
								<input type="text" class="form-control" name="telepon" id="telepon">
							</div>
						</div>
						<div class="col-md-12 col-xl-4 mb-3">
							<div class="form-group">
								<label for="website">Website</label>
								<input type="text" class="form-control" name="website" id="website" readonly>
							</div>
						</div>
						<div class="col-md-12 col-xl-12 mb-3">
							<div class="form-group">
								<label for="tentang">Alamat</label>
								<textarea class="form-control" name="alamat" id="alamat" rows="2"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-xl-12 mb-3">
							<div class="form-group">
								<label for="tentang">Tentang</label>
								<textarea class="form-control" name="tentang" id="tentang" rows="2"></textarea>
							</div>
						</div>
						<div class="col-md-12 col-xl-12 mb-3">
							<div class="form-group">
								<label for="maps">Link Google Maps</label>
								<input type="text" class="form-control" name="maps" id="maps">
							</div>
						</div>
						<div class="col-md-12 col-xl-12">
							<button type="button" id="btnBatal" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
							<button type="button" id="btnSimpan" class="btn btn-primary"><i class="bx bx-save"></i> Simpan </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	$(document).ready(function() {
		get_dataIdentitassekolah();

		//button action
		$("#btnSimpan").click(function() {
			if (confirm('Update Identitas sekolah?')) {
				save()
			}
		})
		$("#btnBatal").click(function() {
			if (confirm('Batal mengedit?')) {
				get_dataIdentitassekolah();
			}
		})
	});

	//function
	function save() {
		$.ajax({
			url: base_url + 'identitas_sekolah/simpan/Edit/1',
			type: "POST",
			data: new FormData($("form").get(0)),
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function(res) {
				if (res.res) {
					a_ok('Berhasil! ' + res.msg);
					get_dataIdentitassekolah();
				} else {
					a_error('Gagal! ' + res.msg);
				}
			}
		});
	}

	function get_dataIdentitassekolah() {
		$.ajax({
			url: base_url + 'identitas_sekolah/dataIdentitassekolah',
			method: "POST",
			dataType: "json",
			success: function(data) {
				if (data) {
					$("#lambang_sekolah_img").attr("src", base_url + "assets/img/" + data.lambang_sekolah);
					$("#nama_sekolah").val(data.nama_sekolah);
					$("#npsn").val(data.npsn);
					$("#kode_pos").val(data.kode_pos);
					$("#kepala_sekolah").val(data.kepala_sekolah);
					$("#nip_kepala_sekolah").val(data.nip_kepala_sekolah);
					$("#alamat").val(data.alamat);
					$("#email").val(data.email);
					$("#telepon").val(data.telepon);
					$("#website").val(data.website);
					$("#tentang").val(data.tentang);
					$("#kecamatan").val(data.kecamatan);
					$("#kode_kecamatan").val(data.kode_kecamatan);
					$("#nama_camat").val(data.nama_camat);
					$("#nip_camat").val(data.nip_camat);
					$("#nama_kabupaten").val(data.nama_kabupaten);
					$("#kode_kabupaten").val(data.kode_kabupaten);
					$("#provinsi").val(data.provinsi);
					$("#kode_provinsi").val(data.kode_provinsi);
					$("#maps").val(data.maps);
				} else {
					a_error('Terjadi Kesalahan!', 'Silahkan refresh page');
				}
			}
		});
	}
</script>