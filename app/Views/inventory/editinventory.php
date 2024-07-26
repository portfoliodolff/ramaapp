<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>


        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New ticket</a> -->
    </div>
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col">




            <form action="/Inventory/update/<?= $inventory['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $inventory['id'] ?>" />
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No Inventory</label>
                    <input type="text" class="form-control <?= ($validation->hasError('noinventaris')) ? 'is-invalid' : ''; ?>" id="noinventaris" placeholder="No Inventaris" name="noinventaris" autofocus value="<?= $inventory['noinventaris']; ?>">
                    <div id=" validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Perangkat</label>
                    <input type="text" class="form-control" id="jenisperangkat" placeholder="Jenis Perangkat " name="jenisperangkat" value="<?= $inventory['jenisperangkat'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Divisi</label>
                    <input type="text" class="form-control" id="divisi" placeholder="Divisi" name="divisi" value="<?= $inventory['divisi'] ?>">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Ubah form</button>
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