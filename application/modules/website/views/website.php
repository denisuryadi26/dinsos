<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SISTEM LAYANAN ONLINE DINSOS PSP</title>
	<!-- Bootstrap core CSS -->
	<link href="<?= base_url('template/landing-page/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="<?= base_url('template/landing-page/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?= base_url('template/landing-page/') ?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="<?= base_url('template/landing-page/') ?>css/landing-page.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-light bg-danger static-top">
		<div class="container">
			<a class="navbar-brand text-white" href="#"><marquee>DINAS SOSIAL KOTA PADANGSIDIMPUAN</marquee></a>
			<!-- <a class="btn btn-primary" href="<?= base_url() ?>user-login.html">Masuk Sebagai Kelurahan</a> -->
			<a class="btn btn-warning" href="<?= base_url() ?>admin-login.html">Masuk Sebagai Admin Dinas Sosial</a>
		</div>
	</nav>

	<header class="masthead text-white text-center">
	<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto">
				
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('uploads/pictures/logo.png') ?>" class="img-circle elevation-2">
                      
    
            
					 <h3 class="">Sistem Aplikasi Layanan Online</h3>
					<p><h3 class="">SALAK MANIS BERDAHAN</h3></p>
					<a class="btn btn-primary" href="<?= base_url() ?>user-login.html">Masuk Sebagai User Desa/Kelurahan</a>
					<p>Sudah mengajukan permohonan ? Cek disini</p>
				</div>
				<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
					<form action="<?= base_url() ?>cek-permohonan.html" method="GET" id="form-cek">
						<div class="form-row">
							<div class="col-12 col-md-9 mb-2 mb-md-0">
								<input type="text" name="code" class="form-control form-control-lg" placeholder="Masukan Code Pengajuan Disini">
							</div>
							<div class="col-12 col-md-3">
								<button type="submit" class="btn btn-block btn-lg btn-primary">Cek!</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		
	</header>
	<!-- <h3 class="text-center mt-3">Tentang Aplikasi</h3>
	<section class="features-icons bg-light" style="margin-top: -70px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="card">
						<div class="card-header">
							<h5>Syarat Administrasi</h5>
						</div>
						<div class="card-body">
							<div class="row">


								<div class="col-9">

					 <p>KTP</p>
					 <p>NPWP</p>
					 <p>NIB</p>
					 <p>Surat Permohonan</p>
					 <p>PIB terlampir</p>
					 <p>Inward Manifest</p>
					 <p>Dokumen Pelengkap lainnya</p>
					 <!--
					 <p>Izin Usaha (OSS)</p>
					 <p>Izin Operasional (OSS)</p>
					 <p>Izin Lingkungan (OSS)</p>
					 <p>Izin Lokasi (OSS)</p>
					 <p>Akta Perusahaan</p>
					 <p>Surat Tanah</p>
					 <p>Rekomendasi Tata Ruang (PUPR)</p>
				     <p>Persetujuan Masyarakat</p>
					 <p>Rekomendasi Camat</p>
					 <p>Ded/ Site Plant</p>
					 <p>Lay Out Kegiatan</p>
					 <p>Peta Lokasi</p>
					 <p>Bpjs Kesehatan (Dinas Kesehatan)</p>
					 <p>Bpjs Ketenagakerjaan (Disnaker)</p>
					 <p>Surat Pernyataan Pengelola Lingkungan</p> -->
								<!-- </div>



							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-12">
					<div class="card">
						<div class="card-header">
							<h5>Prosedur Pengajuan Izin</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-3 text-center">
									<i class="fa fa-users fa-3x"></i>
								</div>
								<div class="col-9">
									<h6>Register</h6>
									<p>Lakukan Pendaftaran Untuk Mendapatkan Akun Dengan Mengisi Data Sesuai Identitas Anda.</p>
								</div>


								<div class="col-3 text-center">
									<i class="fa fa-users fa-3x"></i>
								</div>
								<div class="col-9">
									<h6>Akun</h6>
									<p>Setelah Selesai Mendaftar maka anda akan bisa Login Menggunakan NIK/NPWP dan Password yang sudah anda daftarkan.</p>
								</div>

								<div class="col-3 text-center">
									<i class="fa fa-user fa-3x"></i>
								</div>
								<div class="col-9">
									<h6>Formulir</h6>
									<p>Ajukan Permohonan dengan mengisi Formulir yang sudah disediakan, sesuai dengan contoh formulir yang ditetapkan Seperti Syarat Administrasi dan Isi Dokumen</p>
								</div>

								<div class="col-3 text-center">
									<i class="fa fa-database fa-3x"></i>
								</div>
								<div class="col-9">
									<h6>Proses Verifikasi</h6>
									<p>Selanjutnya Administrator akan mengecek Syarat Administrasi Dan Isi Dokumen Untuk Dilakukan Pengcekan</p>
								</div>
								<div class="col-3 text-center">
									<i class="fa fa-search fa-3x"></i>
								</div>
								<div class="col-9">
									<h6>Cek Status Permohonan</h6>
									<p>Setelah Berhasil Melakukan Pengajuan Permohonan Secara Online, Anda Akan Mendapatkan Kode Pendataran Unik dari Operator IbuJari. Catat Kode Unik Tersebut Untuk Melihat Status Permohonan Yang Telah Anda Ajukan.</p>
								</div>
								<div class="col-3 text-center">
									<i class="fa fa-check fa-3x"></i>
								</div>
								<div class="col-9">
									<h6>Permohonan Selesai</h6>
									<p>Jika Syarat Administrasi Sudah Benar maka Datang untuk melakukan Pembahasan Isi Dokumen Di Dinas Lingkungan Hidup</p>
								</div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section> -->

	<footer class="footer bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
					<p class="text-muted small mb-4 mb-lg-0">&copy;2021 All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
					<ul class="list-inline mb-0">
					<li class="list-inline-item mr-3">
							<a href="https://dinsos.padangsidimpuankota.com/">
							<i class="fa fa-globe fa-2x fa-fw"></i>
							</a>
						</li>
						<li class="list-inline-item mr-3">
							<a href="https://www.facebook.com/Dinsos-psp-104124395351019/">
							<i class="fab fa-facebook fa-2x fa-fw"></i>
							</a>
						</li>

						<li class="list-inline-item">
							<a href="#">
							<i class="fab fa-instagram fa-2x fa-fw"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="<?= base_url('template/landing-page/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('template/landing-page/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>