
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
										<th>NIK</th>
										<th>Nama</th>
										<th>Email</th>
										<th>No HP</th>
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
						<h4 class="modal-title">Tambah Data User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-tambah" method="POST">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="instansi">Instansi</label>
								<select name="instansi" id="instansi" class="form-control" required>
									<option value="">Silahkan Pilih Instansi</option>
									<option value="Kel. 1">Kel. 1</option>
									<option value="Kel. 2">Kel. 2</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="tempat">Tempat Lahir</label>
								<input type="text" name="tempat" id="tempat" class="form-control" placeholder="Masukan Tempat Lahir" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="tanggal">Tanggal lahir</label>
								<input name="tanggal" id="tanggal" class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="Masukan Tanggal Lahir" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat Lengkap</label>
								<textarea name="alamat" id="alamat" class="form-control" required cols="20" rows="10"></textarea>
							</div>
							<div class="form-group">
								<label for="kelamin">Jenis Kelamin</label>
								<select name="kelamin" id="kelamin" class="form-control" required>
									<option value="">Silahkan Pilih Jenis Kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="agama">Agama</label>
								<select name="agama" id="agama" class="form-control" required>
									<option value="">Silahkan Pilih Agama</option>
									<option value="Islam">Islam</option>
									<option value="Protestan">Protestan</option>
									<option value="Katolik">Katolik</option>
									<option value="Hindu">Hindu</option>
									<option value="Buddha">Buddha</option>
									<option value="Khonghucu">Khonghucu</option>
								</select>
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" id="status" class="form-control" required>
									<option value="">Silahkan Pilih Status</option>
									<option value="Kawin">Kawin</option>
									<option value="Belum Kawin">Belum Kawin</option>
								</select>
							</div>
							<div class="form-group">
								<label for="pekerjaan">Pekerjaan</label>
								<input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" required autocomplete="off">
							</div>
								<div class="form-group">
								<label for="kebangsaan">Kebangsaan</label>
								<select name="kebangsaan" id="kebangsaan" class="form-control" required>
									<option value="">Silahkan Pilih Kebangsaan</option>
									<option value="WNI">WNI</option>
									<option value="WNA">WNA</option>
								</select>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="nohp">Nomor Handphone</label>
								<input type="number" name="nohp" id="nohp" class="form-control" placeholder="Masukan Nomor Handphone" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="text" name="password" id="password" class="form-control" placeholder="Masukan Password" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="ulangi">Ulangi Password</label>
								<input type="text" name="ulangi" id="ulangi" class="form-control" placeholder="Ulangi Password" required autocomplete="off">
							</div>
							<div class="row">
							<!-- <div class="col-12">
								<button type="submit" id="btn-daftar" class="btn btn-primary btn-block">Masuk</button>
							</div> -->
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
						<h4 class="modal-title">Data User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="text-center">
							<img id="e-foto" class="profile-user-img img-fluid img-circle" alt="User profile picture">
						</div>
						<h3 id="e-nama" class="profile-username text-center"></h3>
						<p id="e-nik" class="text-muted text-center"></p>
						<form id="form-edit" method="POST">
							<input type="hidden" name=e_id" id=e_id">
							<div class="form-group">
								<label for="e-nik">NIK</label>
								<input type="number" name="e-nik" id="e-nik" class="form-control" placeholder="Masukan NIK" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-instansi">Instansi</label>
								<select name="e-instansi" id="e-instansi" class="form-control" required>
									<option value="">Silahkan Pilih Instansi</option>
									<option value="Kel. 1">Kel. 1</option>
									<option value="Kel. 2">Kel. 2</option>
								</select>
							</div>
							<div class="form-group">
								<label for="e-nama">Nama</label>
								<input type="text" name="e-nama" id="e-nama" class="form-control" placeholder="Masukan Nama" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-tempat">Tempat Lahir</label>
								<input type="text" name="e-tempat" id="e-tempat" class="form-control" placeholder="Masukan Tempat Lahir" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-tanggal">Tanggal lahir</label>
								<input name="e-tanggal" id="e-tanggal" class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="Masukan Tanggal Lahir" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-alamat">Alamat Lengkap</label>
								<textarea name="e-alamat" id="e-alamat" class="form-control" required cols="20" rows="10"></textarea>
							</div>
							<div class="form-group">
								<label for="e-kelamin">Jenis Kelamin</label>
								<select name="e-kelamin" id="e-kelamin" class="form-control" required>
									<option value="">Silahkan Pilih Jenis Kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="e-agama">Agama</label>
								<select name="e-agama" id="e-agama" class="form-control" required>
									<option value="">Silahkan Pilih Agama</option>
									<option value="Islam">Islam</option>
									<option value="Protestan">Protestan</option>
									<option value="Katolik">Katolik</option>
									<option value="Hindu">Hindu</option>
									<option value="Buddha">Buddha</option>
									<option value="Khonghucu">Khonghucu</option>
								</select>
							</div>
							<div class="form-group">
								<label for="e-status">Status</label>
								<select name="e-status" id="e-status" class="form-control" required>
									<option value="">Silahkan Pilih Status</option>
									<option value="Kawin">Kawin</option>
									<option value="Belum Kawin">Belum Kawin</option>
								</select>
							</div>
							<div class="form-group">
								<label for="e-pekerjaan">Pekerjaan</label>
								<input type="text" name="e-pekerjaan" id="e-pekerjaan" class="form-control" placeholder="Masukan Pekerjaan" required autocomplete="off">
							</div>
								<div class="form-group">
								<label for="e-kebangsaan">Kebangsaan</label>
								<select name="e-kebangsaan" id="e-kebangsaan" class="form-control" required>
									<option value="">Silahkan Pilih Kebangsaan</option>
									<option value="WNI">WNI</option>
									<option value="WNA">WNA</option>
								</select>
							</div>
							<div class="form-group">
								<label for="e-email">Email</label>
								<input type="email" name="e-email" id="e-email" class="form-control" placeholder="Masukan Email" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-nohp">Nomor Handphone</label>
								<input type="number" name="e-nohp" id="e-nohp" class="form-control" placeholder="Masukan Nomor Handphone" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-password">Password</label>
								<input type="text" name="e-password" id="e-password" class="form-control" placeholder="Masukan Password" required autocomplete="off">
							</div>
							<div class="form-group">
								<label for="e-ulangi">Ulangi Password</label>
								<input type="text" name="e-ulangi" id="e-ulangi" class="form-control" placeholder="Ulangi Password" required autocomplete="off">
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

		<!-- <div class="modal fade" id="modal-read">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Data User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<img id="r-foto" class="profile-user-img img-fluid img-circle" alt="User profile picture">
								</div>
								<h3 id="r-nama" class="profile-username text-center"></h3>
								<p id="r-nik" class="text-muted text-center"></p>
								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item">
										<b>Tempat, tanggal lahir</b> <a id="r-ttl" class="float-right"></a>
									</li>
									<li class="list-group-item">
										<b>Jenis Kelamin</b> <a id="r-jk" class="float-right"></a>
									</li>
									<li class="list-group-item">
										<b>Agama</b> <a id="r-agama" class="float-right"></a>
									</li>
									<li class="list-group-item">
										<b>Alamat</b> <a id="r-alamat" class="float-right"></a>
									</li>
									<li class="list-group-item">
										<b>Kebangsaan</b> <a id="r-kebangsaan" class="float-right"></a>
									</li>
									<li class="list-group-item">
										<b>Status</b> <a id="r-status" class="float-right"></a>
									</li>
									<li class="list-group-item">
										<b>Pekerjaan</b> <a id="r-pekerjaan" class="float-right"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
					<button type="button" id="btn-hapus" type="button" class="btn btn-sm btn-danger">
							<i class="fa fa-trash"></i> Hapus Data Ini
						</button>
					</div>
				</div>
			</div>
		</div> -->

	</section>
</div>