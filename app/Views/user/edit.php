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




            <form action="/User/update/<?= $user['id_user']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" />
                <input type="hidden" name="fotoUserlama" value="<?= $user['fotouser'] ?>" />
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="Username" name="username" autofocus value="<?= $user['username'] ?>">
                    <div id=" validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Nama Teknisi" name="email" value="<?= $user['email'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="No Telepon" name="password" value="<?= $user['password'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label="Set Status" name="level" value="<?= $user['level'] ?>">

                            <option selected><?= $user['level'] ?></option>

                            <option value="1">1. Admin</option>
                            <option value="2">2. Petugas Stasiun</option>
                            <option value="3">3. Staff It</option>
                            <option value="4">4. Manager</option>

                        </select>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="fotouser" class="form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $user['fotouser'] ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">

                        <input class="form-control form-control-sm" id="fotouser" type="file" name="fotouser" onchange="previewImg()" <?= $user['fotouser'] ?>>
                        <!-- <label class="form-control form-control-sm" for="fotouser"><?= $user['fotouser'] ?></label> -->
                        <div class="form-text" id="basic-addon4">Your File : <?= $user['fotouser'] ?></div>

                        <div class="form-text" id="basic-addon4">Input Gambar Dengan extensi JPG, JPEG, PNG</div>
                    </div>

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