<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Elements</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Kategori</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Form Tambah Kategori Materi</h4>
                            <p class="text-muted font-13">
                                Silahkan Masukkan Informasi Kategori Materi
                            </p>

                            <form method="post" action="">

                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Nama Kategori Materi <span class="text-danger">*</span></label>
                                    <input value="<?= $kategori['nama_kat'] ?>" id="namaKat" name="namaKat" type="text" class="form-control" placeholder="Nama Kategori">

                                    <?php echo form_error('namaKat', '<span class="text-danger">', '</span>'); ?>
                                </div>

                                <div class="form-check">
                                    <input name="isActive" value="1" type="checkbox" class="form-check-input" id="customCheck1" <?= $kategori['is_active'] == 1 ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="customCheck1">Aktif</label>
                                </div><br>

                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->