<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title ?></h1>
				</div>
				<div class="col-sm-6">
					<a href="<?= base_url() ?>user-pengajuan.html" id="btn-modal-tambah" class="btn btn-success float-right">Buat Pengajuan</a>
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
				              		<th>Code Pengajuan</th>
				              		<th>Jenis Pengajuan</th>
				              		<th>Status</th>
				              		<th>#</th>
				              	</thead>
				              </table>
				          </div>
			            </div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>