<form action="<?= base_url(); ?>pengumuman/insert" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label>
                                <span>Judul</span> <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control basic-usage" name="judul" required>
                            <input type="hidden" class="form-control text-primary" id="permalink" name="slug" required readonly>
                            <div class="invalid-feedback">
                                Form tidak boleh kosong!
                            </div>
                        </div>

                        <div class="form-group mb-3 col-md-12">
                            <label>
                                <span name="label-isi">Konten</span> <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="konten" name="konten" cols="30" rows="5"></textarea>
                            <div class="invalid-feedback">
                                Form tidak boleh kosong!
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group mb-3">
                            <label class="custom-file-label">Lampiran (PDF)</label>
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="lampiran" id="fileupload">
                                    <div class="invalid-feedback">
                                        Form tidak boleh kosong!
                                    </div>
                                </div>
                            </div>
                            <span> Format dokumen PDF dengan max size 2 MB</span>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Simpan</button>
                            <a href="<?= base_url(); ?>pengumuman" class="btn btn-danger"><i class="fa fa-times mr-1"></i> Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="<?= base_url(); ?>assets/js/jquery.stringtoslug.min.js"></script>
<script src="<?= base_url(); ?>assets/js/speakingurl.min.js"></script>
<script src="https://cdn.tiny.cloud/1/9sv7c715jaqdly1j5tpkusx54pr29xtnf8xd9o8ogqg0jfui/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    $(document).ready(function() {
        $("#fileupload").change(function() {
            var fileExtension = ['pdf', 'doc'];
            var thisFile = this.files[0];
            if (thisFile.size > 2388608) {
                swal("Failed!", "Allowed file size exceeded. (Max. 2 MB)", "error");
                $('#fileupload').val('');
            }
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                swal("Failed!", "Only formats are allowed : " + fileExtension.join(', '), "error");
                $('#fileupload').val('');
            }
        });

        $(".basic-usage").stringToSlug();

        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        });
    });

    $('#pesan').hide();
    $(document).on("change", "#sms", function() {
        if (!this.checked) {
            $('#pesan').hide();
        } else {
            $('#pesan').show();
        }
    });
</script>