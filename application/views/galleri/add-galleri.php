<form action="<?= base_url(); ?>galleri/insert" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group mb-3 col-md-12">
                            <label>
                                <span>Caption</span> <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control basic-usage" name="caption" required>
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
                            <a href="<?= base_url(); ?>galleri" class="btn btn-danger"><i class="fa fa-times mr-1"></i> Batal</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
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
    });
</script>