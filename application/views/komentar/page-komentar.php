<?php if($this->session->flashdata('message')) { ?>
    <script type="text/javascript">
        $(document).ready(function() {
            toastr.options.timeOut = 3500;
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-right";
            toastr.success('<?= $this->session->flashdata('message') ?>');
        });
    </script>
<?php } ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
                <div class="table-responsive">
                    <table id="tblkomentar" class="table">
                        <thead>
                            <tr>
                                <th width="10">No.</th>
                                <th width="50"></th>
                                <th>Artikel</th>
                                <th>Dari</th>
                                <th>Komentar</th>
                                <th width="10">Status</th>
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

<script>
    $(document).ready(function(){
        tampil();
            // SAVE
        function tampil() {
            $('#tblkomentar').DataTable().clear();
            $('#tblkomentar').DataTable().destroy();
            $('#tblkomentar').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],

                "ajax": {
                    "url": "<?php echo site_url('komentar/get')?>",
                    "type": "POST"
                },

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false,
                }, ],
            });
        }
    });
</script>

<script>
    $("tbody").on("click", '.status', function () {
        var id_komentar = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda akan memperbarui status komentar menjadi "'+ status +'".',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>komentar/updateStatus/',
                    type: "POST",
                    data : {
                        id_komentar : id_komentar,
                        status : status,
                    },
                    success:function(data) {
                        location.reload();
                    }    
                });
            }
        });
    });
</script>