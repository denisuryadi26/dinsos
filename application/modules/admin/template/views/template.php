<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->load->view($head); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">25</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">17 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<li class="nav-item dropdown user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<?php
					if (empty($this->session->foto))
					{
					echo "<img src='".base_url('template\AdminLTE\dist\img')."' class='img-circle img-size-32 mr-2' alt='User Image'>";
					}
					else
					{
					echo "<img src='".base_url('uploads/pictures/') . $this->session->foto."' class='img-circle img-size-32 mr-2' alt='User Image'>";
					}
				?>
						<!-- <img src="<?php echo base_url() ?>assets/admin/dist/img/profile.png" class="user-image img-circle elevation-2" alt="User Image"> -->
						<span class="d-none d-md-inline text-white">Selamat Datang, <?php echo $this->session->nama; ?></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<!-- User image -->
						<li class="user-header bg-dark">
							<?php
					if (empty($this->session->foto))
					{
						echo "<img src='".base_url('template\AdminLTE\dist\img')."' class='img-circle img-size-32 mr-2' alt='User Image'>";
					}
					else
					{
						echo "<img src='".base_url('uploads/pictures/') . $this->session->foto."' class='img-circle img-size-32 mr-2' alt='User Image'>";
					}
					?>
							<!-- <img src="<?php echo base_url() ?>assets/admin/dist/img/profile.png" class="img-circle elevation-2" alt="User Image"> -->
							<p>
								Selamat Datang, <?php echo $this->session->nama; ?>
								<small><?php echo $this->session->instansi; ?></small>
							</p>
						</li>
				</li>
				<!-- Menu Footer-->
				<li class="user-footer">
					<a href="<?= base_url() ?>logout.html" class="btn btn-outline-info btn-flat float-right">Logout</a>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<a href="<?= base_url() ?>" class="brand-link text-center">
				<span class="brand-text font-weight-light">Sistem Pengajuan Online</span>
			</a>
			<?= $this->load->view($side); ?>
		</aside>
		<?= $this->load->view($content); ?>
		<?= $this->load->view($footer); ?>
	</div>
	<?= $this->load->view($javascript); ?>
	<?php if ( !empty($js) ): ?>
		<?= $this->load->view($js); ?>
	<?php endif ?>
</body>
</html>