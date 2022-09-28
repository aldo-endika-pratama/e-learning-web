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
                            <a href="<?= base_url('user/tambah') ?>" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                                <i class="mdi mdi-plus-circle"></i> Tambah User
                            </a>
                            <h4 class="header-title">Daftar User</h4><br>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (count($user) > 0) : ?>
                                        <?php $no = 1;
                                        foreach ($user as $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?php echo $row['user_name']; ?></td>
                                                <td style="font-weight: bold;"><?php echo ucfirst($row['first_name']) . ' ' . ucfirst($row['last_name']); ?> </td>
                                                <td>
                                                    <?php if ($row['user_role'] == 1) : ?>
                                                        <span class="badge bg-soft-primary text-primary">Administrator</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-soft-warning text-warning">User/Pengguna</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row['is_active'] == 1) : ?>
                                                        <span class="badge bg-soft-success text-success">Aktif</span>
                                                    <?php else : ?>
                                                        <span class="badge bg-soft-danger text-danger">Non Aktif</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?= base_url('user/ubah/' . $row['user_id']) ?>"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Ubah</a>

                                                            <a onclick="return confirm('Anda yakin menghapus USER ini ?');" class="dropdown-item" href="<?= base_url('user/hapus/' . $row['user_id']) ?>"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Hapus</a>
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