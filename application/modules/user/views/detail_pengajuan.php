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
									<span class="description"><?= $data['detail_status'] ?> pada - <?= date('d/m/Y H:i', strtotime($data['detail_tgl'])) ?> WIB</span>
								</div>
								<p>
									<?= $data['detail_ket'] ?>
									<br/>
									<?php if ($data['detail_file'] != ''): ?>
									<a href="<?= base_url() ?>user-download-formulir?file=<?= $data['detail_file'] ?>" class="btn btn-sm btn-warning mt-1">Download file</a>
									<?php endif ?>
								</p>
								<p>
									<?php if ($data['detail_status'] != 'diterima'): ?>
									<a href="<?= base_url() ?>user-revisi.html?code=<?= $data['pengajuan_code'] ?>" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Revisi</a>
									<?php endif ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>