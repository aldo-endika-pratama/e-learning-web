x
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
                            <a href="<?= base_url('materi/tambah') ?>" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                <i class="mdi mdi-plus-circle"></i> Tambah Materi
                            </a>
                            <h4 class="header-title">Materi</h4><br>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Input</th>
                                        <th>Kategori</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    //selanjutnya result array di foreach
                                    foreach ($materi as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['created_date'] ?></td>
                                            <td><?= $row['nama_kat'] ?></td>
                                            <td><?= $row['nama_mat'] ?></td>
                                            <td><?= $row['desk_mat'] ?></td>
                                            <td>
                                                <?php if ($row['is_active'] == true) : ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                <?php endif; ?>

                                                <?php if ($row['status'] == 1) : ?>
                                                    <span class="badge badge-success">Published</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Not Publish</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div style="width: 120px;">
                                                    <?php if ($row['foto_sampul']) : ?>
                                                        <img class="img-fluid" src="<?= base_url('assets/uploads/sampul/') . $row['foto_sampul'] ?>" alt="">
                                                    <?php else : ?>
                                                        <img class="img-fluid" src="<?= base_url('assets/images/no-image.png') ?>" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <div style="text-align: left;">
                                                    <?php if ($row['file_mat']) : ?>
                                                        <h4>Materi : <span class="badge badge-outline-blue">
                                                                <i class="fas fa-file-pdf"></i> <?= $row['file_mat'] ?></span>
                                                        </h4>
                                                    <?php else : ?>
                                                        <span>Tidak Ada File Materi</span>
                                                    <?php endif; ?>
                                                </div>
                                                <div style="text-align: left;">
                                                    <?php if ($row['file_vid']) : ?>
                                                        <h4>Video : <span class="badge badge-outline-blue">
                                                                <i class="fas fa-file-pdf"></i> <?= $row['file_vid'] ?></span>
                                                        </h4>
                                                    <?php else : ?>
                                                        <span>Tidak Ada File Video</span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="<?= base_url('materi/ubah/' . $row['id']) ?>"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Ubah</a>

                                                        <?php if ($row['status'] == 0) : ?>
                                                            <a onclick="return confirm('Anda yakin mempublish materi ini ?');" class="dropdown-item" href="<?= base_url('materi/publishMateri/' . $row['id']) ?>"><i class="mdi mdi-check mr-2 text-muted font-18 vertical-middle"></i>Publish</a>
                                                        <?php endif; ?>

                                                        <a onclick="return confirm('Anda yakin menghapus MATERI ini ?');" class="dropdown-item" href="<?= base_url('materi/hapus/' . $row['id']) ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php } ?>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->