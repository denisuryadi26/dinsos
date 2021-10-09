<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_formulir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in != true || $this->session->level != 0) {
			redirect('user-login.html','refresh');
		}
		$this->load->model('M_admin', 'admin');
		$this->load->library('template');	
	}

	public function index()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Formulir';
		$data['js'] = 'admin/js_formulir';
		$data['content'] = 'admin/formulir';
		$this->load->view('template/template', $data);
	}

	public function get_all_formulir()
	{
		$this->template->_is_ajax();
		$result = $this->admin->get_all_formulir();

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

	public function get_formulir()
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

	public function tambah_data_formulir()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

		$data = [
			'formulir_code' => $this->input->post('code'),
			'formulir_deskripsi' => $this->input->post('tipe')
		];
		$cek = $this->admin->get_where_row('tbl_formulir', ['formulir_code' => $data['formulir_code']]);
		if ($cek['formulir_code'] === $data['formulir_code']) {
			$response = [
				'status' => false,
				'title' => 'Gagal',
				'message' => 'Gagal menambah data! Code sudah digunakan'
			];
		}else{
			if($this->upload->do_upload('file')){
				$foto = [
					'formulir_file' => $this->upload->data('file_name')
				];
				$data = array_merge($data, $foto);
				chmod($this->upload->data('full_path'), 0777);
			}
			$tambah = $this->admin->insert('tbl_formulir', $data);
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

	public function ubah_data_formulir()
	{
		$this->template->_is_ajax();
		$config['upload_path'] = './uploads/document/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $data = [
			'formulir_code' => $this->input->post('e-code'),
			'formulir_deskripsi' => $this->input->post('e-tipe')
		];
		if($this->upload->do_upload('e-file')){
			$foto = [
				'formulir_file' => $this->upload->data('file_name')
			];
			$data = array_merge($data, $foto);
			chmod($this->upload->data('full_path'), 0777);
		}
		$update = $this->admin->update('tbl_formulir', $data, ['formulir_code' => $data['formulir_code']]);
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

	public function hapus_data_formulir()
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

	public function download()
	{
		$this->load->helper('download');
		force_download('./uploads/document/' . $this->input->get('file'), NULL);
		exit();
	}

}

/* End of file C_formulir.php */
/* Location: ./application/modules/admin/controllers/C_formulir.php */