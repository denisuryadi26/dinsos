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
			<form method="POST" id="form-pengajuan" enctype="multipart/form-data">
				<div class="row">
					<div class="col-6">
						<div class="card card-primary">
							<div class="card-header">
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="tipe">Tipe Pengajuan</label>
									<select name="tipe" id="tipe" class="form-control" required>
										<option value="<?= $data['formulir_code'] ?>"><?= $data['formulir_deskripsi'] ?></option>
									</select>
								</div>
								<div class="form-group">
									<a id="btn-download" class="btn btn-info float-right">Download File</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="card card-primary">
							<div class="card-header">
							</div>
							<div class="card-body">
								<input type="hidden" name="nik" value="<?= $data['user_nik'] ?>">
								<div class="form-group">
									<label for="code">Code Pengajuan</label>
									<input type="text" name="code" id="code" class="form-control" required readonly value="<?= $data['pengajuan_code']; ?>">
								</div>
								<div class="form-group">
									<label for="formulir">Masukan File Formulir (Sudah diisi terlebih dahulu)</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="formulir" id="formulir" class="custom-file-input" required>
											<label class="custom-file-label" for="formulir">Pilih File</label>
										</div>
									</div>
								</div>
								<!-- <div class="form-group">
									<label for="file">Masukan File Permohonan</label>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" name="file" id="file" class="custom-file-input" required>
											<label class="custom-file-label" for="file">Pilih File</label>
										</div>
									</div>
								</div> -->
								<div class="form-group">
									<button type="submit" class="btn btn-success float-right">Ajukan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>

	</section>
</div>