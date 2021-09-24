<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('M_login', 'login');
	}

	public function index()
	{
		if ($this->session->logged_in == true && $this->session->level == 1) {
			redirect('user-daftar-pengajuan.html','refresh');
		}
		$this->load->view('login');
	}

	public function index_admin()
	{
		if ($this->session->logged_in == true && $this->session->level == 0) {
			redirect('admin-dashboard.html','refresh');
		}
		$this->load->view('login_admin');
	}

	public function index_register()
	{
		$this->load->view('register');
	}

	public function auth_user()
	{
		$this->template->_is_ajax();

		$where = [
			'user_nik' => $this->input->post('nik'),
			'user_password' => $this->input->post('password')
		];
		$result = $this->login->user($where);
		if (empty($result)) {
			$response = [
				'message' => false
			];
		}else{
			$data = [
				'nik' => $result['user_nik'],
				'nama' => $result['user_nama'],
				'foto' => $result['user_foto'],
				'level' => 1,
				'logged_in' => true
			];
			$this->session->set_userdata($data);
			$response = [
				'message' => true
			];
		}
		echo json_encode($response);
	}

	public function auth_admin()
	{
		$this->template->_is_ajax();

		$where = [
			'admin_email' => $this->input->post('email'),
			'admin_password' => $this->input->post('password')
		];
		$result = $this->login->admin($where);
		if (empty($result)) {
			$response = [
				'message' => false
			];
		}else{
			$data = [
				'nik' => $result['admin_id'],
				'nama' => $result['admin_nama'],
				'foto' => $result['admin_foto'],
				'level' => 0,
				'logged_in' => true
			];
			$this->session->set_userdata($data);
			$response = [
				'message' => true
			];
		}
		echo json_encode($response);
	}

	public function register()
	{
		$data = [
			'user_nik' => $this->input->post('nik'),
			'user_instansi' => $this->input->post('instansi'),
			'user_nama' => $this->input->post('nama'),
			'user_tempat' => $this->input->post('tempat'),
			'user_tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
			'user_alamat' => $this->input->post('alamat'),
			'user_kelamin' => $this->input->post('kelamin'),
			'user_agama' => $this->input->post('agama'),
			'user_status' => $this->input->post('status'),
			'user_pekerjaan' => $this->input->post('pekerjaan'),
			'user_kebangsaan' => $this->input->post('kebangsaan'),
			'user_email' => $this->input->post('email'),
			'user_nohp' => $this->input->post('nohp'),
			'user_password' => $this->input->post('password')
		];
		$cek = $this->login->get_where_row('tbl_user', ['user_nik' => $data['user_nik']]);
		if ($cek['user_nik'] === $data['user_nik']) {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Pendaftaran gagal! NIK anda sudah terdaftar.'
			];
		}else{
			if ($data['user_kelamin'] == 'Laki-laki') {
				$foto = [
					'user_foto' => 'cowok.png'
				];
			}else{
				$foto = [
					'user_foto' => 'cewek.png'
				];
			}
			$data = array_merge($data, $foto);
			$tambah = $this->login->insert('tbl_user', $data);
			if ($tambah) {
				$response = [
					'status' => true,
					'title' => 'Berhasil',
					'message' => 'Pendaftaran berhasil!'
				];
			}else{
				$response = [
					'status' => false,
					'title' => 'Gagal',
					'message' => 'Pendaftaran gagal! Silahkan ulangi beberapa saat lagi'
				];
			}
		}
		echo json_encode($response);
	}

}

/* End of file C_login.php */
/* Location: ./application/modules/login/controllers/C_login.php */