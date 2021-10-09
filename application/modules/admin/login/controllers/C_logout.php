<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_logout extends CI_Controller {

	public function index()
	{
		session_destroy();
		redirect('user-login.html','refresh');
	}

}

/* End of file C_logout.php */
/* Location: ./application/modules/login/controllers/C_logout.php */