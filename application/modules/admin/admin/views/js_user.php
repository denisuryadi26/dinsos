<script>
	$(document).ready(function () {
		const base_url = "<?= base_url() ?>";
		const table = $('#tbl_data').DataTable();
		$.ajax({
			type: "GET",
			url: base_url + 'get-all-user.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				let no = 1;
				$.each(result['data'], function (d, data) {
					let hasil = {
						0: no,
						1: data['user_nik'],
						2: data['user_nama'],
						3: data['user_email'],
						4: data['user_nohp']
					};
					table.row.add(hasil).draw();
					no++;
				});
			}
		});

		$('#btn-modal-tambah').click(function () {
			$('#modal-tambah').modal('show');
		});

		$('#form-tambah').submit(function () {
			const formData = new FormData($(this)[0]);
			if ($('#password').val() === $('#ulangi').val()) {
				$.ajax({
					type: "POST",
					url: base_url + 'add-data-user.json',
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
			}else{
				Toast.fire({
					type: 'error',
					title: '&nbsp; Password tidak sama'
				});
			}
			return false;
		});

		$('#tbl_data tbody').on('click', 'tr', function () {
			let data = table.row( this ).data();
			let id = data[1];
			$('#modal-read').modal('show');
			$.ajax({
				type: "GET",
				url: base_url + 'get-user.json',
				data: {"id":id},
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						$('#e-id').val(result['data']['user_id']);
						$('#e-nik').val(result['data']['user_nik']);
						$('#e-instansi').val(result['data']['user_instansi']);
						$('#e-foto').attr('src', base_url + 'uploads/pictures/' + result['data']['user_foto']);
						$('#e-nama').text(result['data']['user_nama']);
						$('#e-nik').text(result['data']['user_nik']);
						$('#e-tempat').text(result['data']['user_tempat'] + ', ' + convertDate(result['data']['user_tanggal']));
						$('#e-kelamin').text(result['data']['user_kelamin']);
						$('#e-agama').text(result['data']['user_agama']);
						$('#e-alamat').text(result['data']['user_alamat']);
						$('#e-kebangsaan').text(result['data']['user_kebangsaan']);
						$('#e-status').text(result['data']['user_status']);
						$('#e-pekerjaan').text(result['data']['user_pekerjaan']);
					}else{
						Toast.fire({
							type: 'error',
							title: result['message']
						});
						$('#modal-read').modal('hide');
					}
					console.log(result, 'DATA USER');
				}
			});
		});

		$('#form-edit').submit(function () {
			const formData = new FormData($(this)[0]);
			if ($('e-password').val() === $('#e-ulangi').val()) {
				$.ajax({
					type: "POST",
					url: base_url + 'update-data-user.json',
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
							});
						}else{
							Swal.fire({
								title: result['title'],
								text: result['message'],
								type: 'error'
							})
						}
						console.log(result,'SUDAH DIEDIT');
					}
				});
			}else{
				Toast.fire({
					type: 'error',
					title: '&nbsp; Password tidak sama'
				});
			}
			return false;
		});

		// $('#tbl_data tbody').on('click', 'tr', function () {
		// 	let data = table.row( this ).data();
		// 	let id = data[1];
		// 	$('#modal-read').modal('show');
		// 	$.ajax({
		// 		type: "GET",
		// 		url: base_url + 'get-user.json',
		// 		data: {"id":id},
		// 		dataType: "json",
		// 		success: function (response) {
		// 			result = JSON.parse(JSON.stringify(response));
		// 			if (result['status'] == true) {
		// 				$('#r-nik').val(result['data']['user_nik']);
		// 				$('#r-foto').attr('src', base_url + 'uploads/pictures/' + result['data']['user_foto']);
		// 				$('#r-nama').text(result['data']['user_nama']);
		// 				$('#r-nik').text(result['data']['user_nik']);
		// 				$('#r-ttl').text(result['data']['user_tempat'] + ', ' + convertDate(result['data']['user_tanggal']));
		// 				$('#r-jk').text(result['data']['user_kelamin']);
		// 				$('#r-agama').text(result['data']['user_agama']);
		// 				$('#r-alamat').text(result['data']['user_alamat']);
		// 				$('#r-kebangsaan').text(result['data']['user_kebangsaan']);
		// 				$('#r-status').text(result['data']['user_status']);
		// 				$('#r-pekerjaan').text(result['data']['user_pekerjaan']);
		// 			}else{
		// 				Toast.fire({
		// 					type: 'error',
		// 					title: result['message']
		// 				});
		// 				$('#modal-read').modal('hide');
		// 			}
		// 		}
		// 	});
		// });

		function convertDate(inputFormat) {
			function pad(s) { return (s < 10) ? '0' + s : s; }
			var d = new Date(inputFormat)
			return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('-')
		}

		$('#btn-hapus').click(function () {
			$.ajax({
				type: "POST",
				url: base_url + 'delete-data-user.json',
				data: {"id" : $('#r-nik').val()},
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
						});
					}else{
						Swal.fire({
							title: result['title'],
							text: result['message'],
							type: 'error'
						}).then(function () {
							window.location.reload();
						});
					}
				}
			});
		});




	});
</script>