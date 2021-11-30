<div class="row">
    <div class="col-md-12 text-right mb-3">
        <a href="<?= base_url(); ?>pengumuman/add" class="btn btn-success btn-sm"><i class="uil-plus mr-1"></i> Tambah Data</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatables" class="table">
                    <thead>
                        <tr>
                            <th width="10">No.</th>
                            <th width="10">Aksi</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Author</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- NOTIFICATION -->
<?php if ($this->session->flashdata('message')) { ?>
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
                "url": "<?php echo site_url('pengumuman/get') ?>",
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
    $(document).ready(function() {
        tampil();
        $("tbody").on("click", '.hapus', function() {
            if (confirm("Apakah anda yakin ingin menghapus data tersebut?")) {
                var id_pengumuman = $(this).data('id');
                $.ajax({
                    url: '<?= base_url() ?>pengumuman/delete/' + id_pengumuman,
                    type: "POST",
                    data: {
                        id_pengumuman: id_pengumuman
                    },
                    success: function(response) {
                        toastr.options.progressBar = true;
                        toastr.options.positionClass = "toast-top-right";
                        toastr.success('Data berhasil dihapus!');
                        tampil();
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>