<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="/Report/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New ticket</a>
    </div>




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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Request Name</th>
                                    <th>Request Email</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <!-- <th>Image</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Subject</th>
                                    <th>Request Name</th>
                                    <th>Request Email</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <!-- <th>Image</th> -->
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tiket as $t) : ?>
                                    <tr>
                                        <!-- <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </div>
                            </th> -->

                                        <td><?= $t['subject']; ?></td>
                                        <td><?= $t['requestname']; ?></td>
                                        <td><?= $t['email']; ?></td>
                                        <td><?= $t['priority']; ?></td>
                                        <td><?= $t['status']; ?></td>

                                        <td><?= $t['keterangan']; ?></td>

                                        <!-- <td>

                                            <div class="mb-3">
                                                <label for="fotouser" class="form-label">Foto</label>
                                                <div class="col-sm-2">
                                                    <img src="/img/ class="img-thumbnail img-preview">
                                                </div>


                                            </div>
                                        </td> -->



                                        <td>


                                            <a href="/Report/detail/<?= $t['id']; ?>" class="btn btn-warning">Detail</a>


                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <nav aria-label="...">
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