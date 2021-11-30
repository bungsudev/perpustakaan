<form action="<?= base_url(); ?>artikel/insert" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
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
                            <textarea class="form-control" id="konten" name="konten" required></textarea>
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
                        <div class="form-group mb-3 col-md-12">
                            <label>
                                Kategori <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" name="id_kategori" required>
                                <option value="" selected disabled>- Pilih Kategori -</option>
                                <?php foreach($kategori as $row) { ?>
                                    <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Form tidak boleh kosong!
                            </div>
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label>
                                Tags <span class="text-danger">*</span>
                            </label>
                            <select class="form-control select2" name="id_tag[]" required multiple data-placeholder="Pilih Tags">
                                <?php foreach($tags as $row) { ?>
                                    <option value="<?= $row['id_tag'] ?>"><?= $row['nama_tag'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Form tidak boleh kosong!
                            </div>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <label class="custom-file-label">Gambar (JPG/PNG)</label>
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="images" id="fileupload" required>
                                    <div class="invalid-feedback">
                                        Form tidak boleh kosong!
                                    </div>
                                </div>
                            </div>
                            <span> Format dokumen JPG/PNG dengan max size 2 MB</span>   
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Simpan</button>
                            <a href="<?= base_url(); ?>artikel" class="btn btn-danger"><i class="fa fa-times mr-1"></i> Batal</a>
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
    $(document).ready(function(){
        tinymce.init({
        selector: "#konten",
        branding: false,
        menubar: false,
        relative_urls: false,
        remove_script_host : false,
        plugins: [
             "autoresize advlist media image autolink link lists charmap print fullscreen preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
       ],
       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
       toolbar2: "media image | link unlink anchor | forecolor backcolor  | table | print preview code fullscreen",
       image_advtab: true ,
     });

        $("#fileupload").change(function () {
            var fileExtension = ['jpg','png','jpeg'];
            var thisFile = this.files[0];
            if (thisFile.size > 2388608){
                swal("Failed!", "Allowed file size exceeded. (Max. 2 MB)" , "error");
                $('#fileupload').val('');
            }
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                swal("Failed!", "Only formats are allowed : " +fileExtension.join(', '), "error");
                $('#fileupload').val('');
            }
        });

        $(".basic-usage").stringToSlug();

        $('.custom-file-input').on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        });
    });
</script>