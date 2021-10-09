<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_website extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_website', 'website');
	}

	public function index()
	{
		$this->load->view('website');
	}

	public function index_cek()
	{
		if (empty($this->input->get('code'))) {
			redirect('landing-page.html','refresh');
		}
		$data['data'] = $this->website->get_pengajuan(['pengajuan_code' => $this->input->get('code')]);
		if (empty($data['data'])) {
			redirect('landing-page.html','refresh');
		}
		$this->load->view('website_cek', $data);
	}

}

/* End of file C_website.php */
/* Location: ./application/modules/website/controllers/C_website.php */