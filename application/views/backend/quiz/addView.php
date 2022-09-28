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
                        <h4 class="page-title">Tambah Quiz</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Form Tambah Quiz</h4>
                            <p class="text-muted font-13">
                                Silahkan Masukkan Data Quiz
                            </p>

                            <form method="post" action="" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Nama Quiz <span class="text-danger">*</span></label>
                                            <input id="namaQuiz" name="namaQuiz" type="text" class="form-control" placeholder="Judul Materi">

                                            <?php echo form_error('namaQuiz', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Durasi Quiz <span class="text-danger">*</span></label>
                                            <select id="durasiQuiz" name="durasiQuiz" class="form-control" data-toggle="select2">
                                                <option value="">Pilih Durasi</option>
                                                <option value="29 min">30 menit</option>
                                                <option value="59 min">60 menit</option>
                                                <option value="89 min">90 menit</option>
                                                <option value="119 min">120 menit</option>
                                            </select>

                                            <?php echo form_error('durasiQuiz', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mulai Quiz</label>
                                            <input type="text" name="mulaiQuiz" id="mulaiQuiz" class="form-control flatpickr-input" placeholder="Basic datepicker" readonly="readonly">

                                            <?php echo form_error('mulaiQuiz', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Berakhir Quiz</label>
                                            <input type="text" name="berakhirQuiz" id="berakhirQuiz" class="form-control flatpickr-input" placeholder="Basic datepicker" readonly="readonly">

                                            <?php echo form_error('berakhirQuiz', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 mb-3">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="checkbox checkbox-blue checkbox-circle mb-2">
                                                    <input name="isShow" id="checkbox-13" type="checkbox">
                                                    <label for="checkbox-13">
                                                        Aktif / Non-Aktif
                                                    </label>
                                                </div>
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