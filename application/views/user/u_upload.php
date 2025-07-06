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
            <h6 class="m-0 font-weight-bold text-primary">upload Photo</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('user/uploadGo') ?>" method="post" enctype="multipart/form-data">
                <input hidden type="text" class="form-control" id="id_akun" name="id_akun" value="<?= $d['id_akun']; ?>" required readonly>

                <div class="form-group">
                    <label for="pwd">Foto</label>
                    <input type="file" class="form-control" id="image" name="image" value="<?= $d['image']; ?>" accept="image/*" required>
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