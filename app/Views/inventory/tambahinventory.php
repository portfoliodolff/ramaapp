<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>


        <a href="/Inventory/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New Inventory</a>
    </div>
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col">




            <form action="/Inventory/save" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Inventory</label>
                    <input type="text" class="form-control <?= ($validation->hasError('noinventory')) ? 'is-invalid' : ''; ?>" id="noinventaris" placeholder="No Inventaris" name="noinventaris" autofocus>
                    <div id=" validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Perangkat</label>
                    <input type="text" class="form-control" id="jenisperangkat" placeholder="Jenis Perangkat " name="jenisperangkat">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                    <input type="text" class="form-control" id="divisi" placeholder="Divisi" name="divisi">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>

            </form>

        </div>
    </div>
    <!-- </div> -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>