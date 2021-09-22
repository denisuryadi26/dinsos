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
				<div class="col-6">

					<div class="card">
						<div class="card-header"></div>
						<div class="card-body">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="text" name="nik" id="nik" class="form-control" required readonly value="<?= $data['user_nik'] ?>">
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" id="nama" class="form-control" required readonly value="<?= $data['user_nama'] ?>">
							</div>
							<div class="form-group">
								<label for="code">Code Pengajuan</label>
								<input type="text" name="code" id="p_code" class="form-control" required readonly value="<?= $data['pengajuan_code'] ?>">
							</div>
							<div class="form-group">
								<label for="tipe">Tipe Pengajauan</label>
								<input type="text" name="tipe" id="tipe" class="form-control" required readonly value="<?= $data['formulir_deskripsi'] ?>">
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<input type="text" name="status" id="status" class="form-control" required readonly value="<?= $data['pengajuan_status'] ?>">
							</div>
							<div class="form-group">
								<a href="<?= base_url() ?>download-file?file=<?= $data['pengajuan_formulir'] ?>" class="btn btn-sm btn-info">Download Formulir Pengajuan</a>
							</div>
			            </div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3>Verifikasi Pengajuan</h3>
						</div>
						<div class="card-body">
							<form method="POST" id="form-verifikasi">
								<input type="hidden" name="code" class="form-control" required readonly value="<?= $data['pengajuan_code'] ?>">
								<div class="form-group">
									<label for="keterangan">Keterangan *</label>
									<textarea name="keterangan" class="form-control" cols="30" rows="10" required></textarea>
								</div>
								<div class="form-group">
									<label for="file">File Tambahan (Optional)</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="file" class="custom-file-input">
											<label class="custom-file-label" for="file">Pilih Dokumen</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<select name="status" class="form-control" required>
										<option value="">Pilih Status</option>
										<option value="diterima" class="bg-success">Diterima</option>
										<option value="dipending"class="bg-warning">Dipending</option>
										<option value="ditolak" class="bg-danger">Ditolak</option>
									</select>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success" style="width:100%"><i class="fa fa-check"></i> Verifikasi</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- <div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3>Terima Pengajuan</h3>
						</div>
						<div class="card-body">
							<form method="POST" id="form-terima">
								<input type="hidden" name="code" class="form-control" required readonly value="<?= $data['pengajuan_code'] ?>">
								<div class="form-group">
									<label for="keterangan">Keterangan *</label>
									<textarea name="keterangan" class="form-control" cols="30" rows="10" required></textarea>
								</div>
								<div class="form-group">
									<label for="file">File Tambahan (Optional)</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="file" class="custom-file-input">
											<label class="custom-file-label" for="file">Pilih Dokumen</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success" style="width:100%"><i class="fa fa-check"></i> Terima</button>
								</div>
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h3>Pending Pengajuan</h3>
						</div>
						<div class="card-body">
							<form method="POST" id="form-pending">
								<input type="hidden" name="code" class="form-control" required readonly value="<?= $data['pengajuan_code'] ?>">
								<div class="form-group">
									<label for="keterangan">Keterangan *</label>
									<textarea name="keterangan" class="form-control" cols="30" rows="10" required></textarea>
								</div>
								<div class="form-group">
									<label for="file">File Tambahan (Optional)</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="file" class="custom-file-input">
											<label class="custom-file-label" for="file">Pilih Dokumen</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-warning" style="width:100%"><i class="fa fa-times"></i> Pending</button>
								</div>
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h3>Tolak Pengajuan</h3>
						</div>
						<div class="card-body">
							<form method="POST" id="form-tolak">
								<input type="hidden" name="code" class="form-control" required readonly value="<?= $data['pengajuan_code'] ?>">
								<div class="form-group">
									<label for="keterangan">Keterangan *</label>
									<textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" required></textarea>
								</div>
								<div class="form-group">
									<label for="file">File Tambahan (Optional)</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="file" id="file" class="custom-file-input">
											<label class="custom-file-label" for="file">Pilih Dokumen</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" id="btn-tolak" class="btn btn-danger" style="width:100%"><i class="fa fa-times"></i> Tolak</button>
								</div>
							</form>
						</div>
					</div>
				</div> -->

			</div>
		</div>

	</section>
</div>