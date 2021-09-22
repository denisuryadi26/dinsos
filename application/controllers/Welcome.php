<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/M_admin', 'admin');
	}
	public function index()
	{
		$dari = '2019-11-16';
		$sampai = '2019-11-17';
		$status = 'diterima';
		if ($status == 'semua') {
			$where = "(tbl_pengajuan.pengajuan_status = 'diproses' OR tbl_pengajuan.pengajuan_status = 'ditolak' OR tbl_pengajuan.pengajuan_status = 'diterima') AND DATE_FORMAT(tbl_pengajuan.pengajuan_tgl, '%Y-%m-%d' ) BETWEEN '".$dari."' AND '".$sampai."'";
		}else{
			$where = "tbl_pengajuan.pengajuan_status = '" . $status . "' AND DATE_FORMAT(tbl_pengajuan.pengajuan_tgl, '%Y-%m-%d' ) BETWEEN '".$dari."' AND '".$sampai."'";
		}
		$result = $this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left')->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left')->where($where)->get('tbl_pengajuan')->result_array();
		
		$html = 
			'<h3 align="center">Laporan Pengajuan Permohonan</h3>
			<table align="center" border="1" cellpadding="10" cellspacing="0" id="printJS-form" style="width:100%;">
				<tr>
					<th rowspan="2">No</th>
					<th rowspan="2">Code</th>
					<th rowspan="2">Tipe</th>
					<th colspan="2">Oleh</th>
					<th rowspan="2">Status</th>
				</tr>
				<tr>
					<th>NIK</th>
					<th>Nama</th>
				</tr>';
		for ($i=0; $i < count($result); $i++) { 
			$html .= 
				'<tr>
					<td>1</td>
					<td>'. $result[$i]['pengajuan_code'] .'</td>
					<td>'. $result[$i]['formulir_deskripsi'] .'</td>
					<td>'. $result[$i]['user_nik'] .'</td>
					<td>'. $result[$i]['user_nama'] .'</td>
					<td>'. $result[$i]['pengajuan_status'] .'</td>
				</tr>';
		}
		$html .= 
			'</table>';

		$html2pdf = new Html2Pdf();
		$html2pdf->writeHTML($html);
		$html2pdf->output();
	}

}
