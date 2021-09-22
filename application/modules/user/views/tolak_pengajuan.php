<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>
	<section class="content">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-primary">
						<div class="card-header">
						</div>
						<div class="card-body">
							<div class="post">
								<div class="user-block">
									<img class="img-circle img-bordered-sm" src="<?= base_url('uploads/pictures/') . $data['admin_foto'] ?>">
									<span class="username">
										<a href="#"><?= $data['admin_nama'] ?></a>
									</span>
									<span class="description">Ditolak pada - <?= date('d/m/Y H:i', strtotime($data['penolakan_tgl'])) ?> WIB</span>
								</div>
								<p>
									<?= $data['penolakan_ket'] ?>
									<br/>
									<?php if ($data['penolakan_file'] != ''): ?>
									<a href="<?= base_url() ?>user-download-formulir?file=<?= $data['penolakan_file'] ?>" class="btn btn-sm btn-warning mt-1">Download file penolakan</a>
									<?php endif ?>
								</p>
								<p>
									<a href="<?= base_url() ?>user-revisi?code=<?= $data['pengajuan_code'] ?>" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Revisi</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>