<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ================= ROLE FILTER =================
$admin   = ['filter' => 'role:admin'];
$user    = ['filter' => 'role:user'];
$allRole = ['filter' => 'role:admin,user'];

// ================= PUBLIC =================
$routes->get('/', 'Auth::login'); // root ke login
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// ================= PROTECTED (WAJIB LOGIN) =================
$routes->group('', ['filter' => 'auth'], function ($routes) use ($allRole) {

    // Dashboard
    $routes->get('/dashboard', 'Home::index');

    // ================= USERS =================
    $routes->get('/users', 'Users::index', $allRole);
    $routes->get('/users/create', 'Users::create');
    $routes->post('/users/store', 'Users::store');
    $routes->get('/users/edit/(:num)', 'Users::edit/$1', $allRole);
    $routes->post('/users/update/(:num)', 'Users::update/$1', $allRole);
    $routes->get('/users/delete/(:num)', 'Users::delete/$1', $allRole);

    // ================= ALAT =================
    $routes->get('/alat', 'Alat::index');
    $routes->get('/alat/data', 'Alat::data');
    $routes->get('/alat/tambah', 'Alat::tambah', ['filter' => 'role:admin']);
    $routes->get('/alat/peminjaman', 'Alat::peminjaman');
    $routes->get('/alat/laporan', 'Alat::laporan');
    $routes->post('/alat/simpan', 'Alat::simpan');
    $routes->get('/alat/data', 'Alat::data');
    $routes->post('/alat/simpan', 'Alat::simpan');
    $routes->get('/alat/edit/(:num)', 'Alat::edit/$1');
    $routes->post('/alat/update/(:num)', 'Alat::update/$1');
    $routes->get('/alat/delete/(:num)', 'Alat::delete/$1');
});
