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
                        <h4 class="page-title">Tambah User</h4>
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
                            <h4 class="header-title">Form Tambah User Quiz</h4>
                            <p class="text-muted font-13">
                                Silahkan Masukkan User
                            </p>

                            <form id="formUser" method="post" action="" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label class="form-label">Firts Name <span class="text-danger">* (Jika menambahkan user Admin, First Name isi dengan : Administrator)</span></label>
                                            <input type="text" name="firstName" id="firstName" class="form-control">

                                            <?php echo form_error('firstName', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="lastName" id="lastName" class="form-control">

                                            <?php echo form_error('lastName', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                            <div class="radio radio-success mb-2">
                                                <input type="radio" name="jenisKelamin" value="L" id="customradio1">
                                                <label for="customradio1">Laki - Laki</label>
                                            </div>
                                            <div class="radio radio-success mb-2">
                                                <input type="radio" name="jenisKelamin" value="P" id="customradio2">
                                                <label for="customradio2">Perempuan</label>
                                            </div>

                                            <?php echo form_error('jenisKelamin', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Username <span class="text-danger">*</span></label>
                                            <input type="text" name="username" id="option3" class="form-control">

                                            <?php echo form_error('username', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label">Password <span class="text-danger">* (Buatlah Password Yang Mudah Diingat)</span></label>
                                            <input type="text" name="password" id="option4" class="form-control">

                                            <?php echo form_error('password', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="inputAddress" class="form-label">Role Akses <span class="text-danger">*</span></label>
                                            <select id="role" name="role" class="form-control" data-toggle="select2">
                                                <option value="">Pilih Role</option>
                                                <option value="1">Administrator</option>
                                                <option value="0">User/Pengguna</option>
                                            </select>

                                            <?php echo form_error('role', '<span class="text-danger">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div><br>

                                <button id="simpanUser" type="button" class="btn btn-primary waves-effect waves-light">Simpan</button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->