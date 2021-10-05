<script>
	$(document).ready(function () {
		const base_url = "<?= base_url() ?>";
		const tbl_proses = $('#tbl_proses').DataTable();
		const tbl_terima = $('#tbl_terima').DataTable();
		const tbl_pending = $('#tbl_pending').DataTable();
		const tbl_tolak = $('#tbl_tolak').DataTable();

		tbl_pengajuan('diproses');
		tbl_pengajuan('diterima');
		tbl_pengajuan('dipending');
		tbl_pengajuan('ditolak');

		function tbl_pengajuan(status) {
			let data = {"status":status};
			$.ajax({
				type: "GET",
				url: base_url + 'get-all-pengajuan.json',
				data: data,
				contentType: false,
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					let no = 1;
					$.each(result['data'], function (d, data) {
						let hasil = {
							0: no,
							1: data['pemohon_nama'],
						    2: data['pemohon_nik'],
							3: data['pengajuan_code'],
							4: data['formulir_deskripsi'],
							5: data['pengajuan_tgl'],
							6: data,
							// 1: '<?php
							//    $kode = $data['pengajuan_code']."/".$data['formulir_deskripsi']."";
							//    require_once('dinsos1/template/AdminLTE/docs/assets/qrcode/qrlib.php');
							//    QRcode::png("$kode","kode",".png","M",2,2);
							//    ?>'
							   
							//    img scr="kode<?php $no ?>.png" alt=""
							7: '<a href="admin-pengajuan-detail.html?code='+ data['pengajuan_code'] +'" class="btn btn-sm btn-info">detail</a>'
						};
						if (status == 'diproses') {
							tbl_proses.row.add(hasil).draw();
						}else if (status == 'ditolak'){
							tbl_tolak.row.add(hasil).draw();
						}else if (status == 'dipending'){
							tbl_pending.row.add(hasil).draw();
						}else{
							tbl_terima.row.add(hasil).draw();
						}
						no++;
					});
				}
			});
		}

		$('#form-verifikasi').submit(function () {
			const formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: base_url + 'admin-verif-pengajuan.json',
				data: formData,
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'success',
						}).then(function () {
							window.location.reload();
							// window.location.href = 'admin-dashboard.html';
						});
					}else{
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'error'
						})
					}
				}
			});
			return false;
		});

		$('#form-tolak').submit(function () {
			const formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: base_url + 'admin-tolak-pengajuan.json',
				data: formData,
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'success',
						}).then(function () {
							window.location.href = 'admin-pengajuan-ditolak.html';
						});
					}else{
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'error'
						})
					}
				}
			});
			return false;
		});
		$('#form-pending').submit(function () {
			const formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: base_url + 'admin-pending-pengajuan.json',
				data: formData,
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'success',
						}).then(function () {
							window.location.href = 'admin-pengajuan-diproses.html';
						});
					}else{
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'error'
						})
					}
				}
			});
			return false;
		});

		$('#btn-terima').click(function () {
			let data = {"code": $('#p_code').val()};
			$.ajax({
				type: "POST",
				url: base_url + 'admin-terima-pengajuan.json',
				data: data,
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'success',
						}).then(function () {
							window.location.href = 'admin-pengajuan-diterima.html';
						});
					}else{
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'error'
						})
					}
				}
			});
			return false;
		});

		function convertDate(inputFormat) {
			function pad(s) { return (s < 10) ? '0' + s : s; }
			var d = new Date(inputFormat)
			return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-')
		}

	});
</script>