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
							<form method="POST" id="form-report">
								<div class="row">
									<div class="col-4">
										<div class="form-group">
											<label for="status">Status</label>
											<select name="status" id="status" class="form-control" required>
												<option value="">Pilih Status</option>
												<option value="semua">Semua</option>
												<option value="masuk">Masuk</option>
												<option value="ditolak">Ditolak</option>
												<option value="diproses">Diproses</option>
												<option value="diterima/sah">diterima/sah</option>
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label for="dari">Mulai Dari</label>
											<input name="dari" id="dari" class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="Dari" required autocomplete="off">
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label for="sampai">Sampai</label>
											<input name="sampai" id="sampai" class="datepicker form-control" data-date-format="dd-mm-yyyy" placeholder="Sampai" required autocomplete="off">
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-success float-right">Cetak</button>
								</div>
							</form>

						</div>
					</div>

				</div>

				<div class="col-12">

					<div class="card">
						<div class="card-body">
							<table width="100%" id="print" align="center">
								<tr>
									<td align="center"><h3>Laporan Pengajuan Permohonan</h3></td>
								</tr>
								<tr>
									<td align="center">
										<table align="center" border="1" cellpadding="10" cellspacing="0" id="tbl_report" style="width:100%; margin: 0;">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Pemohon</th>
													<th>NIK Pemohon</th>
													<th>Tipe</th>
													<!-- <th>NIK</th> -->
													<th>Desa/Kel</th>
													<th>Code</th>
													<th>Tgl</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody id="tbody"></tbody>
										</table>
									</td>
								</tr>
							</table>
							<button type="button" id="btn-print" class="btn btn-success mt-3 float-right">
								Print PDF
							</button>
						</div>
					</div>

				</div>

			</div>
		</div>
	</section>
</div>