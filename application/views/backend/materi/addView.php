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
                        <h4 class="page-title">Tambah Materi</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Form Tambah Materi</h4>
                            <p class="text-muted font-13">
                                Silahkan Masukkan Materi
                            </p>

                            <form method="post" action="" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Nama Kategori <span class="text-danger">*</span></label>
                                            <select id="kategori" name="kategori" class="form-control" data-toggle="select2">
                                                <option>Pilih Kategori</option>
                                                <?php foreach ($kategori as $row) : ?>
                                                    <option value="<?= $row['id'] ?>"><?= $row['nama_kat'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <?php echo form_error('kategori', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Judul Materi <span class="text-danger">*</span></label>
                                            <input id="judul" name="judul" type="text" class="form-control" placeholder="Judul Materi">

                                            <?php echo form_error('judul', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <label for="inputAddress" class="col-form-label">Desktipsi Materi <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>

                                        <?php echo form_error('deskripsi', '<span class="text-danger">', '</span>'); ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label for="inputAddress" class="col-form-label">Foto Sampul (Format PNG/JPG/JPEG) </label>
                                            <input name="foto" id="foto" type="file" data-plugins="dropify" data-max-file-size="5M" data-allowed-file-extensions="jpg jpeg png" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label for="inputAddress" class="col-form-label">File Materi (Format PDF|DOC|PPT) <span class="text-danger">*</span> </label>
                                            <input id="fileMateri" name="fileMateri" type="file" data-plugins="dropify" data-max-file-size="20M" data-allowed-file-extensions="pdf pptx ppt docx" />

                                            <?php echo form_error('fileMateri', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md">
                                        <label for="inputAddress" class="col-form-label">File Video (Format MP4/3GP/FLV) </label>
                                        <input data-plugins="dropify" name="video" id="video" type="file" data-max-file-size="40M" data-allowed-file-extensions="mp4 flv wmv avi" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input name="isActive" value="1" type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">Aktif / Non Aktif</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input name="isPublish" value="1" type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">Published / Not Publish</label>
                                                </div><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->