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
					if (data['pengajuan_status'] == 'masuk') {
						status = '<span class="badge bg-primary">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-dark">Detail</a>'+
							' &nbsp;<a href="user-revisi.html?code='+ data['pengajuan_code'] +'" class="badge bg-success">Revisi</a>';
					}else if(data['pengajuan_status'] == 'diterima/sah'){
						status = '<span class="badge bg-success">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-detail-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-dark">Ambil</a>';
					}else if(data['pengajuan_status'] == 'diproses'){
						status = '<span class="badge bg-warning">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-proses-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-dark">Detail</a>';
					}else{
						status =
						'<span class="badge bg-danger">'+ data['pengajuan_status'] +'</span>';

						revisi = '<a href="user-ditolak-pengajuan.html?code='+ data['pengajuan_code'] +'" class="badge bg-dark">Detail</a>';
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
						1: data['pemohon_nama'],
						2: data['pemohon_nik'],
						3: data['pengajuan_code'],
						4: data['formulir_deskripsi'],
						5: data['pengajuan_tgl'],
						6: status,
						7: revisi
					};
					table.row.add(hasil).draw();
					no++;
					console.log(data['pengajuan_tgl']);
				});
			}
		});
	});
</script>