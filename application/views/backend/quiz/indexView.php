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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <?= $this->session->flashdata('info'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= base_url('quiz/tambah') ?>" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                <i class="mdi mdi-plus-circle"></i> Tambah Quiz
                            </a>
                            <h4 class="header-title">Quiz</h4><br>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Input</th>
                                        <th>Nama Quiz</th>
                                        <th>Jumlah Pertanyaan</th>
                                        <th>Durasi quiz</th>
                                        <th>Tanggal Quiz</th>
                                        <th>Status</th>
                                        <th>Aktif</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (count($quiz_details) > 0) : ?>
                                        <?php $no = 1;
                                        foreach ($quiz_details as $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?php echo $row['created_date']; ?></td>
                                                <td><?php echo ucfirst($row['quiz_name']); ?></td>
                                                <td><?php echo $row['counter']; ?></td>
                                                <td><?php echo $row['quiz_duration']; ?></td>
                                                <td><?php echo $row['start_date']; ?> - <?php echo $row['end_date']; ?></td>

                                                <td>
                                                    <?php if ($row['start_date'] > date('Y-m-d')) : ?>
                                                        <span class="badge bg-soft-blue text-blue">Quiz Belum Mulai</span>
                                                    <?php elseif ($row['end_date'] >= date('Y-m-d')) : ?>
                                                        <span class="badge bg-soft-success text-success">Quiz Tersedia</span>
                                                    <?php elseif ($row['end_date'] <= date('Y-m-d')) : ?>
                                                        <span class="badge bg-soft-danger text-danger">Quiz Tidak Tersedia</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?php if ($row['show_it'] == 1) : ?>
                                                        <span class="badge bg-soft-blue">Active</span>
                                                    <?php elseif ($row['show_it'] != 1) : ?>
                                                        <span class="label label-warning">Deactive</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?= base_url('quiz/ubah/' . $row['quiz_id']) ?>"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Ubah</a>

                                                            <a onclick="return confirm('Anda yakin menghapus QUIZ ini ?');" class="dropdown-item" href="<?= base_url('quiz/hapus/' . $row['quiz_id']) ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Hapus</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->