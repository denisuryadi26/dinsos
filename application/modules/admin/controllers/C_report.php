<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spipu\Html2Pdf\Html2Pdf;
class C_report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in != true || $this->session->level != 0) {
			redirect('user-login.html','refresh');
		}
		$this->load->model('M_admin', 'admin');
		$this->load->library('Template');
	}

	public function index()
	{
		$data = $this->template->adminlte();
		$data['title'] = 'Report';
		$data['js'] = 'admin/js_report';
		$data['content'] = 'admin/report';
		$this->load->view('template/template', $data);
	}

	public function report()
	{
		$dari = date('Y-m-d', strtotime($this->input->post('dari')));
		$sampai = date('Y-m-d', strtotime($this->input->post('sampai')));
		$status = $this->input->post('status');
		$result = $this->admin->report_pengajuan($dari, $sampai, $status);
		echo json_encode($result);
		// if ($status == 'semua') {
		// 	$where = "(tbl_pengajuan.pengajuan_status = 'diproses' OR tbl_pengajuan.pengajuan_status = 'ditolak' OR tbl_pengajuan.pengajuan_status = 'diterima' OR tbl_pengajuan.pengajuan_status = 'dipending') AND DATE_FORMAT(tbl_pengajuan.pengajuan_tgl, '%Y-%m-%d' ) BETWEEN '".$dari."' AND '".$sampai."'";
		// }else{
		// 	$where = "tbl_pengajuan.pengajuan_status = '" . $status . "' AND DATE_FORMAT(tbl_pengajuan.pengajuan_tgl, '%Y-%m-%d' ) BETWEEN '".$dari."' AND '".$sampai."'";
		// }
		// $result = $this->db->join('tbl_formulir', 'tbl_formulir.formulir_code = tbl_pengajuan.formulir_code', 'left')->join('tbl_user', 'tbl_user.user_nik = tbl_pengajuan.user_nik', 'left')->where($where)->get('tbl_pengajuan')->result_array();
		// $no = 1;
		// $html = 
		// 	'<h3 align="center">Laporan Pengajuan Permohonan</h3>
		// 	<table align="center" border="1" cellpadding="10" cellspacing="0">
		// 		<tr>
		// 			<th rowspan="2">No</th>
		// 			<th rowspan="2">Code</th>
		// 			<th rowspan="2">Tipe</th>
		// 			<th colspan="2">Oleh</th>
		// 			<th rowspan="2">Status</th>
		// 		</tr>
		// 		<tr>
		// 			<th>NIK</th>
		// 			<th>Nama</th>
		// 		</tr>';
		// for ($i=0; $i < count($result); $i++) { 
		// 	$html .= 
		// 		'<tr>
		// 			<td>'. $no .'</td>
		// 			<td>'. $result[$i]['pengajuan_code'] .'</td>
		// 			<td>'. $result[$i]['formulir_deskripsi'] .'</td>
		// 			<td>'. $result[$i]['user_nik'] .'</td>
		// 			<td>'. $result[$i]['user_nama'] .'</td>
		// 			<td>'. $result[$i]['pengajuan_status'] .'</td>
		// 		</tr>';
		// 	$no++;
		// }
		// $html .= 
		// 	'</table>';
		// print_r($html);die();
		// $html2pdf = new Html2Pdf('P','A4');
		// $html2pdf->writeHTML($html);
		// $html2pdf->output();
	}

}

/* End of file C_report.php */
/* Location: ./application/modules/admin/controllers/C_report.php */