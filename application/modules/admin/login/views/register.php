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
  <link rel="stylesheet" href="<?= base_url('template/'); ?>bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('template/AdminLTE/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="https://updu.tech/" target="_blank"><b>Apps</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan daftar dengan data sesuai KTP</p>

      <form id="daftar" method="post">
        <div class="form-group">
          <label for="nik">NIK</label>
          <input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="instansi">Instansi</label>
          <select name="instansi" id="instansi" class="form-control" required>
            <option value="">Silahkan Pilih Instansi</option>
            <option value="Kel. 1">Kel. 1</option>
            <option value="Kel. 2">Kel. 2</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="tempat">Tempat Lahir</label>
          <input type="text" name="tempat" id="tempat" class="form-control" placeholder="Masukan Tempat Lahir" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal lahir</label>
          <input name="tanggal" id="tanggal" class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="Masukan Tanggal Lahir" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat Lengkap</label>
          <textarea name="alamat" id="alamat" class="form-control" required cols="20" rows="10"></textarea>
        </div>
        <div class="form-group">
          <label for="kelamin">Jenis Kelamin</label>
          <select name="kelamin" id="kelamin" class="form-control" required>
            <option value="">Silahkan Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group">
          <label for="agama">Agama</label>
          <select name="agama" id="agama" class="form-control" required>
            <option value="">Silahkan Pilih Agama</option>
            <option value="Islam">Islam</option>
            <option value="Protestan">Protestan</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Khonghucu">Khonghucu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control" required>
            <option value="">Silahkan Pilih Status</option>
            <option value="Kawin">Kawin</option>
            <option value="Belum Kawin">Belum Kawin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="kebangsaan">Kebangsaan</label>
          <select name="kebangsaan" id="kebangsaan" class="form-control" required>
            <option value="">Silahkan Pilih Kebangsaan</option>
            <option value="WNI">WNI</option>
            <option value="WNA">WNA</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="nohp">Nomor Handphone</label>
          <input type="number" name="nohp" id="nohp" class="form-control" placeholder="Masukan Nomor Handphone" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" name="password" id="password" class="form-control" placeholder="Masukan Password" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="ulangi">Ulangi Password</label>
          <input type="text" name="ulangi" id="ulangi" class="form-control" placeholder="Ulangi Password" required autocomplete="off">
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" id="btn-daftar" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <p class="mb-0 mt-3 text-right">
        <a href="<?= base_url() ?>user-login.html" class="text-center">Sudah punya akun? Masuk disini</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('template/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- datepicker -->
<script src="<?= base_url('template/'); ?>bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('template/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function () {
    const base_url = "<?= base_url() ?>";
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 5000
    });
    $('.datepicker').datepicker();
    $('#daftar').submit(function () {
      const formData = new FormData($(this)[0]);
      if ($('#password').val() === $('#ulangi').val()) {
        $.ajax({
          type: "POST",
          url: base_url + 'pendaftaran-user.json',
          data: formData,
          processData: false,
          contentType: false,
          dataType: "json",
          success: function (response) {
            result = JSON.parse(JSON.stringify(response));
            if (result['status'] == true) {
              Swal.fire({
                title: result['title'],
                text: result['message'],
                type: 'success',
              }).then(function () {
                window.location.reload();
              });
            }else{
              Swal.fire({
                title: result['title'],
                text: result['message'],
                type: 'error'
              })
            }
          }
        });
      }else{
        Toast.fire({
          type: 'error',
          title: '&nbsp; Password tidak sama'
        });
      }
      return false;
    });

  });
</script>

</body>
</html>