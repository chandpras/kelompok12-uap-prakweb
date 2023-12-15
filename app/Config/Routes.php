<?php

use CodeIgniter\Router\RouteCollection;
use Config\Auth;

/**
 * @var RouteCollection $routes
 */

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(Auth::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});

// General Routes
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->get('/login', 'Home::login');

// Admin Routes
$routes->get('/admin', 'AdminController::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'AdminController::index', ['filter' => 'role:admin']);
$routes->get('/admin/user-profile/(:num)', 'AdminController::detail/$1', ['filter' => 'role:admin']);
$routes->delete('/admin/user-delete/(:num)', 'AdminController::destroy/$1', ['filter' => 'role:admin']);

// Applicant Routes
$routes->get('/applicant', 'ApplicantController::index', ['filter' => 'role:applicant']);
$routes->get('/applicant/index', 'ApplicantController::index', ['filter' => 'role:applicant']);
$routes->get('/applicant/profile', 'ApplicantController::profile', ['filter' => 'role:applicant']);
$routes->get('/create-applicant', 'ApplicantController::create', ['filter' => 'role:applicant']);
$routes->post('/save-applicant', 'ApplicantController::save', ['filter' => 'role:applicant']);
$routes->get('/edit-applicant', 'ApplicantController::edit', ['filter' => 'role:applicant']);
$routes->post('/update-applicant', 'ApplicantController::update', ['filter' => 'role:applicant']);
$routes->get('/applicant/info', 'ApplicantController::info', ['filter' => 'role:applicant']);
$routes->get('/applicant/notification', 'ApplicantController::notif', ['filter' => 'role:applicant']);
$routes->get('/applicant/morejob', 'ApplicantController::morejob', ['filter' => 'role:applicant']);


// Company Routes
$routes->get('/company', 'CompanyController::index', ['filter' => 'role:company']);
$routes->get('/company/index', 'CompanyController::index', ['filter' => 'role:company']);
$routes->get('/company/profile', 'CompanyController::profile', ['filter' => 'role:company']);
$routes->get('/create-company', 'CompanyController::create', ['filter' => 'role:company']);
$routes->post('/save-company', 'CompanyController::save', ['filter' => 'role:company']);
$routes->get('/edit-company', 'CompanyController::edit', ['filter' => 'role:company']);
$routes->post('/update-company', 'CompanyController::update', ['filter' => 'role:company']);

//lowongan
$routes->get('/lowongan', 'LowonganController::index', ['filter' => 'role:company']);
$routes->get('/create-lowongan', 'LowonganController::createLowongan', ['filter' => 'role:company']);
$routes->get('/tambah-lowongan', 'LowonganController::tambahLowongan', ['filter' => 'role:company']);
$routes->post('/save-lowongan', 'LowonganController::saveLowongan', ['filter' => 'role:company']);
$routes->get('/simpan-lowongan', 'LowonganController::simpanLowongan', ['filter' => 'role:company']);
$routes->get('/edit-lowongan', 'LowonganController::editLowongan', ['filter' => 'role:company']);
$routes->get('/list-pelamar', 'LowonganController::listPelamar', ['filter' => 'role:company']);
$routes->get('/edit-status', 'LowonganController::editPelamar', ['filter' => 'role:company']);

//Submission_lowongan
$routes->get('/sublowongan', 'SublowonganController::index', ['filter' => 'role:applicant']);
$routes->get('/create-sublowongan', 'SublowonganController::createsublowongan', ['filter' => 'role:applicant']);
$routes->get('/tambah-sublowongan', 'SublowonganController::tambahsublowongan', ['filter' => 'role:applicant']);
$routes->post('/save-sublowongan', 'SublowonganController::savesublowongan', ['filter' => 'role:applicant']);
$routes->get('/simpan-sublowongan', 'SublowonganController::simpansublowongan', ['filter' => 'role:applicant']);
