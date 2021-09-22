<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->load->view($head); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
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