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


}

/* End of file C_master.php */
/* Location: ./application/modules/admin/controllers/C_master.php */