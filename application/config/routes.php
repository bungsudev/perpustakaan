<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['surat-template'] = 'SuratTemplate';

$route['pejabat-desa'] = 'home/pejabatdesa';
$route['kontak-kami'] = 'home/kontak';
$route['artikels'] = 'home/artikel';
$route['wisata-desa'] = 'home/wisata';
$route['search'] = 'home/search';

require_once(BASEPATH . "/database/DB.php");
$db = &DB();
$profil = $db->get('profil');
$artikel = $db->get('artikel');

$result_profil = $profil->result();
foreach ($result_profil as $row) {
    $route['profil/'.$row->slug.''] = 'home/profil/' . $row->slug . '';
}

$result_artikel = $artikel->result();
foreach ($result_artikel as $row) {
    $route['artikel/'.$row->slug.''] = 'home/detail_artikel/' . $row->slug . '';
}