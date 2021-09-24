<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	function get_all_admin()
	{
		$this->db->order_by('admin_nama', 'asc');
		$query = $this->db->get('tbl_admin');
		return $query->result_array();
	}

	function get_all_user()
	{
		$this->db->order_by('user_nik', 'asc');
		$query = $this->db->get('tbl_user');
		return $query->result_array();
	}

	function get_all_formulir()
	{
		$this->db->order_by('formulir_code', 'asc');
		$query = $this->db->get('tbl_formulir');
		return $query->result_array();
	}

	function get_all_kecamatan()
	{
		$this->db->order_by('kode_kecamatan', 'asc');
		$query = $this->db->get('tbl_kecamatan');
		return $query->result_array();
	}

	function get($table)
	{
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function get_where($table, $where)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result_array();
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

	function get_all_pengajuan($where)
	{
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left');
		$this->db->where($where);
		$this->db->order_by('tbl_pengajuan.pengajuan_tgl', 'asc');
		$query = $this->db->get('tbl_pengajuan');
		return $query->result_array();
	}

	function get_pengajuan($where)
	{
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left');
		$this->db->where($where);
		$query = $this->db->get('tbl_pengajuan');
		return $query->row_array();
	}

	function report_pengajuan($dari, $sampai, $status)
	{
		if ($status == 'semua') {
			$where = "(tbl_pengajuan.pengajuan_status = 'diproses' OR tbl_pengajuan.pengajuan_status = 'ditolak' OR tbl_pengajuan.pengajuan_status = 'dipending' OR tbl_pengajuan.pengajuan_status = 'diterima') AND DATE_FORMAT(tbl_pengajuan.pengajuan_tgl, '%Y-%m-%d' ) BETWEEN '".$dari."' AND '".$sampai."'";
		}else{
			$where = "tbl_pengajuan.pengajuan_status = '" . $status . "' AND DATE_FORMAT(tbl_pengajuan.pengajuan_tgl, '%Y-%m-%d' ) BETWEEN '".$dari."' AND '".$sampai."'";
		}
		$this->db->select('*');
		$this->db->from('tbl_pengajuan');
		$this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left');
		$this->db->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left');
		$this->db->where($where);
		$this->db->order_by('tbl_pengajuan.pengajuan_tgl', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file M_admin.php */
/* Location: ./application/modules/admin/models/M_admin.php */