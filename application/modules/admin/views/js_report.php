<script>
	$(document).ready(function () {
		$('.datepicker').datepicker();
		const base_url = '<?= base_url() ?>';

		$('#form-report').submit(function () {
			const formData = new FormData($(this)[0]);
			$.ajax({
				type: "POST",
				url: base_url + 'admin-pengajuan-report.json',
				data: formData,
				processData: false,
				contentType: false,
				dataType: "json",
				success: function (response) {
					$('#tbody tr').remove();
					result = JSON.parse(JSON.stringify(response));
					let no = 1;
					$.each(result, function (d, data) {
						let html = '<tr>'+
							'<td>'+ no +'</td>'+
							'<td>'+ data['pengajuan_code'] +'</td>'+
							'<td>'+ data['formulir_deskripsi'] +'</td>'+
							'<td>'+ data['user_nik'] +'</td>'+
							'<td>'+ data['user_nama'] +'</td>'+
							'<td>'+ data['pengajuan_status'] +'</td>'+
						'</tr>';
						$('#tbl_report').append(html);
						no++;
					});
				}
			});
			return false;
		});
		$('#btn-print').click(function () {
			printJS('print', 'html');
		});
	});
</script>