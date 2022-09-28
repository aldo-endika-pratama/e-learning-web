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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">E-Learning</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                <li class="breadcrumb-item active">Materi</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Materi / Course</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <?php foreach ($materi as $row) : ?>
                    <div class="col-lg-4">
                        <div class="card-box bg-pattern">
                            <div class="text-center">

                                <?php if ($row['foto_sampul']) : ?>
                                    <img src="<?= base_url('assets/uploads/sampul/') . $row['foto_sampul'] ?>" alt="logo" class="avatar-xl rounded-circle mb-3">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/images/no-image.png') ?>" alt="logo" class="avatar-xl rounded-circle mb-3">
                                <?php endif; ?>

                                <h4 class="mb-1 font-20"><?= $row['nama_mat'] ?></h4>

                                <?php if ($row['status'] = 1) : ?>
                                    <span class="badge badge-success">Published</span>
                                <?php endif; ?>

                                <p class="text-muted  font-14"><?= $row['nama_kat'] ?></p>
                            </div>

                            <p class="font-14 text-center text-muted">
                                <?= $row['desk_mat'] ?>
                            </p>

                            <div class="col-md">
                                <?php if ($row['file_vid']) : ?>
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <video width="320" height="240" controls>
                                            <source src="<?= base_url('assets/uploads/video/') . $row['file_vid'] ?>" type="video/mp4">
                                        </video>
                                    </div>
                                <?php else : ?>
                                    <div class="col-md mt-3 d-flex justify-content-center">
                                        <span class="badge badge-danger">Tidak Ada File Video</span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mt-2 col-md d-flex justify-content-center">
                                <div>
                                    <a title="Download Materi" href="<?= base_url('front/materi/download/' . $row['kode_mat']) ?>" class="btn btn-sm btn-light"><i class="fas fa-fw fa-download"></i> Unduh Materi</a>
                                </div>

                                <?php if ($row['file_vid']) : ?>
                                    <div class="ml-2">
                                        <a title="Download Video" href="<?= base_url('front/materi/downloadVideo/' . $row['kode_mat']) ?>" class="btn btn-sm btn-dark"><i class="fas fa-fw fa-download"></i> Unduh Video</a>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div> <!-- end card-box -->
                    </div><!-- end col -->
                <?php endforeach; ?>


            </div>
            <!-- end row -->



            <div class="row">
                <div class="col-12">
                    <div class="text-right">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- content -->