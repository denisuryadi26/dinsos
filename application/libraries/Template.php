<?php 
class Template{

	private $CI;

    function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->helper('form');
    }

	function adminlte()
	{
		$data['head'] = 'template/head';
		$data['side'] = 'template/sidebar';
		$data['footer'] = 'template/footer';
		$data['javascript'] = 'template/javascript';
		return $data;
	}

	function _is_ajax()
    {
        if (!$this->CI->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
    }

}