<div class="row">
    <div class="col-md-12 text-right">
        <a href="<?= base_url();?>anggota/add" class="btn btn-success rounded-pill mb-3"><i class="bx bx-plus"></i> Tambah Data</a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="data-tables">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th>Departement</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th width="10"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php foreach ($list as $row) { 
                                $jabatan = $this->Jabatan_model->detail_jabatan($row['jabatan']);
                                $departement = $this->Departement_model->detail_departement($row['departement']);
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><img src="<?= base_url(); ?>assets/img/foto_anggota/<?= $row['image'] ?>" width="80" class="rounded"></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['jk'] ?></td>
                                    <td><?= $row['nohp'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <td><?= $departement['nama_departement'] ?></td>
                                    <td>
                                        <?php if($row['level'] == '0') { ?>
                                            <span class="badge badge-success">Administrator</span>
                                        <?php }else if($row['level'] == '1'){ ?>
                                            <span class="badge badge-primary">Operator</span>
                                        <?php }else{ ?> 
                                            <span class="badge badge-danger">Anggota</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 'Aktif') { ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php }else{ ?>
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        <?php } ?>
                                    </td>
                                    <td><a href="<?= base_url() ?>anggota/edit/<?= $row['id_anggota'] ?> " class="btn btn-primary btn-sm"><i class="bx bx-pencil"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>