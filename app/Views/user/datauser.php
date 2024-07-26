<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="/User/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New User</a>
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
                                    <th>No</th>
                                    <th>Username </th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Foto Profil</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username </th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Foto Profil</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user as $s) : ?>
                                    <tr>
                                        <!-- <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </div>
                            </th> -->
                                        <td><?= $i++ ?></td>
                                        <td><?= $s['username']; ?></td>
                                        <td><?= $s['email']; ?></td>
                                        <td><?= $s['password']; ?></td>
                                        <td><?= $s['level']; ?></td>
                                        <td><?= $s['fotouser']; ?></td>

                                        <td>

                                            <form action="/User/delete/<?= $s['id_user']; ?>" method="post" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                                                    Delete
                                                </button>
                                            </form>


                                            <!-- <form action="/Pages/edit<?= $s['id_user']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="EDIT">
                                    <button type="submit" class="btn btn-success">
                                        Delete
                                    </button>
                                </form> -->




                                            <a href="/User/edit/<?= $s['id_user']; ?>" class="btn btn-success">Edit</a>

                                            <!-- <button type="button" class="btn btn-success" a href="/Pages/edit/">
                                   
                                    Edit
                                </button> -->

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