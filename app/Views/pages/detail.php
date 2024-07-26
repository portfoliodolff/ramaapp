<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <!-- <a href="/Report/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New ticket</a> -->
    </div>
    <hr class="sidebar-divider">



    <!-- <div class="container"> -->

    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?> <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>



            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Id </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $tiket['id']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $tiket['subject']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Request Name </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $tiket['requestname']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Request Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $tiket['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Priority</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $tiket['priority']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $tiket['status']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $tiket['keterangan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fotouser" class="form-label">Foto</label>
                        <div class="col-sm-2">
                            <img src="/img/<?= $tiket['fotouser'] ?>" class="img-thumbnail img-preview">
                        </div>


                    </div>
                </div>
            </div>


            <!-- 
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->


        </div>
    </div>
    <!-- </div> -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection(); ?>