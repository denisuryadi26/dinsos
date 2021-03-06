<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in != true || $this->session->level != 0) {
			redirect('user-login.html','refresh');
		}
		$this->load->model('M_admin', 'admin');
		$this->load->library('template');
	}

	public function view_user()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Daftar User';
		$data['js'] = 'admin/js_user';
		$data['content'] = 'admin/user';
		$this->load->view('template/template', $data);
	}

	public function view_admin()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Daftar Admin';
		$data['js'] = 'admin/js_admin';
		$data['content'] = 'admin/admin';
		$this->load->view('template/template', $data);
	}

	public function view_kecamatan()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Daftar Kecamatan';
		$data['js'] = 'admin/js_kecamatan';
		$data['content'] = 'admin/kecamatan';
		$this->load->view('template/template', $data);
	}

	public function view_kelurahan()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Daftar Kelurahan';
		$data['js'] = 'admin/js_kelurahan';
		$data['content'] = 'admin/kelurahan';
		$this->load->view('template/template', $data);
	}

	public function get_all_admin()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_all_admin();

		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Tidak ada data!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function get_all_user()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_all_user();

		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Tidak ada data!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function get_admin()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_where_row('tbl_admin', ['admin_id' => $this->input->get('id')]);

		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Data tidak ditemukan!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function get_user()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_where_row('tbl_user', ['user_nik' => $this->input->get('id')]);

		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Data tidak ditemukan!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function tambah_data_admin()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/pictures/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

		$data = [
			'admin_nama' => $this->input->post('nama'),
			'admin_email' => $this->input->post('email'),
			'admin_password' => $this->input->post('password')
		];
		$cari = $this->admin->get_where_row('tbl_admin', ['admin_email' => $data['admin_email']]);
		if ($cari['admin_email'] === $data['admin_email']) {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Email sudah digunakan, silahkan masukan email lain!'
			];
		}else{
			if($this->upload->do_upload('foto')){
				$foto = [
					'admin_foto' => $this->upload->data('file_name')
				];
				$data = array_merge($data, $foto);
			}
			$tambah = $this->admin->insert('tbl_admin', $data);
			if ($tambah) {
				$response = [
					'status' => true,
					'title' => 'Berhasil',
					'message' => 'Berhasil menambah data!'
				];
			}else{
				$response = [
					'status' => false,
					'title' => 'Gagal',
					'message' => 'Gagal menambah data! Silahkan ulangi beberapa saat lagi'
				];
			}
		}
		echo json_encode($response);
	}

	public function ubah_data_admin()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/pictures/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

		$data = [
			'admin_nama' => $this->input->post('e-nama'),
			'admin_email' => $this->input->post('e-email'),
			'admin_password' => $this->input->post('e-password')
		];
		if($this->upload->do_upload('e-foto')){
			$foto = [
				'admin_foto' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
		}
		$ubah = $this->admin->update('tbl_admin', $data, ['admin_id' => $this->input->post('e-id')]);
		if ($ubah) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil mengubah data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal mengubah data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function hapus_data_admin()
	{
		$this->template->_is_ajax();
		$where = [
			'admin_id' => $this->input->post('id')
		];
		$hapus = $this->admin->delete('tbl_admin', $where);
		if ($hapus) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil menghapus data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal menghapus data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	// public function tambah_data_user()
	// {
	// 	$this->template->_is_ajax();
	// 	$config['upload_path'] = './uploads/pictures/';
    //     $config['allowed_types'] = 'jpg|png';
    //     $config['encrypt_name'] = true;
    //     $this->load->library('upload', $config);

	// 	$data = [
	// 		'user_nik' => $this->input->post('nik'),
	// 		'user_instansi' => $this->input->post('instansi'),
	// 		'user_nama' => $this->input->post('nama'),
	// 		'user_tempat' => $this->input->post('tempat'),
	// 		'user_tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
	// 		'user_alamat' => $this->input->post('alamat'),
	// 		'user_kelamin' => $this->input->post('kelamin'),
	// 		'user_agama' => $this->input->post('agama'),
	// 		'user_status' => $this->input->post('status'),
	// 		'user_pekerjaan' => $this->input->post('pekerjaan'),
	// 		'user_kebangsaan' => $this->input->post('kebangsaan'),
	// 		'user_email' => $this->input->post('email'),
	// 		'user_nohp' => $this->input->post('nohp'),
	// 		'user_password' => $this->input->post('password')
	// 	];
	// 	$cek = $this->login->get_where_row('tbl_user', ['user_nik' => $data['user_nik']]);
	// 	if ($cek['user_nik'] === $data['user_nik']) {
	// 		$response = [
	// 			'status' => false,
	// 			'title' => 'Gagal',
	// 			'message' => 'Pendaftaran gagal! NIK anda sudah terdaftar.'
	// 		];
	// 	}else{
	// 		if ($data['user_kelamin'] == 'Laki-laki') {
	// 			$foto = [
	// 				'user_foto' => 'cowok.png'
	// 			];
	// 		}else{
	// 			$foto = [
	// 				'user_foto' => 'cewek.png'
	// 			];
	// 		}
	// 		$data = array_merge($data, $foto);
	// 		$tambah = $this->login->insert('tbl_user', $data);
	// 		if ($tambah) {
	// 			$response = [
	// 				'status' => true,
	// 				'title' => 'Berhasil',
	// 				'message' => 'Pendaftaran berhasil!'
	// 			];
	// 		}else{
	// 			$response = [
	// 				'status' => false,
	// 				'title' => 'Gagal',
	// 				'message' => 'Pendaftaran gagal! Silahkan ulangi beberapa saat lagi'
	// 			];
	// 		}
	// 	}
	// 	echo json_encode($response);
	// }

	public function ubah_data_user()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/pictures/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

		$data = [
			'user_nik' => $this->input->post('e-nik'),
			'user_instansi' => $this->input->post('e-instansi'),
			'user_nama' => $this->input->post('e-nama'),
			'user_tempat' => $this->input->post('e-tempat'),
			'user_tanggal' => date('Y-m-d', strtotime($this->input->post('e-tanggal'))),
			'user_alamat' => $this->input->post('e-alamat'),
			'user_kelamin' => $this->input->post('e-kelamin'),
			'user_agama' => $this->input->post('e-agama'),
			'user_status' => $this->input->post('e-status'),
			'user_pekerjaan' => $this->input->post('e-pekerjaan'),
			'user_kebangsaan' => $this->input->post('e-kebangsaan'),
			'user_email' => $this->input->post('e-email'),
			'user_nohp' => $this->input->post('e-nohp'),
			'user_password' => $this->input->post('e-password')
		];
		if($this->upload->do_upload('e-foto')){
			$foto = [
				'user_foto' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
		}
		$ubah = $this->admin->update('tbl_user', $data, ['user_nik' => $this->input->post('e-user_nik')]);
		if ($ubah) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil mengubah data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal mengubah data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function hapus_data_user()
    {
        $this->template->_is_ajax();

        $where = [
            'user_nik' => $this->input->post('id')
                                ];

        // Cek Nik Di Tabel Pengajuan
        $pengajuan            = $this->admin->get_where('tbl_pengajuan', ['user_nik'  => $where['user_nik']]);

        // Cek Code Pengajuan Berdasar NIK
        $pengajuankode        = $this->admin->get_where('tbl_pengajuan_detail', ['pengajuan_code'  => $pengajuan[0]['pengajuan_code']]);

        // Hapus Pengajuan Detail
        $hapusPengajuanDetail = $this->admin->delete('tbl_pengajuan_detail', ['pengajuan_code'  => $pengajuankode[0]['pengajuan_code']]);

        // Hapus Pengajuan
        $hapusPengajuan       = $this->admin->delete('tbl_pengajuan', ['user_nik'  => $where['user_nik']]);

        $hapus = $this->admin->delete('tbl_user', $where);

        if ($hapus) {
            $response = [
                'status' => true,
                'title' => 'Berhasil',
                'message' => 'Berhasil menghapus data!'
            ];
        } else {
            $response = [
            'status' => false,
            'title' => 'Gagal',
            'message' => 'Gagal menghapus data! Silahkan ulangi beberapa saat lagi'
        ];
        }
        echo json_encode($response);
    }

	public function get_all_kecamatan()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_all_kecamatan();

		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Tidak ada data!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function get_kecamatan()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_where_row('tbl_kecamatan', ['kode_kecamatan' => $this->input->get('kode_kecamatan')]);
		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Tidak ada data!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function tambah_data_kecamatan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$data = [
			'kode_kecamatan' => $this->input->post('kode_kecamatan'),
			'nama_kecamatan' => $this->input->post('nama_kecamatan')
		];
		$cek = $this->admin->get_where_row('tbl_kecamatan', ['kode_kecamatan' => $data['kode_kecamatan']]);
		if ($cek['kode_kecamatan'] === $data['kode_kecamatan']) {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal menambah data! Code sudah digunakan'
			];
		}else{
			if($this->upload->do_upload('file')){
				$foto = [
					'photo_kecamatan' => $this->upload->data('file_name')
				];
				$data = array_merge($data, $foto);
				chmod($this->upload->data('full_path'), 0777);
			}
			$tambah = $this->admin->insert('tbl_kecamatan', $data);
			if ($tambah) {
				$response = [
					'status' => true,
					'title' => 'Berhasil',
					'message' => 'Berhasil menambah data!'
				];
			}else{
				$response = [
					'status' => false,
					'title' => 'Gagal',
					'message' => 'Gagal menambah data! Silahkan ulangi beberapa saat lagi'
				];
			}
		}
		echo json_encode($response);
	}

	public function ubah_data_kecamatan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $data = [
			'kode_kecamatan' => $this->input->post('e-kode'),
			'nama_kecamatan' => $this->input->post('e-nama')
		];
		if($this->upload->do_upload('e-file')){
			$foto = [
				'photo_kecamatan' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
			chmod($this->upload->data('full_path'), 0777);
		}
		$update = $this->admin->update('tbl_kecamatan', $data, ['kode_kecamatan' => $data['kode_kecamatan']]);
		if ($update) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil mengubah data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal mengubah data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function hapus_data_kecamatan()
	{
		$this->template->_is_ajax();
		$where = [
			'formulir_code' => $this->input->post('id')
		];
		$hapus = $this->admin->delete('tbl_formulir', $where);
		if ($hapus) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil menghapus data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal menghapus data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function download_pohoto_kecamatan()
	{
		$this->load->helper('download');
		force_download('./uploads/document/' . $this->input->get('file'), NULL);
		exit();
	}

	public function get_all_kelurahan()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_all_kelurahan();

		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Tidak ada data!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function get_kelurahan()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_where_row('tbl_kelurahan', ['kode_kelurahan' => $this->input->get('kode_kelurahan')]);
		if (empty($result)) {
			$response = [
				'status' => false,
				'message' => 'Tidak ada data!'
			];
		}else{
			$response = [
				'status' => true,
				'data' => $result
			];
		}

		echo json_encode($response);
	}

	public function tambah_data_kelurahan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$data = [
			'kode_kelurahan' => $this->input->post('kode_kelurahan'),
			'nama_kelurahan' => $this->input->post('nama_kelurahan'),
			'kode_kecamatan' => $this->input->post('tipe')
		];
		$cek = $this->admin->get_where_row('tbl_kelurahan', ['kode_kelurahan' => $data['kode_kelurahan']]);
		if ($cek['kode_kelurahan'] === $data['kode_kelurahan']) {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal menambah data! Code sudah digunakan'
			];
		}else{
			if($this->upload->do_upload('file')){
				$foto = [
					'photo_kelurahan' => $this->upload->data('file_name')
				];
				$data = array_merge($data, $foto);
				chmod($this->upload->data('full_path'), 0777);
			}
			$tambah = $this->admin->insert('tbl_kelurahan', $data);
			if ($tambah) {
				$response = [
					'status' => true,
					'title' => 'Berhasil',
					'message' => 'Berhasil menambah data!'
				];
			}else{
				$response = [
					'status' => false,
					'title' => 'Gagal',
					'message' => 'Gagal menambah data! Silahkan ulangi beberapa saat lagi'
				];
			}
		}
		echo json_encode($response);
	}

	public function ubah_data_kelurahan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $data = [
			'kode_kelurahan' => $this->input->post('e-kode'),
			'nama_kelurahan' => $this->input->post('e-nama'),
			'kode_kecamatan' => $this->input->post('e-tipe')
		];
		if($this->upload->do_upload('e-file')){
			$foto = [
				'photo_kelurahan' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
			chmod($this->upload->data('full_path'), 0777);
		}
		$update = $this->admin->update('tbl_kelurahan', $data, ['kode_kelurahan' => $data['kode_kelurahan']]);
		if ($update) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil mengubah data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal mengubah data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function hapus_data_kelurahan()
	{
		$this->template->_is_ajax();
		$where = [
			'formulir_code' => $this->input->post('id')
		];
		$hapus = $this->admin->delete('tbl_formulir', $where);
		if ($hapus) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Berhasil menghapus data!'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal menghapus data! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function download_pohoto_kelurahan()
	{
		$this->load->helper('download');
		force_download('./uploads/document/' . $this->input->get('file'), NULL);
		exit();
	}


}

/* End of file C_master.php */
/* Location: ./application/modules/admin/controllers/C_master.php */