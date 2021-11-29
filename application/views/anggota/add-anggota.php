<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<?php echo form_open_multipart(base_url().'anggota/insert_user') ?>
				<div class="row">
					<div class="form-group col-md-4">
						<label>ID Anggota</label>
						<input type="text" class="form-control" name="id_anggota"
							value="AGT<?php echo sprintf("%04s", $create_id) ?>" readonly>
					</div>
					<div class="form-group col-md-4">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap">
					</div>
					<div class="form-group col-md-4">
						<label>Jenis Kelamin</label>
						<select name="jk" class="form-control" required>
							<option value="" selected="true" disabled="disabled">- Pilih Jenis Kelamin -</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>No HP</label>
						<input type="text" class="form-control" name="nohp" required placeholder="No HP">
					</div>
					<div class="form-group col-md-4">
						<label>Jabatan</label>
						<select name="jabatan" class="form-control" required>
							<option value="" selected="true" disabled="disabled">- Pilih Jabatan -</option>
							<?php
                            foreach ($list_jabatan as $value) {
                                echo "<option value=".$value['id'].">".$value['nama_jabatan']."</option>";
                            }
                        ?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Departement</label>
						<select name="departement" class="form-control" required>
							<option value="" selected="true" disabled="disabled">- Pilih Departement -</option>
							<?php
                            foreach ($list_departement as $value) {
                                echo "<option value=".$value['id'].">".$value['nama_departement']."</option>";
                            }
                        ?>
						</select>
					</div>
					<div class="form-group col-md-12" required>
						<label>Alamat</label>
						<textarea name="alamat" id="" cols="30" rows="5" class="form-control" placeholder="Alamat"></textarea>
					</div>
					<div class="form-group col-md-4">
						<label>Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email">
						<?php if ($this->session->flashdata('pesan')): ?>
						<span style="color:red;"><i><?= $this->session->flashdata('pesan'); ?></i></span style="color:red;">
						<?php endif; ?>
					</div>
					<div class="form-group col-md-4" required>
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group col-md-4">
						<label>Level</label>
						<select name="level" class="form-control" required>
							<option value="" selected="true" disabled="disabled">- Pilih Level -</option>
							<option value="0">Administrator</option>
							<option value="1">Operator</option>
							<option value="2">Anggota</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Foto</label>
						<input type="file" class="form-control-file" id="foto" name="foto" aria-describedby="foto">
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-success"><i class="bx bx-save"></i> Simpan</button>
						<a href="<?= base_url();?>anggota" class="btn btn-danger"><i class="bx bx-x"></i> Batal</a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        $('.custom-file-input').on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })
    })
</script>