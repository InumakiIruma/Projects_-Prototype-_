<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ================= ROLE FILTER =================
$admin   = ['filter' => 'role:admin'];
$user    = ['filter' => 'role:user'];
$allRole = ['filter' => 'role:admin,user'];

// ================= LOGIN (PUBLIC) =================
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// ================= ROOT =================
// kalau belum login → ke login
$routes->get('/', 'Auth::login');

// ================= PROTECTED =================
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
});
