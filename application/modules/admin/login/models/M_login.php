<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function user($where)
	{
		$query = $this->db->get_where('tbl_user', $where);
		return $query->row_array();
	}

	function admin($where)
	{
		$query = $this->db->get_where('tbl_admin', $where);
		return $query->row_array();
	}

	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return true;
	}

	function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
		return true;
	}

	function delete($table, $where)
	{
		$this->db->delete($table, $where);
		return true;
	}

	function get_where_row($table, $where)
	{
		$query = $this->db->get_where($table, $where);
		return $query->row_array();
	}

}

/* End of file M_login.php */
/* Location: ./application/modules/login/models/M_login.php */