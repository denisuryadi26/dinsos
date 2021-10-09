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
			url: base_url + 'get-all-kecamatan.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				let no = 1;
				$.each(result['data'], function (d, data) {
					let hasil = {
						0: no,
						1: data['kode_kecamatan'],
						2: data['nama_kecamatan'],
						3: '<a href="'+ base_url +'download-file?file='+ data['photo_kecamatan'] +'">' + data['photo_kecamatan'] + '</a>'
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
				url: base_url + 'add-data-kecamatan.json',
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
				url: base_url + 'get-kecamatan.json',
				data: {"kode_kecamatan":id},
				dataType: "json",
				success: function (response) {
					result = JSON.parse(JSON.stringify(response));
					if (result['status'] == true) {
						$('#e-kode').val(result['data']['kode_kecamatan']);
						$('#e-nama').val(result['data']['nama_kecamatan']);
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
				url: base_url + 'update-data-kecamatan.json',
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
				url: base_url + 'delete-data-kecamatan.json',
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