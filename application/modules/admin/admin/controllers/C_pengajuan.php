<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in != true || $this->session->level != 0) {
			redirect('user-login.html','refresh');
		}
		$this->load->library('Template');
		$this->load->model('M_admin', 'admin');
	}

	public function index_masuk()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Pengajuan Masuk';
		$data['js'] = 'js_pengajuan';
		$data['content'] = 'admin/pengajuan_masuk';
		$this->load->view('template/template', $data);
	}

	public function viewpdf ($file)
	{
		if (empty($this->input->get('code'))) {
			redirect('admin-pengajuan-masuk.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->admin->get_pengajuan(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		$data['title'] = 'Pengajuan Detail';
		$data['js'] = 'js_pengajuan';
		$data['content'] = 'admin/pengajuan_detail';
		$this->load->view('template/template', $data);
	}

	public function index_diterima()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Pengajuan Diterima / Sah';
		$data['js'] = 'js_pengajuan';
		$data['content'] = 'admin/pengajuan_diterima';
		$this->load->view('template/template', $data);
	}

	public function index_ditolak()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Pengajuan Ditolak';
		$data['js'] = 'js_pengajuan';
		$data['content'] = 'admin/pengajuan_ditolak';
		$this->load->view('template/template', $data);
	}

	public function index_diproses()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Pengajuan Diproses';
		$data['js'] = 'js_pengajuan';
		$data['content'] = 'admin/pengajuan_diproses';
		$this->load->view('template/template', $data);
	}

	public function index_daftar()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Daftar Pengajuan';
		$data['js'] = 'admin/js_daftar_pengajuan';
		$data['content'] = 'admin/daftar_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function index_detail()
	{
		if (empty($this->input->get('code'))) {
			redirect('admin-pengajuan-masuk.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->admin->get_pengajuan(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		$data['title'] = 'Pengajuan Detail';
		$data['js'] = 'js_pengajuan';
		$data['content'] = 'admin/pengajuan_detail';
		$this->load->view('template/template', $data);
	}

	public function index_update()
	{
		if (empty($this->input->get('code'))) {
			redirect('uadmin-pengajuan-masuk.html','refresh');
		}
		$data = $this->template->adminlte();
		$data['data'] = $this->admin->get_pengajuan(['tbl_pengajuan.pengajuan_code' => $this->input->get('code')]);
		$data['title'] = 'Revisi Pengajuan';
		$data['js'] = 'admin/js_revisi_pengajuan';
		$data['content'] = 'admin/revisi_pengajuan';
		$this->load->view('template/template', $data);
	}

	public function get_all_pengajuan()
	{
		$this->template->_is_ajax();
		$where = [
			'tbl_pengajuan.pengajuan_status' => $this->input->get('status')
		];
		$result = $this->admin->get_all_pengajuan($where);

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

	public function verifikasi_pengajuan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$data = [
			'detail_ket' => $this->input->post('keterangan'),
			'detail_status' => $this->input->post('status'),
			'pengajuan_code' => $this->input->post('code'),
			'admin_id' => $this->session->nik,
			'detail_tgl' => date('Y-m-d H:i:s')
		];
		$aktifitas = [
			'pengajuan_code' => $this->input->post('code'),
			'aktifitas_des' => $this->input->post('status'),
			'aktifitas_tgl' => date('Y-m-d H:i:s')
		];
		$this->admin->insert('tbl_aktifitas', $aktifitas);

		$cek = $this->admin->get_where_row('tbl_pengajuan_detail', ['pengajuan_code' => $data['pengajuan_code']]);
		if (!empty($cek)) {
			$delete = $this->admin->delete('tbl_pengajuan_detail', ['pengajuan_code' => $data['pengajuan_code']]);
		}
		if($this->upload->do_upload('file')){
			$foto = [
				'detail_file' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
			chmod($this->upload->data('full_path'), 0777);
		}
		$insert = $this->admin->insert('tbl_pengajuan_detail', $data);
		if ($insert) {
			$ubah = $this->admin->update('tbl_pengajuan', ['pengajuan_status' => $data['detail_status']], ['pengajuan_code' => $data['pengajuan_code']]);
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Pengajuan telah diverifikasi'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Pengajuan gagal diverifikasi! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function terima_pengajuan()
	{
		$this->template->_is_ajax();
		$ubah = $this->admin->update('tbl_pengajuan', ['pengajuan_status' => 'diterima/sah'], ['pengajuan_code' => $this->input->post('code')]);
		if ($ubah) {
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Pengajuan telah diterima/sah'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Pengajuan gagal terkirim! Silahkan ulangi beberapa saat lagi'
			];
		}
		echo json_encode($response);
	}

	public function tolak_pengajuan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$data = [
			'penolakan_ket' => $this->input->post('keterangan'),
			'pengajuan_code' => $this->input->post('code'),
			'admin_id' => $this->session->nik,
			'penolakan_tgl' => date('Y-m-d H:i:s')
		];
		$cek = $this->admin->get_where_row('tbl_pengajuan', ['pengajuan_code' => $data['pengajuan_code']]);
		if ($cek['pengajuan_status'] != 'masuk') {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Pengajuan gagal ditolak! Silahkan ulangi beberapa saat lagi'
			];
		}else{
			if($this->upload->do_upload('file')){
				$foto = [
					'penolakan_file' => $this->upload->data('file_name')
				];
				$data = array_merge($data, $foto);
				chmod($this->upload->data('full_path'), 0777);
			}
			$tolak = $this->admin->insert('tbl_penolakan', $data);
			if ($tolak) {
				$ubah = $this->admin->update('tbl_pengajuan', ['pengajuan_status' => 'ditolak'], ['pengajuan_code' => $data['pengajuan_code']]);
				$response = [
					'status' => true,
					'title' => 'Berhasil',
					'message' => 'Pengajuan telah ditolak'
				];
			}else{
				$response = [
					'status' => false,
					'title' => 'Gagal',
					'message' => 'Pengajuan gagal ditolak! Silahkan ulangi beberapa saat lagi'
				];
			}
		}
		echo json_encode($response);
	}

	public function pending_pengajuan()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$data = [
			'pending_ket' => $this->input->post('keterangan'),
			'pengajuan_code' => $this->input->post('code'),
			'admin_id' => $this->session->nik,
			'pending_tgl' => date('Y-m-d H:i:s')
		];
		if($this->upload->do_upload('file')){
			$foto = [
				'pending_file' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
			chmod($this->upload->data('full_path'), 0777);
		}
		$tolak = $this->admin->insert('tbl_pending', $data);
		if ($tolak) {
			$ubah = $this->admin->update('tbl_pengajuan', ['pengajuan_status' => 'diproses'], ['pengajuan_code' => $data['pengajuan_code']]);
			$response = [
				'status' => true,
				'title' => 'Berhasil',
				'message' => 'Pengajuan telah ditolak'
			];
		}else{
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Pengajuan gagal ditolak! Silahkan ulangi beberapa saat lagi'
			];
		}
		// $cek = $this->admin->get_where_row('tbl_pengajuan', ['pengajuan_code' => $data['pengajuan_code']]);
		// if ($cek['pengajuan_status'] != 'masuk') {
		// 	$response = [
		// 		'status' => false,
		// 		'title' => 'Gagal',
		// 		'message' => 'Pengajuan gagal ditolak! Silahkan ulangi beberapa saat lagi'
		// 	];
		// }else{
			
		// }
		echo json_encode($response);
	}

	public function get_file_formulir()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_where_row('tbl_formulir', ['formulir_code' => $this->input->get('code')]);

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

	public function revisi_pengajuan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
		// delete dulu 
		$delete_pengajuan = $this->admin->delete('tbl_pengajuan', ['pengajuan_code' => $this->input->post('code')]);
		$delete_status = $this->admin->delete('tbl_pengajuan_detail', ['pengajuan_code' => $this->input->post('code')]);

		$this->upload->do_upload('formulir');
		$formulir = $this->upload->data();

		// $this->upload->do_upload('file');
		// $file = $this->upload->data();

		chmod($formulir['full_path'], 0777);
		// chmod($file['full_path'], 0777);

		$data = [
			'pengajuan_code' => $this->input->post('code'),
			'user_nik' => $this->input->post('nik'),
			'formulir_code' => $this->input->post('tipe'),
			'pengajuan_formulir' => $formulir['file_name'],
			// 'pengajuan_file' => $file['file_name'],
			'pengajuan_tgl' => date('Y-m-d H:i:s')
		];

		$aktifitas = [
			'pengajuan_code' => $data['pengajuan_code'],
			'aktifitas_des' => 'direvisi',
			'aktifitas_tgl' => date('Y-m-d H:i:s')
		];
		$this->admin->insert('tbl_aktifitas', $aktifitas);

		$tambah = $this->admin->insert('tbl_pengajuan', $data);
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

		echo json_encode($response);
	}

}

/* End of file C_pengajuan.php */
/* Location: ./application/modules/admin/controllers/C_pengajuan.php */