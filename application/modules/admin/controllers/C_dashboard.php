<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in != true || $this->session->level != 0) {
			redirect('user-login.html','refresh');
		}
		$this->load->library('template');
		$this->load->model('M_admin', 'admin');
	}

	public function index()
	{
		$data = $this->template->adminlte();
		$data['jml_user'] = count($this->admin->get('tbl_user'));
		$data['jml_pengajuan'] = count($this->admin->get('tbl_pengajuan'));
		$data['jml_pengajuan_diproses'] = count($this->admin->get_where('tbl_pengajuan', ['pengajuan_status' => 'diproses']));
		$data['jml_pengajuan_ditolak'] = count($this->admin->get_where('tbl_pengajuan', ['pengajuan_status' => 'ditolak']));
		$data['jml_pengajuan_dipending'] = count($this->admin->get_where('tbl_pengajuan', ['pengajuan_status' => 'dipending']));
		$data['jml_pengajuan_diterima'] = count($this->admin->get_where('tbl_pengajuan', ['pengajuan_status' => 'diterima']));
		$data['title'] = 'Dashboard';
		$data['content'] = 'admin/dashboard';
		$this->load->view('template/template', $data);
	}

}

/* End of file C_dashboard.php */
/* Location: ./application/modules/admin/controllers/C_dashboard.php */