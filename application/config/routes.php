<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Frontend routes
$route['artikel'] = 'home/artikel';
$route['artikel/(:num)'] = 'home/artikel/$1';
$route['artikel/detail/(:num)'] = 'home/artikel_detail/$1';
$route['galeri'] = 'home/galeri';
$route['data-penduduk'] = 'home/data_penduduk';
$route['laporan-keuangan'] = 'home/laporan_keuangan';
$route['kontak'] = 'home/kontak';

// Admin routes
$route['admin'] = 'admin/dashboard';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';
$route['admin/artikel'] = 'admin/artikel';
$route['admin/artikel/add'] = 'admin/artikel/add';
$route['admin/artikel/edit/(:num)'] = 'admin/artikel/edit/$1';
$route['admin/artikel/delete/(:num)'] = 'admin/artikel/delete/$1';
$route['admin/galeri'] = 'admin/galeri';
$route['admin/galeri/add'] = 'admin/galeri/add';
$route['admin/galeri/delete/(:num)'] = 'admin/galeri/delete/$1';
$route['admin/penduduk'] = 'admin/penduduk';
$route['admin/penduduk/add'] = 'admin/penduduk/add';
$route['admin/penduduk/edit/(:num)'] = 'admin/penduduk/edit/$1';
$route['admin/penduduk/delete/(:num)'] = 'admin/penduduk/delete/$1';
$route['admin/keuangan'] = 'admin/keuangan';
$route['admin/keuangan/add'] = 'admin/keuangan/add';
$route['admin/keuangan/edit/(:num)'] = 'admin/keuangan/edit/$1';
$route['admin/keuangan/delete/(:num)'] = 'admin/keuangan/delete/$1';
$route['admin/komentar'] = 'admin/komentar';
$route['admin/komentar/delete/(:num)'] = 'admin/komentar/delete/$1';
