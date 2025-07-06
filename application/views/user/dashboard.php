<!-- Begin Page Content -->
<!-- Custom styles for this page -->
<link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kepegawaian</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('user/tambahData'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Npm</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Hp</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($v as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['npm']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['no_hp']; ?></td>
                                <td><?php if ($row['is_active'] == 1) { ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>

                                    <?php } ?>
                                </td>
                                <td><img src="<?= base_url('assets/img/') ?><?= $row['image']; ?>" style="width: 100px;" alt=""></td>
                                <td>
                                    <a href="<?= base_url('User/hapus/') ?><?= $row['id_akun']; ?>" title="Hapus" class="btn sm btn-primary" onclick="return confirm('Apakah Anda Yakin Menghapus Data ini ?')"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('User/editData/') ?><?= $row['id_akun']; ?>" class="btn sm btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn sm btn-success" title="Detail Data"><i class="fa fa-eye"></i></a>
                                    <a href="<?= base_url('User/uploadFoto/') ?><?= $row['id_akun']; ?>" class="btn sm btn-danger" title="Edit"><i class="fa fa-upload"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>