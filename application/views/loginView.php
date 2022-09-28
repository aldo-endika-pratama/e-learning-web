<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In - E-Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= base_url() ?>assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="<?= base_url() ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        .auth-style {
            display: flex;
            align-items: center;
            min-height: 100vh;
            flex-direction: row;
            align-items: stretch;
            background-size: cover;
        }

        .auth-style-bg {
            background-image: url(assets/images/bg-auth.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>
    <div class="row">
        <div style="padding-right: 0px;" class="col-md-3">
            <div class="auth-fluid">
                <!--Auth fluid left content -->
                <div class="auth-fluid-form-box">
                    <div class="align-items-center d-flex h-100">
                        <div class="card-body">

                            <!-- Logo -->
                            <div class="auth-brand text-center text-lg-left">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <span class="logo-lg-text-dark">E-Learning</span>
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <span class="logo-lg-text-light">E-Learning</span>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <!-- title-->
                            <h4 class="mt-0">Log In</h4>
                            <p class="text-muted mb-4">Silahkan Masukkan Username & Password Anda</p>

                            <div class="row">
                                <div class="col-md">
                                    <?= $this->session->flashdata('info'); ?>
                                </div>
                            </div>

                            <!-- form -->
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="emailaddress">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Masukkan Username">

                                    <?php echo form_error('username', '<span class="text-danger">', '</span>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php echo form_error('password', '<span class="text-danger">', '</span>'); ?>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit">Log In </button>
                                </div>

                            </form>
                            <!-- end form-->

                        </div> <!-- end .card-body -->
                    </div> <!-- end .align-items-center.d-flex.h-100-->
                </div>
                <!-- end auth-fluid-form-box-->
            </div>
        </div>
        <div class="col-md-9 auth-style-bg">
        </div>
    </div>
    <!-- end auth-fluid-->

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/js/app.min.js"></script>

</body>

</html>