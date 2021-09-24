<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'website/C_website';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Login
| -------------------------------------------------------------------------
*/
$route['user-login.html'] = 'login/C_login';
$route['user-auth.html'] = 'login/C_login/auth_user';
$route['pendaftaran-user.html'] = 'login/C_login/index_register';
$route['admin-login.html'] = 'login/C_login/index_admin';
$route['admin-auth.html'] = 'login/C_login/auth_admin';
$route['logout.html'] = 'login/C_logout';

$route['pendaftaran-user.json'] = 'login/C_login/register';
/*
| -------------------------------------------------------------------------
| Admin
| -------------------------------------------------------------------------
*/
$route['admin-dashboard.html'] = 'admin/C_dashboard';
$route['admin-formulir.html'] = 'admin/C_formulir';
$route['admin-formulir-type.html'] = 'admin/C_formulir/type_view';
$route['admin-formulir-jenis.html'] = 'admin/C_formulir/jenis_view';
$route['admin-daftar-user.html'] = 'admin/C_master/view_user';
$route['admin-daftar-admin.html'] = 'admin/C_master/view_admin';
$route['admin-daftar-kecamatan.html'] = 'admin/C_master/view_kecamatan';
$route['admin-daftar-kelurahan.html'] = 'admin/C_master/view_kelurahan';
$route['admin-pengajuan-diproses.html'] = 'admin/C_pengajuan/index_diproses';
$route['admin-pengajuan-diterima.html'] = 'admin/C_pengajuan/index_diterima';
$route['admin-pengajuan-ditolak.html'] = 'admin/C_pengajuan/index_ditolak';
$route['admin-pengajuan-dipending.html'] = 'admin/C_pengajuan/index_dipending';
$route['admin-pengajuan-detail.html'] = 'admin/C_pengajuan/index_detail';
$route['admin-pengajuan-revisi.html'] = 'admin/C_pengajuan/index_update';
$route['admin-pengajuan-report.html'] = 'admin/C_report';
// action
$route['get-all-formulir.json'] = 'admin/C_formulir/get_all_formulir';
$route['get-formulir.json'] = 'admin/C_formulir/get_formulir';
$route['add-data-formulir.json'] = 'admin/C_formulir/tambah_data_formulir';
$route['update-data-formulir.json'] = 'admin/C_formulir/ubah_data_formulir';
$route['delete-data-formulir.json'] = 'admin/C_formulir/hapus_data_formulir';

$route['get-all-admin.json'] = 'admin/C_master/get_all_admin';
$route['get-admin.json'] = 'admin/C_master/get_admin';
$route['add-data-admin.json'] = 'admin/C_master/tambah_data_admin';
$route['update-data-admin.json'] = 'admin/C_master/ubah_data_admin';
$route['delete-data-admin.json'] = 'admin/C_master/hapus_data_admin';

$route['get-all-user.json'] = 'admin/C_master/get_all_user';
$route['get-user.json'] = 'admin/C_master/get_user';
$route['add-data-user.json'] = 'login/C_login/register';
$route['update-data-user.json'] = 'admin/C_master/ubah_data_user';
$route['delete-data-user.json'] = 'admin/C_master/hapus_data_user';

$route['get-all-kecamatan.json'] = 'admin/C_master/get_all_kecamatan';
$route['get-kecamatan.json'] = 'admin/C_master/get_kecamatan';
$route['add-data-kecamatan.json'] = 'admin/C_master/tambah_data_kecamatan';
$route['update-data-kecamatan.json'] = 'admin/C_master/ubah_data_kecamatan';
$route['delete-data-kecamatan.json'] = 'admin/C_master/hapus_data_kecamatan';

$route['get-all-pengajuan.json'] = 'admin/C_pengajuan/get_all_pengajuan';
$route['admin-tolak-pengajuan.json'] = 'admin/C_pengajuan/tolak_pengajuan';
$route['admin-pending-pengajuan.json'] = 'admin/C_pengajuan/pending_pengajuan';
$route['admin-terima-pengajuan.json'] = 'admin/C_pengajuan/terima_pengajuan';
$route['admin-verif-pengajuan.json'] = 'admin/C_pengajuan/verifikasi_pengajuan';

$route['admin-get-file-formulir.json'] = 'admin/C_pengajuan/get_file_formulir';
$route['admin-revisi-pengajuan.json'] = 'admin/C_pengajuan/revisi_pengajuan';

$route['admin-pengajuan-report.json'] = 'admin/C_report/report';

$route['download-file'] = 'admin/C_formulir/download';
/*
| -------------------------------------------------------------------------
| User
| -------------------------------------------------------------------------
*/
$route['user-dashboard.html'] = 'user/C_pengajuan/index_dashboard';
$route['user-daftar-pengajuan.html'] = 'user/C_pengajuan/index_daftar';
$route['user-pengajuan.html'] = 'user/C_pengajuan/index_pengajuan';
$route['user-pengajuan.html'] = 'user/C_pengajuan/index_pengajuan';
$route['user-ditolak'] = 'user/C_pengajuan/index_ditolak';
$route['user-detail-pengajuan.html'] = 'user/C_pengajuan/index_detail';
$route['user-revisi'] = 'user/C_pengajuan/index_revisi';
$route['user-revisi.html'] = 'user/C_pengajuan/index_update';

$route['user-get-all-pengajuan.json'] = 'user/C_pengajuan/get_all_pengajuan';
$route['add-pengajuan.json'] = 'user/C_pengajuan/tambah_pengajuan';
$route['revisi-pengajuan.json'] = 'user/C_pengajuan/revisi_pengajuan';
$route['user-get-all-formulir.json'] = 'user/C_pengajuan/get_all_formulir';
$route['user-get-file-formulir.json'] = 'user/C_pengajuan/get_file_formulir';

$route['user-download-formulir'] = 'user/C_pengajuan/download';

$route['landing-page.html'] = 'website/C_website';
$route['cek-permohonan.html'] = 'website/C_website/index_cek';