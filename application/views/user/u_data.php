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
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kepegawaian</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('user/editDataGo') ?>" method="post" enctype="multipart/form-data">
                <input hidden type="text" class="form-control" id="id_akun" name="id_akun" value="<?= $d['id_akun']; ?>" required readonly>
                <div class="form-group">
                    <label for="email">Nama:</label>
                    <input type="text" class="form-control" placeholder="Enter Nama" id="name" name="name" value="<?= $d['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Email:</label>
                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?= $d['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pwd">NPM:</label>
                    <input type="number" class="form-control" placeholder="Enter NPM" id="npm" name="npm" value="<?= $d['npm']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pwd">No Hp:</label>
                    <input type="number" class="form-control" placeholder="Enter NO HP" id="no_hp" name="no_hp" value="<?= $d['no_hp']; ?>" required>
                </div>


                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Simpan</button>
            </form>


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