<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DINAS SOSIAL</title>
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
	<nav class="navbar navbar-light bg-warning static-top">
		<div class="container">
			<a class="navbar-brand text-white" href="#">Apps</a>
			<a class="btn btn-primary" href="<?= base_url() ?>user-login.html">Masuk</a>
		</div>
	</nav>

	<header class="masthead text-white text-center">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto">
					<h3 class="">Selamat datang di Sistem Perizinan BC Atambua!</h3>
					<p>Sudah mengajukan permohonan? Cek disini</p>
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
	</header>
	<h3 class="text-center mt-3">Pengajuan Anda</h3>
	<section class="features-icons bg-light" style="margin-top: -70px;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Code Pengajuan</th>
				              		<th>Jenis Pengajuan</th>
				              		<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $data['pengajuan_code'] ?></td>
									<td><?= $data['formulir_deskripsi'] ?></td>
									<td><?= $data['pengajuan_status'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="footer bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
					<p class="text-muted small mb-4 mb-lg-0">&copy;2019 All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
					<ul class="list-inline mb-0">
						<li class="list-inline-item mr-3">
							<a href="#">
							<i class="fab fa-facebook fa-2x fa-fw"></i>
							</a>
						</li>
						<li class="list-inline-item mr-3">
							<a href="#">
							<i class="fab fa-twitter-square fa-2x fa-fw"></i>
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