<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div>
				<div class="col-sm-6">
					<a href="<?= base_url() ?>user-pengajuan.html" id="btn-modal-tambah" class="btn btn-success float-right">
					Buat Pengajuan</a>
				</div>
			</div>
		</div>
	</div>
	<section class="content">

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<div class="card">
						<div class="card-body">
							
							<?php foreach ($jml_pengajuan as $key => $value): ?>
							<p><?= $value['formulir_deskripsi'] ?></p>
							<div class="steps">
							    <ul class="steps-container">
							        <li style="width:33%;" class="activated">
							            <div class="step">
							                <div class="step-image"><span></span></div>
							                <div class="step-current"><span></span></div>
							                <div class="step-description">Diproses</div>
							            </div>
							        </li>
							        <li style="width:33%;">
							            <div class="step">
							                <div class="step-image"><span></span></div>
							                <div class="step-current"><span></span></div>
							                <div class="step-description">Diverifikasi</div>
							            </div>
							        </li>
							        <li style="width:33%;">
							            <div class="step">
							                <div class="step-image"><span></span></div>
							                <div class="step-current"><span></span></div>
							                <div class="step-description">Diterima</div>
							            </div>
							        </li>
							    </ul>
							    <div class="step-bar" style="width: 33%;"></div>
							</div>
							<?php endforeach ?>

			            </div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>