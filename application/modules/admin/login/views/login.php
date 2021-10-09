<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DINAS SOSIAL</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('template/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('template/AdminLTE/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('template/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('template/AdminLTE/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="https://www.javavbphp.com/" target="_blank"><b>Login User</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan masukan NIK/NPWP dan Password untuk bisa masuk</p>

      <form id="masuk" method="post">
        <div class="input-group mb-3">
          <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-id-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" id="btn-masuk" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <!-- <p class="mb-0 mt-3 text-right">
        <a href="<?= base_url() ?>pendaftaran-user.html" class="text-center">Belum punya akun? Silahkan hubungi petugas</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('template/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('template/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function () {
    const base_url = "<?= base_url() ?>";

    $('#masuk').submit(function () {
      const formData = new FormData($(this)[0]);
      const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
      });

      $.ajax({
        type: "POST",
        url: base_url + 'user-auth.html',
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
          console.log(response);
          if (response['message'] == true) {
            Toast.fire({
              type: 'success',
              title: '&nbsp; NIK/NPWP & Password anda benar, tunggu beberapa saat ...'
            }).then(function () {
              window.location.href = base_url + 'user-daftar-pengajuan.html';
            });
          }else{
            Toast.fire({
              type: 'error',
              title: '&nbsp; Silahkan cek kembali NIK & Password anda'
            });
            $('#masuk').trigger("reset");
          }
        }
      });
      return false;
    });

  });
</script>

</body>
</html>