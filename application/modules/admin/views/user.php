  
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
		</div>

	</section>
</div>