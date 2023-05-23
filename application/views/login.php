<!doctype html>
<html lang="en">

<head>
  <title>HEXA | Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="shortcut icon" href="assets/HEXA.png">
  <link rel="stylesheet" href=" <?= base_url('assets/admin2/sb-admin-2.min.css') ?> ">
</head>

<body class="img js-fullheight" style="background-image: url(<?= base_url('assets/login-form-20/') ?>images/bg.jpg);">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

      <div class="col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5 ">
          <div class="card-body p-1  ">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login admin</h1>
                  </div>
                  <?= $this->session->flashdata('message') ?>
                  <form action="<?php echo base_url('Auth'); ?>" method="post" class="signin-form">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Username" name="username" required>
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input id="password-field" type="password" class="form-control " placeholder="password" name="password" required>
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                      <?php
                      echo $this->session->flashdata('error_msg');
                      ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>


</body>

</html>