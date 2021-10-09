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

								<div class= "row">
								<div class= "col-sm-12">
									
                                 <table class= "table bodred">
                                    <tr>
                                       <th width="150px">Nama Berkas</th>
									   <th width="30px">:</th>
									   <th><?= $data['detail_file'] ?></th>
                                    </tr>
                                 </table>
								 </div>

								 <div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-bordered bg-warning">
							<thead>
								<tr>
								<th>Nama</th>
								<th>NIK</th>
								<th>Jenis</th>
								<!-- <th>Desa/Kel</th> -->
								<th>Code</th>
				              	<th>Status</th>
								<!-- <th>Tgl</th> -->

								</tr>
							</thead>
							<tbody>
								<tr>
								    <td><?= $data['pemohon_nama'] ?></td>
								    <td><?= $data['pemohon_nik'] ?></td>
									<td><?= $data['formulir_deskripsi'] ?></td>
									<!-- <td><?= $data['user_nama'] ?></td> -->
									<td><?= $data['pengajuan_code'] ?></td>
									<td><button class="btn btn-block btn-small btn-success"><?= $data['pengajuan_status'] ?></td>
									<!-- <td><?= $data['pengajuan_tgl'] ?></td> -->
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

								 <div class= "col-sm-12">
								 <iframe src="<?= base_url('./uploads/document/') ?><?= $data['detail_file'] ?>" height="600" width="100%" title="Iframe Example"></iframe>

								</div>

                                </div>
								<p>
									<?php if ($data['detail_status'] != 'diterima/sah'): ?>
									<a href="<?= base_url() ?>user-revisi.html?code=<?= $data['pengajuan_code'] ?>" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"><h4> Revisi</h4></a>
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