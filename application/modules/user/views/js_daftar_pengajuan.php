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
			url: base_url + 'user-get-all-pengajuan.json',
			processData: false,
			contentType: false,
			dataType: "json",
			success: function (response) {
				result = JSON.parse(JSON.stringify(response));
				let no = 1;
				$.each(result['data'], function (d, data) {
					let status, revisi;
					if (data['pengajuan_status'] == 'diproses') {
						status = '<span class="badge bg-info">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">detail</a>'+
							' &nbsp;<a href="user-revisi.html?code='+ data['pengajuan_code'] +'" class="badge bg-success">perbaharui</a>';
					}else if(data['pengajuan_status'] == 'diterima'){
						status = '<span class="badge bg-success">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">detail</a>';
					}else if(data['pengajuan_status'] == 'dipending'){
						status = '<span class="badge bg-warning">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">detail</a>';
					}else{
						status = 
						'<span class="badge bg-danger">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">detail</a>';
					}

					let hasil = {
						0: no,
						1: data['pengajuan_code'],
						2: data['formulir_deskripsi'],
						3: status,
						4: revisi
					};
					table.row.add(hasil).draw();
					no++;
				});
			}
		});
	});
</script>