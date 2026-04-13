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

