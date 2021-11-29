<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<?php echo form_open_multipart(base_url().'anggota/edit_user') ?>
				<div class="row">
					<input type="hidden" class="form-control" name="id_anggota"
							value="<?= $anggota['id_anggota']; ?>" readonly>
					<div class="form-group col-md-4">
						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" value="<?= $anggota['nama']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label>Jenis Kelamin</label>
						<select name="jk" class="form-control">
							<!-- <option value="" selected="true" disabled="disabled">- Pilih Jenis Kelamin -</option> -->
							<?php if($anggota['jk'] == "Laki-Laki"): ?>
								<option value="Laki-Laki" selected>Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							<?php elseif($anggota['jk'] == "Perempuan"): ?>
								<option value="Perempuan" selected>Perempuan</option>
								<option value="Laki-Laki">Laki-Laki</option>
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>No HP</label>
						<input type="text" class="form-control" name="nohp" value="<?= $anggota['nohp']; ?>">
					</div>
					<div class="form-group col-md-4">
						<label>Jabatan</label>
						<select name="jabatan" class="form-control">
							<!-- <option value="" selected="true" disabled="disabled">- Pilih Jabatan -</option> -->
							<?php foreach ($list_jabatan as $value): ?>
                                <option value="<?= $value['id']; ?>" <?= ($value['id'] == $anggota['jabatan'])?'selected':'';?>> <?= $value['nama_jabatan']; ?> </option>
                            <?php endforeach;?>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Departement</label>
						<select name="departement" class="form-control">
							<?php foreach ($list_departement as $value): ?>
                                <option value="<?= $value['id']; ?>" <?= ($value['id'] == $anggota['departement'])?'selected':'';?>> <?= $value['nama_departement']; ?> </option>
                            <?php endforeach;?>
						</select>
					</div>
					<div class="form-group col-md-12">
						<label>Alamat</label>
						<textarea name="alamat" id="" cols="30" rows="5" class="form-control"><?= $anggota['alamat']; ?></textarea>
					</div>
					<div class="form-group col-md-4">
						<label>Email</label>
						<input type="text" class="form-control" name="email"  value="<?= $anggota['email']; ?>">
						<?php if ($this->session->flashdata('pesan')): ?>
						<span style="color:red;">*<?= $this->session->flashdata('pesan'); ?></span style="color:red;">
						<?php endif; ?>
					</div>
					<!-- <div class="form-group col-md-4">
						<label>Password</label>
						<input type="password" class="form-control" name="password">
					</div> -->
					<div class="form-group col-md-4">
						<label>Level</label>
						<select name="level" class="form-control">
							<option value="0" <?= ($anggota['level'] == 0)?'selected':'';?>>Administrator</option>
							<option value="1" <?= ($anggota['level'] == 1)?'selected':'';?>>Operator</option>
							<option value="2" <?= ($anggota['level'] == 2)?'selected':'';?>>Anggota</option>
						</select>
					</div>	
					<div class="form-group col-md-4">
					</div>
					<div class="form-group mb-3 col-md-4">
						<label>Foto</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="foto" name="foto"
								aria-describedby="foto">
							<label class="custom-file-label" for="foto"><?= $anggota['image']; ?></label>
						</div>
					</div>
					<input type="hidden" name="id_ft" value="<?= $anggota['image']; ?>">
                    <?php if ($this->session->flashdata('foto_err')): ?>
                    <span style="color:red;">*<?= $this->session->flashdata('foto_err'); ?></span style="color:red;">
                    <?php endif; ?>
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