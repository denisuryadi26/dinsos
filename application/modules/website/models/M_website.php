<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_website extends CI_Model {

	function get_pengajuan($where)
	{
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left');
		$this->db->where($where);
		$this->db->order_by('tbl_pengajuan.pengajuan_tgl', 'desc');
		$query = $this->db->get('tbl_pengajuan');
		return $query->row_array();
	}

}

/* End of file M_website.php */
/* Location: ./application/modules/website/models/M_website.php */