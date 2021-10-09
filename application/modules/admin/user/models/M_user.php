<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

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

	function get_all_formulir()
	{
		$this->db->order_by('formulir_code', 'asc');
		$query = $this->db->get('tbl_formulir');
		return $query->result_array();
	}

	function get_all_pengajuan($where)
	{
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left');
		$this->db->where($where);
		$this->db->order_by('tbl_pengajuan.pengajuan_tgl', 'desc');
		$query = $this->db->get('tbl_pengajuan');
		return $query->result_array();
	}

	function get_pengajuan($where)
	{
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left');
		$this->db->where($where);
		$this->db->order_by('tbl_pengajuan.pengajuan_tgl', 'desc');
		$query = $this->db->get('tbl_pengajuan');
		return $query->row_array();
	}

	function get_penolakan($where)
	{
		$this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl_penolakan.admin_id', 'left');
		$this->db->join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_code = tbl_penolakan.pengajuan_code', 'left');
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->where($where);
		$query = $this->db->get('tbl_penolakan');
		return $query->row_array();
	}

	function get_detail($where)
	{
		$this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl_pengajuan_detail.admin_id', 'left');
		$this->db->join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_code = tbl_pengajuan_detail.pengajuan_code', 'left');
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->where($where);
		$query = $this->db->get('tbl_pengajuan_detail');
		return $query->row_array();
	}

	function get_pending($where)
	{
		$this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl_pengajuan_detail.admin_id', 'left');
		$this->db->join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_code = tbl_pengajuan_detail.pengajuan_code', 'left');
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->where($where);
		$query = $this->db->get('tbl_pending');
		return $query->row_array();
	}

	function get_ditolak($where)
	{
		$this->db->join('tbl_admin', 'tbl_admin.admin_id = tbl_pengajuan_detail.admin_id', 'left');
		$this->db->join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_code = tbl_pengajuan_detail.pengajuan_code', 'left');
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->where($where);
		$query = $this->db->get('tbl_penolakan');
		return $query->row_array();
	}

}

/* End of file M_user.php */
/* Location: ./application/modules/user/models/M_user.php */