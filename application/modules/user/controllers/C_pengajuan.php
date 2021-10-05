<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in != true || $this->session->level != 1) {
			redirect('user-login.html','refresh');
		}
		$this->load->library('Template');
		$this->load->model('M_user', 'user');
	}

	public function index_dashboard()
	{
		$data = $this->template->adminlte();
		$data['jml_pengajuan'] = $this->user->get_all_pengajuan(['tbl_pengajuan.user_nik' => $this->session->nik]);
		$data['title'] = 'Dashboard';
		$data['content'] = 'user/dashboard';
		$this->load->view('template/template', $data);
	}

	public function index_daftar()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Daftar Pengajuan';
		$data['js'] = 'user/js_daftar_pengajuan';
		$data['content'] = 'user/daftar_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function index_pengajuan()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Buat Pengajuan';
		$data['js'] = 'user/js_pengajuan';
		$data['content'] = 'user/pengajuan';
		$this->load->view('template/template', $data);
	}

	public function index_ditolak()
	{
		if (empty($this->input->get('code'))) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->user->get_penolakan(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		if (empty($data['data'])) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data['title'] = 'Pengajuan Ditolak';
		$data['content'] = 'user/tolak_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function index_detail()
	{
		if (empty($this->input->get('code'))) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->user->get_detail(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		if (empty($data['data'])) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data['title'] = 'Datail Pengajuan';
		$data['content'] = 'user/detail_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function index_revisi()
	{
		if (empty($this->input->get('code'))) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->user->get_penolakan(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		if (empty($data['data'])) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data['title'] = 'Revisi Pengajuan';
		$data['js'] = 'user/js_revisi_pengajuan';
		$data['content'] = 'user/revisi_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function index_update()
	{
		if (empty($this->input->get('code'))) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->user->get_pengajuan(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		$data['title'] = 'Revisi Pengajuan';
		$data['js'] = 'user/js_revisi_pengajuan';
		$data['content'] = 'user/revisi_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function tambah_pengajuan()
	{
		date_default_timezone_set('Asia/Jakarta');

		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$this->upload->do_upload('formulir');
		$formulir = $this->upload->data();

		// $this->upload->do_upload('file');
		// $file = $this->upload->data();

		chmod($formulir['full_path'], 0777);
		// chmod($file['full_path'], 0777);

		$data = [
			'pemohon_nama' => $this->input->post('nama_pemohon'),
			'pemohon_nik' => $this->input->post('nik_pemohon'),
			'pengajuan_code' => $this->_code(),
			'user_nik' => $this->session->nik,
			'formulir_code' => $this->input->post('tipe'),
			'pengajuan_formulir' => $formulir['file_name'],
			// 'pengajuan_file' => $file['file_name'],
			'pengajuan_tgl' => date('Y-m-d H:i:s')
		];

		$aktifitas = [
			'pengajuan_code' => $data['pengajuan_code'],
			'aktifitas_des' => 'diproses',
			'aktifitas_tgl' => date('Y-m-d H:i:s')
		];
		$this->user->insert('tbl_aktifitas', $aktifitas);

		$where = [
			'user_nik' => $this->session->nik,
			'formulir_code' => $data['formulir_code'],
			'pengajuan_status' => 'diproses'
		];

		$cek = $this->user->get_where_row('tbl_pengajuan', $where);

		if ($cek['user_nik'] === $this->session->nik && $cek['formulir_code'] === $data['formulir_code'] && $cek['pengajuan_status'] == 'diproses') {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal membuat permohonan! Permohonan pengajuan anda sedang diproses'
			];
		}else{
			$tambah = $this->user->insert('tbl_pengajuan', $data);
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

	public function revisi_pengajuan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
		// delete dulu 
		$delete_pengajuan = $this->user->delete('tbl_pengajuan', ['pengajuan_code' => $this->input->post('code')]);
		$delete_status = $this->user->delete('tbl_pengajuan_detail', ['pengajuan_code' => $this->input->post('code')]);

		$aktifitas = [
			'pengajuan_code' => $this->input->post('code'),
			'aktifitas_des' => 'direvisi',
			'aktifitas_tgl' => date('Y-m-d H:i:s')
		];
		$this->user->insert('tbl_aktifitas', $aktifitas);

		$this->upload->do_upload('formulir');
		$formulir = $this->upload->data();

		// $this->upload->do_upload('file');
		// $file = $this->upload->data();

		chmod($formulir['full_path'], 0777);
		// chmod($file['full_path'], 0777);

		$data = [
			'pemohon_nama' => $this->input->post('pnama'),
			'pemohon_nik' => $this->input->post('pnik'),
			'pengajuan_code' => $this->input->post('code'),
			'user_nik' => $this->session->nik,
			'formulir_code' => $this->input->post('tipe'),
			'pengajuan_formulir' => $formulir['file_name'],
			// 'pengajuan_file' => $file['file_name'],
			'pengajuan_tgl' => date('Y-m-d H:i:s')
		];

		$where = [
			'user_nik' => $this->session->nik,
			'formulir_code' => $data['formulir_code'],
			'pengajuan_status' => 'diproses'
		];

		$cek = $this->user->get_where_row('tbl_pengajuan', $where);

		if ($cek['user_nik'] === $this->session->nik && $cek['formulir_code'] === $data['formulir_code'] && $cek['pengajuan_status'] == 'diproses') {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal membuat permohonan! Permohonan pengajuan anda sedang diproses'
			];
		}else{
			$tambah = $this->user->insert('tbl_pengajuan', $data);
			if ($tambah) {
				$response = [
					'status' => true,
					'title' => 'Berhasil',
					'message' => 'Berhasil merivisi data!'
				];
			}else{
				$response = [
					'status' => false,
					'title' => 'Gagal',
					'message' => 'Gagal merevisi data! Silahkan ulangi beberapa saat lagi'
				];
			}
		}

		echo json_encode($response);
	}

	public function get_all_formulir()
	{
		$this->template->_is_ajax();
		$result = $this->user->get_all_formulir();

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

	public function get_all_pengajuan()
	{
		$this->template->_is_ajax();
		$where = ['tbl_pengajuan.user_nik' => $this->session->nik];
		$result = $this->user->get_all_pengajuan($where);

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

	public function get_file_formulir()
	{
		$this->template->_is_ajax();
		$result = $this->user->get_where_row('tbl_formulir', ['formulir_code' => $this->input->get('code')]);

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

	public function download()
	{
		$this->load->helper('download');
		force_download('./uploads/document/' . $this->input->get('file'), NULL);
		exit();
	}

	function _code()
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

}

/* End of file C_pengajuan.php */
/* Location: ./application/modules/user/controllers/C_pengajuan.php */