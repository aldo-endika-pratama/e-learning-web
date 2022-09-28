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
                        <h4 class="page-title">Ubah Soal Quiz</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md">
                    <div class="alert alert-warning bg-info text-white border-0" role="alert">
                        <span>Inputan yang bertanda (*) berarti wajib untuk diisi.</span>
                    </div>
                </div>
            </div>

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Form Ubah Soal Quiz</h4>
                            <p class="text-muted font-13">
                                Silahkan Masukkan Soal
                            </p>

                            <form id="formSoal" method="post" action="" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Nama Quiz <span class="text-danger">*</span>
                                                <span class="text-warning">( Jika tidak ada nama QUIZ, silahkan input QUIZ terlebih dahulu )</span>
                                            </label>
                                            <select id="quiz" name="quiz" class="form-control" data-toggle="select2">
                                                <option value="">Pilih Quiz</option>
                                                <?php foreach ($quiz as $row) : ?>
                                                    <option <?= $soal['quiz_id'] == $row['quiz_id'] ? 'selected' : '' ?> value="<?= $row['quiz_id'] ?>"><?= $row['quiz_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                            <?php echo form_error('quiz', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Pertanyaan <i class="fas fa-question-circle"></i> <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="soalQuiz" id="soalQuiz" cols="30" rows="7"><?= $soal['question'] ?></textarea>

                                            <?php echo form_error('soalQuiz', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Option 1 <span class="text-danger">*</span></label>
                                            <input value="<?= $soal['option1'] ?>" type="text" name="option1" id="option1" class="form-control">

                                            <?php echo form_error('option1', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Option 2 <span class="text-danger">*</span></label>
                                            <input value="<?= $soal['option2'] ?>" type="text" name="option2" id="option2" class="form-control">

                                            <?php echo form_error('option2', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Option 3 <span class="text-danger">*</span></label>
                                            <input value="<?= $soal['option3'] ?>" type="text" name="option3" id="option3" class="form-control">

                                            <?php echo form_error('option3', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Option 4 <span class="text-danger">*</span></label>
                                            <input value="<?= $soal['option4'] ?>" type="text" name="option4" id="option4" class="form-control">

                                            <?php echo form_error('option4', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <label class="form-label" for="">Pilih Jawaban Soal <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="radio radio-success mb-2">
                                                    <input <?= $soal['answer'] == 'option_1' ? 'checked' : '' ?> type="radio" name="jawaban" value="option_1" id="customradio1">
                                                    <label for="customradio1">Option 1</label>
                                                </div>
                                                <div class="radio radio-success mb-2">
                                                    <input <?= $soal['answer'] == 'option_2' ? 'checked' : '' ?> type="radio" name="jawaban" value="option_2" id="customradio2">
                                                    <label for="customradio2">Option 2</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="radio radio-success mb-2">
                                                    <input <?= $soal['answer'] == 'option_3' ? 'checked' : '' ?> type="radio" name="jawaban" value="option_3" id="customradio3">
                                                    <label for="customradio3">Option 3</label>
                                                </div>
                                                <div class="radio radio-success mb-2">
                                                    <input <?= $soal['answer'] == 'option_4' ? 'checked' : '' ?> type="radio" name="jawaban" value="option_4" id="customradio4">
                                                    <label for="customradio4">Option 4</label>
                                                </div>
                                            </div>
                                        </div>

                                        <?php echo form_error('jawaban', '<span class="text-danger">', '</span>'); ?>
                                    </div>
                                </div><br>

                                <button id="simpanSoal" type="button" class="btn btn-primary waves-effect waves-light">Simpan</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->