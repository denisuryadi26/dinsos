<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div>
				<div class="col-sm-6">
					<button id="btn-modal-tambah" class="btn btn-success float-right">Tambah Data</button>
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
							<div class="table-responsive">
				              <table id="tbl_data" class="table table-bordered table-hover">
				              	<thead>
				              		<th>No</th>
				              		<th>Code</th>
				              		<th>Nama Kelurahan</th>
				              		<th>Nama Kecamatan</th>
				              		<th>Photo</th>
				              	</thead>
				              </table>
				          </div>
			            </div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal-tambah">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah Kelurahan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-tambah" method="POST">
							<div class="form-group">
								<label for="kode_kelurahan">Kode Kelurahan</label>
								<input type="text" name="kode_kelurahan" id="kode_kelurahan" class="form-control" placeholder="Masukan Kode Kelurahan" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="nama_kelurahan">Nama Kelurahan</label>
								<input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control" placeholder="Masukan Nama Kelurahan" required autocomplete="off">
							</div>
							<!-- <div class="form-group">
								<label for="nama_kecamatan">Nama Kecamatan</label>
								<input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" placeholder="Masukan Nama Kecamatan" required autocomplete="off">
							</div> -->
							<div class="form-group">
								<label for="tipe">Nama Kecamatan</label>
								<select name="tipe" id="tipe" class="form-control" required>
									<option value="">Pilih nama kecamatan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="file">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="file" id="file" class="custom-file-input" required>
										<label class="custom-file-label" for="file">Pilih Dokumen</label>
									</div>
								</div>
							</div>
							<div class="form-group float-right">
								<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" id="btn-tambah" class="btn btn-sm btn-success">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal-read">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Data Kecamatan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-edit" method="POST">
							<div class="form-group">
								<label for="e-kode">Kode Kelurahan</label>
								<input type="text" name="e-kode" id="e-kode" class="form-control" placeholder="Masukan Kode Kecamatan" required autocomplete="off" readonly>
							</div>
							<div class="form-group">
								<label for="e-nama">Nama Kelurahan</label>
								<input type="text" name="e-nama" id="e-nama" class="form-control" placeholder="Masukan Nama Kecamatan" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-tipe">Nama Kecamatan</label>
								<input type="text" name="e-tipe" id="e-tipe" class="form-control" placeholder="Masukan Nama Kecamatan" required autocomplete="off">
							</div>
							<!-- <div class="form-group">
								<label for="tipe">Tipe Pengajuan</label>
								<select name="tipe" id="tipe" class="form-control" required>
									<option value="<?= $data['formulir_code'] ?>"><?= $data['formulir_deskripsi'] ?></option>
								</select>
							</div> -->
							<!-- <div class="form-group">
								<label for="e-tipe">Nama Kecamatan</label>
								<select name="e-tipe" id="e-tipe" class="form-control" required>
									<option value="">Pilih nama kecamatan</option>
								</select>
							</div> -->
							<div class="form-group">
								<label for="e-file">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="e-file" id="e-file" class="custom-file-input">
										<label class="custom-file-label" for="e-file">Pilih Dokumen</label>
									</div>
								</div>
							</div>
							<div class="form-group float-right">
								<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" id="btn-ubah" class="btn btn-sm btn-success">Ubah</button>
							</div>
						</form>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" id="btn-hapus" type="button" class="btn btn-sm btn-danger">
							<i class="fa fa-trash"></i> Hapus Data Ini
						</button>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>