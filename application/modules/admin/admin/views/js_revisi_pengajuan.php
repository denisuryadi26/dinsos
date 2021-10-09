<script>
	$(document).ready(function () {
		const base_url = "<?= base_url() ?>";
		const Toast = Swal.mixin({
	        toast: true,
	        position: 'center',
	        showConfirmButton: false,
	        timer: 5000
	    });
		let code = $('#tipe').val();
		$.ajax({
			type: "GET",
			url: base_url + 'admin-get-file-formulir.json',
			data: {"code": code},
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				$('#btn-download').attr('href', base_url + 'download-file?file=' +result['data']['formulir_file']);
			}
		});

	    $('#form-pengajuan').submit(function () {
	    	const formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: base_url + 'admin-revisi-pengajuan.json',
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
							window.location.href = base_url + 'admin-pengajuan-masuk.html';
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
	});
</script>