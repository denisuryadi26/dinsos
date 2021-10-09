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
				              		<th>ID</th>
				              		<th>Nama</th>
				              		<th>Email</th>
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
						<h4 class="modal-title">Tambah Data Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-tambah" method="POST">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="ulangi">Ulangi Password</label>
								<input type="password" name="ulangi" id="ulangi" class="form-control" placeholder="Masukan Kembali Password" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="foto">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="foto" id="foto" class="custom-file-input" accept="image/*">
										<label class="custom-file-label" for="foto">Pilih Foto</label>
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
						<h4 class="modal-title">Data Admin</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-edit" method="POST">
							<input type="hidden" name="e-id" id="e-id">
							<div class="form-group">
								<label for="e-nama">Nama</label>
								<input type="text" name="e-nama" id="e-nama" class="form-control" placeholder="Masukan Nama" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-email">Email</label>
								<input type="email" name="e-email" id="e-email" class="form-control" placeholder="Masukan Email" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-password">Password</label>
								<input type="password" name="e-password" id="e-password" class="form-control" placeholder="Masukan Password" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-ulangi">Ulangi Password</label>
								<input type="password" name="e-ulangi" id="e-ulangi" class="form-control" placeholder="Masukan Kembali Password" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-foto">File input</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" name="e-foto" id="e-foto" class="custom-file-input" accept="image/*">
										<label class="custom-file-label" for="e-foto">Pilih Foto</label>
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