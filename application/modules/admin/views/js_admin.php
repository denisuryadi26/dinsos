<script>
	$(document).ready(function () {
		const base_url = "<?= base_url() ?>";
		const table = $('#tbl_data').DataTable();
		const Toast = Swal.mixin({
	        toast: true,
	        position: 'center',
	        showConfirmButton: false,
	        timer: 5000
	    });

		$.ajax({
			type: "GET",
			url: base_url + 'get-all-admin.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				let no = 1;
				$.each(result['data'], function (d, data) {
					let hasil = {
						0: no,
						1: 'ADM00' + data['admin_id'],
						2: data['admin_nama'],
						3: data['admin_email']
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
					url: base_url + 'add-data-admin.json',
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
			let id = data[1].replace("ADM00", "");
			$('#modal-read').modal('show');
			$.ajax({
				type: "GET",
				url: base_url + 'get-admin.json',
				data: {"id":id},
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						$('#e-id').val(result['data']['admin_id']);
						$('#e-nama').val(result['data']['admin_nama']);
						$('#e-email').val(result['data']['admin_email']);
						$('#e-password').val(result['data']['admin_password']);
					}else{
						Toast.fire({
							type: 'error',
							title: result['message']
						});
						$('#modal-read').modal('hide');
					}
				}
			});
		});

		$('#form-edit').submit(function () {
			const formData = new FormData($(this)[0]);
			if ($('#e-password').val() === $('#e-ulangi').val()) {
				$.ajax({
					type: "POST",
					url: base_url + 'update-data-admin.json',
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

		$('#btn-hapus').click(function () {
			$.ajax({
				type: "POST",
				url: base_url + 'delete-data-admin.json',
				data: {"id" : $('#e-id').val()},
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