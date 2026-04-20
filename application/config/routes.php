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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication routes
$route['auth'] = 'auth';

// Admin routes
$route['admin'] = 'admin';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/login'] = 'auth';


// Guru Management Routes - User Friendly URLs
$route['guru'] = 'GuruController';
$route['guru/active'] = 'GuruController';
$route['guru/tambah'] = 'GuruController/tambah';
$route['guru/detail/(:num)'] = 'GuruController/detail/$1';
$route['guru/edit/(:num)'] = 'GuruController/edit/$1';
$route['guru/inactive/(:num)'] = 'GuruController/set_inactive/$1';
$route['guru/activate/(:num)'] = 'GuruController/activate/$1';
$route['guru/simpan'] = 'GuruController/proses_tambah';
$route['guru/update'] = 'GuruController/proses_edit';
$route['guru/inactive'] = 'GuruController/inactive';

// Public Guru Routes
$route['guru/public'] = 'GuruController/public_view';

// Routes untuk Program
$route['program'] = 'ProgramController';
$route['program/detail/(:num)'] = 'ProgramController/detail/$1';
$route['program/edit/(:num)'] = 'ProgramController/edit/$1';
$route['program/tambah'] = 'ProgramController/tambah';
$route['program/insert'] = 'ProgramController/insert';
$route['program/update'] = 'ProgramController/update';
$route['program/delete/(:num)'] = 'ProgramController/delete/$1';

// Routes untuk Statistik
$route['statistik'] = 'StatistikController';
$route['statistik/detail/(:num)'] = 'StatistikController/detail/$1';
$route['statistik/edit/(:num)'] = 'StatistikController/edit/$1';
$route['statistik/tambah'] = 'StatistikController/tambah';
$route['statistik/insert'] = 'StatistikController/insert';
$route['statistik/update'] = 'StatistikController/update';
$route['statistik/delete/(:num)'] = 'StatistikController/delete/$1';

// Routes untuk Sarana Prasarana
$route['sarpras'] = 'SarprasController';
$route['sarpras/detail/(:num)'] = 'SarprasController/detail/$1';
$route['sarpras/edit/(:num)'] = 'SarprasController/edit/$1';
$route['sarpras/tambah'] = 'SarprasController/tambah';
$route['sarpras/insert'] = 'SarprasController/insert';
$route['sarpras/update'] = 'SarprasController/update';
$route['sarpras/delete/(:num)'] = 'SarprasController/delete/$1';

// Routes untuk Testimoni
$route['testimoni'] = 'TestimoniController';
$route['testimoni/detail/(:num)'] = 'TestimoniController/detail/$1';
$route['testimoni/edit/(:num)'] = 'TestimoniController/edit/$1';
$route['testimoni/tambah'] = 'TestimoniController/tambah';
$route['testimoni/insert'] = 'TestimoniController/insert';
$route['testimoni/update'] = 'TestimoniController/update';
$route['testimoni/delete/(:num)'] = 'TestimoniController/delete/$1';

// Routes untuk Partnership
$route['partnership'] = 'PartnershipController';
$route['partnership/detail/(:num)'] = 'PartnershipController/detail/$1';
$route['partnership/edit/(:num)'] = 'PartnershipController/edit/$1';
$route['partnership/tambah'] = 'PartnershipController/tambah';
$route['partnership/insert'] = 'PartnershipController/insert';
$route['partnership/update'] = 'PartnershipController/update';
$route['partnership/delete/(:num)'] = 'PartnershipController/delete/$1';

// Routes untuk Jurusan
$route['jurusan'] = 'JurusanController';
$route['jurusan/detail/(:num)'] = 'JurusanController/detail/$1';
$route['jurusan/edit/(:num)'] = 'JurusanController/edit/$1';
$route['jurusan/tambah'] = 'JurusanController/tambah';
$route['jurusan/insert'] = 'JurusanController/insert';
$route['jurusan/update'] = 'JurusanController/update';
$route['jurusan/delete/(:num)'] = 'JurusanController/delete/$1';

// Routes untuk Pimpinan
$route['pimpinan'] = 'PimpinanController';
$route['pimpinan/detail/(:num)'] = 'PimpinanController/detail/$1';
$route['pimpinan/edit/(:num)'] = 'PimpinanController/edit/$1';
$route['pimpinan/tambah'] = 'PimpinanController/tambah';
$route['pimpinan/insert'] = 'PimpinanController/insert';
$route['pimpinan/update'] = 'PimpinanController/update';
$route['pimpinan/delete/(:num)'] = 'PimpinanController/delete/$1';

// Routes untuk Mapel (Mata Pelajaran)
$route['mapel'] = 'MapelController';
$route['mapel/detail/(:num)'] = 'MapelController/detail/$1';
$route['mapel/edit/(:num)'] = 'MapelController/edit/$1';
$route['mapel/tambah'] = 'MapelController/tambah';
$route['mapel/proses_tambah'] = 'MapelController/proses_tambah';
$route['mapel/proses_edit'] = 'MapelController/proses_edit';
$route['mapel/set_inactive/(:num)'] = 'MapelController/set_inactive/$1';
$route['mapel/activate/(:num)'] = 'MapelController/activate/$1';
$route['mapel/hapus/(:num)'] = 'MapelController/hapus/$1';

// Routes untuk Siswa
$route['siswa'] = 'SiswaController';
$route['siswa/detail/(:num)'] = 'SiswaController/detail/$1';
$route['siswa/edit/(:num)'] = 'SiswaController/edit/$1';
$route['siswa/tambah'] = 'SiswaController/tambah';
$route['siswa/proses_tambah'] = 'SiswaController/proses_tambah';
$route['siswa/proses_edit'] = 'SiswaController/proses_edit';
$route['siswa/set_inactive/(:num)'] = 'SiswaController/set_inactive/$1';
$route['siswa/activate/(:num)'] = 'SiswaController/activate/$1';
$route['siswa/hapus/(:num)'] = 'SiswaController/hapus/$1';
$route['siswa/inactive'] = 'SiswaController/inactive';
$route['siswa/import'] = 'SiswaController/import';
$route['siswa/download_template'] = 'SiswaController/download_template';
$route['siswa/proses_import'] = 'SiswaController/proses_import';

$route['jadwal'] = 'JadwalController';
$route['jadwal/detail/(:num)'] = 'JadwalController/detail/$1';
$route['jadwal/edit/(:num)'] = 'JadwalController/edit/$1';
$route['jadwal/tambah'] = 'JadwalController/tambah';
$route['jadwal/proses_tambah'] = 'JadwalController/proses_tambah';
$route['jadwal/proses_edit'] = 'JadwalController/proses_edit';
$route['jadwal/set_inactive/(:num)'] = 'JadwalController/set_inactive/$1';
$route['jadwal/activate/(:num)'] = 'JadwalController/activate/$1';
$route['jadwal/hapus/(:num)'] = 'JadwalController/hapus/$1';
$route['jadwal/inactive'] = 'JadwalController/inactive';


$route['news'] = 'NewsController';
$route['news/list'] = 'NewsController/public_index';
$route['news/create'] = 'NewsController/create';
$route['news/store'] = 'NewsController/store';
$route['news/edit/(:num)'] = 'NewsController/edit/$1';
$route['news/update/(:num)'] = 'NewsController/update/$1';
$route['news/delete/(:num)'] = 'NewsController/delete/$1';
$route['news/detail/(:num)'] = 'NewsController/detail/$1';
$route['news/show/(:num)'] = 'NewsController/show/$1';
$route['news/detail/(:any)'] = 'NewsController/public_detail/$1';
