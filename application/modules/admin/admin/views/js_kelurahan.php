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
			url: base_url + 'get-all-kelurahan.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				let no = 1;
				$.each(result['data'], function (d, data) {
					let hasil = {
						0: no,
						1: data['kode_kelurahan'],
						2: data['nama_kelurahan'],
						3: data['nama_kecamatan'],
						4: '<a href="'+ base_url +'download-file?file='+ data['photo_kelurahan'] +'">' + data['photo_kelurahan'] + '</a>'
					};
					table.row.add(hasil).draw();
					no++;
				});
				console.log(result);
			}
		});

		$.ajax({
			type: "GET",
			url: base_url + 'get-all-kecamatan.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				$.each(result['data'], function (d, data) {
					$('#tipe').append('<option value="'+ data['kode_kecamatan'] +'">'+ data['nama_kecamatan'] +'</option>');
				});
			}
		});

		$('#tipe').change(function () {
			let code = $('#tipe').val();
			$.ajax({
				type: "GET",
				url: base_url + 'get-kecamatan.json',
				data: {"kode_kecamatan": code},
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					console.log(response);
					// $('#btn-download').attr('href', base_url + 'user-download-formulir?file=' +result['data']['formulir_file']);
				}
			});
		});

		$('#btn-modal-tambah').click(function () {
			$('#modal-tambah').modal('show');
		});

		$('#form-tambah').submit(function () {
			const formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: base_url + 'add-data-kelurahan.json',
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
				url: base_url + 'get-kelurahan.json',
				data: {"kode_kelurahan":id},
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						$('#e-kode').val(result['data']['kode_kelurahan']);
						$('#e-nama').val(result['data']['nama_kelurahan']);
						$('#e-tipe').val(result['data']['kode_kecamatan']);
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
				url: base_url + 'update-data-kelurahan.json',
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
				url: base_url + 'delete-data-kelurahan.json',
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