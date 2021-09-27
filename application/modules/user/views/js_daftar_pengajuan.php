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

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">Detail</a>'+
							' &nbsp;<a href="user-revisi.html?code='+ data['pengajuan_code'] +'" class="badge bg-success">Revisi</a>';
					}else if(data['pengajuan_status'] == 'diterima'){
						status = '<span class="badge bg-success">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">Detail</a>';
					}else if(data['pengajuan_status'] == 'dipending'){
						status = '<span class="badge bg-warning">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">Detail</a>';
					}else{
						status =
						'<span class="badge bg-danger">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-warning">Detail</a>';
					}


					// let hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
					// let bulan = ['Januari', 'Februari', 'Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

					// let tanggal = new Date().getDate(pengajuan_tgl);
					// let xhari = new Date().getDay(pengajuan_tgl);
					// let xbulan = new Date().getMonth(pengajuan_tgl);
					// let xtahun = new Date().getYear(pengajuan_tgl);

					// let hari = hari[xhari];
					// let bulan = bulan[xbulan];
					// let tahun = (xtahun < 1000)?xtahun + 1900 : xtahun;
					let hasil = {
						0: no,
						1: data['pengajuan_code'],
						2: data['formulir_deskripsi'],
						3: data['pengajuan_tgl'],
						4: status,
						5: revisi
					};
					table.row.add(hasil).draw();
					no++;
					console.log(data['pengajuan_tgl']);
				});
			}
		});
	});
</script>