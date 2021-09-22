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
			url: base_url + 'get-all-formulir.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				let no = 1;
				$.each(result['data'], function (d, data) {
					let hasil = {
						0: no,
						1: data['formulir_code'],
						2: data['formulir_deskripsi'],
						3: '<a href="'+ base_url +'download-file?file='+ data['formulir_file'] +'">' + data['formulir_file'] + '</a>'
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
			$.ajax({
				type: "POST",
				url: base_url + 'add-data-formulir.json',
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
			return false;
		});

		$('#tbl_data tbody').on('click', 'tr', function () {
			let data = table.row( this ).data();
			let id = data[1];
			$('#modal-read').modal('show');
			$.ajax({
				type: "GET",
				url: base_url + 'get-formulir.json',
				data: {"code":id},
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						$('#e-code').val(result['data']['formulir_code']);
						$('#e-tipe').val(result['data']['formulir_deskripsi']);
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
			$.ajax({
				type: "POST",
				url: base_url + 'update-data-formulir.json',
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
			return false;
		});

		$('#btn-hapus').click(function () {
			$.ajax({
				type: "POST",
				url: base_url + 'delete-data-formulir.json',
				data: {"id" : $('#e-code').val()},
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