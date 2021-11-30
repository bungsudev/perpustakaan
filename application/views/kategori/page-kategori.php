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
                                <th>Nama Kategori</th>
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
                            Nama Kategori <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
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
                <input type="hidden" name="id_kategori" id="id_kategori">
                <div class="row">
                    <div class="form-group mb-3 col-md-12">
                        <label class="form-control-label">
                            Nama Kategori <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori2">
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
                "url": "<?php echo site_url('kategori/get')?>",
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
        tampil();
        // SAVE
        $('#save').click(function(){
            if($('#nama_kategori').val() == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: "Form (*) tidak boleh kosong!",
                });
            }else{
                $.ajax({
                    url: '<?= base_url() ?>kategori/insert',
                    type: "POST",
                    data : $("#insert").serialize(),
                    success:function(data) {
                        toastr.options.progressBar = true;
                        toastr.options.positionClass = "toast-top-right";
                        toastr.success('Data berhasil di tambahkan!');
                        $('#modalAdd').modal('toggle');
                        $("#insert")[0].reset();
                        tampil();
                    }    
                });
            }
        });

        $("tbody").on("click", '.edit', function () {
            $("#id_kamar").val($(this).attr('id_kamar'));
            $("#id_kategori").val($(this).attr('id_kategori'));
            $("#nama_kategori2").val($(this).attr('nama_kategori'));
        });

        $('#edit').click(function(){
            if($('#id_kategori2').val() == "" || $('#nama_kategori2').val() == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: "Form (*) tidak boleh kosong!",
                });
            }else{
                $.ajax({
                    url: '<?= base_url() ?>kategori/edited/',
                    type: "POST",
                    data : $("#update").serialize(),
                    success:function(data) {
                        toastr.options.progressBar = true;
                        toastr.options.positionClass = "toast-top-right";
                        toastr.success('Data berhasil di perbarui!');
                        $('#modalEdit').modal('toggle');
                        $("#update")[0].reset();
                        tampil();
                    }    
                });
            }
        });

        $("tbody").on("click", '.hapus', function () {
            if(confirm("Apakah anda yakin ingin menghapus data tersebut?")){
                var id_kamar = $(this).data('id');
                $.ajax({
                    url: '<?= base_url() ?>kategori/delete/' +id_kamar,
                    type: "POST",
                    data : { id_kamar:id_kamar },
                    success:function(response) {
                        toastr.options.progressBar = true;
                        toastr.options.positionClass = "toast-top-right";
                        toastr.success('Data berhasil dihapus!');
                        tampil();
                    }    
                });
            }else{
                return false;
            }
        });
    });
</script>