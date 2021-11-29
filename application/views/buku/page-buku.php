
<div class="row">
    <div class="col-md-12 mb-3">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="uil-plus mr-1"></i> Tambah Data</button>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatables" class="table">
                        <thead>
                            <tr>
                                <th width="10">No.</th>
                                <th width="10"></th>
                                <th>Gambar</th>
                                <th>Informasi Buku</th>
                                <th>Lokasi Buku</th>
                                <th>Stok</th>
                                <th>Dipinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="insert" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            ISBN <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control required" name="isbn_buku" id="isbn_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Judul Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control required" name="judul_buku" id="judul_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Lokasi Buku <span class="text-danger">*</span>
                        </label>
                        <select class="form-control select2" name="id_rak" id="id_rak">
                            <option value="">-Pilih Lokasi-</option>
                            <?php foreach ($lokasi as $key => $row): ?>
                                <option value="<?= $row['id_rak'] ?>"><?= $row['lokasi_rak'].' - '. $row['nama_rak'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Penulis Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control required" name="penulis_buku" id="penulis_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                        Penerbit Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control required" name="penerbit_buku" id="penerbit_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-control-label">
                            Tahun Penerbit <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control required" name="tahun_penerbit" id="tahun_penerbit">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-control-label">
                            Stok Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control required" name="stok" id="stok">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                        Keterangan <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="custom-file col-md-12">
                        <input type="file" class="custom-file-input" id="images"
                            name="images">
                        <label class="custom-file-label" for="images" required>Pilih
                            Gambar</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save"><i class="fa fa-save mr-1"></i> Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i> Batal</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="update" enctype="multipart/form-data">
                <input type="hidden" name="id_buku" id="id_buku">
                <div class="row">
                <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            ISBN <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control requiredEdit" name="isbn_buku" id="editisbn_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Judul Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control requiredEdit" name="judul_buku" id="editjudul_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Lokasi Buku <span class="text-danger">*</span>
                        </label>
                        <select class="form-control select2" name="id_rak" id="editid_rak">
                            <option value="">-Pilih Lokasi-</option>
                            <?php foreach ($lokasi as $key => $row): ?>
                                <option value="<?= $row['id_rak'] ?>"><?= $row['lokasi_rak'].' - '. $row['nama_rak'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Penulis Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control requiredEdit" name="penulis_buku" id="editpenulis_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                        Penerbit Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control requiredEdit" name="penerbit_buku" id="editpenerbit_buku">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-control-label">
                            Tahun Penerbit <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control requiredEdit" name="tahun_penerbit" id="edittahun_penerbit">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="form-control-label">
                            Stok Buku <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control requiredEdit" name="stok" id="editstok">
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                        Keterangan <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" name="keterangan" id="editketerangan" rows="3"></textarea>
                        <div class="invalid-feedback">
                            Tidak boleh kosong!
                        </div>
                    </div>
                    <div class="custom-file col-md-12">
                        <input type="file" class="custom-file-input" id="editimages"
                            name="images">
                        <label class="custom-file-label" for="images" required>Pilih
                            Gambar</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edit"><i class="fa fa-save mr-1"></i> Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times mr-1"></i> Batal</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- NOTIFICATION -->
<?php if($this->session->flashdata('message')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options.timeOut = 3000;
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-right";
            toastr.success('<?= $this->session->flashdata('message') ?>');
        });
    </script>
<?php } ?>
<!-- END NOTIFICATION -->

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
                "url": "<?php echo site_url('buku/get')?>",
                "type": "POST"
            },

            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
        });
    }
</script>
<script>
    $(document).ready(function(){
        $("#id_rak").select2({
            dropdownParent: $("#modalAdd")
        });
        tampil();
        // SAVE
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
                $.ajax({
                    url: '<?= base_url() ?>buku/simpan_buku/tambah/',
                    type: "POST",
                    data: new FormData($("#insert").get(0)),
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (res) {
                        if (res.res) {
                            $('#modalAdd').modal('toggle');
                            a_msg("Berhasil!", "Buku ditambahkan!", "success");
                            $("#insert")[0].reset();
                            tampil();
                        } else {
                            a_msg("Berhasil!", "Buku gagal di tambahkan!", "error");
                        }
                    }
                });
				// $.ajax({
                //     url: '<?= base_url() ?>buku/simpan_buku/tambah/',
                //     type: "POST",
                //     data : $("#insert").serialize(),
                //     success:function(data) {
                //         $('#modalAdd').modal('toggle');
                //         $("#insert")[0].reset();
                //         tampil();
                //     }    
                // });
			}
        });

        $("tbody").on("click", '.edit', function () {
            $("#id_buku").val($(this).attr('id_buku'));
            $("#editjudul_buku").val($(this).attr('judul_buku'));
            $("#editisbn_buku").val($(this).attr('isbn_buku'));
            $("#editpenulis_buku").val($(this).attr('penulis_buku'));
            $("#editpenerbit_buku").val($(this).attr('penerbit_buku'));
            $("#edittahun_penerbit").val($(this).attr('tahun_penerbit'));
            $("#editketerangan").val($(this).attr('keterangan'));
            $("#editstok").val($(this).attr('stok'));
            $("#editimages").val($(this).attr('images'));
            $("#editid_rak").val($(this).attr('id_rak'));
        });

        $('#edit').click(function(){
            let check = true;
			$('.requiredEdit').each(function () {
				if (this.value.trim() !== '') {
					$(this).removeClass('is-invalid');
				} else {
					$(this).addClass('is-invalid');
					check = false;
				}
			})
			if (check) {
				$.ajax({
                    url: '<?= base_url() ?>buku/edit',
                    type: "POST",
                    data : $("#update").serialize(),
                    success:function(data) {
                        $('#modalEdit').modal('toggle');
                        $("#update")[0].reset();
                        tampil();
                    }    
                });
			}
        });

        $("tbody").on("click", '.btnHapus', function () {
            if(confirm("Apakah anda yakin ingin menghapus data tersebut?")){
                var id_buku = $(this).data('id');
                $.ajax({
                    url: '<?= base_url() ?>buku/delete/' +id_buku,
                    type: "POST",
                    data : { id_buku:id_buku },
                    success:function(response) {
                        tampil();
                    }    
                });
            }else{
                return false;
            }
        });
    });
</script>