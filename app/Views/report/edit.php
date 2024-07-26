<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>


        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add New ticket</a>
    </div>
    <!-- <div class="container"> -->
    <div class="row">
        <div class="col">




            <form action="/Report/update/<?= $tiket['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $tiket['id'] ?>" />
                <input type="hidden" name="fotoUserlama" value="<?= $tiket['fotouser'] ?>" />
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Subject</label>
                    <input type="text" class="form-control <?= ($validation->hasError('subject')) ? 'is-invalid' : ''; ?>" id="subject" placeholder="Subject" name="subject" autofocus value="<?= $tiket['subject']; ?>">
                    <div id=" validationServer03Feedback" class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Request Name</label>
                    <input type="text" class="form-control" id="requestname" placeholder="Request Name" name="requestname" value="<?= $tiket['requestname'] ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= $tiket['email'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Priority</label>
                    <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label="Set Priority" name="priority" value="<?= $tiket['priority'] ?>">
                            <option selected><?= $tiket['priority'] ?></option>
                            <hr class="sidebar-divider">
                            <option value="Low">Low</option>
                            <option value="Middle">Middle</option>
                            <option value="High">High</option>

                        </select>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <div class="mb-3">
                        <select class="form-select form-select-sm" aria-label="Set Status" name="status" value="<?= $tiket['status'] ?>">
                            <option selected><?= $tiket['status'] ?></option>

                            <option value="Pending">Pending</option>
                            <option value="Onhold">On Hold</option>
                            <option value="Complete">Complete</option>

                        </select>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Keterangan </label>
                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" value="<?= $tiket['keterangan'] ?>"><?= $tiket['keterangan'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="fotouser" class="form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $tiket['fotouser'] ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">

                        <input class="form-control form-control-sm" id="fotouser" type="file" name="fotouser" onchange="previewImg()" <?= $tiket['fotouser'] ?>>
                        <!-- <label class="form-control form-control-sm" for="fotouser"><?= $tiket['fotouser'] ?></label> -->
                        <div class="form-text" id="basic-addon4">Your File : <?= $tiket['fotouser'] ?></div>

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